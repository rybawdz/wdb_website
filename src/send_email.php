<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$servername = "mysql";
$username = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE', true) ?: getenv('MYSQL_DATABASE');;
$con = mysqli_connect($servername, $username, $password, $dbname);


date_default_timezone_set('Europe/Warsaw');
$error = "";

if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $error .= "<p>Invalid email address please type a valid email address!</p>";
    } else {
        $sel_query = "SELECT * FROM `USERS` WHERE email='" . $email . "'";
        $results = mysqli_query($con, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row == "") {
            $error .= "<p>No user is registered with this email address!</p>";
        }
    }
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div>
   <br /><a href='javascript:history.go(-1)'>Go Back</a>";
    } else {
        $expFormat = mktime(
            date("H"),
            date("i"),
            date("s"),
            date("m"),
            date("d") + 1,
            date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = md5($email);
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;
        // Insert Temp Table
        mysqli_query(
            $con,
            "INSERT INTO `PASSWORD_RESET` (`email`, `key`, `expDate`)
VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');"
        );

        $output = '<p>Dear user,</p>';
        $output .= '<p>Please click on the following link to reset your password.</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p><a href="http://localhost:8080/reset-password?
key=' . $key . '&email=' . $email . '&action=reset" target="_blank">
http://localhost:8080/reset-password
?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
        $output .= '<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';
        $output .= '<p>Thanks,</p>';
        $output .= '<p>Halal Bank Team</p>';
        $body = $output;
        $subject = "Password Recovery - Halal Bank";

        $email_to = $email;
        $fromserver = "noreply@halalbank.com";

        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->Host = "mail.halalbank.com"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@halalbank.com"; // Enter your email here
        $mail->Password = "password"; //Enter your password here
        $mail->Port = 25;
        $mail->IsHTML(true);
        $mail->From = "noreply@halalbank.com";
        $mail->FromName = "halal bank";
        $mail->Sender = $fromserver; // indicates ReturnPath header
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
        }
    }
} else {
?>
    <form method="post" action="" name="reset"><br /><br />
        <label><strong>Enter Your Email Address:</strong></label><br /><br />
        <input type="email" name="email" placeholder="username@email.com" />
        <br /><br />
        <input type="submit" value="Reset Password" />
    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<?php } ?>