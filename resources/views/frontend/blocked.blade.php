@extends('layouts.frontend')

@section('content')

    <section class="contact_us">

        <div class="container">   

            <div class="sec-title text-center">
                <h3>Account Blocked by Admin.</h3>
                <p>If you like us to re-activate you account, please send us you details.</p>
            </div>
            
            <div class="col-md-8 col-md-offset-2">
                
                <div class="default-form-area">
                    <form  class="col-md-10 col-md-offset-1 default-form">

                        <div class="row clearfix">
                                        
                            <div class="form-group  style-two">
                                <textarea 
                                    name="user_details" 
                                    class="form-control textarea" 
                                    value="" 
                                    placeholder="Login Details, and summary of why you would like to re-activate account."></textarea>
                            </div>
                            
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <button class="thm-btn thm-color" type="submit" data-loading-text="Please wait...">Send Email</button>
                            </div>
                        </div> 
                    </form>
                </div> 

            </div>         
        </div>
    </section>

@endsection