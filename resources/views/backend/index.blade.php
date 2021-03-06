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
			                    <div class="value">$ {{ round( (float) $available_funds, 2 ) }} USD</div>
			                </a>
			            </div>
			            <div class="col-sm-4">
			                <a class="element-box el-tablo" href="#">
			                    <div class="label">Withdrawn Funds</div>
			                    <div class="value">$ {{ round( (float) $withdrawn_funds, 2 ) }} USD</div>
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

			    <h6 class="element-header">Contribution List</h6>
			    <div class="element-box-tp">

			    	@if ( \App\Helpers\Helper::getDonationListActive() == 1 )

						<donations></donations>

					@else

					<h6>Contribution list is currently off-line, please check again in a few hours.</h6>

					@endif

			    </div>

			    </div>

			</div>

        </div>

        <div class="col-sm-4">
			<div class="element-wrapper">
			    <div class="element-content">

					<div class="alert alert-info borderless alert-important">
					    <h5 class="alert-heading">Refer Friends. Get Rewarded</h5>
					    <p>
					    	Each Friend you successfully recruit, you get $ 1.50 USD.
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
			    <h6 class="element-header">Recent Contribution</h6>
			    <div class="element-box-tp">

			        <div class="table-responsive">
			            <table class="table table-bordered table-lg table-v2 table-striped">
			                <thead>
			                    <tr>
			                        <th>Ref Code</th>
			                        <th>Amount</th>
			                        <th>Created Date</th>
			                        <th>Member</th>
			                        <th>Status</th>
			                    </tr>
			                </thead>
			                <tbody>

		                	@if ( count( $data ) > 0 )

			                	@foreach( $data as $transaction )

			                    <tr>
			                        <td class="text-center">
			                        	{{ $transaction->transaction_reference_code }}
			                        </td>
			                        <td class="text-right">
			                        	{{ $transaction->growth_amount }} USD
			                        </td>
			                        <td class="text-right">
			                        	{{ $transaction->created_at->diffForHumans() }}
			                        </td>
			                        <td>
			                        	
										@if ( $transaction->donar_id === 0 )

											Unallocated
											
										@else
											<?php 

												$user = \App\Models\User::find( $transaction->donar_id ) ;

												echo $user->name . " " . $user->surname ;

											?>
										@endif					                    

			                        </td>
			                        <td class="text-center">

										@if ( $transaction->status === 0 )

			                            <div 
			                            	class="status-pill red" 
			                            	data-title="Complete" 
			                            	data-toggle="tooltip" 
			                            	data-original-title="" 
			                            	title=""></div> Awaiting allocation

			                            @elseif ( $transaction->status === 1 )

			                            <div 
			                            	class="status-pill yellow" 
			                            	data-title="Complete" 
			                            	data-toggle="tooltip" 
			                            	data-original-title="" 
			                            	title=""></div> Member allocated

			                            @elseif ( $transaction->status === 2 )

			                            <div 
			                            	class="status-pill green" 
			                            	data-title="Complete" 
			                            	data-toggle="tooltip" 
			                            	data-original-title="" 
			                            	title=""></div> Complete					                   

										@endif

			                        </td>
			                    </tr>

		                    @endforeach

						@else

			                    <tr>
			                        <td class="text-center" colspan="6">You have no transactions.</td>
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