@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-sm-12">

			<div class="element-wrapper">

			    <h6 class="element-header">Dashboard</h6>
			    <div class="element-content">
			        <div class="row">
			            <div class="col-sm-4">
			                <a class="element-box el-tablo" href="#">
			                    <div class="label">Available Funds</div>
			                    <div class="value">ZAR {{ round( (float) $available_funds, 2 ) }}</div>
			                </a>
			            </div>
			            <div class="col-sm-4">
			                <a class="element-box el-tablo" href="#">
			                    <div class="label">Withdrawn Funds</div>
			                    <div class="value">ZAR {{ round( (float) $withdrawn_funds, 2 ) }}</div>
			                </a>
			            </div>
			            <div class="col-sm-4">
			                <a class="element-box el-tablo" href="#">
			                    <div class="label">Funds Received</div>
			                    <div class="value">$ {{ round( (float) $funds_received, 2 ) }} USD</div>
			                </a>
			            </div>
			        </div>
			    </div>
			</div>        	

        </div>
    </div>

    <div class="row">
        <div class="col-sm-8">
        	
			<div class="element-wrapper">
			    <div class="element-box">
			        <form method="post" action="{{ url( '/create_a_dream' ) }}">

						{!! csrf_field() !!}

			            <h5 class="element-box-header">Create a new dream</h5>

			            <div class="row">
			            	<div class="col-sm-12">
			                    <div class="form-group">

			                        <label class="lighter" for="name">Dream name</label>
			                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
			                            <input 
			                            	class="form-control" 
			                            	placeholder="EG: School Fees, or Invest for a new car." 
			                            	type="text" 
			                            	name="name"
			                            	value="{{ old( 'name' ) }}">
			                        </div>
			                        @if ( $errors->has('dream_name') )
				                        <div class="help-block form-text text-muted text-danger form-control-feedback">
				                        	{{ $errors->first('dream_name') }}
				                        </div>
			                        @endif

			                    </div>
			                </div>
			            </div>

			            <div class="row">
			                <div class="col-sm-5">
			                    <div class="form-group">
			                        <label class="lighter" for="">Select Amount</label>
			                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				                        <select class="form-control" name="amount">
				                        	<!-- LEVEL 1 -->
				                            <option value="200" {{ ( old( 'amount' ) == "200" ) ? 'selected': '' }}>
				                            	200
				                            </option>

				                            <option value="500" {{ ( old( 'amount' ) == "500" ) ? 'selected': '' }}>
				                            	500
				                            </option>

				                            <option value="1000" {{ ( old( 'amount' ) == "1000" ) ? 'selected': '' }}>
				                            	1000
				                            </option>

				                            <option value="1500" {{ ( old( 'amount' ) == "1500" ) ? 'selected': '' }}>
				                            	1500
				                            </option>

				                            <option value="2000" {{ ( old( 'amount' ) == "2000" ) ? 'selected': '' }}>
				                            	2000
				                            </option>

				                        	<!-- LEVEL 2 -->
				                        	@if( $level === 2 )
				                            <option value="5000" {{ ( old( 'amount' ) == "5000" ) ? 'selected': '' }}>
				                            	5000
				                            </option>

				                            <option value="8000" {{ ( old( 'amount' ) == "8000" ) ? 'selected': '' }}>
				                            	8000
				                            </option>

				                            <option value="10000" {{ ( old( 'amount' ) == "10000" ) ? 'selected': '' }}>
				                            	10000
				                            </option>

				                            <option value="12000" {{ ( old( 'amount' ) == "12000" ) ? 'selected': '' }}>
				                            	12000
				                            </option>

				                            <option value="15000" {{ ( old( 'amount' ) == "15000" ) ? 'selected': '' }}>
				                            	15000
				                            </option>

				                            @endif
				                        	<!-- LEVEL 3 -->
				                        	@if( $level === 3 )
				                            <option value="18000" {{ ( old( 'amount' ) == "18000" ) ? 'selected': '' }}>
				                            	18000
				                            </option>

				                            <option value="20000" {{ ( old( 'amount' ) == "20000" ) ? 'selected': '' }}>
				                            	20000
				                            </option>

				                            <option value="22000" {{ ( old( 'amount' ) == "22000" ) ? 'selected': '' }}>
				                            	22000
				                            </option>

				                            <option value="25000" {{ ( old( 'amount' ) == "25000" ) ? 'selected': '' }}>
				                            	25000
				                            </option>

				                            <option value="50000" {{ ( old( 'amount' ) == "50000" ) ? 'selected': '' }}>
				                            	50000
				                            </option>

				                            @endif
				                        </select>
			                            <div class="input-group-addon">ZAR</div>
			                        </div>
			                        @if ( $errors->has('amount') )
				                        <div class="help-block form-text text-muted text-danger form-control-feedback">
				                        	{{ $errors->first('amount') }}
				                        </div>
			                        @endif
			                    </div>
			                </div>
			                <div class="col-sm-7">
			                    <div class="form-group">
			                        <label class="lighter" for="deposit_type">Deposit Type ( Bank, BTC, or ETH)</label>
			                        <select class="form-control" name="deposit_type">

			                            <option value="Bank Deposit" {{ ( old( 'deposit_type' ) == "Bank Deposit" ) ? 'selected' : '' }}>
			                            	Bank Deposit
			                            </option>

			                            <option value="Bitcoin" {{ ( old( 'deposit_type' ) == "Bitcoin" ) ?  'selected' :  '' }}>
			                            	Bitcoin
			                            </option>

			                            <option value="Ethereum" {{ ( old( 'deposit_type' ) == "Ethereum" ) ? 'selected' : '' }}>
			                            	Ethereum
			                            </option>

			                        </select>
			                        @if ( $errors->has('deposit_type') )
				                        <div class="help-block form-text text-muted text-danger form-control-feedback">
				                        	{{ $errors->first('deposit_type') }}
				                        </div>
			                        @endif

			                    </div>
			                </div>
			            </div>

			            <div class="row">
			            	<div class="col-sm-12">
			                    <div class="form-group">
			                        <label class="lighter" for="">Maturity Month(s)</label>
			                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				                        <select class="form-control" name="months">
				                            <option>Please select</option>
				                            <option value="1" {{ ( old( 'months' ) == "1" ) ? 'selected': '' }}>1 Month</option>
				                            <option value="2" {{ ( old( 'months' ) == "2" ) ? 'selected': '' }}>2 Months</option>
				                            <option value="3" {{ ( old( 'months' ) == "3" ) ? 'selected': '' }}>3 Months</option>
				                            <option value="4" {{ ( old( 'months' ) == "4" ) ? 'selected': '' }}>4 Months</option>
				                            <option value="5" {{ ( old( 'months' ) == "5" ) ? 'selected': '' }}>5 Months</option>
				                            <option value="6" {{ ( old( 'months' ) == "6" ) ? 'selected': '' }}>6 Months</option>
				                        </select>
			                        </div>
			                        @if ( $errors->has('dream_name') )
				                        <div class="help-block form-text text-muted text-danger form-control-feedback">
				                        	{{ $errors->first('dream_name') }}
				                        </div>
			                        @endif

			                    </div>
			                </div>
			            </div>
			            <div class="form-buttons-w text-right compact">
			            	<button class="btn btn-primary">Create</button>
			            </div>
			        </form>
			    </div>
			</div>

        </div>

        <div class="col-sm-4">
			<div class="element-wrapper">
			    <div class="element-content">

					<div class="alert alert-info borderless">

					    <p>Withdraw Funds</p>

					    <div class="alert-btn">
					    	<a 
					    		class="btn btn-white-gold btn-block" 
								data-target="#funds_withdrawal"
								 data-toggle="modal" 
					    		href="#">

					    		Withdraw

					    	</a>

					    </div>

					</div>

					<div class="alert alert-info borderless">
					    <h5 class="alert-heading">Refer Friends. Get Rewarded</h5>
					    <p>
					    	Each Friend you receive you get 10 ZAR.
					    	<br />
					    	<a href="{{ url( '/join' ) }}/{{ auth()->user()->referral_code }}">
					    		<strong>{{ url( '/join' ) }}/{{ auth()->user()->referral_code }}</strong>
					    	</a>
					    </p>

					</div>

			    </div>

			</div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
			<div class="element-wrapper">
			    <h6 class="element-header">Dream's Status</h6>
			    <div class="element-box-tp">

			        <div class="table-responsive">
			            <table class="table table-bordered table-lg table-v2 table-striped">
			                <thead>
			                    <tr>
			                        <th>Dream Name</th>
			                        <th>Dream Amount</th>
			                        <th>Maturity Amount</th>
			                        <th>Pay Date</th>
			                        <th>Allocated Member</th>
			                        <th>Status</th>
			                        <th>Actions</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@if ( count( $data ) > 0 )

				                	@foreach( $data as $dream )

					                    <tr>
					                        <td class="text-center">{{ $dream->name }}</td>
					                        <td class="text-right">{{ $dream->amount }} ZAR</td>
					                        <td class="text-right">{{ $dream->growth_amount }} ZAR</td>
					                        <td>{{ $dream->payday }}</td>
					                        <td>
	
												@if ( $dream->transaction->donar_id === 0 )

													Unallocated

												@else
													<?php 

														$user = \App\Models\User::find( $dream->transaction->donar_id ) ;

														echo $user->name . " " . $user->surname ;

													?>
												@endif
												
					                        </td>
					                        <td class="text-center">
			
												@if ( $dream->transaction->status === 0 )

					                            <div 
					                            	class="status-pill red" 
					                            	data-title="Complete" 
					                            	data-toggle="tooltip" 
					                            	data-original-title="" 
					                            	title=""></div> Awaiting allocation

					                            @elseif ( $dream->transaction->status === 1 )

					                            <div 
					                            	class="status-pill yellow" 
					                            	data-title="Complete" 
					                            	data-toggle="tooltip" 
					                            	data-original-title="" 
					                            	title=""></div> Member allocated

					                            @elseif ( $dream->transaction->status === 2 )

					                            <div 
					                            	class="status-pill yellow" 
					                            	data-title="Complete" 
					                            	data-toggle="tooltip" 
					                            	data-original-title="" 
					                            	title=""></div> Awaiting Approval

					                            @elseif ( $dream->transaction->status === 3 )

					                            <div 
					                            	class="status-pill green" 
					                            	data-title="Complete" 
					                            	data-toggle="tooltip" 
					                            	data-original-title="" 
					                            	title=""></div> Ready					                   

												@endif


					                        </td>
					                        <td class="row-actions">
					                        	<a href="#" data-toggle="modal" data-target="#funds_withdrawal">
					                        		<i class="os-icon os-icon-ui-49"></i> Withdraw
					                        	</a>
					                        </td>
					                    </tr>

				                    @endforeach

								@else
				                    <tr>
				                        <td class="text-center">You haven't created any dreams.</td>
				                        <td></td>
				                        <td></td>
				                        <td></td>
				                        <td></td>
				                        <td></td>
				                        <td></td>
				                    </tr>
								@endif
			                </tbody>
			            </table>
			        </div>
			    </div>
			</div>        	

        </div>
    </div>


@endsection

@section('js')

<script src="{{ asset( 'js/home.js' ) }}"></script>

@endsection