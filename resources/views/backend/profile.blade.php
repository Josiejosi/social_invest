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
	                                <div class="value">0</div>
	                                <div class="label">Referral Points</div>
	                            </div>
	                        </div>
	                        <div class="col-sm-6 b-b">
	                            <div class="el-tablo centered padded-v">
	                                <div class="value">0</div>
	                                <div class="label">Donations</div>
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
	                <form action="{{ url( '/update_password' ) }}" method="POST">
	                	{!! csrf_field() !!}
	                    <div class="element-info">
	                        <div class="element-info-with-icon">
	                            <div class="element-info-icon">
	                                <div class="os-icon os-icon-wallet-loaded"></div>
	                            </div>
	                            <div class="element-info-text">
	                                <h5 class="element-inner-header">Profile Settings</h5>
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
	                    <div class="row">
	                        <div class="col-sm-6">
	                            <div class="form-group">

	                                <label for=""> Password</label>
	                                <input class="form-control" 
	                                	   name="password" 
	                                	   placeholder="Password" 
	                                	   type="password">
									@if ($errors->has('password'))
		                                <div class="help-block form-text text-muted form-control-feedback">
											{{ $errors->first('password') }}
		                                </div>
	                                @endif

	                            </div>
	                        </div>
	                        <div class="col-sm-6">
	                            <div class="form-group">

	                                <label for="">Confirm Password</label>
	                                <input class="form-control" 
	                                	   placeholder="Confirm Password" 
	                                	   name="password_confirmation" 
	                                	   type="password">

									@if ($errors->has('password_confirmation'))
		                                <div class="help-block form-text text-muted form-control-feedback">
											{{ $errors->first('password_confirmation') }}
		                                </div>
	                                @endif

	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-buttons-w">
	                        <button class="btn btn-primary" type="submit"> Change Password</button>
	                    </div>

					</form>
	                <form action="{{ url( '/update_display_name' ) }}" method="POST">
	                	{!! csrf_field() !!}
	                    <fieldset class="form-group">
	                        <legend><span>Name Section</span></legend>
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <div class="form-group">

	                                    <label for=""> First Name</label>
	                                    <input class="form-control" 
	                                    	   placeholder="First Name"
	                                    	   name="name"
	                                    	   value="{{ auth()->user()->name }}" 
	                                    	   type="text">

										@if ($errors->has('name'))
			                                <div class="help-block form-text text-muted form-control-feedback">
												{{ $errors->first('name') }}
			                                </div>
		                                @endif

	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">

	                                    <label for="">Last Name</label>
	                                    <input class="form-control" 
	                                    	   placeholder="Last Name" 
	                                    	   name="surname"
	                                    	   value="{{ auth()->user()->surname }}" 
	                                    	   type="text">
	                                    
										@if ($errors->has('surname'))
			                                <div class="help-block form-text text-muted form-control-feedback">
												{{ $errors->first('surname') }}
			                                </div>
		                                @endif

	                                </div>
	                            </div>
	                        </div>
	                    </fieldset>

	                    <div class="form-buttons-w">
	                        <button class="btn btn-primary disabled" type="submit"> Change Display Name</button>
	                    </div>

					</form>
	                <form action="{{ url( '/update_payment_details' ) }}" method="POST">
	                	{!! csrf_field() !!}
	                    <fieldset class="form-group">
	                        <legend><span>Payment Details Section</span></legend>
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <div class="form-group">

	                                    <label for=""> Bank</label>

		                                <select name="bank_name" class="form-control textarea" value="" placeholder="Bank Name">
		                                    <option>Please select</option>

		                                    @if ( auth()->user()->account()->count() > 0 )

		                                    <option value="ABSA Bank" {{ ( auth()->user()->account()->first()->bank_name == 'ABSA Bank' )? 'selected': ''  }}>
		                                        ABSA Bank
		                                    </option>

		                                    <option value="African Bank" {{ ( auth()->user()->account()->first()->bank_name == 'African Bank' )? 'selected': ''  }}>
		                                        African Bank
		                                    </option>

		                                    <option value="Capitec Bank" {{ (auth()->user()->account()->first()->bank_name == 'Capitec Bank' )? 'selected': ''  }}>
		                                        Capitec Bank
		                                    </option>

		                                    <option value="FirstRand Bank" {{ ( auth()->user()->account()->first()->bank_name == 'FirstRand Bank' )? 'selected': ''  }}>
		                                        FirstRand Bank
		                                    </option>

		                                    <option value="FNB" {{ ( auth()->user()->account()->first()->bank_name == 'FNB' )? 'selected': ''  }}>
		                                        FNB
		                                    </option>

		                                    <option value="NedBank" {{ ( auth()->user()->account()->first()->bank_name == 'NedBank' )? 'selected': ''  }}>
		                                        NedBank 
		                                    </option>

		                                    <option value="Standard Bank" {{ ( auth()->user()->account()->first()->bank_name == 'Standard Bank' )? 'selected': ''  }}>
		                                        Standard Bank
		                                    </option>

		                                    <option value="U Bank" {{ ( auth()->user()->account()->first()->bank_name == 'U Bank' )? 'selected': ''  }}>
		                                        U Bank
		                                    </option>

		                                    @else
		                                    <option value="ABSA Bank">
		                                        ABSA Bank
		                                    </option>

		                                    <option value="African Bank">
		                                        African Bank
		                                    </option>

		                                    <option value="Capitec Bank">
		                                        Capitec Bank
		                                    </option>

		                                    <option value="FirstRand Bank">
		                                        FirstRand Bank
		                                    </option>

		                                    <option value="FNB" >
		                                        FNB
		                                    </option>

		                                    <option value="NedBank">
		                                        NedBank 
		                                    </option>

		                                    <option value="Standard Bank">
		                                        Standard Bank
		                                    </option>

		                                    <option value="U Bank">
		                                        U Bank
		                                    </option>
		                                    @endif
		                                    
		                                </select>

										@if ($errors->has('bank_name'))
			                                <div class="help-block form-text text-muted form-control-feedback">
												{{ $errors->first('bank_name') }}
			                                </div>
		                                @endif

	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">

	                                    <label for="">Account Number</label>
	                                    <input 
	                                    	class="form-control" 
	                                    	placeholder="Account Number" 
	                                    	name="account_number" 
	                                    	@if ( auth()->user()->account()->count() > 0 )
	                                    	value="{{ auth()->user()->account()->first()->account_number }}" 
	                                    	@endif
	                                    	type="text">

										@if ($errors->has('account_number'))
			                                <div class="help-block form-text text-muted form-control-feedback">
												{{ $errors->first('account_number') }}
			                                </div>
		                                @endif

	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label for="">Branch Code</label>
	                                    <input class="form-control" 
	                                    	   placeholder="Branch Code"
	                                    	   name="branch_code" 
	                                    	   @if ( auth()->user()->account()->count() > 0 )
	                                    	   value="{{ auth()->user()->account()->first()->branch_code }}" 
	                                    	   @endif
	                                    	   type="text">
	                                    

										@if ($errors->has('branch_code'))
			                                <div class="help-block form-text text-muted form-control-feedback">
												{{ $errors->first('branch_code') }}
			                                </div>
		                                @endif

	                                </div>
	                            </div>
	                        </div>
	                    </fieldset>

	                    <?php 

	                    	$cryptos = auth()->user()->crpyto()->get() ;

	                    	$bitcoin = [] ;
	                    	$eth = [] ;

	                    	if ( count($cryptos) > 0 ) {
	                    		foreach ( $cryptos as $crypto ) {
	                    			
	                    			if ( $crypto->name === "BITCOIN" ) {
	                    				$bitcoin = $crypto ;
	                    			} else {
	                    				$eth = $crypto ; 
	                    			}
	                    		}
	                    	}
	                    ?>

	                    <fieldset class="form-group">
	                        <legend><span>Bitcoin Address</span></legend>
	                        <div class="row">
	                            <div class="col-sm-12">
				                    <div class="form-group">
				                        <input class="form-control" 
				                        	   placeholder="Bitcoin Address"
				                        	   name="bitcoin_address" 
				                        	   @if ( count($bitcoin) > 0 )  
											   value="{{ $bitcoin->address }}"
				                        	   @endif
				                        	   type="text">
										@if ($errors->has('bitcoin_address'))
			                                <div class="help-block form-text text-muted form-control-feedback">
												{{ $errors->first('bitcoin_address') }}
			                                </div>
		                                @endif
				                    </div>

				                </div>
	                        </div>
	                    </fieldset>

	                    <fieldset class="form-group">
	                        <legend><span>Ethereum Address</span></legend>
	                        <div class="row">
	                            <div class="col-sm-12">
				                    <div class="form-group">
				                        <input class="form-control" 
				                        	   placeholder="Ethereum Address"
				                        	   name="ethereum_address"  
				                        	   @if ( count($eth) > 0 )  
											   value="{{ $eth->address }}"
				                        	   @endif 
				                        	   type="text">
										@if ($errors->has('ethereum_address'))
			                                <div class="help-block form-text text-muted form-control-feedback">
												{{ $errors->first('ethereum_address') }}
			                                </div>
		                                @endif
				                    </div>
				                </div>
	                        </div>
	                    </fieldset>

	                    <div class="form-buttons-w">
	                        <button class="btn btn-primary" type="submit"> Change Payment Details</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>



@endsection