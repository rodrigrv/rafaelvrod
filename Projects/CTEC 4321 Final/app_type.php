<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection 

// make database connection
$conn = dbConnect();

	print $HTMLHeader; 
	print $PageTitle;

?>
<script>
function confirmDel(AnchorText, LinkID) {
// javascript function to ask for deletion confirmation

	url = "admin_delete_rr.php?LinkID="+LinkID;
	var agree = confirm("Delete this item: <" + AnchorText + "> ? ");
	if (agree) {
		// redirect to the deletion script
		location.href = url;
	}
	else {
		// do nothing
		return;
	}
}
</script>

<?php
// Retrieve the product & category info
	$sql = "SELECT AnchorText, Name, URL, CategoryID, LinkID FROM Links, LinkCategory WHERE Links.CategoryID = LinkCategory.CID order by Name";

	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){

		$stmt->execute();
		$stmt->bind_result($AnchorText, $Name, $URL, $CategoryID, $LinkID);
	
		$tblRows = "";
		while($stmt->fetch()){
			$Title_js = htmlspecialchars($AnchorText, ENT_QUOTES); // convert quotation marks in the product title to html entity code.  This way, the quotation marks won't cause trouble in the javascript function call ( href='javascript:confirmDel ...' ) below.  

			$tblRows = $tblRows."<tr><td>$AnchorText</td>
								 <td>$Name</td>
							     <td><a href='admin_form_rr.php?LinkID=$LinkID'>Edit</a> | <a href='javascript:confirmDel(\"$Title_js\",$LinkID)'>Delete</a> </td></tr>";
		}
		
		$output = "<table border=1 cellpadding=4>\n
		<tr><th>Title</th><th>Category</th><th>Options</th></tr>\n".$tblRows.
		"</table>";
					
		$stmt->close();
	} else {

		$output = "Query to retrieve product information failed.";
	
	}

	$conn->close();
?>
	
		
<?= $SubTitle_Admin ?>
<br>
| <a href="admin_form_rr.php">Add a new item</a> |<br>

<?php echo $output ?>


<?php print $PageFooter; ?>

</body>
</html>