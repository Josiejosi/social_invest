<!DOCTYPE html>
<html lang="eng">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="UTF-8">
	
	<title>BITROSEED | {{ $title }}</title> 

    <meta content="BITROSEED" name="keywords">
    <meta content="BITROSEED" name="author">
    <meta content="BITROSEED, Peer to Peer Donations" name="description">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="support_code" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ asset( 'css/frontend.css' ) }}">

	<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
	
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset( 'images/favicon/apple-touch-icon.png' ) }}">
	<link rel="icon" type="image/png" href="{{ asset( 'images/favicon/favicon-32x32.png' ) }}" sizes="32x32">
	<link rel="icon" type="image/png" href="{{ asset( 'images/favicon/favicon-16x16.png' ) }}" sizes="16x16">

</head>

<body>

	<div class="boxed_wrapper" id="app">


		<div class="mainmenu-area stricky">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-md-5">
						<div class="main-logo">
							<a href="#"><img src="{{ asset( 'images/logo/logo.png' ) }}" alt="BITROSEED"></a>
						</div>
					</div>
					<div class="col-md-5 menu-column">
						<nav class="main-menu">
				            <div class="navbar-header">     
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                </button>
				            </div>
				            <div class="navbar-collapse collapse clearfix">
				                <ul class="navigation clearfix">
				                	
									@if ( Route::currentRouteName() === "index" )
				                    	<li class="current"><a href="{{ url( '/' ) }}">Home</a></li> 
				                    @else
				                    	<li><a href="{{ url( '/' ) }}">Home</a></li>
									@endif

									@if ( Route::currentRouteName() === "faq" )
				                    	<li class="current"><a href="{{ url( '/faq' ) }}">FAQ</a></li> 
				                    @else
				                    	<li><a href="{{ url( '/faq' ) }}">FAQ</a></li>
									@endif									
				                    
									@if ( Route::currentRouteName() === "join" )
				                    	<li class="current"><a href="{{ url( '/join' ) }}">Join Now</a></li>
				                    @else
				                    	<li><a href="{{ url( '/join' ) }}">Join Now</a></li>
									@endif

				                </ul>

				                <ul class="mobile-menu clearfix">

									@if ( Route::currentRouteName() === "index" )
				                    	<li class="current"><a href="{{ url( '/' ) }}">Home</a></li> 
				                    @else
				                    	<li><a href="{{ url( '/' ) }}">Home</a></li>
									@endif

									@if ( Route::currentRouteName() === "faq" )
				                    	<li class="current"><a href="{{ url( '/faq' ) }}">FAQ</a></li> 
				                    @else
				                    	<li><a href="{{ url( '/faq' ) }}">FAQ</a></li>
									@endif									
				                    
									@if ( Route::currentRouteName() === "join" )
				                    	<li class="current"><a href="{{ url( '/join' ) }}">Join Now</a></li>
				                    @else
				                    	<li><a href="{{ url( '/join' ) }}">Join Now</a></li>
									@endif

				                </ul>
				            </div>
				        </nav>
					</div>
					<div class="col-md-2">
						<div class="right-area">
						   <div class="link_btn float_right">
							   <a href="{{ url( '/login' ) }}" class="thm-btn">Sign In</a>
						   </div>
						</div>	
					</div>
		    	</div>
		        
		    </div>

		</div>


	    <div class="container">
			<div class="row">
				@include('flash::message')
			</div>
	    </div>

		@yield('content')


		<!-- Scroll Top Button -->
		<button class="scroll-top tran3s color2_bg">
			<span class="fa fa-angle-up"></span>
		</button>
		<!-- pre loader  -->
		<div class="preloader"></div>

		<footer class="main-footer">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-6 col-sm-6 col-xs-12 footer-colmun">
	                    <div class="footer-wideget logo-wideget">
	                        <div class="logo-top">
	                            <div class="footer-logo">
	                                <a href="#"></a>
	                            </div>
	                            <div class="text">

	                            	<p>

	                            		We are a peer-to-peer Exchange Platform, our system supports Bitcoin & Ethereum.

	                            	</p>

	                            </div>
	                            
	                        </div>
	                    </div>
	                </div>

	            </div>
		    </div>
	    </footer>
	    <div class="footer-bottom text-center">
	        <div class="container">
	            <div class="copyright">Copyright © <?=date('Y')?> <a href="{{ url( '/' ) }}">BITROSEED.</a> All rights reserved.</div>
	        </div>
	    </div>


	</div>

	<script src="{{ asset( 'js/frontend.js' ) }}"></script>

	@yield('js')
	
</body>

</html>



