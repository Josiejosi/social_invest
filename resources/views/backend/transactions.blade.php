@extends('layouts.backend')

@section('content')


	<div class="element-wrapper">
	    <h6 class="element-header">Transactions</h6>
	    <div class="element-box">

	        <div class="table-responsive">
	            <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


	                <div class="row">
	                    <div class="col-sm-12">
	                        <table id="transactions" width="100%" class="table table-striped table-lightfont dataTable" role="grid" aria-describedby="dataTable1_info" style="width: 100%;">
	                            <thead>
	                                <tr>
	                                    <th rowspan="1" colspan="1">Reference Code</th>
	                                    <th rowspan="1" colspan="1">Sender</th>
	                                    <th rowspan="1" colspan="1">Receiver</th>
	                                    <th rowspan="1" colspan="1">Account</th>
	                                    <th rowspan="1" colspan="1">Date</th>
	                                    <th rowspan="1" colspan="1">Amount</th>
	                                </tr>
	                            </thead>

	                            <tbody>
	                                <tr role="row">
	                                    <td">No new transactions</td>
	                                    <td></td>
	                                    <td></td>
	                                    <td></td>
	                                    <td></td>
	                                    <td></td>
	                                    <td></td>
	                                </tr>
	                            </tbody>
	                            <tfoot>
	                                <tr>
	                                    <th rowspan="1" colspan="1">Reference Code</th>
	                                    <th rowspan="1" colspan="1">Sender</th>
	                                    <th rowspan="1" colspan="1">Receiver</th>
	                                    <th rowspan="1" colspan="1">Account</th>
	                                    <th rowspan="1" colspan="1">Date</th>
	                                    <th rowspan="1" colspan="1">Amount</th>
	                                </tr>
	                            </tfoot>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


@endsection