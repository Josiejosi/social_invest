@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h3>Verification Code</h3>
            </div>
            <div class="col-md-8 col-md-offset-2">
                
                <div class="default-form-area">
                    <form action="{{ url( '/verification' ) }}" method="post" class="col-md-10 col-md-offset-1 default-form">

                    	{!! csrf_field() !!}

                        <div class="row clearfix">
                                        
                            <div class="form-group style-two">
                                <input type="text" 
                                	name="verification_code" 
                                	class="form-control textarea" 
                                	value="" 
                                	placeholder="Verification Code">
                            </div>
                            
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <button class="thm-btn thm-color" type="submit">Verify</button>
                            </div>
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <a class="btn-link btn-info" href="{{ url( '/resend_verification_code' ) }}">Resend Verification Code?</a>
                            </div>
                        </div> 

                    </form>
                </div> 

            </div>         
        </div>
    </section>

@endsection