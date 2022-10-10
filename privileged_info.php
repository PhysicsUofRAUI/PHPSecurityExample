<?php
session_start();

if (!isset($_SESSION['name']))
{
  die("ACCESS DENIED");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Somewhat Secure PHP Website</title>
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
  <h1>You can only see this if you have user credentials</h1>

</body>
</html>
