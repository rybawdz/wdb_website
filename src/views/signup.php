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
    <form method="POST" onSubmit="return checkPassword(this)" action="signup_action.php">
        <FONT SIZE="20" FACE="courier" COLOR=blue>

            <body bgcolor="#E7E7EF"><br>
                <table>
                    <tr>
                        <td>
                            <h3>Name</h3>
                        </td>
                        <td><input type=text name="name" required></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Last Name</h3>
                        </td>
                        <td><input type=text name="lastName" required></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Email</h3>
                        </td>
                        <td><input type=email name="email" required></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Username</h3>
                        </td>
                        <td><input type=text name="username" required></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Password</h3>
                        </td>
                        <td>
                            <input type=password name="password" id="password" minlength="1" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Confirm Password</h3>
                        </td>
                        <td><input type=password name="confirm_password" id="confirm_password" required><span id='message'></span></td>
                    </tr>
                    <tr>
                        <th COLSPAN="2"><input type=submit value="SUBMIT" name="SUBMIT">
                    </tr>
                </table>
</center>
<script>$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>
<script>
  function checkPassword(form) {
    const password = form.password.value;
    const confirmPassword = form.confirm_password.value;

    if (password != confirmPassword) {
      alert("Error! Password did not match.");
      return false;
    } else {
      return true;
    }
  }
</script>


</body>

</html>