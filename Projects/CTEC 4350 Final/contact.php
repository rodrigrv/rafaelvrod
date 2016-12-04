<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact Us | Morningside</title>
<?php include 'includes/head.php'?>
<?php include 'includes/header_and_nav.php'?>
<script>
function init() {
	document.getElementById('contact_form').onsubmit = process;
}

	function addErrorMessage(fieldId, msg){
		//alert(msg);
		
		// highlight the label
		document.getElementById(fieldId + "Label").style.color = "red";

		// check if an error message span is available
		if (document.getElementById(fieldId + "ErrMsg")) {
			
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
		
		//first name validation
		var fname = document.getElementById('contact_fname').value;
		var fnamePattern = /^[A-Za-z]+$/i;
		
			if (fnamePattern.test(fname)) {
				removeErrorMessage('contact_fname');	
		
			} else {
				addErrorMessage('contact_fname', 'Make sure your first name has no spaces or symbols.');
				err ++;
			}
		
		//last name validation
		var lname = document.getElementById('contact_lname').value;
		var lnamePattern = /^[A-Za-z]+$/i;
		
			if (lnamePattern.test(lname)) {
				removeErrorMessage('contact_lname');	
		
			} else {
				addErrorMessage('contact_lname', 'Make sure your first name has no spaces or symbols.');	
				err ++;
			}
		
		//phone number validation
		//num1
		var conPhone = document.getElementById('contact_num').value;
		var conPattern = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/i;
		
			if (conPattern.test(conPhone)) {
				removeErrorMessage('phone');	
		
			} else { 
				addErrorMessage('phone', 'Invalid phone format.<br>Acceptable formats: 123-456-7890, (123) 456-7890, 123 456 7890, 123.456.7890.');	
				err ++;
			}
		
		
		//email validation
		var email = document.getElementById('contact_email').value;
		var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
		
			if (emailPattern.test(email)) {
				removeErrorMessage('contact_email');
		
			} else {
				addErrorMessage('contact_email', 'Please enter a valid email. Must include @ sign and domain name.<br>Examples: mark28@sbcglobal.net, susie60@gmail.com');
				err ++;
			}
			
		//msg validation 
		var message = document.getElementById('contact_msg').value;
		var msgPattern = /^(.){4,500}$/i;
		
			if (msgPattern.test(message)) {
				removeErrorMessage('contact_msg');	
			
			} else {
				addErrorMessage('contact_msg', 'Make sure this field is not left blank.');
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

<!-- ==================== CONTACT SECTION ==================== -->

<section class="contact_section">
	<h2 class="page_title">Contact</h2>
    	<div class="contact_wrapper">
        	<div class="contact_intro_wrapper">
                <h3 class="contact_intro_title">Get in touch with us</h3>
                    <p class="contact_intro_text">If you have any questions regarding donations, events, faq's, sponsorships or any other type of inquiry, here is the place to do it. Leave your name, email, phone number, and message and we will respond back to you as soon as possible.
                    </p>
        	</div>
        
            <div class="contact_form_wrapper">
                <h3 class="contact_form_intro">Contact Form</h3>
                
                <form action="con_add.php" method="post" class="contact_form_style" id="contact_form">
                	
                    <span>
                        <label for="fname" id="contact_fnameLabel"><b>First Name:<span class="asterisk">*</span></b></label><br>
                    </span><br>
                        <input type="text" class="contact_name" name="con_fname" id="contact_fname"><br><br>
                    
                    
                    <span>
                        <label for="lname" id="contact_lnameLabel"><b>Last Name:<span class="asterisk">*</span></b></label><br>
                    </span><br>  
                        <input type="text" class="contact_name" name="con_lname" id="contact_lname"><br><br>
                    
                    
                    <span>
                        <label for="phone" id="phoneLabel"><b>Phone Number:<span class="asterisk">*</span></b></label><br>
                    </span><br>
                        <input type="text" maxlength="15" class="contact_num" name="con_phone" id="contact_num"><br><br>
                    
                    
                    <span>
                        <label for="email" id="contact_emailLabel"><b>Email Address:<span class="asterisk">*</span></b></label><br>
                    </span><br>   
                        <input type="email" class="contact_email" name="con_email" id="contact_email"><br><br>
                    
                    
                    <span>
                        <label for="message" id="contact_msgLabel"><b>Message:<span class="asterisk">*</span></b></label><br>
                    </span><br> 
                        <textarea rows="7" cols="25" maxlength="500" class="contact_msg" name="con_msg" id="contact_msg"></textarea><br><br>
                    
                    
                    <input type="submit" class="contact_submit" name="conSubmit" value="Submit My Request">
                
                </form>
            </div>
        </div>
</section>


<?php include 'includes/footer.php'?>
</body>
</html>
