<?php
require_once '../config.php';

$message ='';
$messageType ='';
// $services = $conn->query("SELECT * FROM `service_list` where status = 1 order by `service`");
// while($row= $services->fetch_assoc()){
//     //$row['description'] = strip_tags(html_entity_decode(stripslashes(substr($row['description'], 20))));
//     $description = substr($row['description'], 0,50);

// }  
//var_dump($_POST['username']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get POST data (assuming you're using a form with 'name' attributes)
    $firstname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lastname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    
    // Validate inputs
    if (empty($firstname) || empty($phone) || empty($username) || empty($password) || empty($email)) {
        echo json_encode(['message' => 'All fields are required'.$firstname.'/'.$phone.'/'.$username.'/'.$password.'/'.$email.'', 'messageType' => 'error']);
        exit;
    }

    // Sanitize inputs
    $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
    $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    // Hash the password
    //$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $hashedPassword = md5($password);

    // Handle avatar file upload if any
    $avatar = null;
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $avatarTmp = $_FILES['avatar']['tmp_name'];
        $avatarName = $_FILES['avatar']['name'];
        $avatarExt = pathinfo($avatarName, PATHINFO_EXTENSION);
        $avatarDest = 'uploads/avatars/' . uniqid() . '.' . $avatarExt;
        
        // Move uploaded avatar to the desired directory
        if (move_uploaded_file($avatarTmp, $avatarDest)) {
            $avatar = $avatarDest;
        } else {
            echo json_encode(['message' => 'Error uploading avatar', 'messageType' => 'error']);
            exit;
        }
    }

    // Initialize DB connection
    $db = new DBConnection();
    $conn = $db->conn;

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode(['message' => 'Username already exists', 'messageType' => 'error']);
        exit;
    }

    // Insert new user data into the database
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, username, password, email, avatar, type) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $type = 3; // Assuming type 2 is for normal users
    $stmt->bind_param("ssssssi", $firstname, $lastname, $username, $hashedPassword, $email, $avatar, $type);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'User registered successfully, Please check your Email and SMS', 'messageType' => 'success']);
    } else {
        echo json_encode(['message' => 'Error registering user', 'messageType' => 'error']);
    }

    $stmt->close();
    $conn->close();
}

// $response = [
//     'message' => $_POST['username'],
//     'messageType' => $messageType,
// ];

// echo json_encode($response);


?>