<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Volunteer | Morningside</title>
<?php include 'includes/head.php'?>
<?php include 'includes/header_and_nav.php'?>
<script>

  	//use initialize function to hold elements
	function init(){
		document.getElementById('volForm').onsubmit = process;
		document.getElementsByName("event[]")[0].onclick = showInfo; 
		document.getElementsByName("event[]")[1].onclick = showInfo;
		document.getElementsByName("event[]")[2].onclick = showInfo; 
		document.getElementsByName("event[]")[3].onclick = showInfo; 
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
		
		//first name validation
		var fname = document.getElementById('volFname').value;
		var fnamePattern = /^[A-Za-z]+$/i;
		
			if (fnamePattern.test(fname)) {
				removeErrorMessage('volFname');	
		
			} else {
				addErrorMessage('volFname', 'Make sure your first name has no spaces or symbols.');
				err ++;
			}
		
		//last name validation
		var lname = document.getElementById('volLname').value;
		var lnamePattern = /^[A-Za-z]+$/i;
		
			if (lnamePattern.test(lname)) {
				removeErrorMessage('volLname');	
		
			} else {
				addErrorMessage('volLname', 'Make sure your last name has no spaces or symbols.');	
				err ++;
			}
		
		//phone number validation
		//num1
		var phone = document.getElementById('volPhone').value;
		var phonePattern = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/i;
		
			if (phonePattern.test(phone)) {
				removeErrorMessage('volPhone');	
		
			} else { 
				addErrorMessage('volPhone', 'Invalid phone format.<br>Acceptable formats: 123-456-7890, (123) 456-7890, 123 456 7890, 123.456.7890.');	
				err ++;
			}
		
		//email validation
		var email = document.getElementById('volEmail').value;
		var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
		
		if (emailPattern.test(email)) {
			removeErrorMessage('volEmail');
		
		} else {
			addErrorMessage('volEmail', 'Please enter a valid email. Must include @ sign and domain name.<br>Examples: mark28@sbcglobal.net, susie60@gmail.com');
			err ++;
		}
		
		//checkbox day validation
		var day = document.getElementsByName('day[]');
		var count = -1;
		
			for (var i = 0; i < day.length; i++) {
				if (day[i].checked) {
					count = i;	
				}
			}
			
			if (count == -1) {
				addErrorMessage('volDay', 'You must select at least one day below.');
				err ++;
			
			} else {
				removeErrorMessage('volDay');
			}
		
		//checkbox event validation
		var events = document.getElementsByName('event[]');
		var count = -1;
		
			for (var i = 0; i < events.length; i++) {
				if (events[i].checked) {
					count = i;	
				}
			}
			
			if (count == -1) {
				addErrorMessage('volEvent', 'You must select at least one event below.');
				err ++;
			
			} else {
				removeErrorMessage('volEvent');
			}			
		
		//all data is valid
		if (err == 0) {
			
		//checkbox day button	
		var dayList = []; // an empty array ready to store skill picks
		var checkboxArr = document.getElementsByName('day[]');
			
			// loop through all checkboxes
			for (i = 0; i < checkboxArr.length; i++) {
				
				// for each checkbox, see if it is checked
				if (checkboxArr[i].checked) {
					
					// add ('push') the value of this checked checkbox into the skillList array
					dayList.push(checkboxArr[i].value);
				} 
			}
			
		//checkbox event button	
		var eventList = []; // an empty array ready to store skill picks
		var checkboxArray = document.getElementsByName('event[]');
			
			// loop through all checkboxes
			for (i = 0; i < checkboxArray.length; i++) {
				
				// for each checkbox, see if it is checked
				if (checkboxArray[i].checked) {
					
					// add ('push') the value of this checked checkbox into the skillList array
					eventList.push(checkboxArray[i].value);
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
			
		  document.getElementById('volFname').disabled = false;	
		  document.getElementById('volLname').disabled = false;	
		  document.getElementById('volEmail').disabled = false;	
		}
	}
	
	//insert ajax information start
	
	//create variable
	
	var xmlHttp;
	
	function showInfo() {
		
		// set up the xmlHttpRequest object
		xmlHttp = GetXmlHttpObject();
		if (xmlHttp == null)
		  {
			  alert ("Your browser does not support AJAX!");// how to ensure users can still use the application?
			  return;
		  }
		  
		  // variable to store the user choice
		  //var eventChoice = this.value;
		  
		  
		  //get user input
		  eventOption = document.getElementsByName('event[]');
		  var eventChoice = new Array();
		  
		  for (i=0; i < eventOption.length; i++) {
				//loop through the options 
			if (eventOption[i].checked) {
				//return element
				eventChoice.push(eventOption[i].value);
			}
			
		  }

		var url="event_data.xml";

		xmlHttp.onreadystatechange=function(){stateChanged(eventChoice)};
		xmlHttp.open("GET",url,true);
		xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlHttp.send();
	}
	
	function stateChanged(e) { 
		if (xmlHttp.readyState==4) { 
			 //console.log ("e:"+e);
			 // get the request result as an XML document
			 xmlDoc=xmlHttp.responseXML;

			// set the variable to store HTML output
			var output = "";
			
			// store all elements in an array
			var eventArr = xmlDoc.getElementsByTagName("event");
			var eventTypeArr = xmlDoc.getElementsByTagName("eventType");
			//var descArr = xmlDoc.getElementsByTagName("desc");

			// loop through all "organization" elements in the XML document
			 for (i=0; i<eventArr.length ;i++) {
				 
				 eventValue = eventArr[i].childNodes[0].nodeValue;
				//descValue = descArr[i].childNodes[0].nodeValue;
				 
				 //console.log('  '+i+ ' eventValue: '+eventValue);
				 				 
				if (e.indexOf(eventValue) >= 0) {
				 
				// for each matching record, acquire all the desc tags 
				   var descArr = eventTypeArr[i].getElementsByTagName('desc');
				   var descList = "";
				   
				   for (j=0; j<descArr.length; j++){
					   
					   descList += "<li>" + descArr[j].childNodes[0].nodeValue + "</li>";
					   }
					   
				    descList = "<ul>" + descList + "</ul><br>";
				
				// put value inside a list item
				    	
					output = output + "<li>" + eventValue + ":" + descList + "</li>";
				 }
			 }
			 
			 //we only want 1 div and ul to be printed so put the data outside the "for" loop.
			 output = "<div class='eventData'><ul>" + output + "</ul></div>";
			 
			 
			 // print out the HTML output in the specified div
			 document.getElementById("details").innerHTML= output;
		}
	}

	function GetXmlHttpObject(){
		var xmlHttp=null;
		if (window.XMLHttpRequest) {
			xmlHttp = new window.XMLHttpRequest();// for non-IE browser
		} else if (window.ActiveXObject) {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); // for IE
		}
		return xmlHttp;
	}
	
	window.onload = init;
  </script>

<!-- ==================== VOLUNTEER SECTION ==================== -->
<section class="volunteer_page">
	<h2 class="page_title">Volunteering</h2>
    
    
    <div class="volunteer_wrapper">
        <div class="volunteer_intro_wrapper">
            <h3 class="volunteer_intro_title">What It Means To Volunteer With Us</h3>
                <p class="volunteer_intro_text">At MCDA we accept volunteers from all 
                walks who will donate their time and effort to promote the welfare of 
                Morningside Community. We work to make sure that the skills and talents 
                of our volunteers are utilized well and that their time spent with MCDA 
                is both productive and personally gratifying. 
                </p>
                
                <p class="volunteer_intro_text">Activities will be posted and further 
                notice will be provided as scheduled. Some activities, especially those 
                related to community events will, occur on evenings and weekends. 
                </p>
                
                <p class="volunteer_intro_text">For more information about volunteer 
                opportunities, please provide the information requested to create your 
                profile, be prepared to fill out the Consent for Criminal Background Inquiry 
                form, and sign up for an upcoming New Volunteer Orientation. 
                </p>
                
                <p class="volunteer_intro_text">For court mandated Community Services hours 
                contact Burleigh C Foreman at 972-780-0303 or 
                <a href="mailto:morningsideCDA@gmail.com.">morningsideCDA@gmail.com</a>
                </p>
                
                <div class="volunteer_form_wrapper">
                	<h3 class="volunteer_form_title">Volunteer Form</h3>
                
                	<form action="vol_add.php" method="post" class="volunteer_form" id="volForm">
                	    <input type='hidden' name='user_id' value='<?=$_SESSION['user_id']?>'>
                        <span>
                        	<label for="volFname" id="volFnameLabel"><b>First Name:<span class="asterisk">*</span></b></label><br>
                        </span>	
                            <input type="text" class="volunteer_name" id="volFname" name="vol_fname" value='<?=$fname?>' <?=$fname_disabled?>><br><br>
                        
                        <span>
                        	<label for="volLname" id="volLnameLabel"><b>Last Name:<span class="asterisk">*</span></b></label><br>
                        </span>
                        	<input type="text" class="volunteer_name" id="volLname" name="vol_lname" value='<?=$lname?>' <?=$lname_disabled?>><br><br>
                        
                        <span>
                        	<label for="volPhone" id="volPhoneLabel"><b>Phone Number:<span class="asterisk">*</span></b></label><br>
                        </span>
                        	<input type="text" maxlength="15" class="volunteer_num" id="volPhone" name="vol_phone" ><br><br>
                        
                        <span>
                        	<label for="volEmail" id="volEmailLabel"><b>Email Address:<span class="asterisk">*</span></b></label><br>
                        </span>	
                            <input type="email" name="vol_email" class="volunteer_email" id="volEmail" value='<?=$email?>' <?=$email_disabled?>><br><br>
                        
                        <span>
                            <label for="day" id="volDayLabel"><b>What days can you volunteer?<span class="asterisk">*</span></b></label><br>
                        </span><br>   
                            <input type="checkbox" class="volunteer_day" value="Sunday" name="day[]" id="day_sunday"><label for="day_sunday">Sunday</label><br>
                            <input type="checkbox" class="volunteer_day" value="Monday" name="day[]" id="day_monday"><label for="day_monday">Monday</label><br>
                            <input type="checkbox" class="volunteer_day" value="Tuesday" name="day[]" id="day_tuesday"><label for="day_tuesday">Tuesday</label><br>
                            <input type="checkbox" class="volunteer_day" value="Wednesday" name="day[]" id="day_wednesday"><label for="day_wednesday">Wednesday</label><br>
                            <input type="checkbox" class="volunteer_day" value="Thursday" name="day[]" id="day_thursday"><label for="day_thursday">Thursday</label><br>
                            <input type="checkbox" class="volunteer_day" value="Friday" name="day[]" id="day_friday"><label for="day_friday">Friday</label><br>
                            <input type="checkbox" class="volunteer_day" value="Saturday" name="day[]" id="day_saturday"><label for="day_saturday">Saturday</label><br><br>
                        
                        <span>
                            <label for="event" id="volEventLabel"><b>What events can you help with?<span class="asterisk">*</span></b></label><br>
                        </span><br>    
                            <input type="checkbox" class="volunteer_event" name="event[]" value="Donation Drive" id="event_drive"><label for="event_drive" id='event_drive_label'>Donation Drive</label><br>
                            <input type="checkbox" class="volunteer_event" name="event[]" value="Gritz & Gogo" id="event_gritz"><label for="event_gritz">Gritz &amp; Gogo</label><br>
                            <input type="checkbox" class="volunteer_event" name="event[]" value="HIV Awareness Rally" id="event_hiv"><label for="event_hiv">HIV Awareness Rally</label><br>
                            <input type="checkbox" class="volunteer_event" name="event[]" value="AT&T Meet N Greet" id="event_att"><label for="event_att">AT&amp;T Meet and Greet Fundraiser</label><br>
                            <div id="details"></div>
                        
                     	<input type="submit" class="volunteer_submit" name="volSubmit" value="Sign Me Up">
                    </div>
                </form>
                
                </div>    
                
                <div class="clear_float"></div>     
        </div>
    </div>
</section>

<?php include 'includes/footer.php'?>
</body>
</html>
