<?php 
//acquire shared files for database connection
include 'core/init.php';
include 'includes/head.php';
include 'includes/header_and_nav.php';

$conn = dbconnect();

if (isset($_POST['volSubmit'])) {
	
	$user_vol_id = $_POST['user_id'];
	$vol_fname = $_POST['vol_fname'];
	$vol_lname = $_POST['vol_lname'];
	$vol_phone = $_POST['vol_phone'];
	$vol_email = $_POST['vol_email'];
	$all_day_value = implode(", ", $_POST['day']);
	$all_event_value = implode(", ", $_POST['event']);
	
	$missing = array();
	
	if (empty($missing)) {
		$stmt = $conn->stmt_init();
		
		$sql = "INSERT INTO Volunteer (user_vol_id, vol_fname, vol_lname, vol_phone, vol_email, day, event) VALUES (?, ?, ?, ?, ?, ?, ?)";
		//test to see if the what the sql query shows with the values inputted.
		//echo "INSERT INTO Volunteer (user_vol_id, vol_fname, vol_lname, vol_phone, vol_email, day, event) VALUES ('$user_vol_id',' $vol_fname', '$vol_lname', '$vol_phone', '$vol_email', '$all_day_value', '$all_event_value')";
		
		$stmt->prepare($sql);
		$stmt->bind_param('sssssss', $user_vol_id, $vol_fname, $vol_lname, $vol_phone, $vol_email, $all_day_value, $all_event_value);
		

		if ($stmt->execute()) {
		$output = "Thanks for volunteering.";
		$output1 = "The following information has been saved so you can view it later:<br><br>";
			foreach ($_POST as $key => $value) {
				$output1 .= "<b>$key</b>: $value<br>";
			}
			
			$output1 .= "Back to the <a href='index.php'>Home Page.</a>";
			
		} else {
			$output = "<p>Database query failed.  Please contact the webmaster.";
		}
	
	} else {
		$output = "<p>The following required fields are missing in your form submission.  Please check your form again and fill them out.  <br>Thank you. Back to the <a href='volunteer.php'>Volunteer Page.</a><br>\n<ul>";
		
		foreach($missing as $m){
			$output .= "<li>$m";
		}
		
		$output .= "</ul>";
	}

} else {
	$output = "Please work from the <a href='volunteer.php'>Volunteer Page.</a>";	
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