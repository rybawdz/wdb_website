<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	exit;
}
echo 'Logged in as ' . $_SESSION['username'];

include "db.php";


$sql = $conn->prepare('INSERT INTO TRANSACTIONS (username, name, amount, account, title) VALUES (:unam, :nam, :am, :acc, :tt)');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$sql->execute(array(
    'unam' => $_POST['username'],
    'nam' => $_POST['accountName'],
    'am' => (int)$_POST['amount'],
    'acc' => $_POST['accountNumber'],
    'tt' => $_POST['title']
));

$stmt = $con->prepare("SELECT id FROM TRANSACTIONS ORDER BY id DESC LIMIT 1;");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id);
$stmt->fetch();


$stmt = $con->prepare('SELECT name, amount, account, title FROM TRANSACTIONS WHERE id = ?');
	// Bind parameters (s = string, i = int, b = blob, etc)
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($name, $amount, $account, $title);
        $stmt->fetch();
    }
    else{
        echo " error";
    }

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
    <h1> Congratulations, payment sent. Details below.</h1>
    <form method="POST" action="/profile">
            <body bgcolor="#E7E7EF"><br>
                <table>
                    <tr>
                        <td>
                            <h3>Title <?php echo $title; ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Account No <?php echo $account; ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Account Holder name: <?php echo $name; ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Amount: <?php echo $amount; ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <th COLSPAN="2"><input type=submit value="Return to profile" name="SUBMIT">
                    </tr>
                </table>
    </form>
</center>
</body>

</html>

