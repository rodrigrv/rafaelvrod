<?php 
include 'core/init.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin']!=1){
	header("location: login.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin User | Morningside</title>

<?php
include 'includes/head.php';
include 'includes/header_and_nav.php';

?>

<!-- ==================== ADMIN SECTION ==================== -->

<section class="admin_section">
	<h2 class="page_title">Admin Profile</h2>
    	<div class="admin_wrapper">
        <aside class="admin_aside">
        <h3 class="aside_title">Welcome <?php echo ucfirst($user_data['email']); ?></h3>
    	<h3 class="admin_aside_title">Quick stats</h3>
        	<p class="admin_aside_text">Below you can view how many users, donations, sponsors, volunteers, general question forms we have so far.</p>
            <p class="admin_text_info">
            <?php
				$reg_count = reg_count();
				$suffix = ($reg_count != 1) ? 's' : '';
			?>
            <b>Registered Users:</b> <?php echo reg_count(); ?><?php //echo $suffix; ?>.
            </p>
            <p class="admin_info_text">
            <?php
				$vol_count = vol_count();
				$suffix = ($vol_count != 1) ? 's' : '';
			?>
            <b>Total Volunteers:</b> <?php echo vol_count(); ?><?php //echo $suffix; ?>.
            </p>
             <p class="admin_info_text">
            <?php
				$donate_count = donate_count();
				$suffix = ($donate_count != 1) ? 's' : '';
			?>
            <b>Donations To Date:</b> <?php echo donate_count(); ?><?php //echo $suffix; ?>.
            </p>
             <p class="admin_info_text">
            <?php
				$sponsor_count = sponsor_count();
				$suffix = ($sponsor_count != 1) ? 's' : '';
			?>
            <b>Total Sponsors:</b> <?php echo sponsor_count(); ?><?php //echo $suffix; ?>.
            </p>
             <p class="admin_info_text">
            <?php
				$contact_count = con_count();
				$suffix = ($contact_count != 1) ? 's' : '';
			?>
            <b>Total Messages:</b> <?php echo con_count(); ?><?php //echo $suffix; ?>.
            </p>
    </aside>
  
        	<h3 class="admin_intro_title">Welcome <?php echo ucfirst($user_data['email']); ?></h3>
            	<p class="admin_intro_text">Below you will be able to see all the stats
                ranging from logged in users to all donations taken.
                </p>
                
                <div class="admin_show">
                	<h3 class="admin_table_title">User Info</h3>
                    <?php
					$query = mysql_query("select * from User");
					echo "<table class='user_table' cellpadding='10' border='1'>";
					echo "<tr>
							<th colspan='2'>Name</th>
							<th>Email</th>
						</tr>";
						
					while ($row = mysql_fetch_array($query)) {
						echo "<tr>";
						echo "<td>" . $row['fname'] . "</td>";
						echo "<td>" . $row['lname'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					?>
                </div>
                
                <div class="admin_show">
                	<h3 class="admin_table_title">Volunteer Info</h3>
                    <?php
					$query = mysql_query("select * from Volunteer");
					echo "<table cellpadding='10' border='1'>";
					echo "<tr>
							<th colspan='2'>Name</th>
							<th>Phone Number</th>
							<th>Events Volunteering</th>
						</tr>";
						
					while ($row = mysql_fetch_array($query)) {
						echo "<tr>";
						echo "<td>" . $row['vol_fname'] . "</td>";
						echo "<td>" . $row['vol_lname'] . "</td>";
						echo "<td>" . $row['vol_phone'] . "</td>";
						echo "<td>" . $row['event'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					?>
                
                </div>
                
                <div class="admin_show">
                	<h3 class="admin_table_title">Donation Info</h3>
                    <?php
					$query = mysql_query("select * from Donate");
					echo "<table cellpadding='10' border='1'>";
					echo "<tr>
							<th colspan='2'>First Name</th>
							<th>Donation Amount</th>
							<th>Donation Type</th>
						</tr>";
						
					while ($row = mysql_fetch_array($query)) {
						echo "<tr>";
						echo "<td>" . $row['donate_fname'] . "</td>";
						echo "<td>" . $row['donate_lname'] . "</td>";
						echo "<td>" . $row['donate_amount'] . "</td>";
						echo "<td>" . $row['donate_type'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					?>
                
                </div>
                
                <div class="admin_show">
                	<h3 class="admin_table_title">Message Info</h3>
                    <?php
					$query = mysql_query("select * from Contact");
					echo "<table cellpadding='10' border='1'>";
					echo "<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
						</tr>";
						
					while ($row = mysql_fetch_array($query)) {
						echo "<tr>";
						echo "<td>" . $row['con_fname'] . "</td>";
						echo "<td>" . $row['con_email'] . "</td>";
						echo "<td>" . $row['con_msg'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					?>
                
                </div>
		</div>
        <div class="clear_float"></div>
	

</section>

<!-- ==================== FOOTER ==================== -->
<?php include 'includes/footer.php'?>
</body>
</html>
