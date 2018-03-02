@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container"> 

            <div class="sec-title text-center">
                <h3>How would you want to manage your coins?</h3>
            </div>

            <div class="col-md-6 col-md-offset-3">
                
                <div class="default-form-area">
                    <form action="{{ url( '/new_wallet' ) }}" method="post" class="col-md-10 col-md-offset-1 default-form">

                    	{!! csrf_field() !!}                        

 
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <button class="thm-btn thm-color btn-block" type="submit">Create me a new blockchain.info wallet?</button>
                            </div>
                        </div>                         

                    </form>

                    <div class="contact-section-btn text-center">
                        <div class="form-group style-two">
                            <a href="{{ url( '/existing_wallet' ) }}" class="thm-btn thm-color btn-block">Link with existing blockchain.info wallet?</a>
                        </div>
                    </div>                          


                    <div class="contact-section-btn text-center">
                        <div class="form-group style-two">
                            <a href="{{ url( '/external_wallet' ) }}" class="thm-btn thm-color btn-block">Have external btc or eth address(es)?</a>
                        </div>
                    </div> 

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


