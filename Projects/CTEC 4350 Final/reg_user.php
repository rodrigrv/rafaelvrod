<?php
include 'core/init.php';
include 'includes/head.php';
include 'includes/header_and_nav.php';
//var_dump($_POST);

$errors = array();

if (empty($_POST) === false ){
	$required = array ('email', 'fname', 'lname', 'password', 'confirm_pass');
	//checks to see the array
	//echo print_r($_POST, true);

	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required) === true) {
			$errors[] = 'Fields marked with an asterisk are required. Please go <a href ="register.php">back</a> and enter required data.';
			break 1;
		}
	}
	
	if(empty($errors) === true) {
		
		//makes sure there are no spaces in the username.
		if (preg_match("/\\s/", $_POST['fname']) == true) {
			$errors[] = 'Your first name cannot contain any spaces. Please go <a href ="register.php">back</a> and enter the first name correctly.';
		}
		
				//makes sure there are no spaces in the username.
		if (preg_match("/\\s/", $_POST['lname']) == true) {
			$errors[] = 'Your last name cannot contain any spaces. Please go <a href ="register.php">back</a> and enter the last name correctly.';
		}
		
		//makes sure the password is a certain length.
		if (strlen($_POST['password']) < 4) {
			$errors[] = 'Your password must be at least 4 characters. Please go <a href ="register.php">back</a> and enter more than 4 characters.';
		}
		
		//checks to see if passwords match.
		if ($_POST['password'] !== $_POST['confirm_pass']) {
			$errors[] = 'Your passwords do not match. Please go <a href ="register.php">back</a> and make sure they match.';
		}
		
		if (user_exists($_POST['email']) === true) {
		 	$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already taken. Please go <a href ="register.php">back</a> and enter required data.';	
		}
		
		//makes sure email has not been used.
		if (email_exists($_POST['email']) === true) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use. Please go <a href ="register.php">back</a> and enter required data.';
		}
	}
}

	//gives visual representation of errors array.
	//echo "<p>Errors: ";
	//print_r($errors);
	
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'You are now successfully registered. You may now login with your email and password. <a href="login.php">Click here to go to the login page.</a>';	

} else {
	if (empty($_POST) === false && empty($errors) === true) {
		//register user
		$register_data = array (  //use associative array
			'email' 	=> $_POST['email'],
			'fname'		=> $_POST['fname'],
			'lname'		=> $_POST['lname'],
			'password'	=> $_POST['password'],
		);
		
		//echo "test<br>";

		register_user($register_data);
		
		//redirect
		header('Location: login.php');
		exit();
		
	} else if (empty($errors) === false) {
			//output errors
			echo output_errors($errors);
	}
?>

<?php
}
include 'includes/footer.php';
?>

