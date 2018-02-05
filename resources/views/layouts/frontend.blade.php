<!DOCTYPE html>
<html lang="eng">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="UTF-8">
	
	<title>My Crypto Seed | {{ $title }}</title> 

    <meta content="My Crypto Seed" name="keywords">
    <meta content="My Crypto Seed" name="author">
    <meta content="My Crypto Seed, Peer to Peer Donations" name="description">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="{{ asset( 'css/style.css' ) }}">
	<link rel="stylesheet" href="{{ asset( 'css/responsive.css' ) }}">
	<link rel="stylesheet" href="{{ asset( 'fonts/flaticon.css' ) }}" />
	
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset( 'images/favicon/apple-touch-icon.png' ) }}">
	<link rel="icon" type="image/png" href="{{ asset( 'images/favicon/favicon-32x32.png' ) }}" sizes="32x32">
	<link rel="icon" type="image/png" href="{{ asset( 'images/favicon/favicon-16x16.png' ) }}" sizes="16x16">

</head>

<body>

	<div class="boxed_wrapper">


		<div class="mainmenu-area stricky">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-md-5">
						<div class="main-logo">
							<a href="#"><img src="{{ asset( 'images/logo/logo.png' ) }}" alt="CRYPTO SEED"></a>
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

				                    <li class="current"><a href="{{ url( '/' ) }}">Home</a></li>                 
				                    <li><a href="{{ url( '/calculator' ) }}">Calculator</a></li>
				                    <li><a href="{{ url( '/faq' ) }}">FAQ</a></li>
				                    <li><a href="{{ url( '/join' ) }}">Join Now</a></li>

				                </ul>

				                <ul class="mobile-menu clearfix">

				                    <li class="current"><a href="{{ url( '/' ) }}">Home</a></li>                 
				                    <li><a href="{{ url( '/calculator' ) }}">Calculator</a></li>
				                    <li><a href="{{ url( '/faq' ) }}">FAQ</a></li>
				                    <li><a href="{{ url( '/join' ) }}">Join Now</a></li>

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
	                            <div class="text"><p>We are a peer-to-peer Donation Platform, our system supports Bitcoin, Ethurium & Bank Transfer, with 75% monthly compounded growth</p></div>
	                            
	                        </div>
	                    </div>
	                </div>

	            </div>
		    </div>
	    </footer>
	    <div class="footer-bottom text-center">
	        <div class="container">
	            <div class="copyright">Copyright © <?=date('Y')?> <a href="#">MY CRYPTO SEED.</a> All rights reserved.</div>
	        </div>
	    </div>


	</div>

	<script src="{{ asset( 'js/jquery.js' ) }}"></script>
	<script src="{{ asset( 'js/bootstrap.min.js' ) }}"></script>
	<script src="{{ asset( 'js/bootstrap-select.min.js' ) }}"></script>

	<script src="{{ asset( 'js/custom.js' ) }}"></script>

    <script>
        $('#flash-overlay-modal').modal();

        $('div.alert').not('.alert-important').delay(6000).fadeOut(350);

    </script>



	@yield('js')
	
</body>

</html>



