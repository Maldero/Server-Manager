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
    <?php if($_SESSION['logged'] == "Administrator") { ?>
	  <div id="buttonsMain">
		  <form method="POST" action="manager.php">
		    <div id="shutdownButton">
			    <?php if(isset($_POST['shutdown'])) { header("Location: manager.php"); shutdownButton(); } ?>
			    <input type="image" name="shutdown" style="width:96px;" src="/img/shutdown.png"/><span>Shutdown</span>
		    </div>
		    <div id="rebootButton">
			    <?php if(isset($_POST['reboot'])) { header("Location: manager.php"); rebootButton(); } ?>
			    <input type="image" name="reboot" style="width:96px;" src="/img/reboot.png"/><span>Reboot</span>
		    </div>
		  </form>
	  <?php } ?>
	  </div>
    </body>
</html>
