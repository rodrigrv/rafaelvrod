	<!-- Nav -->
    <?php 
	 $currentPage = basename($_SERVER['SCRIPT_NAME']);
	?>
    
	<nav id="nav">
		<ul class="login-icon">
    		<li><?php if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
						echo "<a href='login.php'><img src='images/login_user.png' width='30%' height='30%'/>Login</a>";	
						} else {
							echo "<a href='logout.php'><img src='images/logout_user.png' width='30%' height='30%'/>Logout</a>";	
						}
			?></li>
        	<div id="clear"></div>
		</ul>
		<ul class="main-nav">
			<li <?php if ($currentPage == 'home.php') { echo 'class="current"';}?>><a href="home.php">Home</a></li>
			<li <?php if ($currentPage == 'about.php') { echo 'class="current"';}?>><a href="about.php">About</a></li>
			<li <?php if ($currentPage == 'services.php') { echo 'class="current"';}?>><a href="services.php">Services</a></li>
			<li <?php if ($currentPage == 'contact.php') { echo 'class="current"';}?>><a href="contact.php">Contact</a></li>
			<li <?php if ($currentPage == 'appointment.php') { echo 'class="current"';}?>><a href="appointment.php">Appointments</a></li>
		</ul>
	</nav>
	</div>