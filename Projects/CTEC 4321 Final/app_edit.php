<?php
// acquire shared info from other files
include("core/database/dbconn.inc.php"); // database connection 
include 'core/init.php';
include "includes/headnav.php";

// make database connection
$conn = dbConnect();

// Process only if there is any submission
if (isset($_POST['go'])) {

	// ==========================
	//validate user input
	
	// set up the required array 
	$required = array("apptype", "shottype", "user", "petname", "date", "time"); 

	// set up the expected array
	$expected = array("apptype", "shottype", "user", "petname", "date", "time", "appt_id"); 

	$missing = array();
	
	foreach ($expected as $field){
		// isset($_POST[$field]):  Note that if there is no user selection for radio buttons, checkboxes, selection list, then $_POST[$field] will not be set
		// Under what conditions the script needs to record a field as missing -- $field is required and one of the following two (1)  $_POST[$field] is not set or (2) $_POST[$field] is empty

		//echo "$field: in_array(): ".in_array($field, $required)." empty(_POST[$field]): ".empty($_POST[$field])."<br>";

		if (in_array($field, $required) && (!isset($_POST[$field]) || empty($_POST[$field]))) {
			array_push ($missing, $field);
		
		} else {
			// Passed the required field test, set up a variable to carry the user input.  
			// Note the variable set up here uses a variable name as the $field value.  In this example, the first $field in the foreach loop is "title" and a $title variable will be set up with the value of "" or $_POST["title"]
			if (!isset($_POST[$field])) {
				//$_POST[$field] is not set, set the value as ""
				${$field} = "";
			} else {
				${$field} = $_POST[$field];
			}
		}
	}
	//print_r ($missing); // for debugging purpose

	/* add more data validation here */
	// ex. $price should be a number

	/* proceed only if there is no required fields missing and all other data validation rules are satisfied */
	if (empty($missing)){

		//========================
		// processing user input

		$stmt = $conn->stmt_init();

		echo "<p>app id : $appt_id</p>";
		// compose a query: Insert or Update?
		if ($appt_id != "") {
			/* an existing LinkID ==> update query */ 
			
			// ensure $LinkID is an integer
			$appt_id = intval($appt_id); 
			//echo "<p>app id : $appt_id</p>";

			$sql = "UPDATE App SET apptype = ?, shottype = ?, user = ?, petname = ?, date = ?, time = ? WHERE appt_id = ?";
				
			if($stmt->prepare($sql)){

				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.
				$stmt->bind_param('iiisssi',$apptype, $shottype, $user, $petname, $date, $time, $appt_id);
				$stmt_prepared = 1;// set up a variable to signal that the query statement is successfully prepared.
			}

		} else {
			// now existing LinkID ==> insert query
			$sql = "INSERT INTO App (apptype, shottype, user, petname, date, time) VALUES (?, ?, ?, ?, ?, ?)";

			if($stmt->prepare($sql)){

				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.

				$stmt->bind_param('iiisss',$apptype, $shottype, $user, $petname, $date, $time);
				$stmt_prepared = 1; // set up a variable to signal that the query statement is successfully prepared.
			}
		}

		if ($stmt_prepared == 1){
			if ($stmt->execute()){
				$output = "<p>The following information has been saved in the database:<br><br>";
				header ("location: appointment.php");
					exit;
				foreach($_POST as $key=>$value){
					$output .= "<b>$key</b>: $value <br>"; //$key (form field names) may not be very indicative (ex. lname for the last name field), you can set up the form field names in a way that can be easily processed to produce more understandable message. (ex. use field names like "Last_Name", then before printing the field name, replace the underscore with a space.  See php solution 4.4)
				}
				$output .= "<p>Back to the <a href='appointment.php'>Appointments Page</a></p>";
			} else {
				//$stmt->execute() failed.
				$output = "<p>Database operation failed.  Please contact the webmaster.";
			}
		} else {
			// statement is not successfully prepared (issues with the query).
			$output = "<p>Database query failed.  Please contact the webmaster.";
		}

	} else { 
		// $missing is not empty
		$output = "<p>The following required fields are missing in your form submission.  Please check your form again and fill them out.  <br>Thank you. Back to the <a href='appointment.php'>Appointments Form</a><br>\n<ul>";
		foreach($missing as $m){
			$output .= "<li>$m";
		}
		$output .= "</ul>";
	}

} else {
	$output = "Please work from the <a href='appointment.php'>Appointments</a>.";
}

echo $output;


?>

<?php
include "includes/footer.php";
?>



</body>
</html>