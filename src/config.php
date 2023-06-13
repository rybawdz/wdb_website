<?php
require_once 'vendor/autoload.php';

# Add your client ID and Secret

$clientID = '623482861345-8mhbh9b0vb605r954e4rtqebgo9944ni.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://localhost:8080/callback';
$client = new Google\Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

?>