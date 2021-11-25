// JavaScript Document
$(document).ready(function() {
	lazy();

	jQuery('.navigation nav').meanmenu();
	jQuery('.navigation-new nav').meanmenu();

	$('.banner-inner').owlCarousel({
  		autoplay: true,
    	loop: true,
    	margin: 0,
    	nav: false,
		dots: true,
		lazyLoad:true,
		items: 1,
		addClassActive: true,
    	transitionStyle : "fade",
  		animateOut: 'fadeOut',
  		animateIn: 'fadeIn'    
	});

 	$('.news-crsl').owlCarousel({
    	loop: false,
    	margin: 10,
    	dots: false,
    	autoplay: false,
    	nav: true,
    	navText: ["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"],
    	responsive:{
			0:{
				items:1
			},
			767:{
				items:2
			},
			1000:{
				items:2
			},
			1200:{
				items:3
			},
			1400:{
				items:4
			},
    	}
	});

	$('.our_team_carousel').owlCarousel({
  		autoplay: true,
    	loop: true,
    	margin: 10,
    	nav: true,
  		dots: false,
  		items: 2,
  		addClassActive: true,
		lazyLoad:true,
  		responsive:{
			0:{
				items:1,
				
			},
			767:{
				items:1,
				
			},
			1000:{
				items:2,            
			},
			1200:{
				items:2,            
			}
		}
	});

	$('.service-inner').owlCarousel({
		loop: true,
		margin: 30,
		dots: true,
		nav: false,
		lazyLoad:true,
		responsiveClass: true,
		responsive: {
			0:{
				items:1,
			},
			600:{
				items:2,
			},
			767:{
				items:2,            
			},
			1200:{
				items:3,            
			},
			1400:{
				items:4,            
			}
		}
	});

	$("li.service a").mouseover(function(event){
  		event.stopPropagation();
  		$(".megamenu").fadeIn();
	});

	$(document).mouseover(function(){
  		$(".megamenu").fadeOut();
	});

	$(".megamenu").mouseover(function(event){   
   		event.stopPropagation();
   		//$(".megamenu").show();
	});

	$('.plus-btn').click(function(){
  		$('.upperheader').slideDown();
  		$(this).hide();
  		$('.minus-btn').css('display', 'block');
	});

	$('.minus-btn').click(function(){
  		$('.upperheader').slideUp();
  		$(this).hide();
  		$('.plus-btn').css('display', 'block');
	});

	$( "#datepicker" ).datepicker({
		changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
			maxDate: '0',
			yearRange: "-100:+0",
	});  
});

/*-------------------------------------LANGUAGE_CHANGE-------------------------------------*/
if($('.tt_language').length){
	$(document).on('click', '.tt_language .tt_lang', function(e){
		//e.preventDefault();
		$(this).parent().toggleClass('opened');
	});

	$('.tt_language .tt_lang_opt').children('li').each(function(){
		$(this).children().on('click', function (){
			var lang  = $(this).attr('data-lang'),
			langF = $(this).find('figure').html();
			$(this).parent().siblings().removeClass('active');
			$(this).parent().addClass('active');

			$(this).parents('ul').siblings('.tt_lang').html('<figure class="flags">' + langF + '</figure>');
			$(this).parents('.tt_language').removeClass('opened');
		});
	});
}

/*-------------------------------------HTML_CLICK------------------------------------*/
$(document).on('click', 'html', function (event) {
	event.stopPropagation();
	if($('.tt_language').length){
	if(event.target.className != 'tt_lang')
		$('.tt_language').removeClass('opened');
	}
});

WOW.prototype.addBox = function(element) {
    this.boxes.push(element);
};

var wow = new WOW();
wow.init();

$('.wow').on('scrollSpy:exit', function() {
	$(this).css({
		'visibility': 'hidden',
		'animation-name': 'none'
	}).removeClass('animated');
	wow.addBox(this);
}).scrollSpy();

equalheight = function(container) {
	var currentTallest = 0,
	currentRowStart = 0,
	rowDivs = new Array(),
	$el,
	topPosition = 0;
	$(container).each(function() {
	$el = $(this);
	$($el).height('auto')
	topPostion = $el.position().top;

		if (currentRowStart != topPostion) {
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
			rowDivs.length = 0; // empty the array
			currentRowStart = topPostion;
			currentTallest = $el.height();
			rowDivs.push($el);
		} else {
			rowDivs.push($el);
			currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		}
		for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			rowDivs[currentDiv].height(currentTallest);
		}
	});
}

$(window).load(function() {
  	equalheight('.zakarbx');
  	equalheight('.same');
  	equalheight('.specbx h3');
  	equalheight('.news_caro');
  	equalheight('.news_caro h5');
});

$(window).resize(function(){
  	equalheight('.zakarbx');
  	equalheight('.same');
  	equalheight('.specbx h3');
  	equalheight('.news_caro');
  	equalheight('.news_caro h5');
});

$(window).scroll(function () {       
	if ($(this).scrollTop() > 200) {
		$('.scrollup').fadeIn();
	} else {
		$('.scrollup').fadeOut();
	}
});

$('.scrollup').click(function () {
	$("html, body").animate({
		scrollTop: 0
    }, 300);
    return false;
});

window.onscroll = function(ev) {
  	if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    	$('.scrollup').addClass('go_to_top');
  	} else{
    	$('.scrollup').removeClass('go_to_top');
  	}
};

$(function() {
  	// This will select everything with the class smoothScroll
  	// This should prevent problems with carousel, scrollspy, etc...
  	$('.smoothScroll').click(function() {
    	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      		var target = $(this.hash);
      		target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      		if (target.length) {
        		$('html,body').animate({
          			scrollTop: target.offset().top
        		}, 1000); // The number here represents the speed of the scroll in milliseconds
        		return false;
      		}
    	}
  	});
});

function lazy(){
    $(".lazy").lazyload({
        effect: 'fadeIn',
        delay: 1000
    });
}

$(document).ready(function() {
    $('.marker-wrapper').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
});

$(window).scroll(function(){
    if ($(window).scrollTop() >= 300) {
        $('header').addClass('fixed-header');
    } else {
        $('header').removeClass('fixed-header');
    }
});