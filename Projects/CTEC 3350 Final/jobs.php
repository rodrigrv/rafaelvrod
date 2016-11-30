
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="javajam.css" rel="stylesheet">
    <title>JavaJam Coffee House</title>
    </head>

  <body>

    <div class="container">
    
    <!-- Navigation -->
    
      <div class="header">
      	<div class="logo"><a href="http://www.facebook.com" target="new"><img src="facebook.png" width="30px" height="30px"></a>  <a href="http://www.twitter.com" target="new"><img src="twitter.png" width="30px" height="30px"></a></div>
        <h3 class="title"><a href="index.html"><img src="coffeelogo.png" width="75" height="50"></a> JavaJam</h3>
        <nav>
          <ul class="nav nav-pills">
            <li role="presentation"><a href="index.html">Home</a></li>
            <li role="presentation"><a href="menu.html">Menu</a></li>
            <li role="presentation"><a href="music.html">Music</a></li>
            <li role="presentation"><a href="jobs.php">Jobs</a></li>
          </ul>
        </nav>
        
      </div>

	<!-- Jumbotron -->

      <div class="jumbotron">
      <div class="form">
        <h1>Now Hiring</h1>
        <p>Looking to help out and be a coffee guru? No problem, just apply below!</p><br/><br/>
        <form action="form.php" method="post">
        <label for="name">Your Name:</label>
      	<input type="name" name="First and Last Name" placeholder="First & Last Name"><br/><br/>
        <label for="email">Your Email:</label>
		<input type="email" name="email-address" placeholder="Name@domain.com"><br/><br/>
        <label for="experience">Your Experience:</label>
		<textarea id="experience" name="experience" rows="2" cols="20" placeholder="Put what you've done and why you think we should consider you."></textarea><br/><br/>
        <input type="submit" value="Submit">
	  </form>
      	</div>
        </div>
	<!-- Content -->

      <div id="content">
      
</div>

	<!-- Footer -->

      <footer class="footer">
      <div class="logo"><a href="http://www.facebook.com" target="new"><img src="facebook.png" width="30px" height="30px"></a>  <a href="http://www.twitter.com" target="new"><img src="twitter.png" width="30px" height="30px"></a></div>
        <p id="footer">&copy; JavaJam 2014<br/><br/></p>
      </footer>

    </div> <!-- /container -->
  </body>
</html>