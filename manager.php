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
          <?php if(isset($_COOKIE['shutdown'])) { shutdownButton(); unset($_COOKIE['shutdown']); setcookie('shutdown', '', time() - 1, '/'); header("Location: manager.php"); } ?>
          <input type="image" onclick="requestShutdown()" name="shutdown" style="width:64px;" src="/img/shutdown.png"/><span>Shutdown</span>
        </div>
        <div id="rebootButton">
          <?php if(isset($_COOKIE['reboot'])) { rebootButton(); unset($_COOKIE['reboot']); setcookie('reboot', '', time() - 1, '/'); header("Location: manager.php"); } ?>
          <input type="image" onclick="requestReboot()" name="reboot" style="width:64px;" src="/img/reboot.png"/><span>Reboot</span>
        </div>
      </form>
      <div id="commandLine">
        <form method="POST" action="manager.php">
      	  <?php if(isset($_POST['command'])) { header("Location: manager.php"); commandExec($_POST['command']); } ?>
      	  <div class="commandLine">Enter your command: <input type="text" name="command" size="15" placeholder="Command"></div>
        </form>
      </div>
    	<div id="ping">
        <form method="POST" action="manager.php">
	  <?php if(isset($_COOKIE['ping'])) { pingSend($_COOKIE['ping']); unset($_COOKIE['ping']); setcookie('ping', '', time() - 1, '/'); } ?>
	  <input type="text" id="requestPing" size="10" placeholder="Address">
	  <input type="submit" onClick="requestPingSend()" value="PING"/>
        </form>
      </div>
    <?php } ?>
    </div>
    <div id="resourceMonitor">
	<?php include "resourceMonitor.php"; ?>
    </div>
    </body>
<script src="js/manager.js"></script>
</html>
