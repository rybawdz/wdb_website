<?php
if (isset($_GET['err'])){

    $message = htmlspecialchars($_GET['err']);
    echo $message;

}
require('./config.php');
require('./vendor/autoload.php');
$login_url = $client->createAuthUrl();
?>
<head>
<script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
<title>Halal Bank</title>
</head>

<html>
<title><signin></title>
<center>
<h1> Bank Money Transfer</h1>
<form method="POST" action="signin_action.php">
<FONT SIZE="20">
<body bgcolor="#E7E7EF"><br>
<table>
<tr><td><h3>Username</h3></td><td ><input type=text name="username" required></td></tr>
<tr><td><h3>Password</h3></td><td ><input type=password name="password" required></td></tr>
<tr><th COLSPAN="2"><input type=submit value="SUBMIT" name="SUBMIT"></tr>
</table>
</form>
<form method="post" action="send_email.php">
    <input type="submit" name="forgor" id="forgor" value="Forgot password?" /><br/>
</form>
</center>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login with Google account</title>
  <style>
    .btn{
      display: flex;
      justify-content: center;
      padding: 50px;
    }
    a{
      all: unset;
      cursor: pointer;
      padding: 10px;
      display: flex;
      width: 250px;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      background-color: #f9f9f9;
      border: 1px solid rgba(0, 0, 0, .2);
      border-radius: 3px;
    }
    a:hover{
      background-color: #ffffff;
    }
    img{
      width: 50px;
      margin-right: 5px;
    
    }
  </style>
</head>
<body>
    <div class="btn">
    <a href="<?= $login_url ?>"><img src="https://tinyurl.com/46bvrw4s" alt="Google Logo"> Login with Google</a>
    </div>
</body>
</html>

