<?php
function dbConnect(){
	$host = "localhost"; // for the omega server, "localhost" is the host name.  Do not edit.
	$user = "rvr9109"; // edit it with your own user name.
	$pwd = "Linux123"; // edit it with your own database password
	$database = "rvr9109"; // edit with your database name, which is your user name in the omega server
 
	// initiate a new mysqli object to connect to the Database.  Store the mysqli object in a variable $conn.
	$conn = new mysqli($host, $user, $pwd, $database) or die("could not connect to server");

	// return $conn to the function call
	return $conn;}
?>