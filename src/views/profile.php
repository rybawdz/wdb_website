<?php
session_start();
if (!isset($_SESSION['loggedin']) && !isset($_SESSION['token'])) {
    echo 'a';
    exit;
}

if(isset($_SESSION['token'])){
require('./config.php');

$client->setAccessToken($_SESSION['token']);
if($client->isAccessTokenExpired()){
  header('Location: logout.php');
  exit;
}
$google_oauth = new Google_Service_Oauth2($client);
$user_info = $google_oauth->userinfo->get();
$_SESSION['username'] = $user_info['email'];
$name = $user_info['givenName'] . " " . $user_info['familyName'];
$account = $user_info['id'];
$a = "Welcome " . $_SESSION['username'] . "\n" ;
echo nl2br($a);
}
else{
include "db.php";

$account = "";
$name = "";
$a = "Welcome " . $_SESSION['username'] . "\n" ;
echo nl2br($a);
$stmt = $con->prepare("SELECT account, name FROM USERS WHERE username = '" . $_SESSION['username']. "'");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($account, $name);
$stmt->fetch();
}
echo nl2br('Name: ' . $name . "\n");
echo 'Account number: ' . $account;

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


$result = mysqli_query($con, "SELECT * FROM TRANSACTIONS WHERE username = '" . $_SESSION['username']. "' OR account = '" . $account. "'");
if (mysqli_num_rows($result) != 0){
echo "<table border='1'>
<tr>
<th>Title</th>
<th>Transaction id</th>
<th>Receipient Name</th>
<th>Receipient Account Number</th>
<th>Receipient Amount</th>

</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
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