<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE> CTEC 4309 Class Working File: Message Posting Form</TITLE>
</HEAD>

<BODY>
CTEC 4309 Class Working File 
<hr>

<h2>Post a Message</h2>

<hr size="1">

<h3>Message Form</h3>
 <form action= "post.php" method="post">
	Author: <input type="text" name="author"><br/>
    E-mail: <input type="text" name="E-mail"><br>
	Title: <input type="text" name="title"><br/>
    Tags: 	<input type="checkbox" name="tags[1]" value="General Interest">General Interest
    		<input type="checkbox" name="tags[2]" value="Local Schools">Local Schools
            <input type="checkbox" name="tags[3]" value="Safety">Safety<br/>
	Comment: <br/><textarea name="comment" rows="5" cols="40"></textarea><br/>
	<input type="Submit" name="SubmitThis" value="Preview">
  </form>



</BODY>
</HTML>