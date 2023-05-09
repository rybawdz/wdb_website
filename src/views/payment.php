<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	exit;
}
echo 'Logged in as ' . $_SESSION['username'];
?>

<head>
<script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
<title>Halal Bank</title>
</head>
<html>
<title><signin></title>
<center>
<h1> Bank Money Transfer</h1>
<form method="POST" action="paymentconfirm">
<FONT SIZE="20" FACE="courier" COLOR=blue>
<body bgcolor="#E7E7EF"><br>
<table>
<tr><td><h3>Account No</h3></td><td ><input type=text name="accountNumber" required></td></tr>
<tr><td><h3>Account Holder name</h3></td><td ><input type=text name="accountName" required></td></tr>
<tr><td><h3>Amount</h3></td><td><input type=number name="amount" required></td></tr>
<tr><th COLSPAN="2"><input type=submit value="SUBMIT" name="SUBMIT"></tr>
</table>
</center>
</body>
</html>
