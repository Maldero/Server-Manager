<?php
require "mysqlConfig.php";
include "functions.php";
session_start();

if(isset($_SESSION['logged'])) {
	header("Location: manager.php");
}
else {
	echo '<link href="css/login.css" rel="stylesheet" type="text/css">';
	if(empty($_POST['user']) or empty($_POST['password'])) {
		exit("<div class=\"Error\">Wrong user or password.".header("refresh: 2; index.php"));
	}
	if(checkUserInPasswd($_POST['user']) == false)
		exit("Wrong user or password.".header("refresh: 2; index.php"));
	else {
		if(checkUserInDatabase($_POST['user'], $_POST['password']) !== false) {
			$_SESSION['logged'] = $_POST['user'];
			header("Location: manager.php");
		}
	else
		exit("Wrong user or password.".header("refresh: 2; index.php"));
    }
}
?>
