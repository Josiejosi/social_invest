@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-sm-12">

			<div class="element-wrapper">

			    <h6 class="element-header">Settings</h6>
			    <div class="element-content">

			    	<div class="row">
        				<div class="col-sm-6 col-sm-offset-3">


					        <form method="post" action="{{ url( '/settings' ) }}">

								{!! csrf_field() !!}

					            <h5 class="element-box-header">Donation Settings</h5>

					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="max_daily_users">Max Daily Users</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <input 
					                            	class="form-control"
					                            	type="text" 
					                            	name="max_daily_users"
					                            	value="{{ \App\Helpers\Helper::getMaxDailyUsers() }}">
					                        </div>
					                        @if ( $errors->has('max_daily_users') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('max_daily_users') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>

					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="growth_percentage">Percentage</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <input 
					                            	class="form-control"
					                            	type="text" 
					                            	name="growth_percentage"
					                            	value="{{ \App\Helpers\Helper::getGrowthPercentage() }}">
					                        </div>
					                        @if ( $errors->has('growth_percentage') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('growth_percentage') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>

					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="max_daily_donations">Max Daily Donations</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <input 
					                            	class="form-control"
					                            	type="text" 
					                            	name="max_daily_donations"
					                            	value="{{ \App\Helpers\Helper::getMaxDailyDonations() }}">
					                        </div>
					                        @if ( $errors->has('max_daily_donations') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('max_daily_donations') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>

					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="useless_user_days">Useless Users Allowed Days</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <input 
					                            	class="form-control"
					                            	type="text" 
					                            	name="useless_user_days"
					                            	value="{{ \App\Helpers\Helper::getUselessUserDays() }}">
					                        </div>
					                        @if ( $errors->has('useless_user_days') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('useless_user_days') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>

					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="max_payment_days">Max Payment Days</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <input 
					                            	class="form-control"
					                            	type="text" 
					                            	name="max_payment_days"
					                            	value="{{ \App\Helpers\Helper::getMaxPaymentDays() }}">
					                        </div>
					                        @if ( $errors->has('max_payment_days') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('max_payment_days') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>

					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="max_confirmed_donations">Max Confirmed Donations</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <input 
					                            	class="form-control"
					                            	type="text" 
					                            	name="max_confirmed_donations"
					                            	value="{{ \App\Helpers\Helper::getMaxConfirmedDonations() }}">
					                        </div>
					                        @if ( $errors->has('max_confirmed_donations') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('max_confirmed_donations') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>


					            <div class="form-buttons-w text-right compact">
					            	<button class="btn btn-success">Update</button>
					            </div>
					        </form>

					    </div>

					</div>



			    </div>
			</div>        	

        </div>
    </div>

@endsection

@section('js')

@endsection