<?php

//connect to the database
include 'core/init.php';

//check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['user_vol_id']) && is_numeric($_GET['user_vol_id'])){
    //get id value
    $id = $_GET['user_vol_id'];

    //delete the entry
    $result = mysql_query("DELETE FROM Volunteer WHERE user_vol_id = 6")
        or die(mysql_error());

    //redirect back to the view page
    header("location: new_user.php");
} else{
    //if id isnt set or isnt valid redirect to admin console
    header("location: new_user.php");
}

?>