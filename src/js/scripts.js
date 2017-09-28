jQuery( document ).ready( function($) {
	// ******** Global variables declaration ********
	var windowWidth = $( window ).width();
	var windowHeight = $( window ).height();
	console.log("Height => " + windowHeight);
	// ******** Window resize ********
	$( window ).resize( function(){
		windowWidth = $( window ).width();
		windowHeight = $( window ).height();
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

	// ******** Set section's min-height ********
	// var cssStr = 'min-height: ' + windowHeight + 'px;';
	// console.log(cssStr);
	// $('.section').attr("style", cssStr);
} );