@extends('layouts.frontend')

@section('content')


@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h3>Password Reset</h3>
            </div>
            <div class="col-md-8 col-md-offset-2">
                
                <div class="default-form-area">
                    <form  class="col-md-10 col-md-offset-1 default-form" method="post" action="{{ url( '/reset_password' ) }}">

                        {!! csrf_field() !!}

                        <div class="row clearfix">
                                        
                            <div class="form-group  style-two">
                                <input type="email" name="email" class="form-control" value="" placeholder="Email Address">
                            </div>
                            
                        </div>
                        <div class="row clearfix">
                                        
                            <div class="form-group  style-two">
                                <input type="password" name="password" class="form-control" value="" placeholder="New Password">
                            </div>
                            
                        </div>
                        <div class="row clearfix">
                                        
                            <div class="form-group  style-two">
                                <input type="password" name="password_confirmation" class="form-control" value="" placeholder="Confirm Password">
                            </div>
                            
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <button class="thm-btn thm-color" type="submit">Reset Password</button>
                            </div>
                        </div> 
                    </form>
                </div> 

            </div>         
        </div>
    </section>

@endsection


@endsection