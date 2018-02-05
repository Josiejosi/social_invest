@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h3>Login</h3>
            </div>
            <div class="col-md-8 col-md-offset-2">
                
                <div class="default-form-area">
                    <form  class="col-md-10 col-md-offset-1 default-form" action="{{ url( '/login' ) }}" method="post">

                    	{!! csrf_field() !!}

                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" value="" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" value="" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
							  <div class="checkbox">
							    <label>
							      <input type="checkbox"> Remeber me
							    </label>
							  </div>
                            </div>
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                <button class="thm-btn thm-color" type="submit" data-loading-text="Please wait...">Login</button>
                            </div>
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <a class="btn-link btn-info" href="{{ url( '/forgot_password' ) }}">Forgot Password?</a>
                            </div>
                        </div> 
                    </form>
                </div> 

            </div>         
        </div>
    </section>

@endsection