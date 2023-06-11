<?php
if (isset($_GET['err'])){

    $message = htmlspecialchars($_GET['err']);
    echo $message;

}
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
<FONT SIZE="20" FACE="courier" COLOR=blue>
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
