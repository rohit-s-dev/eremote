
 
$(function() {

    "use strict";// this function is executed in strict mode

	/* ------------------------------------------------------ */
	/*  1. SHRINK HEADER JS
	/* ------------------------------------------------------ */ 
	var shrinkHeader=1;
		$(window).on('scroll', function () {
		var scroll=getCurrentScroll();
			if(scroll>=shrinkHeader){
				$('.navbar').addClass('shrink');
			}
		else{
			$('.navbar').removeClass('shrink');}
	});
	function getCurrentScroll(){
		return window.pageYOffset;
	}
	
	var sections = $('section')
	  , nav = $('nav')
	  , nav_height = nav.outerHeight();
	  
	/**  2. MENU active  JS **/
	$(window).on('scroll', function () {
		var cur_pos = $(this).scrollTop();
		sections.each(function() {
			var top = $(this).offset().top - nav_height,
				bottom = top + $(this).outerHeight();
			if (cur_pos >= top && cur_pos <= bottom) {
				nav.find('a').removeClass('active');
				sections.removeClass('active');
		  
				$(this).addClass('active');
				nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
			}
		});
	});  
	
	/* --------------------------- */
	/*  2. MENU SMOOTH SCROLLING JS
	/* --------------------------- */ 
	$(function() {
		$(document).on('click', 'a[href*="#"]:not([data-toggle="tab"])', function() {
             if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                 var target = $(this.hash);
                 target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                 if (target.length) {
                     $('html, body').animate({
                         scrollTop: target.offset().top
                     }, 1000);
                     return false;
                 }
             }
        });
    }); 
	
	/* --------------------------- */
	/*  3. wow animate JS
	/* --------------------------- */
	new WOW().init();
	
	/* --------------------------- */
	/*  4. YouTube video click box JS
	/* --------------------------- */   
	$('.video-v').magnificPopup({ 
	  type: 'iframe'
	  // other options
	});
	
	/* --------------------------- */
	/*  5. testimon slider JS
	/* --------------------------- */ 
	$('.testimon-slider').owlCarousel({
        items: 2,
        loop:true,
        margin: 30,
        autoplay:true,
        smartSpeed:600,
		dots: false,
		nav:false, 
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			},
			960: {
				items: 2
			},
			1200: {
				items: 2
			},
			1920: {
				items: 2
			}
		}
    });  
	 
	
});
 
$(document).ready(function() {



    var owl = $('.header .owl-carousel'); 
    // Slider owlCarousel
    $('.fullslider').owlCarousel({
        items: 1,
        loop:true,
        margin: 0,
        autoplay:true,
		dots: false,
		smartSpeed:600,
    }); 

    owl.on('changed.owl.carousel', function(event) {
        var item = event.item.index - 2;     
        $('h6').removeClass('animated fadeInLeft');
        $('h1').removeClass('animated fadeInRight'); 
        $('.butn').removeClass('animated zoomIn');
        $('.owl-item').not('.cloned').eq(item).find('.subtitle').addClass('animated fadeInLeft');
        $('.owl-item').not('.cloned').eq(item).find('.title').addClass('animated fadeInRight'); 
        $('.owl-item').not('.cloned').eq(item).find('.butn').addClass('animated zoomIn');
	});
	
	$('.f_s_i').tooltip({
		trigger: 'focus',
		placement: 'auto'
	  });

	  $('.c_w_t_e').click(function(){
		  $('.w_t_e').addClass('h_cw');
	  });

});
	 

// Accordion 
$(document).ready(function(){
	var action = 'click';
	var speed = '500';

	$('li.faq_title').on(action, function(){
		$(this).next().slideToggle(speed).siblings('li.faq_body').slideUp();
		var ic = $(this).children('i');
		$(ic).not(ic).removeClass('rot');
		ic.toggleClass('rot');
	});
});


// Testing Swal
// $(document).ready(function(){
// 	$('.sw_t').on('click', function(){
// 		swal({
// 			title: 'Hello',
// 			icon: 'success'
// 		});
// 	});
// });


// singup sponser id
// $sel =  $('select[name="d_h_s_id"]');
// $sponser_id = $("input[name='sponser_id']");

// if($sel.val('Direct')) {
// 	$sponser_id.val('er00000000');
// }

$(document).ready(function(){
	$('.bs').on('click', function(){
		$(this).animate({
			left: '+=100px'
		}, 300, function(){
			alert('Booking Started');
		});
	});
});



// Sponser ID
$(document).ready(function() {


	$('#d_h_s_id').change(function() {
  
		$sp = $('#d_h_s_id').val();
		$inp = $('#sponser_id');
	
	if ( $sp == 'Sponsered' ) {
		
		$inp.val('Please type your sponsered ID'); 
		
	} else {

		$inp.val('Eremote');

	}

});

});