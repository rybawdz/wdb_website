<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    exit;
}
echo 'Welcome ' . $_SESSION['username'] . '!';
?>


<head>
    <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
    <title>Halal Bank</title>
</head>
<html>
<title>
    <signin>
</title>
<center>
    <h1> Payment history</h1>
</center>
<form method="post" action="logout_action.php">
    <input type="submit" name="logout" id="logout" value="Log out" /><br />
</form>
<form method="post" action="/payment">
    <input type="submit" name="payment" id="payment" value="Start payment" />
</form>
</body>

</html>


<?php
include "db.php";


$result = mysqli_query($con, "SELECT * FROM TRANSACTIONS WHERE username = '" . $_SESSION['username']. "'");
if (mysqli_num_rows($result) != 0){
echo "<table border='1'>
<tr>
<th>Transaction id</th>
<th>Receipient Name</th>
<th>Receipient Account Number</th>
<th>Receipient Amount</th>

</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['account'] . "</td>";
    echo "<td>" . $row['amount'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}
?>