<?php
session_start();

if (!isset($_SESSION['admin_name']))
{
  die("ACCESS DENIED");
}

$dbhost = 'localhost';
$dbuser = 'ex';
$dbpass = 'super_secret_pass';
$dbname = 'php_login_ex';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

$users_data = mysqli_query($conn, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html>
<head>

<title>Horribly Unsecure PHP Website</title>
<style>
.topnav {
 overflow: hidden;
 background-color: #333;
}

.topnav a {
 float: left;
 color: #f2f2f2;
 text-align: center;
 padding: 14px 16px;
 text-decoration: none;
 font-size: 17px;
}

.topnav a:hover {
 background-color: #ddd;
 color: black;
}

.topnav a.active {
 background-color: #4CAF50;
 color: white;
}

/*
end of W3 Schools Styling
*/

h1 {
 text-align: center;
}

table {
 width: 50%;
 margin-left: 25%;
 margin-right: 25%;
}
</style>
</head>
<body>
  <div class="topnav">
    <a href="logout.php">Logout</a>
  </div>
  <table>
    <thead>
      <tr>
        <th>Email</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($user_data = mysqli_fetch_assoc($users_data))
        {
          $email = $user_data["email"];
          $password = $user_data["password"];
      ?>
        <tr>
          <th><?php echo $email ?></th>
          <th><?php echo $password ?></th>
        </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</body>
</html>
