<?php
require "mysqlConfig.php";
session_start();
if(!isset($_SESSION['logged']))
  exit(header("Location: index.php"));
?>
<html>
</html>
