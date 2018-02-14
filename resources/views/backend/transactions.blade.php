@extends('layouts.backend')

@section('content')


	<div class="element-wrapper">
	    <h6 class="element-header">Transactions</h6>
	    <div class="element-box">

	        <div class="table-responsive">
	            <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


	                <div class="row">
	                    <div class="col-sm-12">
					        <div class="table-responsive">
					            <table class="table table-bordered table-lg table-v2 table-striped">
					                <thead>
					                    <tr>
					                        <th>Ref Code</th>
					                        <th>Amount</th>
					                        <th>Created Date</th>
					                        <th>Member</th>
					                        <th>Status</th>
					                        <th>Actions</th>
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
					                        	{{ $transaction->amount }} ZAR
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
					                            	class="status-pill yellow" 
					                            	data-title="Complete" 
					                            	data-toggle="tooltip" 
					                            	data-original-title="" 
					                            	title=""></div> Awaiting Approval

					                            @elseif ( $transaction->status === 3 )

					                            <div 
					                            	class="status-pill green" 
					                            	data-title="Complete" 
					                            	data-toggle="tooltip" 
					                            	data-original-title="" 
					                            	title=""></div> Complete					                   

												@endif

					                        </td>
					                        <td class="row-actions">
					                        	<a href="#">
					                        		<i class="os-icon os-icon-ui-49"></i> PDF
					                        	</a>
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
	    </div>
	</div>


@endsection