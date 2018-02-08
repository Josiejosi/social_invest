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
			                    <div class="value">ZAR {{ round( (float) $funds_received, 2 ) }}</div>
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
			            <h5 class="element-box-header">Create a dream</h5>
			            <div class="row">
			                <div class="col-sm-5">
			                    <div class="form-group">
			                        <label class="lighter" for="">Select Amount</label>
			                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				                        <select class="form-control" name="amount">
				                        	<!-- LEVEL 1 -->
				                            <option value="200">200</option>
				                            <option value="500">500</option>
				                            <option value="1000">1000</option>
				                            <option value="1500">1500</option>
				                            <option value="2000">2000</option>
				                        	<!-- LEVEL 2 -->
				                        	@if( $level === 2 )
				                            <option value="5000">5000</option>
				                            <option value="8000">8000</option>
				                            <option value="10000">10000</option>
				                            <option value="12000">12000</option>
				                            <option value="15000">15000</option>
				                            @endif
				                        	<!-- LEVEL 3 -->
				                        	@if( $level === 3 )
				                            <option value="18000">18000</option>
				                            <option value="20000">20000</option>
				                            <option value="22000">22000</option>
				                            <option value="25000">25000</option>
				                            <option value="50000">50000</option>
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
			                            <option value="Bank Deposit">Bank Deposit</option>
			                            <option value="Bitcoin">Bitcoin</option>
			                            <option value="Ethereum">Ethereum</option>
			                        </select>
			                    </div>
			                </div>
			            </div>

			            <div class="row">
			            	<div class="col-sm-12">
			                    <div class="form-group">
			                        <label class="lighter" for="">Dream name</label>
			                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
			                            <input class="form-control" placeholder="EG: School Fees" type="text" value="">
			                        </div>
			                    </div>
			                </div>
			            </div>

			            <div class="row">
			            	<div class="col-sm-12">
			                    <div class="form-group">
			                        <label class="lighter" for="">Maturity Months</label>
			                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
			                        <select class="form-control">
			                            <option value="1">1 Month</option>
			                            <option value="2">2 Months</option>
			                            <option value="3">3 Months</option>
			                            <option value="4">4 Months</option>
			                            <option value="5">5 Months</option>
			                            <option value="6">6 Months</option>
			                        </select>
			                        </div>
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
					    <div class="alert-btn"><a class="btn btn-white-gold btn-block" href="#">Withdraw</a></div>
					</div>

					<div class="alert alert-info borderless">
					    <h5 class="alert-heading">Refer Friends. Get Rewarded</h5>
					    <p>You can earn: 15,000 Membership Rewards points for each approved referral – up to 55,000 Membership Rewards points per calendar year.</p>
					    <div class="alert-btn"><a class="btn btn-white-gold" href="#"><i class="os-icon os-icon-ui-92"></i><span>Send Referral</span></a></div>
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
			                        <th>Maturity Month(s)</th>
			                        <th>Pay Date</th>
			                        <th>Allocated Member</th>
			                        <th>Status</th>
			                        <th>Actions</th>
			                    </tr>
			                </thead>
			                <tbody>
			                    <tr>
			                        <td class="text-center">Demo Dream</td>
			                        <td class="text-right">0.00 ZAR</td>
			                        <td class="text-right">0.00 ZAR</td>
			                        <td>0 Month</td>
			                        <td>00-00-0000</td>
			                        <td>Unknown</td>
			                        <td class="text-center">
			                            <div class="status-pill green" data-title="Complete" data-toggle="tooltip" data-original-title="" title=""></div> Active
			                        </td>
			                        <td class="row-actions">
			                        	<a href="#">
			                        		<i class="os-icon os-icon-ui-49"></i> Withdraw
			                        	</a>
			                        </td>
			                    </tr>

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