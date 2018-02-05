@extends('layouts.frontend')

@section('content')


@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h3>Reset My Password</h3>
            </div>
            <div class="col-md-8 col-md-offset-2">
                
                <div class="default-form-area">
                    <form  class="col-md-10 col-md-offset-1 default-form">

                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <div class="form-group  style-two">
                                    <input type="email" name="email" class="form-control textarea" value="" placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <button class="thm-btn thm-color" type="submit" data-loading-text="Please wait...">Send Link</button>
                            </div>
                        </div> 
                    </form>
                </div> 

            </div>         
        </div>
    </section>

@endsection


@endsection