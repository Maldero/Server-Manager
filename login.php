<?php
require "mysqlConfig.php";
include "functions.php";
session_start();

if(isset($_SESSION['logged'])) {
  header("Location: manager.php);
}
else {
$user = $_POST['user'];
$password = $_POST['password'];
  if(empty($user) or empty($password)) {
    exit("Wrong user or password.".header("refresh: 2; index.php"));
  }
}
?>
