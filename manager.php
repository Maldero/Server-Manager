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
		<div id="linuxLogo">
			<img src="img/linuxLogo.svg" alt="LinuxLogo" height="256" width="256">
		</div>
		<div id="resourceMonitor">
			<?php include "resourceMonitor.php"; ?>
		</div>
		<div id="virtualDesktopButton">
			<form method="POST" action="manager.php">
				<input type="submit" name="openVirtualDesktop" value="Virtual Desktop"/>
			</form>
		</div>
		<?php if(isset($_POST['openVirtualDesktop'])) { setcookie("virtualDesktop", "open", time() + (86400 * 1), "/"); include "virtualDesktop.php"; header("Location: manager.php"); } if(isset($_COOKIE['virtualDesktop'])) { if($_COOKIE['virtualDesktop'] == "open") include "virtualDesktop.php"; } ?>
	</body>
<script src="js/manager.js"></script>
</html>
