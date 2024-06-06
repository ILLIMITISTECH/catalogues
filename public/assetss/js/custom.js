/*global jQuery */
/* Contents
// ------------------------------------------------>
1.  WHOLE SCRIPT STRICT MODE SYNTAX
2.  SMARTMENU
3.  SMART MENU MOBILE MENU TOGGLE BUTTON
4.  OUR TEAM SLIDER
5.  BLOG SLIDER
6.  PATNERS SLIDER
7.  MOBILE TESTIMONIALS SLIDER
8.  MOBILE SLIDER VIEW
9. 	Our Services Slider 
10. Pricing Table  Slider
11. SLIDER FUNCTION
12. SCROLL TO TOP BUTTON
13. DESKTOP TESTIMONIALS SLIDER
14. GOOGLE MAP
15. HEADER STICKY
16. MENU SMOTH SCROLL DWON PAGE
17. VIDEO POPUP
18. COUNTER WIDGETS
19. CONTACT FORM
20. LOADING SCREEEN
*/

(function($) {

	/* WHOLE SCRIPT STRICT MODE SYNTAX */
	"use strict";
	
	/*----------------- SMARTMENU -----------------*/
	$("#main-menu").smartmenus({
		mainMenuSubOffsetX: -1,
		mainMenuSubOffsetY: 4,
		subMenusSubOffsetX: 6,
		subMenusSubOffsetY: -6
	});
	
	/*---------------- SMART MENU MOBILE MENU TOGGLE BUTTON ------------------*/
	var $mainMenuState = $("#main-menu-state");
	if ($mainMenuState.length) {
		// animate mobile menu
		$mainMenuState.on("change", function() {
			var $menu = $("#main-menu");
			if (this.checked) {
				$menu.hide().slideDown(250, function() {
					$menu.css("display", "");
				});
			} else {
				$menu.show().slideUp(250, function() {
					$menu.css("display", "");
				});
			}
		});
		// hide mobile menu beforeunload
		$(window).on("bind", "beforeunload unload", function() {
			if ($mainMenuState[0].checked) {
				$mainMenuState[0].click();
			}
		});
		
			
	}
	
	
	
	/* ------------------ SCROLL TO TOP BUTTON -----------------*/
	var scrollToTop = document.querySelector(".scrollToTop");
	scrollToTop.addEventListener('click', function(e) {
		$("html, body").animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	var last_known_scroll_position = 0;
	var scrollToTop = document.querySelector(".scrollToTop");
	window.addEventListener('scroll', function(e) {
		last_known_scroll_position = window.scrollY;
		if(last_known_scroll_position > 100)
		{
			scrollToTop.classList.add("fadeInScroll");
			scrollToTop.classList.remove("fadeOutScroll");
		}
		else
		{
			scrollToTop.classList.remove("fadeInScroll");
			scrollToTop.classList.add("fadeOutScroll");
		}
	});
	/* ------------------ DESKTOP TESTIMONIALS SLIDER -----------------*/
	$("#cascade-slider").cascadeSlider({});


	/* ------------------ HEADER STICKY -----------------*/
	var last_known_scroll_position = 0;
	var navigation = document.querySelector("header");
	window.addEventListener('scroll', function(e) {
		last_known_scroll_position = window.scrollY;
		if(last_known_scroll_position > 50)
		{
			navigation.classList.add("sticky");
		}
		else
		{
			navigation.classList.remove("sticky");
		}
	});
	
	/* ------------------ MENU SMOTH SCROLL DWON PAGE -----------------*/
	$(".sm-clean a[href^='#']").on("click", function(e) {
		e.preventDefault();
		var target = this.hash;
		var $target = $(target);
		$("html, body").animate({
			"scrollTop": $target.offset().top - 70
		}, 1000, "swing");
	});
	
	/* ------------------ VIDEO POPUP -----------------*/
	$(".youtube-link").grtyoutube({
		autoPlay: true,
		theme: "dark"
	});
	
	/*------------------ COUNTER WIDGETS ---------------*/
	var $myDiv = $("#counter");
	if ($myDiv.length) {
		$(window).on("scroll", function() {
			var a = 0;
			var oTop = $("#counter").offset().top - window.innerHeight;
			if (a == 0 && $(window).scrollTop() > oTop) {
				$(".counter-value").each(function() {
					var $this = $(this),
						countTo = $this.attr("data-count");
					$({
						countNum: $this.text()
					}).animate({
						countNum: countTo
					}, {
						duration: 2000,
						easing: "swing",
						step: function() {
							$this.text(Math.floor(this.countNum));
						},
						complete: function() {
							$this.text(this.countNum);
						}
					});
				});
				a = 1;
			}
		});
	}
	
	/* ------------------ LOADING SCREEEN -----------------*/
	setTimeout(function() {
		$("body").addClass("loaded");
	}, 0);

	
	$(window).on('resize',function(){
		if ($(window).width() > 991) {
			location.reload();
		}
	});

	/*---------------Contact_Form--------------*/

$('#contact_form').submit(function() {
      var form = $(this);
      var formData = $(this).serialize();
     
      $.post('http://netizensstore.com/netbizz_theme/netbizz_HTML/mail.php', formData, function(data) {
        //form.find('.send_mes').val('');
        form.append('<div class="success-msg" style="color:#000; font-weight:bold;">Mail Sent.</div>');
      }).fail(function() {
        //form.find('.required-field').val('');
        form.append('<div class="error-msg" style="color:#000; font-weight:bold;">Error occurred.</div>');
      });

      return false;

  });


/*--------------- slider ---------------*/
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
//Carousels
function carousels(){
  var carousel = $('.carouselslider'),
      options  = {
        itemsCustom : [
          [0, 1],
          [768, 2],
          [992, 3]
        ],
        navigation  : true
      };
  
  carousel.each(function(){
    var $this = $(this);

    if ($this.data('options')){
      options = $this.data('options');
    }

    $this.owlCarousel(options).addClass('loaded');
    
    $(window).on('resize', function(){
      delay(function(){
        bottomNavigation();
      }, 200);
    });

    function bottomNavigation(){
      if (
        ($this.hasClass('bottom-navigation')) && (!$this.find('.owl-pagination .owl-prev').length)
      ){
        $this.find('.owl-pagination').prepend('<a href="#" class="owl-prev"/>');
        $this.find('.owl-pagination').append('<a href="#" class="owl-next"/>');
        
        $this.find('.owl-next').on('click',function (e){
          e.preventDefault();
          
          $this.trigger('owl.next');
        });
        
        $this.find('.owl-prev').on('click',function (e){
          e.preventDefault();
          
          $this.trigger('owl.prev');
        });
      }
    }
    bottomNavigation();
  });
}
carousels();	   
	

$("#main-menu li").click(function () {
    $("#main-menu li").removeClass("active");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).addClass("active");   
});
	
	
}(jQuery));