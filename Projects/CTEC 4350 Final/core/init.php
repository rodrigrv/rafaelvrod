<?php
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'database/dbconn.inc.php';
require 'functions/functions.php';

if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'email', 'fname', 'lname', 'password', 'admin');
	
	//checks to see if user is an admin.
	/*
	if ($user_data['admin'] == 1) {
		header('Location: admin.php');
		exit();
	} else {
		header('Location: new_user.php');
		exit();
	}*/
}

$errors = array();
?>