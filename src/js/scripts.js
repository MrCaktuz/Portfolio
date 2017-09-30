jQuery( document ).ready( function($) {
	// ******** Global variables declaration ********
	var windowWidth = $( window ).width(),
		windowHeight = $( window ).outerHeight(),
		footerHeight = $('.footer').outerHeight();
	// ******** Window resize ********
	$( window ).resize( function(){
		windowWidth = $( window ).width(),
		windowHeight = $( window ).height(),
		footerHeight = $('.footer').height();
	} );

	// ******** Navigation managment ********
	$('.navigation').addClass('navigation-js');
	$('.navigation-button').click(function(e) {
		e.preventDefault();
		$('.navigation').toggleClass('navigation-open');
		$( 'body' ).click( function() {
            $('.navigation-open').removeClass('navigation-open');
          } );
         e.stopPropagation();
	} );

	// ******** Smooth scroll ********
	$('.navigation-link, .section-next, .about-logo-available').click(function() {
        $('.navigation-open').removeClass('navigation-open');
		var $root = $('html, body'),
        	href = $.attr(this, 'href');
        $root.stop().animate({ scrollTop: $(href).offset().top
        }, 500, function () {
            window.location.hash = href;
        });
        return false;
    });

    // ******** Available button ********
    if ( windowWidth > 980 ) {
	    $('.about-logo-wrap').mouseover(function(e) {
			$('.about-logo-available').html('Get in touch');
		} ).mouseleave(function(e){
			$('.about-logo-available').html('Available for work');
		});
	}

	// ******** Manage study cases section height ********
	if ( windowWidth > 980 ) {
		var studyCaseHeight = windowHeight - footerHeight;
	    $('.studyCase').css('min-height', studyCaseHeight);
	}
} );