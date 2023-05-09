<?php
$servername = "mysql";
$username = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE', true) ?: getenv('MYSQL_DATABASE');;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$con = mysqli_connect($servername, $username, $password, $dbname);
?>