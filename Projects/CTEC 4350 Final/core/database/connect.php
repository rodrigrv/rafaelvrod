<?php
$connect_error ='Could not connect to server';
$db_error ='Could not connect to database';
mysql_connect('localhost','rvr9109','Linux123','rvr9109') or die($connect_error);
mysql_select_db('rvr9109') or die($db_error);
?>