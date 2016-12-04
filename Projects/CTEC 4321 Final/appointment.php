<?php 
include 'core/init.php';
include 'core/database/dbconn.inc.php';
include "includes/headapp.php";

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
	header('Location: login.php?appointment');
}
?>

	<!-- Nav -->
	<nav id="nav">
		<ul class="login-icon">
    		<li><a href="logout.php"><img src="images/logout_user.png" width="30%" height="30%">Logout</a></li>
        	<div id="clear"></div>
		</ul>
		<ul class="main-nav">
			<li><a href="home.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="services.php">Services</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li class="current"><a href="appointment.php">Appointments</a></li>
		</ul>
	</nav>
	</div>

	<!-- Main -->
	<section class="wrapper style1">
		<div class="container">
        	<div class="row 200%">
				<div class="4u 12u(narrower)">
					<div id="sidebar">

	<!-- Sidebar -->
		<section>
			<h3>Hello, <?php echo ucfirst($user_data['username']); ?></h3>
                	<ul>
                    	<li>Below are some options related to your profile.</li>
                    	<li><a href="#appt">Add an appointment</a></li>
                    	<li><a href="logout.php">Log out</a></li>                       
                    </ul>
		</section>
			<section>
				<h3>Fun facts about us</h3>
                <?php
				$user_count = user_count();
				$suffix = ($user_count != 1) ? 's' : '';
				?>
					<p>We currently have <?php echo user_count(); ?> user<?php echo $suffix; ?> registered.<br>
                    
                    </p>

			</section>
						</div>
					</div>
                    
	<!-- Content -->
	<div class="8u  12u(narrower) important(narrower)">
		<div id="content">
			<article>
				<header>
					<h2>Hello, <?php echo ucfirst($user_data['username']); ?>. Welcome to your appointments page.</h2>
						<p>Below you will be able to see all your scheduled appointments as well as add, edit, and cancel them.</p>
				</header>
                
<?php

$conn = dbconnect();

// Retrieve the product & category info
	$query = "SELECT appt_type, shot_type, petname, date, time, appt_id FROM App, Shot, Type WHERE Type.type_id = App.apptype AND Shot.shot_id = App.shottype AND user = ? order by date DESC, time ASC";

	$stmt = $conn->stmt_init();

	if ($stmt->prepare($query)){
		$stmt->bind_param("i", $_SESSION['user_id']);
		$stmt->execute();
		$stmt->bind_result($appt_type, $shot_type, $petname, $date, $time, $appt_id);
	
		$tblRows = "";
		while($stmt->fetch()){

			$Title = "$date $appt_type";
			$Title_js = htmlspecialchars($Title, ENT_QUOTES); // convert quotation marks in the product title to html entity code.  This way, the quotation marks won't cause trouble in the javascript function call ( href='javascript:confirmDel ...' ) below.  

			$tblRows = $tblRows."<tr>
									<td>$appt_type</td>
								 	<td>$shot_type</td>
									<td>$petname</td>
									<td>$date</td>
									<td>$time</td>
							     	<td><a href='#appt' href='?appt_id=$appt_id'>Edit</a> | <a href='javascript:confirmDel(\"$Title_js\",$appt_id)'>Cancel</a> </td>
								</tr>";
		}
		
		if ($tblRows == ""){
			$tblRows = "<tr><td colspan='6'>Currently, there is no appointment record.<br>To add an appointment, use the form below.</td></tr>";
		}
		$output = "<table border=1 cellpadding=4>\n
		<tr>
			<th>Appointment Type</th>
			<th>Shot Needed</th>
			<th>Pet's Name</th>
			<th>Date</th>
			<th>Time</th>
			<th>Options</th>
		</tr>\n".$tblRows.
		"</table>";
					
		$stmt->close();
	} else {
		$output = "Query to retrieve product information failed.";
	} 
	
	$conn->close();
?>

<?php echo $output; ?>
                    
<?php
	$conn = dbconnect(); //open database connection
	
	$appt_id = ""; //set all values as empty
	
	$apptype 	= "";
	$shottype 	= "";
	$user	 	= $_SESSION['user_id'];
	$petname	= "";
	$date		= "";
	$time		= "";
	
	$error_msg	= "";
	
	if(isset($_GET['appt_id'])){
		
		$appt_id = intval($_GET['appt_id']); //get the integer value
		//echo "<p>app id : $appt_id<br> GET appt id: {$_GET['appt_id']}</p>";
		if(is_int($appt_id)) {
			//compose the query
			$query = "SELECT Type.type_id, Shot.shot_id, App.petname, App.date, App.time FROM App, Shot, Type WHERE Type.type_id = App.apptype AND Shot.shot_id = App.shottype AND appt_id = ?";

			$stmt = $conn->stmt_init();

			if ($stmt->prepare($query)) {
				$stmt->bind_param('i', $appt_id);
				$stmt->execute();

				$stmt->bind_result($type_id, $shot_id, $petname, $date, $time);

				$stmt->store_result();

				//echo "<p>row #: ".$stmt->num_rows."<br>app id : $appt_id</p>";

				//go if a match is found
				if ($stmt->num_rows == 1) {
					$stmt->fetch();
				} else {
					$error_msg = "Information requested is not available on the record. Please contact webmaster if this is an error. Thank You.";
					$appt_id = ""; //reset $appt_id
				}
			
			} else {
				$appt_id = ""; // reset $appt_id

				//post error msg
				$error_msg = "If you want to edit an item, some error occured. Please follow the link below to appointment page or contact webmaster. Thank you.";
			}
			$stmt->close();
		}
	}
	
	
