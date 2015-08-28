<?php
session_start();
if(!isset($_SESSION['logged']))
  exit(header("Location: index.php"));
else
  exit(session_destroy()."You have been logged out.".header("refresh: 2; index.php"));
?>
