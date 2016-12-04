<?php
include 'core/init.php';
include 'functions/functions.php';
include 'includes/headnav.php';
//var_dump($_POST);

if (empty($_POST) === false ){
	$required = array ('username', 'password', 'confirm_pass', 'email');
	//checks to see the array
	//echo print_r($_POST, true);

	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required) === true) {
			$errors[] = 'Fields marked with an asterisk are required. Please go <a href ="login.php">back</a> and enter required data.';
			break 1;
		}
	}
	
	if(empty($errors) === true) {
		
		//makes sure there are no spaces in the username.
		if (preg_match("/\\s/", $_POST['username']) == true) {
			$errors[] = 'Your username cannot contain any spaces. Please go <a href ="login.php">back</a> and enter required data.';
		}
		
		//makes sure the password is a certain length.
		if (strlen($_POST['password']) < 4) {
			$errors[] = 'Your password must be at least 4 characters. Please go <a href ="login.php">back</a> and enter required data.';
		}
		
		//checks to see if passwords match.
		if ($_POST['password'] !== $_POST['confirm_pass']) {
			$errors[] = 'Your passwords do not match. Please go <a href ="login.php">back</a> and enter required data.';
		}
		
		//checks to see if email is valid.
		/*
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'A valid email address is required.';
		}*/
	
	if (user_exists($_POST['username']) === true) {
		 	$errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken. Please go <a href ="login.php">back</a> and enter required data.';	
		}
		
		//makes sure email has not been used.
		if (email_exists($_POST['email']) === true) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use. Please go <a href ="login.php">back</a> and enter required data.';
		}
	}
}

	//gives visual representation of errors array.
	//print_r($errors);
	
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'You are now successfully registered. You may now login with your username and password. Click here to go back to the <a href="login.php">login/register</a> page.';	

} else {
	if (empty($_POST) === false && empty($errors) === true) {
		//register user
		$register_data = array (  //use associative array
			'username' 	=> $_POST['username'],
			'password'	=> $_POST['password'],
			'email' 	=> $_POST['email'],
		);
		
		//echo "test<br>";

		register_user($register_data);
		
		//redirect
		header('Location: newuser1.php?success');
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

