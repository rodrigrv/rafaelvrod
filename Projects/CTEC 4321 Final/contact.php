<?php
include "includes/headcontact.php";
?>

	<!-- Nav -->
	<nav id="nav">
		<ul class="login-icon">
    		<li><a href="login.php"><img src="images/login_user.png" width="30%" height="30%">  Login</a></li>
        	<div id="clear"></div>
		</ul>
		<ul class="main-nav">
			<li><a href="home.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="services.php">Services</a></li>
			<li class="current"><a href="contact.php">Contact</a></li>
			<li><a href="appointment.php">Appointments</a></li>
		</ul>
	</nav>
	</div>	
    
    <!-- Main -->
	<section class="wrapper style1">
		<div class="container">
			<div id="content">

	<!-- Content -->
	<article>
			<h2>Contact Us</h2>

			<p>Should you ever feel the need to ask us anything regarding the health and
            safety of your pet, don't hesitate to fill our the form below. Please give us
            24 hours to respond. Also, below you will find our location. If you are nearby,
			be sure to stop by and let us know what we can do to help you.
            </p>

	</article>
    <div class="contactmapfloat">
    	<div class="contactmap">
    		<h3>Find Us Here</h3>
            <div id="googleMap">
            </div>
    	</div>
    	<div class="contactform">
    		<h3>Get In Touch</h3>
			<form action="" method="post">
			<div class="row 50%">
				<div class="6u 12u(mobilep)">
					<input type="text" name="name" id="name" placeholder="Name" />
				</div>
				<div class="6u 12u(mobilep)">
					<input type="email" name="email" id="email" placeholder="Email" />
				</div>
			</div>
			<div class="row 50%">
				<div class="12u">
					<textarea name="message" id="message" placeholder="Message" rows="5"></textarea>
				</div>
			</div>
			<div class="row 50%">
				<div class="12u">
					<ul class="actions">
						<li><input type="submit" class="button alt" value="Send Message" /></li>
					</ul>
				</div>
			</div>
		</form>
      	</div>
      </div>
      <div id="clear"></div>
			</div>
		</div>
	</section>

<?php
include "includes/footer.php";
?>