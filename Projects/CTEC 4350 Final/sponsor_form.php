<?php
//acquire shared files for database connection
include 'core/init.php';
include 'includes/head.php';
include 'includes/header_and_nav.php';

$conn = dbconnect();

if (isset($_POST['sponsor_submit'])) {
	
	//VALIDATE USER INPUT
	//set up required and expected arrays
	$required = array("sponsor_fname", "sponsor_lname", "sponsor_address", "sponsor_city", "sponsor_state", "sponsor_zip", "sponsor_phone", "sponsor_email", "sponsorDuration");
	
	$expected = array("sponsor_fname", "sponsor_lname", "sponsor_business", "sponsor_address", "sponsor_city", "sponsor_state", "sponsor_zip", "sponsor_phone", "sponsor_email", "sponsorDuration", "sponsor_id");
	
	$missing = array();
	
	foreach ($expected as $field) {
		
		if (in_array($field, $required) && (!isset($_POST[$field]) || empty($_POST[$field]))) {
			array_push ($missing, $field);
		
		} else {
			
			if (!isset($_POST[$field])) {
				${$field} = "";
			
			} else {
				${$field} = $_POST[$field];
			}
		}
	}
	//print_r ($missing); // for debugging purpose
	
	if (empty($missing)) {
		$stmt = $conn->stmt_init();
		
		if ($sponsor_id != "") {
			$sponsor_id = intval($sponsor_id);
			
			$sql = "UPDATE Sponsor SET sponsor_fname = ?, sponsor_lname = ?, sponsor_business = ?, sponsor_address = ?, sponsor_city = ?, sponsor_state = ?, sponsor_zip = ?, sponsor_phone = ?, sponsor_email = ?, sponsorDuration WHERE sponsor_id = ?"; 
			
			if ($stmt->prepare($sql)) {
				$stmt->bind_param('ssssssssssi', $sponsor_fname, $sponsor_lname, $sponsor_business, $sponsor_address, $sponsor_city, $sponsor_state, $sponsor_zip, $sponsor_phone, $sponsor_email, $sponsorDuration, $sponsor_id);
				$stmt_prepared = 1;
			}
		
		} else {
			$sql = "INSERT INTO Sponsor (sponsor_fname, sponsor_lname, sponsor_business, sponsor_address, sponsor_city, sponsor_state, sponsor_zip, sponsor_phone, sponsor_email, sponsorDuration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
			if ($stmt->prepare($sql)) {
				$stmt->bind_param('ssssssssss', $sponsor_fname, $sponsor_lname, $sponsor_business, $sponsor_address, $sponsor_city, $sponsor_state, $sponsor_zip, $sponsor_phone, $sponsor_email, $sponsorDuration);
				$stmt_prepared = 1;
			}
		}
		
		if ($stmt_prepared == 1) {
			if($stmt->execute()) {
				$output = "The following information has been saved in the database:<br><br>";
				foreach($_POST as $key => $value) {
					$output .= "<b>$key</b>: $value<br>";
				}
				
				$output .= "<p>Back to the <a href='index.php'>Home Page.</a></p>";
			
			} else {
				$output = "<p>Database operation failed.  Please contact the webmaster.";
			}
			
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
	$output = "Please work from the <a href='sponsor.php'>Sponsor page.</a>";	
}

echo $output;

?>

<?php
include 'includes/footer.php';
?>