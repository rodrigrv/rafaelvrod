<?php
//acquire shared files for database connection
include 'core/init.php';
include 'includes/head.php';
include 'includes/header_and_nav.php';

$conn = dbconnect();

if (isset($_POST['conSubmit'])) {
	
	$con_fname = $_POST['con_fname'];
	$con_lname = $_POST['con_lname'];
	$con_phone = $_POST['con_phone'];
	$con_email = $_POST['con_email'];
	$con_msg = $_POST['con_msg'];
	
	$missing = array();
	
	if (empty($missing)) {
		$stmt = $conn->stmt_init();
			
		$sql = "INSERT INTO Contact (con_fname, con_lname, con_phone, con_email, con_msg) VALUES (?, ?, ?, ?, ?)";
			
		$stmt->prepare($sql);
		$stmt->bind_param('sssss', $con_fname, $con_lname, $con_phone, $con_email, $con_msg);
		
		if ($stmt->execute()) {
		$output = "We will contact you as soon as we can.";
		$output1 = "The following information will be reviewed and we will get back with you as soon as we can:<br><br>";
			foreach ($_POST as $key => $value) {
				$output1 .= "<b>$key</b>: $value<br>";
			}
			
			$output1 .= "Back to the <a href='index.php'>Home Page.</a>";
			
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