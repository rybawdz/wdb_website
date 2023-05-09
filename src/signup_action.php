<?php
include "db.php";

$sql = $conn->prepare('INSERT INTO USERS (name, lastName, email, username, password) VALUES (:nam, :lnam, :em, :usr, :pwd)');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

$sql->execute(array(
    'nam' => $_POST['name'],
    'lnam' => $_POST['lastName'],
    'usr' => $_POST['username'],
    'em' => $_POST['email'],
    'pwd' => password_hash($_POST['password'], PASSWORD_ARGON2I)
));


$redirect = "/signin?err=Please%20login%20with%20you%20new%20credentials";
header("Location: $redirect");
?>