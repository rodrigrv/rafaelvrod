<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login | Morningside</title>
<?php 
include 'core/init.php';
include 'includes/head.php';
include 'includes/header_and_nav.php';
?>
<script>
function init() {
	document.getElementById('login_form').onsubmit = process;
}

	function addErrorMessage(fieldId, msg){
		//alert(msg);
		
		// highlight the label
		document.getElementById(fieldId + "Label").style.color = "red";


		// check if an error message span is available
		if (document.getElementById(fieldId + "ErrMsg"))  
		{
			// an error message span is already available, use it
			document.getElementById(fieldId + "ErrMsg").innerHTML = msg;
			document.getElementById(fieldId + "ErrMsg").style.display = "block";
		
		} else {
			
			// otherwise, create the error message span
			var messageSpan = document.createElement("span");
			messageSpan.className = "errMsg"; // set the CSS class to use
			messageSpan.id = fieldId + "ErrMsg"; // set the id
			messageSpan.innerHTML = msg;

			var inputLabel = document.getElementById(fieldId + 'Label');
			inputLabel.parentNode.appendChild(messageSpan);
		}
	}

	function removeErrorMessage (fieldId){
		if (document.getElementById(fieldId + "ErrMsg")) {	
			
			document.getElementById(fieldId + "Label").style.color = "black";
			document.getElementById(fieldId + "ErrMsg").style.display = "none";
		}
	}
	
	function process(evt){
		
		var err = 0;
		
		//email validation
		var email = document.getElementById('login_email').value;
		var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
		
		if (emailPattern.test(email)) {
			removeErrorMessage('email');
		
		} else {
			addErrorMessage('email', 'Your email address is incorrect. Please try again.');
			err ++;
		}
		
		//password
		var password = document.getElementById('login_password').value;

		var passwordPattern = /^[A-Z a-z]\w{2,20}$/i;

		if (passwordPattern.test(password)) {
			removeErrorMessage('password');
		} else {
			addErrorMessage('password', 'Your password doesn\'t match your login id.');
			err ++;
		}
		
		if (err > 0) {
			// prevent form submission
			if (evt.preventDefault) {
				evt.preventDefault();
				
			} else {
				evt.returnValue = false;
			}
		}
	}

window.onload = init;
</script>
<!-- ==================== LOGIN SECTION ==================== -->

<section class="login_page">
	<h2 class="page_title">Login</h2>
    	<div class="login_wrapper">
        	<h3 class="login_title">Sign In Below</h3>
            	<form action="success.php" method="post" class="login_form" id="login_form">
                
                	<span>
                		<label for="email" id="emailLabel"><b>Email Address:</b></label><br>
                    </span>
                    	<input type="email" name="email" class="login_email" id="login_email"/><br>
                    
                    <span>
                    	<label for="password" id="passwordLabel"><b>Password:</b></label><br>
                    </span>	
                        <input type="password" name="password" class="login_pass" id="login_password"/><br>
                    
                    
                    <input type="submit" value="Login" class="login_submit">
                    
                    
                </form>
                
            <h3 class="login_new_user">Are you a new user?</h3>
            	<p class="login_user_text">
                	No problem. You can <a href="register.php">register for a free account</a>.
                </p>
        </div>
</section>

<?php include 'includes/footer.php' ?>
</body>

</html>
