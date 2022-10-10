<?php
session_start();
error_log("Login Failure: User name and password are required");

$failure = false;  // If we have no POST data
$NeedAt = false;
$flag = false;

$dbhost = 'localhost';
$dbuser = 'ex';
$dbpass = 'super_secret_pass';
$dbname = 'php_login_ex';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['email']) && isset($_POST['pass']) )
{
  if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 )
  {
    error_log("login failed");
    $_SESSION['error'] = "User name and password are required";
    header("Location: login.php");
    return;
  }
  else if(strpos($_POST['email'], '@') === false)
  {
    $_SESSION['error'] = "Email must have an at-sign (@)";
    header("Location: login.php");
    return;
  }
  else
  {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // define admin lookup query
    $user_lookup = $conn->prepare("SELECT email FROM user WHERE email = ? AND password = ?");

    // bind query parameters to user input
    $user_lookup->bind_param("ss", $email, $password);

    // execute the query
    $user_lookup->execute();

    // bind the resulf of the query to a variable
    $user_lookup->bind_result($email);

    while ($user_lookup->fetch())
    {
      $_SESSION['name'] = $email;
      $flag = true;
    }
    if ($flag)
    {
        header("Location: privileged_info.php");
    }
    else
    {
      header("Location: login.php");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>

<title>Somewhat Secure PHP Website</title>
</head>
<body>

<h1>Please Log In</h1>
<?php

if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}

 ?>
<form method="POST">
<label for="nam">User Name</label>
<input type="text" name="email" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="password" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>


</body>
</html>
