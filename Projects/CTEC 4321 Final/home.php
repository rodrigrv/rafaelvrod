<?php
include "includes/head.php";

?>

	<!-- Nav -->
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
			<li class="current"><a href="home.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="services.php">Services</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="appointment.php">Appointments</a></li>
		</ul>
	</nav>
	</div>

	<!-- Banner -->
	<section id="banner">
		<header>
			<h2><em>Are you a new user and want to join our family?</em></h2>
			<a href="login.php" class="button">Register Here</a>
		</header>
	</section>

	<!-- Gigantic Heading -->
	<section class="wrapper style2">
		<div class="container">
			<header class="major">
				<h2>Welcome to Old West Animal Hospital</h2>
					<p>Taking care of your pet every step of the way</p>
			</header>
		</div>
	</section>

	<!-- Posts -->
	<section class="wrapper style1">
		<div class="container">
			<div class="row">
				<section class="6u 12u(narrower)">
					<div class="box post">
						<a class="image left"><img src="images/dog2.jpg" alt="" /></a>
							<div class="inner">
								<h3>What We're About</h3>
									<p>We are a single veterinarian clinic dedicated to the healthcare of small animals. We are interested not only in the health of our client's pets, but also in our client's happiness.
                                    </p>
							</div>
					</div>
				</section>
                    
				<section class="6u 12u(narrower)">
					<div class="box post">
						<a class="image left"><img src="images/catdog1.jpg" alt="" /></a>
							<div class="inner">
								<h3>Our Services</h3>
									<p>We provide basic services that other animal clinics do. We also provide more advanced services as well upon request. View our <a href="services.php">services</a> page to get a better idea.
                                    </p>
							</div>
					</div>
				</section>
			</div>
                
			<div class="row">
				<section class="6u 12u(narrower)">
					<div class="box post">
						<a class="image left"><img src="images/catdog2.jpg" alt="" /></a>
							<div class="inner">
								<h3>Products</h3>
									<p>We have an array of products to make sure your animal is taken care of. Check our <a href="services.php">services</a> page to get a better look.
                                    </p>
							</div>
					</div>
				</section>
                    
				<section class="6u 12u(narrower)">
					<div class="box post">
						<a class="image left"><img src="images/cat3.jpg" alt="" /></a>
							<div class="inner">
								<h3>Payment Methods</h3>
									<p>At the moment, we accept cash, check, and debit/credit (including Visa, Mastercard, Discover, American Express).
                                    </p>
							</div>
					</div>
				</section>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<section id="cta" class="wrapper style3">
		<div class="container">
			<header>
				<h2>Are you ready to see what Old West Animal Clinic is about?</h2>
					<a href="about.php" class="button">Show Me</a>
			</header>
		</div>
	</section>

<?php
include "includes/footer.php";
?>