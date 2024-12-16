<?php
require_once '../config.php';

// Ensure this file does not use a non-existent class
if (!class_exists('DBConnection')) {
    require_once '../classes/DBConnection.php';
}

// Avoid starting a session if one is already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the form data is sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Retrieve and sanitize inputs
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            throw new Exception('Username or password is missing.');
        }
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Create a database connection
        $db = new DBConnection();
        $conn = $db->conn;

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = md5(?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        header('Content-Type: application/json');

        if ($result->num_rows > 0) {
            // Fetch user data and store in session
            $user = $result->fetch_assoc();
            foreach ($user as $key => $value) {
                if ($key !== 'password') {
                    $_SESSION['userdata'][$key] = $value;
                }
            }
            $_SESSION['userdata']['login_type'] = 1; // Admin login

            // Return success response
            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful',
                'login_type' => 1
            ]);
        } else {
            // Invalid credentials
            echo json_encode([
                'status' => 'incorrect',
                'message' => 'Invalid username or password'
            ]);
        }

        // Clean up
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        // Handle exceptions and send error response
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
} else {
    // Deny access for non-POST requests
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
}
?>
