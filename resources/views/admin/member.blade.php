@extends('layouts.backend')

@section('content')

	<div class="element-box">
	    <form method="post" action="{{ url( '/admin_member' ) }}">

			{!! csrf_field() !!}

	        <h5 class="form-header">New Admin</h5>

	        <div class="form-group">
	            <label for="user_id"> Admin</label>
	            <select class="form-control" name="user_id">
	                <option>Select</option>

	                @foreach( $data as $user )
	                	@if ( \App\Helpers\Helper::getUserRole( $user->id ) === 1 )
	                		<option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
	                	@endif
	                @endforeach

	            </select>
	        </div>

	        <div class="form-buttons-w">
	            <button class="btn btn-primary" type="submit"> Update</button>
	        </div>
	    </form>
	</div>

@endsection

@section( 'js' )
	<script src="{{ asset( 'js/backend.js' ) }}"></script>
@endsection