@extends('layouts.backend')

@section('content')



	<div class="row">
	    <div class="col-sm-5">
	        <div class="user-profile compact">
	            <div class="up-head-w">

	                <div class="up-main-info">
	                    <h2 class="up-header">{{ $name }}</h2>
	                    <h6 class="up-sub-header">LEVEL {{ $level }}</h6></div>
	                <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	                    <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
	                        <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
	                    </g>
	                </svg>
	            </div>

	            <div class="up-contents">
	                <div class="m-b">
	                    <div class="row m-b">
	                        <div class="col-sm-6 b-r b-b">
	                            <div class="el-tablo centered padded-v">
	                                <div class="value">{{ $data["referral_points"] }}</div>
	                                <div class="label">Referral Points</div>
	                            </div>
	                        </div>
	                        <div class="col-sm-6 b-b">
	                            <div class="el-tablo centered padded-v">
	                                <div class="value">{{ $contributions_made }}</div>
	                                <div class="label">Contributions Made</div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	    </div>
	    <div class="col-sm-7">
	        <div class="element-wrapper">
	            <div class="element-box">

					@if ( count( $data["wallet"] ) > 0 )
					<p class="text-center">
						<button id="btnMakePayment" class="btn btn-success" onclick="makePayment()">Make Payment</button>
					</p>
					@endif

	                <form action="{{ url( '/wallet' ) }}" method="POST">
	                	{!! csrf_field() !!}
	                    <div class="element-info">
	                        <div class="element-info-with-icon">
	                            <div class="element-info-icon">
	                                <div class="os-icon os-icon-wallet-loaded"></div>
	                            </div>
	                            <div class="element-info-text">
	                                <h5 class="element-inner-header">BlockChain Wallet</h5>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group">

	                        <label for=""> Email address</label>
	                        <input class="form-control" 
	                        	   readonly="true" 
	                        	   value="{{ auth()->user()->email }}" 
	                        	   placeholder="Enter email" 
	                        	   type="email">

	                    </div>

	                    @if ( count( $data["wallet"] ) == 0 )
	                    	<h6>You currently have not linked any blockchain wallet.</h6>

		                    <div class="form-buttons-w">
		                    	<p class="text-center">
		                        	<button class="btn btn-primary" type="submit"> Create Wallet</button>
		                    	</p>
		                    </div>

		                @else
				            <div class="col-sm-12">
				                <a class="element-box el-tablo" href="#">
				                    <div class="label">Wallet Balance</div>
				                    <div class="value">$ {{ isset ( $data["balance"]->balance ) ? $data["balance"]->balance : 0 }} USD</div>
				                </a>
				            </div>

							<h6><a href="https://blockchain.info/wallet/#/login/" target="_blank">BlockChain.info Details</a></h6>
							<div class="alert alert-info alert-important">
								You can <a href="https://blockchain.info/wallet/#/login/" target="_blank">click here</a>, to go to blockchain.info to manage your wallet.
							</div>
					        <div class="table-responsive">
					            <table class="table table-bordered table-v2 table-striped">

					            	<col width="100">
					            	<col width="150">
  									
					                <tbody>

					                    <tr>
					                        <td class="text-center">Wallet Label</td>
					                        <td>: {{ isset( $data["wallet"]->label ) ? $data["wallet"]->label : 'None' }}</td>
					                    </tr>

					                    <tr>
					                        <td class="text-center">Wallet ID</td>
					                        <td>: {{ isset( $data["wallet"]->guid ) ? $data["wallet"]->guid : 'None' }}</td>
					                    </tr>

					                    <tr>
					                        <td class="text-center">Wallet Password</td>
					                        <td>:  <span id="show_password">{{ isset( $data["wallet"]->password ) ? $data["wallet"]->password : 'None' }}</span></td>
					                    </tr>

					                </tbody>
					            </table>
					        </div>
							
		                @endif

					</form>
					@if ( count( $data["wallet"] ) > 0 )
					<p class="text-center">
						<button id="btnTogglePassword" class="btn btn-success" onclick="showHide()">Show Password</button>
					</p>
					@endif
	            </div>
	        </div>
	    </div>
	</div>

	<div class="modal fade" id="PaymentModel" tabindex="-1" role="dialog" aria-labelledby="paymentModelLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Make Outgoing Payment ( BTC )</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">

	                <form action="{{ url( '/make_payment' ) }}" method="POST">
	                	{!! csrf_field() !!}
	                    <div class="form-group">

	                        <label for="address"> Address</label>
	                        <input class="form-control" 
	                        	  
	                        	   placeholder="Address" 
	                        	   type="address">

	                    </div>
	                    <div class="form-group">

	                        <label for="amount"> Amount</label>
	                        <input class="form-control" 
	                        	  
	                        	   placeholder="Amount" 
	                        	   type="amount">

	                    </div>

	                    <button class="btn btn-primary" type="submit"> Pay</button>

	                </form>

	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	            </div>
	        </div>
	    </div>
	</div>


@endsection

@section('js')

	<script src="{{ asset( 'js/backend.js' ) }}"></script>

	<script>
		
		var show_password 	= $("#show_password") ;

		var isShown 		= false ;

		function showHide() {

			if ( isShown == false ) {

				isShown 	= true ;
				show_password.show() ;
				$("#btnTogglePassword").html("Hide Password") ;

			} else {
				isShown 	= false ;
				show_password.hide() ;
				$("#btnTogglePassword").html("Show Password") ;

			}

		}

		function makePayment() {

			//e.preventDefault() ;

			$( '#PaymentModel' ).modal( 'show' ) ;
		}

		$(function(){
			show_password.hide() ;
		}) ;

	</script>

@endsection
