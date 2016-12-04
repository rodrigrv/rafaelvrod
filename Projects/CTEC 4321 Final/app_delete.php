<?php
// acquire shared info from other files
include 'core/database/dbconn.inc.php'; // database connection 

// make database connection
$conn = dbConnect();

$appt_id = ""; // place holder for product id information


//See if a product id is available from the client side. If yes, then retrieve the info from the database based on the product id.  If not, present the form.
if (isset($_GET['appt_id'])) { // note that the spelling 'LinkID' is based on the query string variable name

	// product id available, validate the information, then compose a query accordingly to retrieve information.

	$appt_id = intval($_GET['appt_id']); 

	// validate the product id -- check to see if it is a number
		if (is_int($appt_id)){
			//compose the query
			$sql = "DELETE FROM App WHERE appt_id = ?"; // note that the spelling "LinkID" is based on the field name in the database product table.

			$stmt = $conn->stmt_init();

			if ($stmt->prepare($sql)){

				$stmt->bind_param('i',$appt_id);

				if ($stmt->execute()){ // $stmt->execute() will return true (successful) or false
					$output = "<p>The selected record has been successfully deleted.</p>";
					header ("location: appointment.php");
					exit;
				} else {
					$output = "<p>The database operation to delete the record has been failed.  Please try again or contact the system administrator.</p>";
				}
				
			}
				
			
		} else {
			// product id is not an integer. reset $appt_id
			$appt_id = "";
			// compose an error message
			$output = "<p><b>!</b> If you are expecting to delete an existing item, there are some error occured in the process.  Please contact the webmaster.  Thank you.</p>";
		}
} else {
	// $_GET['LinkID'] is not set, which means that no product id is provided
	$output = "<p><b>!</b> To manage product records, please follow the link below to visit the admin page.  Thank you. </p>";
}

?>
<br>

<?= $output ?>

<p>Back to the <a href='appointment.php'>Appointments Page</a></p>

</body>
</html>