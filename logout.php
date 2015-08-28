<?php
session_start();
if(!isset($_SESSION['logged']))
  exit(header("Location: index.php"));
else {
  session_destroy();
  exit("You have been logged out.".header("refresh: 2; index.php"));
}
?>