function ApptList($selectedType){
	
	$list = ""; //placeholder for the CD category option list

	global $conn;
	// retrieve category info from the database to compose a drop down list
	$sql = "SELECT type_id, appt_type FROM Type order by appt_type";
	
	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){
		
		$stmt->execute();
		$stmt->bind_result($type_id, $appt_type);

		while ($stmt->fetch()) {
			// while going through the rows in the results, check if the category id of the current row matches the parameter ($CID) provided by the function call
			if ($selectedType == $type_id){
				$selected = "Selected";
			} else {
				$selected = "";
			}
			// create an option based on the current row
			$list = $list."<option value='$type_id' $selected>$appt_type</option>";
		}
	} else {
		$list = "something is wrong";
	}
	$stmt->close();
	return $list;
}

function ShotList($selectedShot){
	
	$list = ""; //placeholder for the CD category option list
	
	global $conn;
	// retrieve category info from the database to compose a drop down list
	$sql = "SELECT shot_id, shot_type FROM Shot order by shot_id";
	
	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){
		
		$stmt->execute();
		$stmt->bind_result($shot_id, $shot_type);

		while ($stmt->fetch()) {
			// while going through the rows in the results, check if the category id of the current row matches the parameter ($CID) provided by the function call
			if ($selectedShot == $shot_id){
				$selected = "Selected";
			} else {
				$selected = "";
			}
			// create an option based on the current row
			$list = $list."<option value='$shot_id' $selected>$shot_type</option>";
		}
	} else {
		$list = "something is wrong";
	}
	$stmt->close();
	return $list;
}

function timeCheck($apptTime, $timeSlot) {
	if ($apptTime == $timeSlot){
		echo "selected";
	}

}

?>  

<?= $error_msg ?>                 
                	<h3 id="appt">Appointment Form</h3>
					<form action="app_edit.php" method="post">
                    All fields below are required.<br><br>
                    <strong>*Type of Appointment:</strong>
                    <select name="apptype"><option selected disabled>Select Appointment</option><? echo ApptList($type_id)?>
                    </select><br><br>

                    <strong>*Type of Vaccination:</strong>
                    <select name="shottype"><option selected disabled>Select Vaccination</option><? echo ShotList($shot_id)?>
					</select><br>Description of vaccines can be found on the <a href="">Services</a> page<br><br>
                    
                    <input type="hidden" name="user" value="<?= $user ?>" >
					<input type="hidden" name="appt_id" value="<?= $appt_id ?>" >
                    
					<strong>*Name of pet:</strong><br>
                    <input type="text" name="petname" value="<?= $petname ?>"><br><br>
                    
					<strong>*Enter desired date:</strong>
                    <input type="text" name="date" placeholder="YYYY-MM-DD"min="2015-12-15" value="<?= $date ?>">
					(Example: 2015-05-20)<br><br>
                    
					<strong>*Enter time of appointment:</strong>
                    <select name="time">
                    	<option selected disabled>Select Time</option>
						<option value="09:00:00" <?php timeCheck($time, "09:00:00") ?>>9:00 AM</option>
						<option value="09:30:00" <?php timeCheck($time, "09:30:00") ?>>9:30 AM</option>
						<option value="10:00:00" <?php timeCheck($time, "10:00:00") ?>>10:00 AM</option>
						<option value="10:30:00" <?php timeCheck($time, "10:30:00") ?>>10:30 AM</option>
						<option value="11:00:00" <?php timeCheck($time, "11:00:00") ?>>11:00 AM</option>
                        <option value="11:30:00" <?php timeCheck($time, "11:30:00") ?>>11:30 AM</option>
                        <option value="12:00:00" <?php timeCheck($time, "12:00:00") ?>>12:00 PM</option>
						<option value="12:30:00" <?php timeCheck($time, "12:30:00") ?>>12:30 PM</option>
                        <option value="13:00:00" <?php timeCheck($time, "13:00:00") ?>>1:00 PM</option>
                        <option value="13:30:00" <?php timeCheck($time, "13:30:00") ?>>1:30 PM</option>
                        <option value="14:00:00" <?php timeCheck($time, "14:00:00") ?>>2:00 PM</option>
                        <option value="14:30:00" <?php timeCheck($time, "14:30:00") ?>>2:30 PM</option>
                        <option value="15:00:00" <?php timeCheck($time, "15:00:00") ?>>3:00 PM</option>
                        <option value="15:30:00" <?php timeCheck($time, "15:30:00") ?>>3:30 PM</option>
                        <option value="16:00:00" <?php timeCheck($time, "16:00:00") ?>>4:00 PM</option>
                    </select><br><br>
                    <input type="submit" name="go" value="Request Appointment"><br><br>
                    </form>
			</article>
		</div>
	</div>
		</div>
		</div>
	</section>

<?php
include "includes/footer.php";
?>