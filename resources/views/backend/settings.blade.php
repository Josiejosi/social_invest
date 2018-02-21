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
					                            	value="{{ $data->max_daily_users }}">
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
					                            	value="{{ $data->growth_percentage }}">
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
					                            	value="{{ $data->max_daily_donations }}">
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
					                            	value="{{ $data->useless_user_days }}">
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
					                            	value="{{ $data->max_payment_days }}">
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
					                            	value="{{ $data->max_confirmed_donations }}">
					                        </div>
					                        @if ( $errors->has('max_confirmed_donations') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('max_confirmed_donations') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>

					            <!--

					            	NEW SETTINGS

					            -->

					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="donation_list_active">Donation List Active</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <select 
					                            	class="form-control"
					                            	name="donation_list_active"
					                            	value="{{ $data->donation_list_active }}">

					                            	<option value="1"
					                            			{{ ($data->donation_list_active == 1 ) ? 'selected':'' }}
					                            		>True</option>
					                            	<option value="0"
					                            			{{ ($data->donation_list_active == 0 ) ? 'selected':'' }}
					                            		>False</option>
					                            <select>
					                        </div>
					                        @if ( $errors->has('donation_list_active') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('donation_list_active') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>

					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="support_active">Support Is Active</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <select 
					                            	class="form-control"
					                            	name="support_active"
					                            	value="{{ $data->support_active }}">

					                            	<option value="1"
					                            			{{ ($data->support_active == 1 ) ? 'selected':'' }}
					                            		>True</option>
					                            	<option value="0"
					                            			{{ ($data->support_active == 0 ) ? 'selected':'' }}
					                            		>False</option>
					                            <select>
					                        </div>
					                        @if ( $errors->has('support_active') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('support_active') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>

					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="show_update_users">Show Members Updates ( This settings show updates in index page, first page user sees when viewing the page )</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <select 
					                            	class="form-control"
					                            	name="show_update_users"
					                            	value="{{ $data->show_update_users }}">

					                            	<option value="1"
					                            			{{ ($data->show_update_users == 1 ) ? 'selected':'' }}
					                            		>True</option>
					                            	<option value="0"
					                            			{{ ($data->show_update_users == 0 ) ? 'selected':'' }}
					                            		>False</option>
					                            <select>
					                        </div>
					                        @if ( $errors->has('show_update_users') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('show_update_users') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>


					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="update_message">Member update message (Only shows when "Show Members Updates" is on)</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <textarea
					                            	class="form-control"
					                            	name="update_message">{{ $data->update_message }}</textarea> 
					                        </div>
					                        @if ( $errors->has('update_message') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('update_message') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>


					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="realtime_delay">Realtime Delay ( 1000 <==> 1 second )</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <input 
					                            	class="form-control"
					                            	type="text" 
					                            	name="realtime_delay"
					                            	value="{{ $data->realtime_delay }}">
					                        </div>
					                        @if ( $errors->has('realtime_delay') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('realtime_delay') }}
						                        </div>
					                        @endif

					                    </div>
					                </div>
					            </div>


					            <div class="row">
					            	<div class="col-sm-12">
					                    <div class="form-group">

					                        <label class="lighter" for="amount_allowed_split">Amount allowed for splitting</label>
					                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					                            <input 
					                            	class="form-control"
					                            	type="text" 
					                            	name="amount_allowed_split"
					                            	value="{{ $data->amount_allowed_split }}">
					                        </div>
					                        @if ( $errors->has('amount_allowed_split') )
						                        <div class="help-block form-text text-muted text-danger form-control-feedback">
						                        	{{ $errors->first('amount_allowed_split') }}
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

@section( 'js' )
	<script src="{{ asset( 'js/backend.js' ) }}"></script>
@endsection