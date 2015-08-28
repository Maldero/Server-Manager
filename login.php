<?php
require "mysqlConfig.php";
include "functions.php";
session_start();

if(isset($_SESSION['logged'])) {
  header("Location: manager.php");
}
else {
  if(empty($_POST['user']) or empty($_POST['password'])) {
    exit("Wrong user or password.".header("refresh: 2; index.php"));
  }
  if(checkUserInPasswd($_POST['user']) == false)
    exit("Wrong user or password.".header("refresh: 2; index.php"));
}
?>
