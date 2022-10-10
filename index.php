<?php

  session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <title>Horribly Unsecure PHP Website</title>
 <style>

/*
This styling was found at W3Schools and can be found here https://www.w3schools.com/howto/howto_js_topnav.asp
*/
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

body {
  background-image: url("photoOfMyBackyardRinkWithoutTrees.png");
}
</style>
 </head>
 <body>
     <?php
     if(isset($_SESSION['username']))
     {
       echo('<p>You have <b>logged in!!!!</b></p>');
     }
     else {
       echo('<div class="topnav">');
       echo('<a href="login.php">Login</a>');
       echo('<a href="admin_login.php">Admin Login</a>');
       echo('</div>');
     }
     ?>
 </body>
 </html>
