var chat_content 		= $("#chat_content") ;

var message 			= $("#message") ;
var recent_users 		= $("#recent_users") ;

$("#reply").on('click', function(e){
	e.preventDefault() ;

	msg 			= message.val() ;

	$.get('/send_message/' + msg + "/" + active_user, function(data){

		load_recent_messages(active_user) ;
		message.val( "" ) ;

	} ) ;

	
}) ;

function activate_window( user_id ) {

	active_user 		= user_id ;
	load_recent_messages( user_id ) ;


}

function load_chat_users() {
	$.get('/load_chat_users', function(data){

		recent_users.html("") ;
		recent_users.html(data) ;
		
	} ) ;
}

function load_recent_messages(active_user) {

	
	$.get('/get_message/' + active_user, function(data){

		chat_content.html("") ;
		chat_content.html(data) ;
		
	} ) ;

	
}

$(function(){

	load_recent_messages(active_user) ;
	load_chat_users() ;

}) ;