<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\User ;
use App\Models\Message ;

class MessageController extends Controller
{

	public function __construct() { $this->middleware('auth') ; }
	
    public function index() {
    	return view( "backend.message", Helper::PageBuilder( "Messages" ) ) ;
    }

    public function send_message( $message, $receiver ) {

    	$sender 							= auth()->user()->id ;

    	$message 							= Message::create([
	        'message'						=> $message, 
	        'sender_id'						=> $sender, 
	        'receiver_id'					=> $receiver,
    	]) ;

    }

    public function get_message( $receiver ) {

    	$sender 							= auth()->user()->id ;

    	$messages 							= Message::Where( 'sender_id', $sender )
    												 ->orWhere('sender_id',$receiver)
    												 ->orderBy("created_at", "Asc")
    												 ->get() ;

    	$chat 								= "" ;

    	if ( count($messages) > 0 ) {

    		foreach ( $messages as $msg ) {

				$send_date 				= $msg->created_at->diffForHumans() ;
				$message_self 			= $msg->message ;

				$user_receiver 			= User::find( $msg->receiver_id ) ;
				$user_sender 			= User::find( $msg->sender_id ) ;

				$sender_name 			= $user_sender->name . " " . $user_sender->surname ;
				$sender_avatar 			= asset( '/images/avatar.jpg' ) ;

				if ( $user_sender->avatar === "None" ) {
					$sender_avatar    = asset( '/images/avatar.jpg' ) ;
				} else {
					$sender_avatar    = asset( $user_sender->avatar ) ;
				}

				$receiver_name 			= $user_receiver->name . " " . $user_receiver->surname ;
				$receiver_avatar 		= asset( '/images/avatar.jpg' ) ;

				if ( $user_receiver->avatar === "None" ) {
					$receiver_avatar    = asset( '/images/avatar.jpg' ) ;
				} else {
					$receiver_avatar    = asset( $user_receiver->avatar ) ;
				}

				if ( $msg->receiver_id === $receiver ) {

    				$chat .= "
						<div class='chat-message'>
	                        <div class='chat-message-content-w'>
	                            <div class='chat-message-content'>$message_self</div>
	                        </div>
	                        <div class='chat-message-avatar'>$receiver_name</div>
	                        <div class='chat-message-date'>$send_date</div>
	                    </div>
    				" ;

	    		} else {

	    				$chat .= "
							<div class='chat-message self'>
		                        <div class='chat-message-content-w'>
		                            <div class='chat-message-content'>$message_self</div>
		                        </div>
		                        <div class='chat-message-avatar'>Me</div>
		                        <div class='chat-message-date'>$send_date</div>
		                    </div>
	    				" ;

	    		}

    		}
    	}

    	return $chat ;

    }

    public function load_chat_users() {

    	$support_id 						= Helper::getSupportUserID() ;

    	$messages 							= Message::whereReceiverId( Helper::getSupportUserID() )
    												 ->distinct('sender_id')
    												 ->orderBy("created_at", "Desc")
    												 ->get() ;

	   	$chat 								= "" ;

	   	$users 								= [] ;

    	if ( count($messages) > 0 ) {

    		foreach ( $messages as $msg ) {

				$send_date 				= $msg->created_at->diffForHumans() ;
				$message_self 			= $msg->message ;

				$user_sender 			= User::find( $msg->sender_id ) ;

				$sender_id 				= $msg->sender_id ;

				$sender_name 			= $user_sender->name . " " . $user_sender->surname ;
				$sender_avatar 			= asset( '/images/avatar.jpg' ) ;

				if ( $user_sender->avatar === "None" ) {
					$sender_avatar    = asset( '/images/avatar.jpg' ) ;
				} else {
					$sender_avatar    = asset( $user_sender->avatar ) ;
				}

				if ( array_key_exists( $sender_id, $users ) ) {

				} else {
					$users[$sender_id] = $sender_name ;

					$chat .= "
						<div class='user-w' onclick=\"activate_window('$sender_id')\">
	                    <div class='avatar with-status status-green'><img alt='' src='$sender_avatar'></div>
	                    <div class='user-info'>
	                        <div class='user-date'>$send_date</div>
	                        <div class='user-name'>$sender_name</div>
	                    </div>
	                    </div>
					" ;

				}

    		}
    	}

    	return $chat;

    }

}
