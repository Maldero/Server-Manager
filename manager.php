<?php
require "mysqlConfig.php";
include "functions.php";
session_start();
if(!isset($_SESSION['logged']))
  exit(header("Location: index.php"));
?>
<html>
    <head>
      <title>Server Manager</title>
      <link href="css/manager.css" rel="stylesheet" type="text/css">
    </head>
    <body>
      <div id="logged">
        <?php echo "You're logged as <font color=\"blue\">".ucfirst(checkUserPosition($_SESSION['logged']))."</font>"; ?>
      </div>
      <div id="logout">
        <a href="logout.php">
          <input type="button" value="Logout"/>
        </a>
      </div>
      <div id="infoUname">
        <li>You're working on: <font color="blue"><?php echo php_uname(); ?></font></li>
      </div>
      <form method="POST" action="manager.php">
        <div id="shutdown">
          <?php if(isset($_POST['shutdown'])) shutdownButton(); ?>
          <input type="submit" value="Shutdown server" name="shutdown"/>
        </div>
      </form>
    </body>
</html>
