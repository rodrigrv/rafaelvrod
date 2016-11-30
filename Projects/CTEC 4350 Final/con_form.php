<?php
//acquire shared files for database connection

include 'includes/head.php';
include 'includes/header_and_nav.php';

//$conn = dbconnect();
mysql_connect('localhost', 'rvr9109', 'Linux123');
mysql_select_db('rvr9109');

if (isset($_POST['conSubmit'])) {
	
	//VALIDATE USER INPUT
	//set up required and expected arrays
	$required = array("con_fname", "con_lname", "con_phone", "con_email", "con_msg");
	
	$expected = array("con_fname", "con_lname", "con_phone", "con_email", "con_msg", "con_id");
	
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
	print_r ($missing); // for debugging purpose
	
	if (empty($missing)) {
		$stmt = $conn->stmt_init();
		
		if ($con_id != "") {
			$con_id = intval($con_id);
			
			$sql = "UPDATE Contact SET con_fname = ?, con_lname = ?, con_phone = ?, con_email = ?, con_msg = ? WHERE con_id = ?"; 
			
			if ($stmt->prepare($sql)) {
				$stmt->bind_param('sssssi', $con_fname, $con_lname, $con_phone, $con_email, $con_msg, $con_id);
				$stmt_prepared = 1;
			}
		
		} else {
			$sql = "INSERT INTO Contact (con_fname, con_lname, con_phone, con_email, con_msg) VALUES (?, ?, ?, ?, ?)";
			
			if ($stmt->prepare($sql)) {
				$stmt->bind_param('sssss', $con_fname, $con_lname, $con_phone, $con_email, $con_msg);
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
		$output = "<p>The following required fields are missing in your form submission.  Please check your form again and fill them out.  <br>Thank you. Back to the <a href='contact.php'>Contact Page.</a><br>\n<ul>";
		
		foreach($missing as $m){
			$output .= "<li>$m";
		}
		
		$output .= "</ul>";
	}

} else {
	$output = "Please work from the <a href='contact.php'>Contact Page.</a>";	
}

echo $output;

?>

<?php
include 'includes/footer.php';
?>