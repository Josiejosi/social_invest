try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}


window.onbeforeunload = function() { 

	$.get( '/just_view_contribution/' + transaction_id, function( data ){}) ;

} ;

//REMEMBER to provide a timer for incase a user remains in this page for a long time.
