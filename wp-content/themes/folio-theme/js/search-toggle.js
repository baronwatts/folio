jQuery( function() {
		// Search toggle.
		jQuery( '.search-toggle' ).on( 'click.twentyfourteen', function( event ) {
			var that    = jQuery( this ),
				wrapper = jQuery( '.search-box-wrapper' );

			that.toggleClass( 'active' );
			wrapper.toggleClass( 'hide' );

			

			if ( that.is( '.active' ) || jQuery( '.search-toggle .screen-reader-text' )[0] === event.target ) {
				wrapper.find( '.search-field' ).focus();
			}
		} );

		// menu toggle.
		jQuery( '.glyphicon-align-justify' ).click(function(){
			jQuery('.menu').toggleClass( 'show' );
		});

		
	} );//end function