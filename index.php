<?php
require "mysqlConfig.php";
session_start();

if(isset($_SESSION['logged'])) {
  header("Location: manager.php");
}
else {
  echo '
  <html>
    <head>
      <title>Login</title>
      <link href="css/index.css" rel="stylesheet" type="text/css">
    </head>
    <body>
      <form method="POST" action="login.php">
        <div>User: <input type="text" size="10" name="user"/></div>
        <div>Password: <input type="password" size="10" name="password"/></br></div>
        <input type="submit" value="Log in"/>
      </form>
    </body>
  </html>';
}
?>
