@extends('layouts.frontend')

@section('content')


    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h2>Join us</h2>
            </div>
            <div class="col-md-6 col-md-offset-3">

                <div class="">
                    <form action="{{ url( '/register' ) }}" class="default-form" method="post">

                        {!! csrf_field() !!}

                        <div class="row clearfix">

                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Some fields are incorrect, please check for invalid info.
                                </div>
                            @endif
                                         
                            <div class="form-group">

                                <input type="text" 
                                       name="name" 
                                       class="form-control" 
                                       value="{{ old('name') }}" 
                                       placeholder="First Name">

                                @if ($errors->has('name'))
                                <span class="help-block has-error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">

                                <input type="text" 
                                       name="surname" 
                                       class="form-control textarea" 
                                       value="{{ old('surname') }}" 
                                       placeholder="Last Name">

                            </div>

                            
                            <div class="form-group">

                                <input type="email" 
                                       name="email" 
                                       class="form-control textarea" 
                                       value="{{ old('email') }}" 
                                       placeholder="Email Address">

                                @if ($errors->has('email'))
                                <span class="help-block has-error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        
                            <div class="form-group">

                                <input type="password" 
                                       name="password" 
                                       class="form-control textarea" 
                                       value="" 
                                       placeholder="Password">

                                @if ($errors->has('password'))
                                <span class="help-block has-error">{{ $errors->first('password') }}</span>
                                @endif

                            </div>
                        
                            <div class="form-group">

                                <input type="password" 
                                       name="password_confirmation" 
                                       class="form-control" 
                                       value="" 
                                       placeholder="Confirm Password">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block has-error">{{ $errors->first('password_confirmation') }}</span>
                                @endif

                            </div>

                            <div class="form-group">
                                <div class="alert alert-info alert-important">
                                    Would you like to create a blockchain.info Wallet, to manage your coins?
                                </div>
                            </div>

                            <div class="form-group">

                                <label class="radio-inline">
                                    <input 
                                        type="radio" 
                                        name="blockchain_wallet" 
                                        onclick="userRequireWallet('Yes')"
                                        value="Yes">Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" 
                                        name="blockchain_wallet" 
                                        onclick="userRequireWallet('No')"
                                        value="No">No
                                </label>

                            </div>
       
                            <div class="form-group">
                                <span id="crypto_info"></span>
                            </div>                         

                            <div id="crypto_manual_provider">                         

                                <div class="form-group">

                                  <input type="text" 
                                          name="bitcoin_address" 
                                          class="form-control textarea" 
                                          value="{{ old('bitcoin_address') }}"
                                          placeholder="BITCOIN Address">
                                      @if ($errors->has('bitcoin_address'))
                                      <span class="help-block has-error">{{ $errors->first('bitcoin_address') }}</span>
                                      @endif
                                </div>
                                <div class="form-group">
                                  <input type="text" 
                                         name="ethereum_address" 
                                         class="form-control textarea" 
                                         value="{{ old('ethereum_address') }}"
                                         placeholder="ETHEREUM Address">
                                      @if ($errors->has('ethereum_address'))
                                      <span class="help-block has-error">{{ $errors->first('ethereum_address') }}</span>
                                      @endif
                                </div>

                            </div> 

                            @if ( isset( $data["referral_code"] ) ) 
                            <div class="form-group">

                                <input type="text" 
                                        name="referral_code" 
                                        class="form-control textarea"
                                        readonly="true" 
                                        value="{{ $data["referral_code"] }}"
                                        placeholder="Referral Code">


                                
                                <span class="help-block has-success" style="padding: 5px !important; color: #ccc !important ;">
                                    Referral Code
                                </span>
                                
                            </div>

                            @endif                                             
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <button class="thm-btn thm-color" type="submit">Create Account</button>
                            </div>
                        </div> 
                    </form>
                </div> 

            </div>         
        </div>
    </section>


@endsection

@section('js')
    <script>
            
        $( function() {
            $( "#crypto_manual_provider" ).hide() ;
            $( "#crypto_info" ).html( "" ) ;
        }) ;

        function userRequireWallet( user_options ) {

            if ( user_options == "No" ) {
               $( "#crypto_manual_provider" ).show() ; 
               $( "#crypto_info" ).html( 
                    "<div class='alert alert-info'>Please provide BTC address and/or ETH Address, you need to provide only the one's you have. If you leave them blank you will be required to provide later.</div>" 
                ) ; 
            } else {
                $( "#crypto_info" ).html( "" ) ;
                $( "#crypto_manual_provider" ).hide() ;
            }

        }

    </script>
@endsection