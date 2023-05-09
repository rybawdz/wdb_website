<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	exit;
}
echo 'Logged in as ' . $_SESSION['username'];

    if(isset($_POST['accountNumber']) && isset($_POST['accountName']) && isset($_POST['amount']) )
    $val = 1;
    else
    $val = 0;
    $redirect = "/payment";
    
    if(!$val){
        header("Location: $redirect");
        echo '<script>alert("Error! Please resubmit payment details.")</script>';
    }
    else{ ?>


<head>
<script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
<title>Halal Bank</title>
</head>

<html>
<title>
    <signin>
</title>
<center>
    <h1> Bank Money Transfer</h1>
    <form method="POST" action="/paymentsummary">
            <body bgcolor="#E7E7EF"><br>
                <table>
                    <tr>
                        <td>
                            <h3>Account No <?php echo $_POST['accountNumber']; ?></h3>
                        </td>
                        <td ><input type=hidden name="accountNumber" value =  <?php echo $_POST['accountNumber']; ?> ></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Account Holder name: <?php echo $_POST['accountName']; ?></h3>
                        </td>
                        <td ><input type=hidden name="accountName" value =  <?php echo $_POST['accountName']; ?>></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Amount: <?php echo $_POST['amount']; ?></h3>
                        </td>
                        <td ><input type=hidden name="amount"  value = <?php echo $_POST['amount']; ?>></td>
                        <td ><input type=hidden name="username"  value = <?php echo  $_SESSION['username'] ?>></td>
                    </tr>
                    <tr>
                        <th COLSPAN="2"><input type=submit value="CONFIRM" name="SUBMIT">
                    </tr>
                </table>
    </form>
</center>
</body>

</html>
   <?php }
?>
