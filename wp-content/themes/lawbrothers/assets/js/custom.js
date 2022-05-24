jQuery(document).ready(function($) {
	"use strict";
	console.log('Custom js Loaded Successfully!!!....');
	$(".vc_row").wrapInner("<div class='container'></div>");
	$(window).scroll(function(){
		if ($(window).scrollTop() >= 50) {
			$('.headernavrow').addClass('fixed-header');
		}
		else {
			$('.headernavrow').removeClass('fixed-header');
		}
	});
    // Mobile Menu
    jQuery('.menu-toggle').click(function (event) {
        event.preventDefault();
        jQuery('body').toggleClass('mobile-menu-open');
        jQuery('html').toggleClass('no-scroll');
    });
	// Mobile Menu dropdown
	jQuery('#primary-menu li.menu-item-has-children').prepend('<span class="mobile-menu-arrow las la-angle-right"></span>');
	jQuery('#primary-menu li .mobile-menu-arrow').click(function () {
		if (jQuery(this).hasClass("la-angle-right")) {
			jQuery("#primary-menu li.menu-item").find(".la-angle-right").removeClass("la-angle-right").addClass('la-angle-right');
			jQuery(this).parents(".sub-menu").find(".la-angle-down").removeClass("la-angle-down").addClass('la-angle-right');
			jQuery("#primary-menu li.menu-item").removeClass("showsubmenu");
			jQuery(this).parents(".sub-menu").find(".menu-item").removeClass("showsubmenu");
			jQuery(this).removeClass("la-angle-right").addClass('la-angle-down');
			jQuery(this).parent(".menu-item").addClass("showsubmenu");
		} else {
			jQuery(this).removeClass("la-angle-down").addClass('la-angle-right');
			jQuery(this).parent(".menu-item").removeClass("showsubmenu");
		}
	})

	$('.mainslider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: false,
		dots:  false,
		arrows: false,
		autoplaySpeed: 5000,
	});
	$('.google_review').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		dots:  true,
		arrows: true,
		autoplaySpeed: 5000,
	});
	$('.our-highest-slider').slick({
		slidesToShow:5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		responsive: [
			{
			  breakpoint: 1160,
			  settings: {
				arrows: false,
				autoplay: true,
				slidesToShow:3,
				slidesToScroll: 1,
				infinite: true,
				dots: false,
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				arrows: false,
				autoplay: true,
				slidesToShow:1,
				slidesToScroll: 1,
				infinite: true,
				dots: false,
			  }
			}

		]
	});
	$('.ourclients').slick({
		dots:  false,
		arrows: false,
		slidesToShow:5,
		slidesToScroll:1,
		autoplay: true,
		autoplaySpeed: 2000,
		adaptiveHeight: true,
		rows:3,
		responsive: [
		  {
			breakpoint: 1024,
			settings: {
			  arrows: true,
			  slidesToShow:3,
			  slidesToScroll: 1,
			  infinite: true,
			  dots: false,
			}
		  },
		  {
			breakpoint: 600,
			settings: {
			  slidesToShow:2,
			  slidesToScroll: 1,
			  arrows: false,
			  dots: false
			}
		  },
		  {
			breakpoint: 480,
			settings: {
			  slidesToShow:2,
			  slidesToScroll: 1,
			  rows:3,
			  autoplaySpeed: 2000,
			  autoplay: true,

			}
		  }
		  
		]
	  });
	$('.testimonialslider').slick({
		slidesToShow:3,
		slidesToScroll: 1,
		arrows: false,
		dots: false,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
		  {
			breakpoint: 1024,
			settings: {
			  arrows: true,
			  slidesToShow:2,
			  slidesToScroll: 1,
			  infinite: true,
			  dots: false,
			}
		  },
		  {
			breakpoint: 600,
			settings: {
			  slidesToShow:1,
			  slidesToScroll: 1,
			  arrows: false,
			  dots: false
			}
		  },
		  {
			breakpoint: 480,
			settings: {
			  slidesToShow:1,
			  slidesToScroll: 1,

			}
		  }
		  
		]
	});

	var $animation_elements = $('.animation');
	var $window = $(window);

	function check_if_in_view() {
		var window_height = $window.height();
		var window_top_position = $window.scrollTop() - 150;
		var window_bottom_position = (window_top_position + window_height);

		$.each($animation_elements, function () {
			var $element = $(this);
			var element_height = $element.outerHeight();
			var element_top_position = $element.offset().top;
			var element_bottom_position = (element_top_position + element_height);

			//check to see if this current container is within viewport
			if ((element_bottom_position >= window_top_position) &&
				(element_top_position <= window_bottom_position)) {
				$element.addClass('in-view');
			} else {
				$element.removeClass('in-view');
			}
		});
	}
	$window.on('scroll resize', check_if_in_view);
	// $window.trigger('scroll');
	// $('a[href*="#"]:not([href="#"])').click(function () {
	// 	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
	// 		var target = $(this.hash);
	// 		target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	// 		if (target.length) {
	// 			$('html, body').animate({
	// 				scrollTop: target.offset().top - 150
	// 			}, 1000);
	// 			return false;
	// 		}
	// 	}
	// });
});