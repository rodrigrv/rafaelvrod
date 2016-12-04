<?php
include 'core/init.php';


//var_dump($_POST);

if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'Enter both username and password please. Click <a href="login.php">here</a> to go back and correct them.';
	} else if (user_exists($username) === false) {
		$errors[] = 'Can\'t find username. Please register first. Click <a href="login.php">here</a> to go back and correct them.';
		//checks for active users
	//} else if (user_active($username) === false) {
		//$errors[] = 'You haven\'t activated your account yet.';
	} else {
		
		/*if (strlen($username) > 50) {
			$errors[] = 'Username is too long.';
		}*/
		
		$login = login($username, $password);
		if ($login === false) {
			$errors[] = 'The username/password combination is incorrect. Click <a href="login.php">here</a> to go back and correct them.';
		} else {
			//set user session
			$_SESSION['user_id'] = $login;
			//redirect user to home
			header('Location: appointment.php');
			exit();
		}
	}
	
	//gives visual representation of errors array.
	//print_r($errors);
	
	
	//checks to make sure user information is sent.
	//echo $username, ' ' , $password;
} else {
	$errors[] = 'No data received.';	
}

 //else {
	//prints an error in case user information was not found.
	//echo 'Did not find information';
//}

include "includes/headnav.php";

if (empty($errors) === false) {
?>
	<h3>In order to log in successfully, you need to correct the following errors.</h3> 
<?php	
}
echo output_errors($errors);

include 'includes/footer.php';
?>