try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

window.onbeforeunload = function() { 

	$.get( '/just_view_contribution/' + transaction_id, function( data ){}) ;

} ;

let alert_body = $("#alert-body") ;

$( function() {
	$( "#alert-messages" ).hide() ;
	$( "#split_amount" ).hide() ;
	$( "#move_forward" ).attr("disabled", "disabled").button('refresh') ;
}) ;

let select_option = 0 ;

$( "#move_forward").on( 'click', function( e ) {

	$( "#alert-messages" ).hide() ;

	e.preventDefault() ;

	if ( select_option === 0 ) {

		$( "#alert-messages" ).show() ;
		$( "#alert_body" ).html( "Please select how you would like to contribute." ) ;

	} else {

		if ( select_option === 1 ) {

			// The amount is split.
			//
			// We send the transaction id with amount
			//

			let amount_splite = $("#amount_splite" ).val() ;

			if ( parseInt( amount_splite ) < parseInt( allowed_for_split ) ) {

				$( "#alert-messages" ).show() ;
				$( "#alert_body" ).html( "Sorry you can't contribute more than the amount specified." ) ;

			} else {

				if ( parseInt( amount_splite ) > parseInt( transaction_amount ) ) {

					$( "#alert-messages" ).show() ;
					$( "#alert_body" ).html( "Sorry you can't contribute more than the amount specified." ) ;

				} else {
					location.href = "/contribute/" + transaction_id + "/" + amount_splite  ;
				}

			}


		} else if ( select_option === 2 ) { 

			// We contribute
			// 
			// We send the transaction id and the user contributes.
			//

			location.href = "/contribute/" + transaction_id ;

		}

	}

}) ;


$( "#SplitAmount").on( 'click', function( e ) {

	select_option = 1 ;

	$( "#split_amount" ).show() ;
	$( "#move_forward" ).removeAttr("disabled").button('refresh') ;

}) ;

$( "#FullAmount").on( 'click', function( e ) {

	select_option = 2 ;

	$( "#move_forward" ).removeAttr("disabled").button('refresh');

}) ;


//REMEMBER to provide a timer for incase a user remains in this page for a long time.