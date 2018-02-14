@extends('layouts.backend')

@section('content')


	<div class="element-wrapper">
	    <h6 class="element-header">Users</h6>
	    <div class="element-box">

	        <div class="table-responsive">
	            <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


	                <div class="row">
	                    <div class="col-sm-12">
					        <div class="table-responsive">
					            <table class="table table-bordered table-lg table-v2 table-striped">
					                <thead>
					                    <tr>
					                        <th>Name</th>
					                        <th>Created Date</th>
					                        <th>Transactions Made</th>
					                        <th>Actions</th>
					                    </tr>
					                </thead>
					                <tbody>

				                	@if ( count( $data ) > 0 )

					                	@foreach( $data as $user )

					                    <tr>
					                        <td class="text-center">
					                        	{{ $user->name }} {{ $user->surname }}
					                        </td>
					                        <td class="text-center">
					                        	{{ $user->created_at->diffForHumans() }}
					                        </td>
					                        <td class="text-center">
					                        	0
					                        </td>
					                        <td class="row-actions">
					                        	<a href="{{ '/block_user' }}/{{ $user->id }}">
					                        		<i class="os-icon os-icon-ui-49"></i> Block
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