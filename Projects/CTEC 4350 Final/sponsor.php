<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sponsorships | Morningside</title>
<?php include 'includes/head.php'?>
<?php include 'includes/header_and_nav.php'?>
<script>
function init() {
	document.getElementById('sponsor_form').onsubmit = process;
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
		var fname = document.getElementById('sponsorFname').value;
		var fnamePattern = /^[A-Za-z]+$/i;
		
			if (fnamePattern.test(fname)) {
				removeErrorMessage('sponsorFname');	
		
			} else {
				addErrorMessage('sponsorFname', 'Make sure your first name has no spaces or symbols.');
				err ++;
			}
		
		//last name validation
		var lname = document.getElementById('sponsorLname').value;
		var lnamePattern = /^[A-Za-z]+$/i;
		
			if (lnamePattern.test(lname)) {
				removeErrorMessage('sponsorLname');	
		
			} else {
				addErrorMessage('sponsorLname', 'Make sure your first name has no spaces or symbols.');	
				err ++;
			}
			
		//business name validation
		var business = document.getElementById('sponsorBusiness').value;
		var businessPattern = /^(?!\s)(?!.*\s$)(?=.*[a-zA-Z0-9])[a-zA-Z0-9 '~?!]{2,}$/i;
		
			if (businessPattern.test(business) || business == "") {
				removeErrorMessage('sponsorBusiness');	
		
			} else {
				addErrorMessage('sponsorBusiness', 'If you have a business name, please enter it correctly. Make sure it doesn\'t start or end with a space.');	
				err ++;
			}
			
		//address validation
		var address = document.getElementById('sponsorAddress').value;
		var addressPattern = /[A-Za-z0-9'\.\-\s\,]/i;
			
			if (addressPattern.test(address)) {
				removeErrorMessage('sponsorAddress');
				
			} else {
				addErrorMessage('sponsorAddress', 'Please input a valid address. Make sure it has no extra spaces or no special symbols.');
				err ++;
			}
		
		//city validation
		var city = document.getElementById('sponsorCity').value;
		var cityPattern = /[A-Za-z0-9'\.\-\s\,]/i;
		
		if (cityPattern.test(city)) {
			removeErrorMessage('sponsorCity');
		
		} else {
			addErrorMessage('sponsorCity', 'Make sure your city name has no extra spaces or special symbols.');
			err ++;
		}
		
		//zip code validation
		var zip = document.getElementById('sponsorZip').value;
		var zipPattern = /^\d{5}(?:[-\s]\d{4})?$/;
		
		if (zipPattern.test(zip)) {
			removeErrorMessage('sponsorZip');
		
		} else {
			addErrorMessage('sponsorZip', 'Please input a correct zip code.<br>Examples: 78945, 78945-1234, 12345 7895.');
			err ++;	
		}
		
		//phone number validation
		//num1
		var conPhone = document.getElementById('sponsorPhone').value;
		var conPattern = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/i;
		
			if (conPattern.test(conPhone)) {
				removeErrorMessage('sponsorPhone');	
		
			} else { 
				addErrorMessage('sponsorPhone', 'Invalid phone format.<br>Acceptable formats: 123-456-7890, (123) 456-7890, 123 456 7890, 123.456.7890.');	
				err ++;
			}
		
		
		//email validation
		var email = document.getElementById('sponsorEmail').value;
		var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
		
			if (emailPattern.test(email)) {
				removeErrorMessage('sponsorEmail');
		
			} else {
				addErrorMessage('sponsorEmail', 'Please enter a valid email. Must include @ sign and domain name.<br>Examples: mark28@sbcglobal.net, susie60@gmail.com');
				err ++;
			}
			
		//radio buttons
		var radioDuration = document.getElementsByName('sponsorDuration');
		var count = -1;
			
			for (var i = 0; i < radioDuration.length; i++) {
				if (radioDuration[i].checked) {
					count = i;	
				}
			}
			
			if (count == -1) {
				addErrorMessage('sponsorDuration', 'Please choose at least one length period.');
				err ++;
				
			} else {
				removeErrorMessage('sponsorDuration');
			}
		
		if (err == 0) {
			
			//radio buttons
			var sponsorDuration = "";
			var radioArr = document.getElementsByName('sponsorDuration');
		
				for (i = 0; i < radioArr.length; i++) {
					
					if (radioArr[i].checked) {
						
						sponsorDuration = radioArr[i].value;
						break;
						
					} 
				}
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

<!-- ==================== SPONSOR SECTION ==================== -->

<section class="sponsor_section">
	<h2 class="page_title">Sponsorships</h2>
    	
        <div class="sponsor_wrapper">
            <div class="sponsor_intro_wrapper">
                <h3 class="sponsor_intro_title">Why You Should Sponsor Us</h3>
                    <p class="sponsor_intro_text">By being a sponsor with us, you can help support all of our events or any activities we may have in the future for the duration of your sponsorship. During your sponsorship with us, you can enjoy a wide range of benefits that are listed below.
                    </p>
                    <ul class="sponsor_benefits">
                    	<li>Raise brand awareness for our organization and create preference.</li>
                    	<li>You can build brand positioning through associative imagery.</li>
                    	<li>By sponsoring with us, you may have the opportunity to name an event we may have in the future.</li>
                    	<li>You will be included in any and all newspaper articles, online reports and any other media outlets where we are involved.</li>
                    </ul>
        	</div>
        	
            <div class="sponsor_form_wrapper">
            	<h3 class="sponsor_form_title">Sponsor Form</h3>
                
                <form action="sponsor_add.php" method="post" class="sponsor_form" id="sponsor_form">
                
                	<div class="sponsor_form_split1">
                	
                        <span>
                        	<label for="sponsorFname" id="sponsorFnameLabel"><b>First Name:<span class="asterisk">*</span></b></label><br>
                        </span>
                        	<input type="text" class="sponsor_name" name="sponsor_fname" id="sponsorFname"><br><br>
                        
                        <span>
                        	<label for="sponsorLname" id="sponsorLnameLabel"><b>Last Name:<span class="asterisk">*</span></b></label><br>
                        </span>
                        	<input type="text" class="sponsor_name" name="sponsor_lname" id="sponsorLname"><br><br>
                        
                        <span>	
                            <label for="sponsorBusiness" id="sponsorBusinessLabel"><b>Business Name:</b></label><br>
                        </span>	
                            <input type="text" class="sponsor_business" name="sponsor_business" id="sponsorBusiness"><br><br>
                        
                        <span>
                        	<label for="sponsorAddress" id="sponsorAddressLabel"><b>Address<span class="asterisk">*</span></b></label><br>
                        </span>
                        	<input type="text" class="sponsor_address" name="sponsor_address" id="sponsorAddress"><br><br>
                            
                        <span>	
                            <label for="sponsorCity" id="sponsorCityLabel"><b>City:<span class="asterisk">*</span></b></label><br>
                        </span>	
                            <input type="text" class="sponsor_city" name="sponsor_city" id="sponsorCity"><br><br>
                    
                    </div>
                    
                    <div class="sponsor_form_split2">
                    
                        
                        
                        <span>
                        	<label for="sponsorState" id="sponsorStateLabel"><b>State:<span class="asterisk">*</span></b></label><br>
                        </span>    	
                                <select class="sponsor_state" name="sponsor_state" id="sponsorState">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX" selected>Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select><br><br>
                        
                        <span>
                        	<label for="sponsor_zip" id="sponsorZipLabel"><b>Zip Code:<span class="asterisk">*</span></b></label><br>
                        </span>	
                            <input type="text" maxlength="10" class="sponsor_zip" name="sponsor_zip" id="sponsorZip"><br><br>
                        
                        <span>
                        	<label for="sponsor_phone" id="sponsorPhoneLabel"><b>Phone Number:<span class="asterisk">*</span></b></label><br>
                        </span>
                        	<input type="text" maxlength="15" class="sponsor_num" name="sponsor_phone" id="sponsorPhone"><br><br>
                        
                        <span>
                        	<label for="sponsor_email" id="sponsorEmailLabel"><b>Email Address:<span class="asterisk">*</span></b></label><br>
                        </span>
                        	<input type="email" class="sponsor_email" name="sponsor_email" id="sponsorEmail"><br><br>
                        
                    </div>
                    <div class="clear_float"></div> 
                    
                    <div class="sponsor_question_length">
                    	<span>   
                            <label for="sponsor_length" id="sponsorDurationLabel"><b>How long would you like to sponsor us?<span class="asterisk">*</span></b></label><br><br>
                        </span><br>   
                            <input type="radio" name="sponsorDuration" class="sponsor_length" id="length_months" value="6 Months">6 Months<br>
                            <input type="radio" name="sponsorDuration" class="sponsor_length" id="length_year" value="1 Year">1 Year<br>
                            <input type="radio" name="sponsorDuration" class="sponsor_length" id="length_years" value="2 Years">2 Years<br><br>
                    </div>
                    
                    
                    <input type="submit" class="sponsor_submit" name="sponsor_submit" value="I'll sponsor your organization">
                </form>
            </div>
            

        </div>
</section>


<?php include 'includes/footer.php'?>
</body>
</html>
