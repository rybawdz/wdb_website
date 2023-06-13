<?php
if (isset($_GET['code'])):

	session_start();
	require('./config.php');
	$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
	if(isset($token['error'])){
		header('Location: /');
		exit;
	  }
	  $_SESSION['token'] = $token;
	  header('Location: /profile');
	  exit;
  
endif
?>