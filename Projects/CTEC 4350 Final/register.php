<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register | Morningside</title>
<?php include 'includes/head.php'?>
<?php include 'includes/header_and_nav.php'?>
<script>
  	//use initialize function to hold elements
	function init(){
		document.getElementById('regForm').onsubmit = process;
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
		var email = document.getElementById('regEmail').value;
		var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
		
		if (emailPattern.test(email)) {
			removeErrorMessage('regEmail');
		
		} else {
			addErrorMessage('regEmail', 'Please enter a valid email. Must include @ sign.');
			err ++;
		}
		
		//first name validation
		var fname = document.getElementById('regFname').value;
		var fnamePattern = /^[A-Za-z]+$/i;
		
			if (fnamePattern.test(fname)) {
				removeErrorMessage('regFname');	
		
			} else {
				addErrorMessage('regFname', 'Make sure your first name has no spaces or symbols.');
				err ++;
			}
		
		//last name validation
		var lname = document.getElementById('regLname').value;
		var lnamePattern = /^[A-Za-z]+$/i;
		
			if (lnamePattern.test(lname)) {
				removeErrorMessage('regLname');	
		
			} else {
				addErrorMessage('regLname', 'Make sure your last name has no spaces or symbols.');	
				err ++;
			}
		
		//password validation
		var pass = document.getElementById('regPassword').value;
		var passPattern = /^[A-Z a-z]\w{3,20}$/i;
		
			if (passPattern.test(pass)) {
				removeErrorMessage('regPassword');	
			
			} else {
				addErrorMessage('regPassword', 'Your password must have at 4 characters with the first starting with a letter.');
				err ++;	
			}
			
		//confirm password validation
		var confirmPass = document.getElementById('regConfirm').value;
			
			if (pass == confirmPass && confirmPass != "") {
				removeErrorMessage('regConfirm');
			
			} else {
				addErrorMessage('regConfirm', 'Your passwords do not match. Please make sure they match.');
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

<!-- ==================== REGISTER SECTION ==================== -->

<section class="register_page">
	<h2 class="page_title">Registration</h2>
    
    	<div class="register_form_wrapper">
        <h3 class="register_form_title">Register Below</h3>
        	<p class="register_form_text">Create a free account to track events you've signed up for and/or any recurring donations you've started with us.
            </p>
            
            	<form action="reg_user.php" method="post" class="register_form_style" id="regForm">
                	
                    <span>
                    	<label for='email' id='regEmailLabel'><b>Email Address:<span class="asterisk">*</span></b></label><br>
                    </span>	
                        <input type="email" name="email" class="register_email" id='regEmail'><br><br>
                    
                    <span>
                    	<label for='fname' id='regFnameLabel'><b>First Name:<span class="asterisk">*</span></b></label><br>
                    </span>	
                        <input type="text" name="fname" class="register_fname" id='regFname'><br><br>
                    
                    <span>
                    	<label for='lname' id='regLnameLabel'><b>Last Name:<span class="asterisk">*</span></b></label><br>
                    </span>
                    	<input type="text" name="lname" class="register_lname" id='regLname'><br><br>
                    
                    <span>
                    	<label for='password' id='regPasswordLabel'><b>Password:<span class="asterisk">*</span></b></label><br>
                    </span>	
                        <input type="password" name="password" class="register_pass" id='regPassword'><br><br>
                    
                    <span>
                    	<label for='confirm_pass' id="regConfirmLabel"><b>Confirm Password:<span class="asterisk">*</span></b></label><br>
                    </span>	
                        <input type="password" name="confirm_pass" class="register_confirm_pass" id="regConfirm"><br><br>
                    
                    <input type="submit" class="register_submit" value="Register">
                
                
                </form>      
        </div>
</section>

<?php include 'includes/footer.php'?>
</body>
</html>
