<?php
session_start();
$servername = "mysql";
$username = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE', true) ?: getenv('MYSQL_DATABASE');;
$con = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_GET['code'])){

    session_start();
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if(isset($token['error'])){
      header('Location: login.php');
      exit;
    }
    $_SESSION['token'] = $token;
    session_start();
    $servername = "mysql";
    $username = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
    $password = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');
    $dbname = getenv('MYSQL_DATABASE', true) ?: getenv('MYSQL_DATABASE');;
    $con = mysqli_connect($servername, $username, $password, $dbname);
    
    header("Location: $redirect");
    
    
    header('Location: /profile');
    exit;
  
}

$error = null;
$validated = 0;
$redirect = '/signin?err=Incorrect%20username%20and/or%20password!';
$query = 
$result = mysqli_query($con, "SELECT * FROM USERS WHERE username = '" .$_POST['username']. "'");
if (mysqli_num_rows($result) != 0){
    while ($row = mysqli_fetch_array($result)) {
            if (password_verify($_POST['password'], $row['password'])) {
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $redirect = "/profile";
            $validated = 1;
            break;
        } 

    }
}
header("Location: $redirect");

