<?php
//acquire shared files for database connection
include 'core/init.php';
include 'includes/head.php';
include 'includes/header_and_nav.php';

$conn = dbconnect();

if(isset($_POST['sponsor_submit'])) {	
	$sponsor_fname 		= $_POST['sponsor_fname'];
	$sponsor_lname 		= $_POST['sponsor_lname'];
	$sponsor_business 	= $_POST['sponsor_business'];
	$sponsor_address 	= $_POST['sponsor_address'];
	$sponsor_city 		= $_POST['sponsor_city'];
	$sponsor_state 		= $_POST['sponsor_state'];
	$sponsor_zip 		= $_POST['sponsor_zip'];
	$sponsor_phone 		= $_POST['sponsor_phone'];
	$sponsor_email		= $_POST['sponsor_email'];
	$sponsor_duration 	= $_POST['sponsorDuration'];
	
	$missing = array();
	
	if(empty($missing)) {
		$stmt = $conn->stmt_init();
		
		$sql = "INSERT INTO Sponsor (sponsor_fname, sponsor_lname, sponsor_business, sponsor_address, sponsor_city, sponsor_state, sponsor_zip, sponsor_phone, sponsor_email, sponsorDuration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		$stmt->prepare($sql);
		$stmt->bind_param('ssssssssss', $sponsor_fname, $sponsor_lname, $sponsor_business, $sponsor_address, $sponsor_city, $sponsor_state, $sponsor_zip, $sponsor_phone, $sponsor_email, $sponsor_duration);
		
		if ($stmt->execute()) {
			$output = "Thank you for sponsoring us."; 
			$output1 = "We are truly blessed to have you onboard with us. Below is a record of your submission:<br><br>";
			
			foreach ($_POST as $key => $value) {
				$output1 .= "<b>$key</b>: $value<br>";
			}
			
			$output1 .= "Back to the <a href='index.php'>Home Page.</a>";
			
		} else {
			$output = "<p>Database query failed.  Please contact the webmaster.";
		}
	
	} else {
		$output = "<p>The following required fields are missing in your form submission.  Please check your form again and fill them out.  <br>Thank you. Back to the <a href='sponsor.php'>Sponsor Page.</a><br>\n<ul>";
		
		foreach($missing as $m){
			$output .= "<li>$m";
		}
		
		$output .= "</ul>";
	}
	
} else {
	$output = "Please work from the <a href='sponsor.php'>Sponsor Page.</a>";	
}



?>
<h2 class="page_title">
<?php echo $output; ?>
</h2>
<p class="add_info">
<?php echo $output1;?>
</p>

<?php
include 'includes/footer.php';
?>