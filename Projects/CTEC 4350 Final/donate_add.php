<?php
//acquire shared files for database connection
include 'core/init.php';
include 'includes/head.php';
include 'includes/header_and_nav.php';

$conn = dbconnect();

if(isset($_POST['donate_submit'])) {
	
	$donate_user_id		= $_POST['user_id'];
	$donate_fname 		= $_POST['donate_fname'];
	$donate_lname 		= $_POST['donate_lname'];
	$donate_address 	= $_POST['donate_address'];
	$donate_city 		= $_POST['donate_city'];
	$donate_state 		= $_POST['donate_state'];
	$donate_zip 		= $_POST['donate_zip'];
	$donate_type 		= $_POST['donate_type'];
	$donate_amount 		= $_POST['donate_amount'];
	$donate_duration	= $_POST['donate_duration'];
	$donate_method 		= $_POST['donate_recur'];
	$donate_card 		= $_POST['donate_card'];
	$donate_exp_month 	= $_POST['donate_exp_month'];
	$donate_exp_year 	= $_POST['donate_exp_year'];
	
	$missing = array();
	
	//print_r($_POST);
	
	if (empty($missing)) {
		$stmt = $conn->stmt_init();
		
		$sql = "INSERT INTO Donate (user_donate_id, donate_fname, donate_lname, donate_address, donate_city, donate_state, donate_zip, donate_type, donate_amount, donate_duration, donate_method, donate_card, donate_exp_month, donate_exp_year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		//echo "INSERT INTO Donate (donate_fname, donate_lname, donate_address, donate_city, donate_state, donate_zip, donate_type, donate_amount, donate_duration, donate_method, donate_card, donate_exp_month, donate_exp_year) VALUES ('$donate_fname', '$donate_lname', '$donate_address', '$donate_city', '$donate_state', '$donate_zip', '$donate_type', '$donate_amount', '$donate_duration', '$donate_method', '$donate_card', '$donate_exp_month', '$donate_exp_year')";
		
		$stmt->prepare($sql);
		$stmt->bind_param('ssssssssssssss', $donate_user_id, $donate_fname, $donate_lname, $donate_address, $donate_city, $donate_state, $donate_zip, $donate_type, $donate_amount, $donate_duration, $donate_method, $donate_card, $donate_exp_month, $donate_exp_year);
		/*
		if ($stmt->prepare($sql)){
			echo "stmt->prepare(sql) works<br>";
			
			}
		if ($stmt->bind_param('sssssssssssss', $donate_fname, $donate_lname, $donate_address, $donate_city, $donate_state, $donate_zip, $donate_type, $donate_amount, $donate_duration, $donate_method, $donate_card, $donate_exp_month, $donate_exp_year)){
			echo ("stem-bind para works<br>");
			}
	   */
		
		if ($stmt->execute()) {
		$output = "Thank you for your donation.";
		$output1 = "We sincerely appreciate your kindness. Below is a record of your transaction:<br><br>";
			foreach ($_POST as $key => $value) {
				$output1 .= "<b>$key</b>: $value<br>";
			}
			
			$output1 .= "Back to the <a href='index.php'>Home Page.</a>";
			
		} else {
			$output = "<p>Database query failed.  Please contact the webmaster.";
		}
		
	} else {
		$output = "<p>The following required fields are missing in your form submission.  Please check your form again and fill them out.  <br>Thank you. Back to the <a href='donate.php'>Donation Page.</a><br>\n<ul>";
		
		foreach($missing as $m){
			$output .= "<li>$m";
		}
		
		$output .= "</ul>";
	}
	
} else {
	$output = "Please work from the <a href='donate.php'>Donation Page.</a>'";
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