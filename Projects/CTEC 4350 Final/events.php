<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Events | Morningside</title>
<?php include 'includes/head.php'?>
<?php include 'includes/header_and_nav.php'?>    

<!-- ==================== EVENTS SECTION ==================== -->

<section class="events_page">
	<h2 class="page_title">Events</h2>
    
    <div class="event_wrapper">
		<h3 class="event_intro_title">Click below to see our past, present, and future events</h3>
        	<ul class="event_nav">
            	<li id="event1"><a href="#">Past Events</a></li>
            	<li id="event2"><a href="#">Current Events</a></li>
            	<li id="event3"><a href="#">Future Events</a></li>
            	<li id="event4"><a href="#">Show All Events</a></li>
            </ul>
            
            <div id="event4text">
                <div id="event1text">
                	<div class="event_wrap">
                        <h4 class="event_title">Thanksgiving dinner</h4>            
                        
                        <p class="event_text_date"><b>When: November 2015</b></p>
                        
                        <p class="event_text">We always try to give to needy families. In 
                        this past event, we were able to help out and give 20 families
                        something to eat for Thanksgiving in the Morningside Community.
                        </p>
                	</div>
                    
                    <div class="event_wrap">
                        <h4 class="event_title">Christmas</h4>            
                        
                        <p class="event_text_date"><b>When: December 2015</b></p>
                        
                        <p class="event_text">We were able to meet with over 70 seniors
                        at the Senior Care Health & Rehabilitation Center in Dallas. Once
                        there, we delivered presents so all the seniors could have the
                        Christmas they deserved.
                        </p> 
                    </div>
                </div>
                
                <div id="event2text">
                	<div class="event_wrap">
                        <h4 class="event_title">Donation Drive</h4>            
                        
                        <p class="event_text_date"><b>When: May 2016</b></p>
                        
                        <p class="event_text">We are calling all small businesses to 
                        come help out this May for a donation drive we are having. The
                        drive is for HIV / AIDS outreach. All proceeds will go to help
                        those in the community battle against HIV / AIDS.
                        </p> 
                        
                        <p class="event_text_signup"><a href="volunteer.php" target="_blank">Sign me up for this event.</a></p>
    				</div>
                    
                    <div class="event_wrap">
                        <h4 class="event_title">Gritz & Gogo</h4>            
    
                        <p class="event_text_date"><b>When: May 2016</b></p>
                        
                        <p class="event_text">On May 29th, Memorial Day, come join us in Dallas. We will take part in the memorial day celebration featuring RC &amp; The Gritz Live. Shortly after, Shaun Martin &amp; The GoGo Band will play live. Afterwards, DJ Phyfe will be in the mix. There will be private cabanas, an outside projector, drink specials, and bbq available.
                        </p> 
                        
                        <p class="event_text_signup"><a href="volunteer.php" target="_blank">Sign me up for this event.</a></p>
    				</div>
                </div>
                
                <div id="event3text">
                	<div class="event_wrap">
                        <h4 class="event_title">HIV Awareness Rally</h4>            
                        
                        <p class="event_text_date"><b>When: June 2016</b></p>
                        
                        <p class="event_text">Come join us in our fight against HIV / AIDS. We will be conducting a rally in the Dallas area to let people be more aware of this disease. There will be a place for everyone to participate in this rally. 
                        </p> 
                        
                        <p class="event_text_signup"><a href="volunteer.php" target="_blank">Sign me up for this event.</a></p>
                    </div>
                    
                    <div class="event_wrap">
                        <h4 class="event_title">AT&amp;T Meet & Greet Fundraiser</h4>            
                        
                        <p class="event_text_date"><b>When: TBD</b></p>
                        
                        <p class="event_text">Come visit us at our ATT Meet and Greet Fundraiser. This fundraiser will be sponsored by ATT. There will be food, drinks, and more. Right now we are still working on a place and location. Once we get more info, we will let everyone know and put it here on the website.
                        </p> 
                        
                        <p class="event_text_signup"><a href="volunteer.php" target="_blank">Sign me up for this event.</a></p>
                    </div>
                    
                    <div class="event_wrap">
                        <h4 class="event_title">Annual Golf Tournament Fundraiser</h4>            
                        
                        <p class="event_text_date"><b>When: September 2016</b></p>
                        
                        <p class="event_text">As of right now, we have a golf tournament coming up. We will put this on the volunteer list in the next few months, so keep an eye out for it. We are still working the logistics and planning, but we are excited to get this project underway. There may even be a chance to win a new car!!
                        </p> 
                  	</div>  
                    
                    <div class="event_wrap">
                        <h4 class="event_title">Seventies Party</h4>            
                        
                        <p class="event_text_date"><b>When: October 2016</b></p>
                        
                        <p class="event_text">If you've ever felt like re-living the 70's, get ready because we have a party for it. And your invited... if you sign up that is. We are currently still in the planning phase with this project but as soon as we know something, you will too. Get ready to party!!
                        </p> 
     				</div>
                    
                </div>
            </div>
    </div>
</section>


<?php include 'includes/footer.php'?>
</body>
<script>
function init () {
	document.getElementById('event1').onclick = function(){showEvent(1)};
	document.getElementById('event2').onclick = function(){showEvent(2)};
	document.getElementById('event3').onclick = function(){showEvent(3)};
	document.getElementById('event4').onclick = function(){showEvent(4)};
}

function showEvent (picked) {
	if (picked == 4) {
		var showHide = "block";
	} else {
		var showHide = "none";	
	}
	
	for (var i=1; i <= 3; i++) {
		document.getElementById('event'+i+'text').style.display = showHide;	
	}
	
	
	
	document.getElementById('event'+picked+'text').style.display = "block";
}

window.onload = init;
</script>
</html>
