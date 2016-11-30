<?php

//function to sanitize data in array
function array_sanitize(&$item){
	$item = mysql_real_escape_string($item);
}

//function to register the user and sanitize data
function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = ($register_data['password']); //hash password using md5 for security
	
	$fields	= '`' . implode('`, `', array_keys($register_data)) . '`';
	$data	= '\'' . implode ('\', \'', $register_data) . '\'';
	//echo "INSERT INTO Customer ($fields) VALUES ($data)<br>";
	mysql_query("INSERT INTO User ($fields) VALUES ($data)");
}


//counts the number of registered users
function user_count() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `User`"), 0);
}

function reg_count() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `User`"), 0);	
}

function vol_count() {
	return mysql_result(mysql_query("SELECT COUNT(`vol_id`) FROM `Volunteer`"), 0);
}

function donate_count() {
	return mysql_result(mysql_query("SELECT COUNT(`donate_id`) FROM `Donate`"), 0);
}

function sponsor_count() {
	return mysql_result(mysql_query("SELECT COUNT(`sponsor_id`) FROM `Sponsor`"), 0);
}

function con_count() {
	return mysql_result(mysql_query("SELECT COUNT(`con_id`) FROM `Contact`"), 0);
}

function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `User` WHERE `user_id` = $user_id"));
		
		//use 'or die(mysql_error())' and the code below to debug your query if you have a malformed query. Mine was in the init.php file. Had 'pass' instead of 'password' in the user_data variable.
		//while ($data_row = mysql_fetch_assoc($data)) {
			//echo $data_row('email'), '<br>';	
		//}
		return $data;
	}
}

//sets the session for the current user
function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;	
}

//general function for errors
function output_errors($errors) {
	return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}


//function to check if username is taken
function user_exists($email) {
	$email = sanitize($email);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `User` WHERE `email` = '$email'");
	return (mysql_result($query, 0) == 1) ? true : false;	
}

//function to check if email is in use
function email_exists($email) {
	$email = sanitize($email);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `User` WHERE `email` = '$email'"), 0) == 1) ? true : false;	
}

function sanitize($data) {
return mysql_real_escape_string($data);	
}

//checks to see if user is active if you want to activate by email feature
/*function user_active($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `Customer` WHERE `username` = '$username' AND `active` = 1");
	return (mysql_result($query, 0) == 1) ? true : false;	
}*/

function user_id_from_username($email) {
	$email = sanitize($email);
	return mysql_result(mysql_query("SELECT `user_id` FROM `User` WHERE `email` = '$email'"), 0, 'user_id');
}

function login($email, $password) {
	$user_id = user_id_from_username($email);
	$email = sanitize($email);
	$password = /*use MD5 if you want to hash password*/($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `User` WHERE `email` = '$email' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}
?>