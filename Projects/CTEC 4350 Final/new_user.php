<?php 
include 'core/init.php'; 

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
	header("location: login.php");
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Profile | Morningside</title>

<?php 
include 'includes/head.php';
include 'includes/header_and_nav.php';
?>

<!-- ==================== NEW USER SECTION ==================== -->

<section class="user_section">
	<h2 class="page_title">User Profile</h2>
    	<div class="user_wrapper">
			<h3 class="intro_user_title">Welcome <?php echo ucfirst($user_data['email']); ?></h3>
            	<p class="intro_user_text">Welcome to your profile page. Below you can view your 
                volunteering events and donations. You can also edit the volunteer as well.
                </p>
                
                <div class="user_info">
                	<h3 class="admin_table_title">Volunteer</h3>
                <?php
					$query = mysql_query("select * from Volunteer WHERE user_vol_id = 6");
					echo "<table cellpadding='10' border='1'>";
					echo "<tr>
							<th colspan='2'>Name</th>
							<th>Events Selected</th>
							<th colspan='2'>Options</th>
						</tr>";
						
					while ($row = mysql_fetch_array($query)) {
						echo "<tr>";
						echo "<td>" . $row['vol_fname'] . "</td>";
						echo "<td>" . $row['vol_lname'] . "</td>";
						echo "<td>" . $row['event'] . "</td>";
						echo '<td><a href="volunteer.php?id=' . $row['vol_user_id'] . '">Edit</a></td>';
						echo '<td><a href="volunteer.php?id=' . $row['vol_user_id'] . '">Cancel</a></td>';
						echo "</tr>";
					}
					echo "</table>";
					
				
				?>
                </div>
                
                <div class="user_info">
                	<h3 class="admin_table_title">Donations</h3>
                <?php
					$query = mysql_query("select * from Donate WHERE user_donate_id = 6");
					echo "<table cellpadding='10' border='1'>";
					echo "<tr>
							<th colspan='2'>Name</th>
							<th>Donation Type</th>
							<th>Donation Amount</th>
						</tr>";
						
					while ($row = mysql_fetch_array($query)) {
						echo "<tr>";
						echo "<td>" . $row['donate_fname'] . "</td>";
						echo "<td>" . $row['donate_lname'] . "</td>";
						echo "<td>" . $row['donate_type'] . "</td>";
						echo "<td>" . $row['donate_amount'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					
				
				?>
                </div>
                <div class="clear_float"></div>
		</div>
</section>

<!-- ==================== FOOTER ==================== -->
<?php include 'includes/footer.php'?>
</body>
</html>
