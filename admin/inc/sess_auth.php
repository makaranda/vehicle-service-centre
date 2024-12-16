<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['REQUEST_URI'];

if(!isset($_SESSION['userdata']) && !strpos($link, 'login.php')){
    // Redirect to login if no user data exists and you're not on the login page
    redirect('./');
}

if(isset($_SESSION['userdata']) && (strpos($link, 'login.php') || strpos($link, 'index.php'))){
    // Redirect logged-in users away from login and index pages
    redirect('admin/index.php');
}

$module = array('','admin','faculty','student');

if(isset($_SESSION['userdata'])){
    // Check if the user is trying to access restricted areas based on login type
    $login_type = $_SESSION['userdata']['login_type'];

    // Ensure the user is trying to access a valid page for their login type
    if((strpos($link, 'index.php') || strpos($link, 'admin/')) && $login_type != 1){
        // Check for invalid login types
        if($login_type > 3 || !isset($module[$login_type])) {
            // Handle unknown user types or invalid redirection
            echo "<script>alert('Access Denied! Invalid user type.');location.replace('".base_url."');</script>";
            exit;
        }

        // Redirect to the appropriate module
        //echo "<script>alert('Access Denied!');location.replace('".base_url.$module[$login_type]."');</script>";
        //exit;
    }
}
?>
