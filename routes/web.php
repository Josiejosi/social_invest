<?php

	Route::get('/', 							"FrontController@index")->name('index') ;

	Route::get('join', 							"FrontController@join")->name('join') ;
	Route::get('join/{referral_code}', 			"FrontController@join_by_referral")->name('join_by_referral') ;
	Route::post('register', 					"FrontController@register") ;

	Route::get('calculator', 					"FrontController@calculator")->name('calculator')  ;

	Route::get('blocked', 						"FrontController@blocked")->name('blocked') ;

	Route::get('login', 						"FrontController@login")->name('login') ;
	Route::post('login', 						"FrontController@login_post") ;

	Route::get('faq', 							"FrontController@faq")->name('faq') ;
	Route::get('logout', 						"FrontController@logout")->name('logout') ;
	Route::get('forgot_password', 				"FrontController@forgot_password")->name('forgot_password') ;
	Route::post('forgot_password', 				"FrontController@post_forgot_password") ;

	Route::get('reset_password', 				"FrontController@reset_password")->name('reset_password') ;
	Route::post('reset_password', 				"FrontController@post_reset_password") ;

	Route::get('verification', 					"FrontController@verification")->name('verification') ;
	Route::post('verification', 				"FrontController@post_verification") ;
	Route::get('resend_verification_code', 		"FrontController@resend_verification_code") ;

	Route::get('home', 							"HomeController@index")->name('home') ;
	Route::post('create_a_dream', 				"HomeController@create_a_dream") ;

	Route::get('profile', 						"ProfileController@index")->name('profile') ;
	Route::post('update_display_name', 			"ProfileController@update_display_name") ;
	Route::post('update_password', 				"ProfileController@update_password") ;
	Route::post('update_payment_details', 		"ProfileController@update_payment_details") ;

	
	Route::get('transactions', 					"TransactionController@index")->name('transactions') ;
	Route::get('list_transactions', 			"TransactionController@list_transactions")->name('list_transactions') ;

	Route::get('contribute/{id}', 				"ContributeController@index")->name('contribute') ;
	Route::get('contribute/{id}/{amount}', 		"ContributeController@contribute_amount")->name('contribute_amount') ;
	Route::get('select_contribution/{id}', 		"ContributeController@select_contribution")->name('select_contribution') ;

	Route::get('confirm_contribution/{id}', 	"ContributeController@confirm_contribution")->name('confirm_contribution') ;
	Route::get('confirm_contribution/{id}/{amount}', 	"ContributeController@confirm_split")->name('confirm_split') ;
	Route::get('complete_contribution/{id}', 	"ContributeController@complete_contribution")->name('complete_contribution') ;
	Route::get('just_view_contribution/{id}', 	"ContributeController@just_view_contribution")->name('just_view_contribution') ;

	Route::get('settings', 						"SettingsController@index")->name('settings') ;
	Route::post('settings', 					"SettingsController@settings") ;

	Route::get('block', 						"AdminController@block")->name('block') ;
	Route::get('block_user/{id}', 				"AdminController@block_user")->name('block_user') ;

	Route::get('donation', 						"AdminController@donation")->name('donation') ;
	Route::post('donation', 					"AdminController@post_donation") ;

	Route::get('member', 						"AdminController@member")->name('member') ;
	Route::post('admin_member', 				"AdminController@admin_member") ;

	Route::get('support', 						"SupportController@index")->name('support') ;

	Route::get('messages', 						"MessageController@index")->name('messages') ;
	Route::get('send_message/{msg}/{receiver}', "MessageController@send_message")->name('send_message') ;
	Route::get('get_message/{receiver}', 		"MessageController@get_message")->name('get_message') ;
	Route::get('load_chat_users', 				"MessageController@load_chat_users")->name('load_chat_users') ;


	Route::get('wallet', 						"WalletController@index")->name('wallet') ;
	Route::post('wallet', 						"WalletController@create_wallet") ;
	Route::post('make_payment', 				"WalletController@make_payment") ;
