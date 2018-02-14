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