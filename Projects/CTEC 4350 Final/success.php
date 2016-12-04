<?php
include 'core/init.php';
include 'includes/head.php';
include 'includes/header_and_nav.php';


//var_dump($_POST);

if (empty($_POST) === false) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (empty($email) === true || empty($password) === true) {
		$errors[] = 'Enter both email and password please. Click <a href="login.php">here</a> to go back and correct them.';
	} else if (user_exists($email) === false) {
		$errors[] = 'Can\'t find your email. Please <a href="register.php">register first.</a> or enter your correct email and password on the <a href="login.php">login page</a>.';
		//checks for active users
	//} else if (user_active($username) === false) {
		//$errors[] = 'You haven\'t activated your account yet.';
	} else {
		
		/*if (strlen($username) > 50) {
			$errors[] = 'Username is too long.';
		}*/
		
		$login = login($email, $password);
		if ($login === false) {
			$errors[] = 'The email/password combination is incorrect. Click <a href="login.php">here</a> to go back and correct them.';
		} else {
			//set user session
			$_SESSION['user_id'] = $login;
			$user_data = user_data($_SESSION['user_id'], 'user_id', 'email', 'fname', 'lname', 'password', 'admin');
			// store basic user info in session variables
			$_SESSION['fname'] = $user_data['fname'];
			$_SESSION['lname'] = $user_data['lname'];
			$_SESSION['email'] = $user_data['email'];
			
			
			echo "admin: {$user_data['admin']}<br>";
			//redirect user to home
			if($user_data['admin'] == 1) {
				$_SESSION['admin'] = 1;
				header('location: admin.php');
				exit();
			} else {
				header('location: new_user.php');
				exit();	
			}
			
		}
	}
	
	//gives visual representation of errors array.
	//print_r($errors);
	
	
	//checks to make sure user information is sent.
	//echo $email, ' ' , $password;
} else {
	$errors[] = 'No data received.';	
}

 //else {
	//prints an error in case user information was not found.
	//echo 'Did not find information';
//}

if (empty($errors) === false) {
?>
	<h3>In order to log in successfully, you need to correct the following errors.</h3> 
<?php	
}
echo output_errors($errors);

include 'includes/footer.php';
?>