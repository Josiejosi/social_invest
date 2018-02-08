@extends('layouts.frontend')

@section('content')


    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h2>Join us</h2>
            </div>
            <div class="col-md-8 col-md-offset-2">

                <div class="default-form-area">
                    <form action="{{ url( '/register' ) }}" class="col-md-10 col-md-offset-1 default-form" method="post">

                        {!! csrf_field() !!}

                        <div class="row clearfix">

                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Some fields are incorrect, please check for invalid info.
                                </div>
                            @endif
                                         
                            <div class="form-group style-two">

                                <input type="text" 
                                       name="name" 
                                       class="form-control" 
                                       value="{{ old('name') }}" 
                                       placeholder="First Name">

                                @if ($errors->has('name'))
                                <span class="help-block has-error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group style-two">

                                <input type="text" 
                                       name="surname" 
                                       class="form-control textarea" 
                                       value="{{ old('surname') }}" 
                                       placeholder="Last Name">

                            </div>

                            
                            <div class="form-group style-two">

                                <input type="email" 
                                       name="email" 
                                       class="form-control textarea" 
                                       value="{{ old('email') }}" 
                                       placeholder="Email">

                                @if ($errors->has('email'))
                                <span class="help-block has-error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        
                            <div class="form-group style-two">

                                <input type="text" 
                                       name="cell_phone_number" 
                                       class="form-control textarea" 
                                       value="{{ old('cell_phone_number') }}" 
                                       placeholder="Phone">

                                @if ($errors->has('cell_phone_number'))
                                <span class="help-block has-error">{{ $errors->first('cell_phone_number') }}</span>
                                @endif
                            </div>
                        
                            <div class="form-group style-two">

                                <input type="password" 
                                       name="password" 
                                       class="form-control textarea" 
                                       value="" 
                                       placeholder="Password">

                                @if ($errors->has('password'))
                                <span class="help-block has-error">{{ $errors->first('password') }}</span>
                                @endif

                            </div>
                        
                            <div class="form-group style-two">

                                <input type="password" 
                                       name="password_confirmation" 
                                       class="form-control" 
                                       value="" 
                                       placeholder="Confirm Password">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block has-error">{{ $errors->first('password_confirmation') }}</span>
                                @endif

                            </div>
                         
                            

                            <div class="form-group style-two">
                                <input type="text" name="bitcoin_address" class="form-control textarea" placeholder="BITCOIN Address">
                                    @if ($errors->has('bitcoin_address'))
                                    <span class="help-block has-error">{{ $errors->first('bitcoin_address') }}</span>
                                    @endif
                            </div>
                            <div class="form-group style-two">
                                <input type="text" name="ethereum_address" class="form-control textarea" placeholder="ETHEREUM Address">
                                    @if ($errors->has('ethereum_address'))
                                    <span class="help-block has-error">{{ $errors->first('ethereum_address') }}</span>
                                    @endif
                            </div>

                            @if ( isset( $data["referral_code"] ) ) 
                            <div class="form-group style-two">

                                <input type="text" 
                                        name="referral_code" 
                                        class="form-control textarea"
                                        readonly="true" 
                                        value="{{ $data["referral_code"] }}"
                                        placeholder="Referral Code">


                                
                                <span class="help-block has-info">Referral Code</span>
                                
                            </div>

                            @endif                                             
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