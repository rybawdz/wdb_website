<?php
session_start();
$servername = "mysql";
$username = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE', true) ?: getenv('MYSQL_DATABASE');;
$con = mysqli_connect($servername, $username, $password, $dbname);


$error = null;
$validated = 0;
$redirect = '/signin?err=Incorrect%20username%20and/or%20password!';
if ($stmt = $con->prepare('SELECT id, password FROM USERS WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc)
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        if (password_verify($_POST['password'], $password)) {
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $id;
            $redirect = "/profile";
            $validated = 1;
        } 
    }
	$stmt->close();

header("Location: $redirect");
}

?>