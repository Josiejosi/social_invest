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

	Route::get('messages', 						"MessageController@index")->name('messages') ;
	Route::get('transactions', 					"TransactionController@index")->name('transactions') ;
