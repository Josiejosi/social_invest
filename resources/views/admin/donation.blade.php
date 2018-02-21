@extends('layouts.backend')

@section('content')

	<div class="element-box">
	    <form method="post" action="{{ url( '/donation' ) }}">

			{!! csrf_field() !!}

	        <h5 class="form-header">New Donation</h5>
	        <div class="form-group">
	            <label for="amount"> Amount</label>
	            <input class="form-control" name="amount" placeholder="Amount in USD" type="input">
	        </div>
	        <div class="form-group">
	            <label for="donee_id"> Admin</label>
	            <select class="form-control" name="donee_id">
	                <option>Select</option>

	                @foreach( $data as $user )
	                	@if ( \App\Helpers\Helper::getUserRole( $user->id ) === 2 )
	                		<option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
	                	@endif
	                @endforeach

	            </select>
	        </div>
	        <div class="form-group">
	            <label for="deposit_type"> Donation Type</label>
	            <select class="form-control" name="deposit_type">
	                <option>Select</option>
	                <option value="Both">Both</option>
	                <option value="BTC">BTC</option>
	                <option value="ETH">ETH</option>

	            </select>
	        </div>

	        <div class="form-buttons-w">
	            <button class="btn btn-primary" type="submit"> Create</button>
	        </div>
	    </form>
	</div>

@endsection
@section( 'js' )
	<script src="{{ asset( 'js/backend.js' ) }}"></script>
@endsection