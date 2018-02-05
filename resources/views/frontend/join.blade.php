@extends('layouts.frontend')

@section('content')


    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h2>Join us now</h2>
            </div>
            <div class="col-md-8 col-md-offset-2">
                
                <div class="default-form-area">
                    <form action="{{ url( '/register' ) }}" class="col-md-10 col-md-offset-1 default-form" method="post">

                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <div class="form-group style-two">
                                    <input type="text" name="name" class="form-control" value="" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <div class="form-group style-two">
                                    <input type="text" name="surname" class="form-control" value="" placeholder="Surname">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group style-two">
                                    <input type="email" name="email" class="form-control" value="" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group style-two">
                                    <input type="text" name="phone" class="form-control" value="" placeholder="Phone">
                                </div>
                            </div>  
                            <div class="sec-title text-center">
                                <h4>Banking Details</h4> 
                                <p>Please feel free to leave any field that does not apply to you</p>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <div class="form-group style-two">
                                    <input type="text" name="name" class="form-control" value="" placeholder="Bank Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <div class="form-group style-two">
                                    <input type="text" name="surname" class="form-control" value="" placeholder="Account Number">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group style-two">
                                    <input type="email" name="email" class="form-control" value="" placeholder="Branch Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group style-two">
                                    <input type="text" name="phone" class="form-control" value="" placeholder="Branch Code">
                                </div>
                            </div>  


                            <div class="form-group style-two">
                                <input type="text" name="form_message" class="form-control textarea" placeholder="BITCOIN Address">
                            </div>
                            <div class="form-group style-two">
                                <input type="text" name="form_message" class="form-control textarea" placeholder="ETHEREUM Address">
                            </div>                                             
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                <button class="thm-btn thm-color" type="submit" data-loading-text="Please wait...">Create Account</button>
                            </div>
                        </div> 
                    </form>
                </div> 

            </div>         
        </div>
    </section>


@endsection