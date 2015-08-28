<?php
header('Content-Type: text/html; charset=utf-8');

function mysqlConnection() {
  @mysql_connect("127.0.0.1", "mngmtUser", "mngmtPassword") or die("Error while connecting to the server.");
  @mysql_select_db("mngmnt_db") or die("Error while selecting database.");
}

mysqlConnection();
?>
