// JavaScript Document

/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/* %%%%%%%%%%%%%%%%%%%% HOME PAGE %%%%%%%%%%%%%%%%%%%% */
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

//#################### NAVIGATION BAR ####################

$(document).ready(main);

var display = 1;

function main() {
	$('.menu_bar').click(function(){
		
		if (display === 1) {
			$('nav').animate({ left: '0' });
			display = 0;	
		
		} else {
			display = 1;
			$('nav').animate({ left: '-100%' });	
		}
	});	
	
	$('.submenu').click(function(){
		$(this).children('.children').slideToggle();	
	});
}

//********** ARROW TOGGLE **********

 $(function(){
    $(".submenu").on("children", function(){
      $(this).find(".arrow").toggleClass("arrow_up");
    });
  });
  
  
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/* %%%%%%%%%%%%%%%%%%%% LOGIN PAGE %%%%%%%%%%%%%%%%%%% */
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

//#################### LOGIN VALIDATION ####################




