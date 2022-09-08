jQuery(document).ready(function ($) {
  'use strict';
  console.log('Custom js Loaded Successfully!!!....');
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 50) {
      $('.headernavrow').addClass('fixed-header');
    } else {
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
  jQuery('#primary-menu li.menu-item-has-children').prepend(
    '<span class="mobile-menu-arrow las la-angle-right"></span>'
  );
  jQuery('#primary-menu li .mobile-menu-arrow').click(function () {
    if (jQuery(this).hasClass('la-angle-right')) {
      jQuery('#primary-menu li.menu-item')
        .find('.la-angle-right')
        .removeClass('la-angle-right')
        .addClass('la-angle-right');
      jQuery(this)
        .parents('.sub-menu')
        .find('.la-angle-down')
        .removeClass('la-angle-down')
        .addClass('la-angle-right');
      jQuery('#primary-menu li.menu-item').removeClass('showsubmenu');
      jQuery(this)
        .parents('.sub-menu')
        .find('.menu-item')
        .removeClass('showsubmenu');
      jQuery(this).removeClass('la-angle-right').addClass('la-angle-down');
      jQuery(this).parent('.menu-item').addClass('showsubmenu');
    } else {
      jQuery(this).removeClass('la-angle-down').addClass('la-angle-right');
      jQuery(this).parent('.menu-item').removeClass('showsubmenu');
    }
  });

  jQuery('.mainslider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    dots: true,
    arrows: true,
    customPaging: function (slider, i) {
      var title = $(slider.$slides[i]).data('title');
      return '<a class="title"> ' + title + ' </a>';
    },
  });

  $('.ourteamslider').slick({
    dots: true,
    arrows: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });

  mobileOnlySlider('.home-services', true, false, 767);
  function mobileOnlySlider($slidername, $dots, $arrows, $breakpoint) {
    var slider = $($slidername);
    var settings = {
      mobileFirst: true,
      dots: $dots,
      arrows: $arrows,
      responsive: [
        {
          breakpoint: $breakpoint,
          settings: 'unslick',
        },
      ],
    };

    slider.slick(settings);

    $(window).on('resize', function () {
      if ($(window).width() > $breakpoint) {
        return;
      }
      if (!slider.hasClass('slick-initialized')) {
        return slider.slick(settings);
      }
    });
  }

  $('.publication-slider').slick({
    dots: true,
    arrows: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $('.media-slider').slick({
    dots: true,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $('.client-slider').slick({
    dots: true,
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });

  var $animation_elements = $('.animation');
  var $window = $(window);

  function check_if_in_view() {
    var window_height = $window.height();
    var window_top_position = $window.scrollTop() - 150;
    var window_bottom_position = window_top_position + window_height;

    $.each($animation_elements, function () {
      var $element = $(this);
      var element_height = $element.outerHeight();
      var element_top_position = $element.offset().top;
      var element_bottom_position = element_top_position + element_height;

      //check to see if this current container is within viewport
      if (
        element_bottom_position >= window_top_position &&
        element_top_position <= window_bottom_position
      ) {
        $element.addClass('in-view');
      } else {
        $element.removeClass('in-view');
      }
    });
  }
  $window.on('scroll resize', check_if_in_view);
  $window.trigger('scroll');
  $('#backtotop').click(function () {
    if (
      location.pathname.replace(/^\//, '') ==
        this.pathname.replace(/^\//, '') &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate(
          {
            scrollTop: target.offset().top - 150,
          },
          1000
        );
        return false;
      }
    }
  });

  // jQuery(document).on('click', 'a.myBtn', function () {
  //   var parent = jQuery(this).closest('div.card');
  //   var title = parent.data('title');
  //   var designation = parent.data('designation');
  //   var desc = parent.data('desc');
  //   var image = parent.data('image');
  //   var pos = parent.data('pos');

  //   jQuery('#memberimg').attr('src', image);
  //   jQuery('#membertitle').html(title);
  //   jQuery('#memberdesignation').html(designation);
  //   jQuery('#memberdesc').html(desc);
  //   jQuery('#governorpos').html(pos);
  //   jQuery('#GurnaniModal').show();
  //   setTimeout(function () {
  //     jQuery('#GurnaniModal').addClass('in');
  //   }, 50);
  // });
  // jQuery(document).on('click', '#GurnaniModal button', function () {
  //   jQuery('#GurnaniModal').hide().removeClass('in');
  // });
});
