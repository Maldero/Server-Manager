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
      <div id="projectName">
			  <h2>Server Manager</h2>
		  </div>
			<form method="POST" action="login.php">
				<div class="usernameText">Username <input class="username" type="text" size="10" name="user"/></div>
				<div class="passwordText">Password <input class="password" type="password" size="10" name="password"/></br></div>
				<div><input class="submitLogin" type="submit" value="Log in"/></div>
			</form>
    </body>
  </html>';
}
?>
