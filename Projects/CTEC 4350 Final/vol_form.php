<?php
//acquire shared files for database connection
include 'core/init.php';
include 'includes/head.php';
include 'includes/header_and_nav.php';

$conn = dbconnect();

if (isset($_POST['volSubmit'])) {
	
	//VALIDATE USER INPUT
	//set up required and expected arrays
	$required = array("vol_fname", "vol_lname", "vol_phone", "vol_email", "day", "event");
	
	$expected = array("vol_fname", "vol_lname", "vol_phone", "vol_email", "day", "event", "vol_id");
	
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
		
		if ($vol_id != "") {
			$vol_id = intval($vol_id);
			
			$sql = "UPDATE Volunteer SET vol_fname = ?, vol_lname = ?, vol_phone = ?, vol_email = ?, day = ?, event = ? WHERE vol_id = ?"; 
			
			if ($stmt->prepare($sql)) {
				$stmt->bind_param('ssssssi', $vol_fname, $vol_lname, $vol_phone, $vol_email, $day, $event, $vol_id);
				$stmt_prepared = 1;
			}
		
		} else {
			$sql = "INSERT INTO Volunteer (vol_fname, vol_lname, vol_phone, vol_email, day, event) VALUES (?, ?, ?, ?, ?, ?)";
			
			if ($stmt->prepare($sql)) {
				$stmt->bind_param('ssssss', $vol_fname, $vol_lname, $vol_phone, $vol_email, $day, $event);
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
		$output = "<p>The following required fields are missing in your form submission.  Please check your form again and fill them out.  <br>Thank you. Back to the <a href='volunteer.php'>Volunteer Page.</a><br>\n<ul>";
		
		foreach($missing as $m){
			$output .= "<li>$m";
		}
		
		$output .= "</ul>";
	}

} else {
	$output = "Please work from the <a href='volunteer.php'>Volunteer Page.</a>";	
}

echo $output;

?>

<?php
include 'includes/footer.php';
?>