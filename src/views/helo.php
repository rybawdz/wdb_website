<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    echo 'Welcome ' . $_SESSION['username'] . '!';
}
?>

<head>
<script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
<title>Halal Bank</title>
</head>
<html>
<title><signin></title>
<center>
<h1> Helo</h1>
<FONT SIZE="20" FACE="courier" COLOR=blue>
<body bgcolor="#E7E7EF"><br>
<form method="post" action="/signin">
    <input type="submit" name="login" id="login" value="Log in" />
</form>
<form method="post" action="/profile">
    <input type="submit" name="profile" id="profile" value="Profile" />
</form>
<form method="post" action="/payment">
    <input type="submit" name="payment" id="payment" value="Start payment" />
</form>
<form method="post" action="/signup">
    <input type="submit" name="signup" id="signup" value="Sign up" />
</form>

</center>
</body>
</html>
