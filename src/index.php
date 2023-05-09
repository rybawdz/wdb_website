<?php

$servername = "mysql";
$username = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE', true) ?: getenv('MYSQL_DATABASE');;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$request = $_SERVER['REQUEST_URI'];

if(substr( $request, 0, 7 ) === "/signin"){
    require __DIR__ . '/views/signin.php';
}
else{
switch ($request) {
    case '/signin' :
        require __DIR__ . '/views/signin.php';
        break;
    case '/paymentsummary' :
        require __DIR__ . '/views/paymentsummary.php';
        break;
    case '/signup' :
        require __DIR__ . '/views/signup.php';
        break;
    case '/profile' :
        require __DIR__ . '/views/profile.php';
        break;
    case '/' :
        require __DIR__ . '/views/helo.php';
        break;
    case '/resetpwd' :
        require __DIR__ . '/views/resetpwd.php';
        break;
    case '/payment' :
        require __DIR__ . '/views/payment.php';
        break;
    case '/paymentconfirm' :
        require __DIR__ . '/views/paymentconfirm.php';
        break;
    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/helo.php';
        break;
    }
}
?>
