<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Donate | Morningside</title>
<?php include 'includes/head.php'?>
<?php include 'includes/header_and_nav.php'?>


<!-- ==================== DONATE SECTION ==================== -->
   
<section class="donation_page">
	<h2 class="page_title">Donations</h2>
	<div class="donate_section">
    <div class="donation_intro">
    	<p class="donate_intro_text">
        	No person deserves to have HIV / AIDS. Your donation
            will go to help prevent these diseases. With your
            help, we can further research to help fight HIV / AIDS.
            Thank you for your donation.
        </p>
    </div>
    
    <div class="donate_wrapper">
    	<form action="donate_add.php" method="post" class="donate_form" id="donate_form">
        	<h3 class="donate_title">Donation Form</h3>
            
            <div class="donate_info_wrap">
            <input type='hidden' name='user_id' value='<?=$_SESSION['user_id']?>'>
        	<label><h4 class="donate_info_title">Your Information</h4></label>
            	
                <span>
            		<label for="donate_fname" id="donateFnameLabel"><b>First Name:<span class="asterisk">*</span></b></label><br> 
                </span>
                	<input type="text" class="donate_name" name="donate_fname" id="donateFname" value='<?=$fname?>' <?=$fname_disabled?>><br><br>
                
                <span>	
                    <label for="donate_lname" id="donateLnameLabel"><b>Last Name:<span class="asterisk">*</span></b></label><br> 
                </span>	
                    <input type="text" class="donate_name" name="donate_lname" id="donateLname" value='<?=$lname?>' <?=$lname_disabled?>><br><br>
                
                <span>
                	<label for="donate_address" id="donateAddressLabel"><b>Address:<span class="asterisk">*</span></b></label><br> 
                </span>	
                    <input type="text" class="donate_address" name="donate_address" id="donateAddress"><br><br>
                
                <span>
                    <label for="donate_city" id="donateCityLabel"><b>City:<span class="asterisk">*</span></b></label><br>
                </span>	
                    <input type="text" class="donate_address" name="donate_city" id="donateCity"><br><br>
                
                <span>
                	<label for="donate_state" id="donateStateLabel"><b>State:<span class="asterisk">*</span></b></label><br>
                </span>
                	<select class="donate_state" name="donate_state" id="donateState">
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
                	<label for="donate_zip" id="donateZipLabel"><b>Zip Code:<span class="asterisk">*</span></b></label><br>
                </span>	
                    <input type="text" maxlength="10" class="donate_zip" name="donate_zip" id="donateZip"><br><br>
                
                <span>	
                    <label for="donate_type" id="donateTypeLabel"><h4 class="donate_bus_ind"><b>Choose an option below<span class="asterisk">*</span></b></h4></label>
                </span><br>
                	<input type="radio" class="donation_type" value="From A Company" name="donate_type" id="donateCompany"><label for="donateCompany">From A Company</label><br>
                	<input type="radio" class="donation_type" value="From A Business" name="donate_type" id="donateBusiness"><label for="donateBusiness">From A Business</label><br>
                	<input type="radio" class="donation_type" value="From A Corporation" name="donate_type" id="donateCorporation"><label for="donateCorporation">From A Corporation</label><br>
                	<input type="radio" class="donation_type" value="From An Organization" name="donate_type" id="donateOrganization"><label for="donateOrganization">From An Organization</label><br>
                	<input type="radio" class="donation_type" value="From An Individual" name="donate_type" id="donateIndividual"><label for="donateIndividual">From An Individual</label><br><br>
                    
            </div>
            
            <div class="donate_payment_wrap">
                
            <label><h4 class="donate_info_title">Payment Information</h4></label>
            
            	<span>
                	<label for="donate_amount" id="donateAmountLabel"><b>Donation Amount:<span class="asterisk">*</span></b></label><br>
                </span>	
                    <input type="text" class="donation_amount" placeholder="Example: $10.50" name="donate_amount" id="donateAmount"><br><br>
                
                <span>
                	<label for="donate_duration" id="donateDurationLabel"><b>Will this be a one-time or recurring donation?<span class="asterisk">*</span></b></label><br><br>
                </span><br>
                	<input type="radio" class="donate_duration" name="donate_duration" value="One Time" id="donateOne"><label for="donateOne">One Time</label><br>
                	<input type="radio" class="donate_duration" name="donate_duration" value="Recurring" id="donateRecurring"><label for="donateRecurring">Recurring</label><br><br>
                
                 <span>   
                    <label for="donate_recur" id="donateRecurLabel"><b>Choose recurring method<span class="asterisk">*</span></b><br>For recurring method, you will need to <a href="register.php">Register</a><br><br></label>
                 </span><br>  
                 	<input type="radio" name="donate_recur" class="donate_method" value="None" id="donateNone"><label for="donateNone">None</label><br>
                    <input type="radio" name="donate_recur" class="donate_method" value="Monthly" id="donateMonthly"><label for="donateMonthly">Monthly</label><br>
                    <input type="radio" name="donate_recur" class="donate_method" value="6 Months" id="donateSemi"><label for="donateSemi">Every 6 Months</label><br>
                    <input type="radio" name="donate_recur" class="donate_method" value="Yearly" id="donateYear"><label for="donateYear">Yearly</label><br><br>
                                
                <span>
                	<label for="donate_credit" id="donateCardLabel"><b>Card Number:<span class="asterisk">*</span></b> (for illustration only)</label><br>
                </span>	
                    <input type="text" class="donate_card" name="donate_card" id="donateCard" value="1111 2222 3333 4444" disabled><br><br>
                
                <span>
                	<label for="donate_exp" id="donateExpLabel"><b>Expiration:<span class="asterisk">*</span></b></label><br>
                </span>    
                    <select class="donate_month" name="donate_exp_month" id="donateExpMonth" required>
                        <option value="jan">January</option>
                        <option value="feb">February</option>
                        <option value="mar">March</option>
                        <option value="apr">April</option>
                        <option value="may" selected>May</option>
                        <option value="jun">June</option>
                        <option value="jul">July</option>
                        <option value="aug">August</option>
                        <option value="sep">September</option>
                        <option value="oct">October</option>
                        <option value="nov">November</option>
                        <option value="dec">December</option>
                    </select>
                
                    <select class="donate_year" name="donate_exp_year" id="donateExpYear" required>
                        <option value="2016" selected>2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>                
                    </select><br><br>
            </div>
            <div class="clear_float"></div>
            <input type="submit" class="donate_submit" value="Submit my donation" name="donate_submit">
        </form>
    </div>
	</div>    
