@extends('layouts.backend')

@section('content')

    <div class="row">

    	<div class="container">

	        <div class="col-sm-12">
	        	
				<div class="element-wrapper">

				    <div class="element-box">

				    <h6 class="element-header">How would you like to make a contribution</h6>
				    <div class="element-box-tp">
						<div class="bread">
				    	<h6>Amount: $ {{ $data[ "transaction" ]->growth_amount }} USD </h6>
				    	<p><strong>Currently Split</strong></p>

				    	<?php $total_splites = 0 ; ?>

				    	@if ( count( $data[ "transaction_split" ] ) > 0 )
				    	<ul>
				    		@foreach( $data[ "transaction_split" ] as $split )
				    		<li>$ {{ $split->donation_amount }} USD</li>
				    		<?php $total_splites += $split->donation_amount ; ?>
				    		@endforeach
				    	</ul>
				    	@else
							<p>0, <small><em>Be the first.</em></small></p>
				    	@endif
				    	
				    	<p>Total Split: $ {{ $total_splites }} USD</p>
				    	<p>Outstanding Amount: $ {{ $data[ "transaction" ]->growth_amount }} USD</p>
						</div>
				    	<div class="alert alert-danger" id="alert-messages">
				    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    		<span id="alert-body">Please select how you would like to contribute.</span>
				    	</div>

						<form>

						    <div class="form-group row">

							    <fieldset class="form-group">
							        <legend><span>Contribution Type</span></legend>

							        <div class="col-sm-12">
							            <div class="form-check">
							                <label class="form-check-label">
							                    <input  
							                    	   class="form-check-input" 
							                    	   name="contribution_type" 
							                    	   type="radio" 
							                    	   id="FullAmount"
							                    	   value="1">Pay the full amount</label>
							            </div>

							        </div>

							        <div class="col-sm-12">
							            <div class="form-check">
							                <label class="form-check-label">
							                    <input  
							                    	   class="form-check-input" 
							                    	   name="contribution_type" 
							                    	   type="radio" 
							                    	   id="SplitAmount"
							                    	   value="0">Split the amount</label>
							            </div>

							        </div>

							    </fieldset>

						    </div>

						    <fieldset class="form-group" id="split_amount">
						        <legend><span>Please provide the amount you which to split</span></legend>
						        <div class="form-group row">
						            <label class="col-sm-4 col-form-label" for=""> Split Amount</label>
						            <div class="col-sm-8">
						                <input class="form-control" id="amount_splite" placeholder="Split Amount" type="text">
						            </div>
						        </div>
						    </fieldset>

						    <div class="form-buttons-w" id="move_forward">
						        <button class="btn btn-primary" type="submit"> Next</button>
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

    <script>

        var transaction_id 			= {{ $data[ "transaction" ]->id }} ;
        var transaction_amount 		= {{ $data[ "transaction" ]->growth_amount }} ;
        var allowed_for_split 		= {{ $data[ "allowed_for_split" ] }} ;

    </script>

	<script src="{{ asset( 'js/select_contribution.js' ) }}"></script>

@endsection