<?php
header('Content-Type: text/html; charset=utf-8');
function mysqlConnection() {
	@mysql_connect("127.0.0.1", "root", "K@pelus123a") or die("Error while connecting to the server.");
	@mysql_select_db("srwmgmnt") or die("Error while selecting database.");
}
mysqlConnection();
?>
