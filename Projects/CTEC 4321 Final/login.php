<?php 
include 'core/init.php'; 
include "includes/headnav.php";
?>

<!-- Main -->
<body>
<section class="wrapper style1">
	<div class="container">
		<div class="login_prompt">
			<h2>
			<?php 
			if (isset($_GET['appointment']) && empty($_GET['appointment'])) {
					echo 'To make an appointment, please log in or register first.';	
			}
			?>
            </h2>
        </div>
		

<!-- Content -->

	<div id="sidebar1">
		<h3>New User?</h3>
			<p>No problem. Register below to create a free account. Cannot re-register with same username or email.
            All fields below are required.
            </p>
			<footer>
				<form action="newuser1.php" method="post" autocomplete="off">
					<strong>Create Username:</strong><br>
    				<input type="text" name="username" autocomplete="off">Must not contain any spaces<br>
    				<strong>Create Password:</strong><br>
    				<input type="password" name="password">Must contain at least 4 characters<br>
    				<strong>Re-enter Password:</strong><br>
    				<input type="password" name="confirm_pass">Must match previous password<br>
    				<strong>Email:</strong><br>
    				<input type="email" name="email" placeholder="John@gmail.com">Must have valid email address<br><br>
    				<input type="submit" value="Register">
				</form>
			</footer>
        </div>
        <div id="sidebar2">
        <?php
		if (logged_in() === true) {
			echo 'Logged in. Click to <a href="logout.php">logout</a>.';
		} else {
		?>
		<h3>Already a member?</h3>
			<p>Enter your username and password below. Be sure to enter both your correct username and password.
            Be sure you are already registered.
            </p>
			<footer>
				<form action="success.php" method="post">
				<strong>Username:</strong><br>
				<input type="text" name="username"><br>
   				<strong>Password:</strong><br>
    			<input type="password" name="password"><br>
   				<input type="submit" value="Login"> 
                </form>
			</footer>
         </div>
         <div id="clear"></div>
		</div>
</section>
</body>
    	
    <?php }
    ?>
<?php include 'includes/footer.php'; ?>
