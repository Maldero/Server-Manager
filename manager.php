<?php
require "mysqlConfig.php";
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
        <?php echo "You're logged as <font color=\"blue\">".ucfirst($_SESSION['logged'])."</font>";?>
      </div>
      <div id="logout">
        <a href="logout.php">
          <input type="button" value="Logout"/>
        </a>
      </div>
      <div id="infoUname">
        <li>You're working on: <?php echo php_uname();?></li>
      </div>
    </body>
</html>