@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h2>External Wallet Address(es)</h2>
            </div>
            <div class="col-md-6 col-md-offset-3">

                <div class="">

                    <form action="{{ url( '/external_wallet' ) }}" class="default-form" method="post">

                        {!! csrf_field() !!}

                        <div class="row clearfix">
                       

                            <div class="form-group">

                              <input type="text" 
                                      name="bitcoin_address" 
                                      class="form-control" 
                                      value="{{ old('bitcoin_address') }}"
                                      placeholder="BITCOIN Address">

                                  @if ($errors->has('bitcoin_address'))

                                  <span class="help-block has-error">{{ $errors->first('bitcoin_address') }}</span>

                                  @endif

                            </div>

                            <div class="form-group">

                              <input type="text" 
                                     name="ethereum_address" 
                                     class="form-control" 
                                     value="{{ old('ethereum_address') }}"
                                     placeholder="ETHEREUM Address">

                                  @if ($errors->has('ethereum_address'))

                                  <span class="help-block has-error">{{ $errors->first('ethereum_address') }}</span>

                                  @endif

                            </div>
                                            
                        </div>

                        <div class="contact-section-btn text-center">

                            <div class="form-group style-two">

                                <button class="thm-btn thm-color" type="submit">Finish</button>

                            </div>

                        </div> 

                    </form>
                </div> 

            </div>         
        </div>
    </section>


@endsection