<div class="clear_float"></div>
</section>


<?php include 'includes/footer.php'?>
</body>
<script>
function init () {
	document.getElementById('donate_form').onsubmit = process;	
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

function process(evt) {

var err = 0;
		
	//first name validation
	var fname = document.getElementById('donateFname').value;
	var fnamePattern = /^[A-Za-z]+$/i;
	
		if (fnamePattern.test(fname)) {
			removeErrorMessage('donateFname');	
	
		} else {
			addErrorMessage('donateFname', 'Make sure your first name has no spaces or symbols.');
			err ++;
		}
	
	//last name validation
	var lname = document.getElementById('donateLname').value;
	var lnamePattern = /^[A-Za-z]+$/i;
	
		if (lnamePattern.test(lname)) {
			removeErrorMessage('donateLname');	
	
		} else {
			addErrorMessage('donateLname', 'Make sure your last name has no spaces or symbols.');	
			err ++;
		}
		
	//address validation
	var address = document.getElementById('donateAddress').value;
	var addressPattern = /[A-Za-z0-9'\.\-\s\,]/i;
		
		if (addressPattern.test(address)) {
			removeErrorMessage('donateAddress');
			
		} else {
			addErrorMessage('donateAddress', 'Please input a valid address. Make sure it has no extra spaces or no special symbols.');
			err ++;
		}
		
	//city validation
	var city = document.getElementById('donateCity').value;
	var cityPattern = /[A-Za-z0-9'\.\-\s\,]/i;
	
		if (cityPattern.test(city)) {
			removeErrorMessage('donateCity');
		
		} else {
			addErrorMessage('donateCity', 'Make sure your city name has no extra spaces or special symbols.');
			err ++;
		}
	
	//zip code validation
	var zip = document.getElementById('donateZip').value;
	var zipPattern = /^\d{5}(?:[-\s]\d{4})?$/;
	
		if (zipPattern.test(zip)) {
			removeErrorMessage('donateZip');
		
		} else {
			addErrorMessage('donateZip', 'Please input a correct zip code.<br>Examples: 78945, 78945-1234, 12345 7895.');
			err ++;	
		}
	
	//donation amount validation
	var dAmount = document.getElementById('donateAmount').value;
	var dAmountPattern = /^\$?([0-9]{1,3},([0-9]{3},)*[0-9]{3}|[0-9]+)(\.[0-9][0-9])?$/i;
	
		if (dAmountPattern.test(dAmount)) {
			removeErrorMessage('donateAmount');
		
		} else {
			addErrorMessage('donateAmount', 'Make sure you enter a U.S. currency format.<br>Examples: $10.00, $0.50, $1045.85 etc.');
			err ++;	
		}
	
	//credit card number validation
	var card = document.getElementById('donateCard').value;
	var cardPattern = /^(\d{4}-){3}\d{4}$|^(\d{4} ){3}\d{4}$|^\d{16}$/i;
	
		if (cardPattern.test(card)) {
			removeErrorMessage('donateCard');
		
		} else {
			addErrorMessage('donateCard', 'Make sure you have 16 digits with either spaces, dashes or nothing in between them.<br>Examples: 1111222233334444, 1111 2222 3333 4444, 1111-2222-3333-4444.');
			err ++;
		}
	
	
	/*
	//credit card month and year validation
	var cardMonth = document.getElementById('donateExpMonth').value;
	var cardYear = document.getElementById('donateExpYear').value;
	
		if (cardMonth == "month" || cardYear == "year") {
			
			if (cardMonth.value == "jan", "feb", "mar", "apr" && cardYear.value == 2016) {
				addErrorMessage('donateExp', 'Your card is expired, please enter another card.');
				
			} else {
				addErrorMessage('donateExp', 'Please select a month and year.');
			}
			
		} else {
			removeErrorMessage('donateExp');
			err ++;	
		}
		
	*/
		
	
	//radio button validation
	
	//business, individual validation
	var donateType = document.getElementsByName('donate_type');
	var count = -1;
		
		for (var i = 0; i < donateType.length; i++) {
			if (donateType[i].checked) {
				count = i;	
			}
		}
		
		if (count == -1) {
			addErrorMessage('donateType', 'Please choose at least one donation type.');
			err ++;
			
		} else {
			removeErrorMessage('donateType');
		}
		
	//donate duration validation
	var donateDuration = document.getElementsByName('donate_duration');
	
		for (i=0; i < donateDuration.length; i++) {
			if (donateDuration[i].checked) {
				count = i;	
			}
		}
		
		if (count == -1) {
			addErrorMessage('donateDuration', 'Please choose at least one donation duration.');
			err ++;
		
		} else {
			removeErrorMessage('donateDuration');
		}
		
	//donate recur validation
	var donateRecur = document.getElementsByName('donate_recur');
	
		for (i=0; i < donateRecur.length; i++) {
			if (donateRecur[i].checked || donateRecur[i] == "") {
				count = i;	
			}
		}
		
		if (count == -1) {
			addErrorMessage('donateRecur', 'Please choose at least one donation recurring method.');
			err ++;
		
		} else {
			removeErrorMessage('donateRecur');
		}
	
	//if radio buttons are correct, run through 2nd validation to make sure data is not empty.	
	if (err == 0) {
		
	//radio buttons
	//business, individual validation
	var donationType = "";
	var radioArr1 = document.getElementsByName('donate_type');

		for (i = 0; i < radioArr1.length; i++) {
			
			if (radioArr1[i].checked) {
				
				donationType = radioArr1[i].value;
				break;
			} 
		}
	
	//donate duration validation	
	var donationDuration = "";
	var radioArr2 = document.getElementsByName('donate_duration');

		for (i = 0; i < radioArr2.length; i++) {
			
			if (radioArr2[i].checked) {
				
				donationDuration = radioArr2[i].value;
				break;
			} 
		}
		
	//donate recur validation	
	var donationRecur = "";
	var radioArr3 = document.getElementsByName('donate_recur');

		for (i = 0; i < radioArr3.length; i++) {
			
			if (radioArr3[i].checked || radioArr3[i] == "") {
				
				donationRecur = radioArr3[i].value;
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
	} else {
	   document.getElementById('donateCard').disabled = false;	
	   document.getElementById('donateFname').disabled = false;
	   document.getElementById('donateLname').disabled = false;
	}
}

window.onload = init;
</script>
</html>
