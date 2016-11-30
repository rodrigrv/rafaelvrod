<?php
//--------------------------
// Form Processing Script
//		This script is written to work with the form in post_form.php.
//--------------------------

// set up variables to store all user input
$author = $_POST['author'];
$email = $_POST['email'];
$title = $_POST['title'];
$tags = $_POST ['tags'];

$comment = $_POST['comment'];

// use a variable to store the output.  The output ($output) will be printed below (line 34). 

$output = "<b>Author</b>: $author <br/>
		   <b>E-mail</b>: $email <br/>
		   <b>Title</b>: $title <br/>
		   <b>Tags</b>: $tags <br/>
		   <b>Comment</b>: $comment<br/>";

?>

<!-- you can use empty, count, or foreach for tag array -->
<!-- use implode function to make a string. you need to pieces of information for this to work -->

<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE> CTEC 4309 Class Working File: Message Form Processing</TITLE>
</HEAD>

<BODY>
CTEC 4309 Class Working File 
<hr>

<h2>Preview Your Message</h2>

<hr size="1">
<p>
	<?php echo $output ?>
</p>


</BODY>
</HTML>