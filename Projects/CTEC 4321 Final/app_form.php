<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
//include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

print $HTMLHeader; 
print $PageTitle;

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$LinkID = ""; // place holder for product id information.  Set it as empty initally.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.  
$AnchorText = "";
$URL = "";
$CategoryID = "";

$errMsg = "";

// check to see if a product id available via the query string
if (isset($_GET['LinkID'])) { // note that the spelling 'LinkID' is based on the query string variable name.  When linking to this form (form.php), if a query string is attached, ex. form.php?LinkID=3 , then that information will be detected here and used below.

	$LinkID = intval($_GET['LinkID']); // get the integer value from $_GET['LinkID']

	// validate the product id -- it has to be an integer to be used in the query below
	if (is_int($LinkID)){
		//compose a select query
		$sql = "SELECT AnchorText, URL, CategoryID FROM Links WHERE LinkID = ?"; // note that the spelling "LinkID" is based on the field name in my product table (database).
			
		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$LinkID);
			$stmt->execute();
				
			$stmt->bind_result($AnchorText, $URL, $CategoryID); // bind the five pieces of information necessary for the form.
			
			$stmt->store_result();
				
			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
			} else {
				$errMsg = "<b>!</b> Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.";
				$LinkID = ""; // reset $LinkID
			}

		} else {
			// reset $LinkID
			$LinkID = "";
			// compose an error message
			$errMsg = "<b>!</b> If you are expecting to edit an exiting item, there are some error occured in the process.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.";
		}
		
		$stmt->close();
	} // close if(is_int($LinkID))
	
}

// function to create the options for the category drop-down list.
function CategoryOptionList($CategoryID){
	
	$list = ""; //placeholder for the CD category option list
	
	global $conn;
	// retrieve category info from the database to compose a drop down list
	$sql = "SELECT CID, Name FROM LinkCategory order by Name";
	
	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){
		
		$stmt->execute();
		$stmt->bind_result($CID, $Name);

		while ($stmt->fetch()) {
			// while going through the rows in the results, check if the category id of the current row matches the parameter ($CID) provided by the function call
			if ($CategoryID == $CID){
				$selected = "Selected";
			} else {
				$selected = "";
			}
			// create an option based on the current row
			$list = $list."<option value='$CID' $selected>$Name</option>";
		}
	}
	$stmt->close();
	return $list;
}
?>
<?= $SubTitle_Admin ?>
<br>
<b>Product Information Form</b><br>

<?= $errMsg ?>
<br>
<form action="admin_edit_rr.php" method="POST">

	<!-- pass the LinkID information using a hidden field -->
	<input type="hidden" name="LinkID" value="<?=$LinkID?>">

	<table>
		<tr><td>Anchor Text</td><td><input type="text" name="AnchorText" size="45" value="<?= $AnchorText ?>"></td></tr>
		<tr><td>URL</td><td><input type="text" name="URL" size="45" value="<?= $URL ?>"></td></tr>
		<tr><td>Category:</td><td><select name="CategoryID"><option value=""></option><?= CategoryOptionList($CategoryID)?></select></td></tr>
		<tr><td colspan=2><input type=submit name="Submit" value="Submit Links"></td></tr>
	</table>

</form>

<?php print $PageFooter; ?>

</body>
</html>