@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h2>Existing Blockchain.info Wallet</h2>
            </div>
            <div class="col-md-6 col-md-offset-3">

                <div class="">

                    <form action="{{ url( '/existing_wallet' ) }}" class="default-form" method="post">

                        {!! csrf_field() !!}

                        <div class="row clearfix">
                       

                            <div class="form-group">

                              <input type="text" 
                                      name="wallet_id" 
                                      class="form-control" 
                                      value="{{ old('wallet_id') }}"
                                      placeholder="Wallet ID">

                                  @if ($errors->has('wallet_id'))

                                  <span class="help-block has-error">{{ $errors->first('wallet_id') }}</span>

                                  @endif

                            </div>

                            <div class="form-group">

                              <input type="password" 
                                     name="primary_password" 
                                     class="form-control" 
                                     value="{{ old('primary_password') }}"
                                     placeholder="Primary Password">

                                  @if ($errors->has('primary_password'))

                                  <span class="help-block has-error">{{ $errors->first('primary_password') }}</span>

                                  @endif

                            </div>

                            <div class="form-group">

                              <input type="password" 
                                     name="second_password" 
                                     class="form-control" 
                                     value="{{ old('second_password') }}"
                                     placeholder="Second Password">

                                  @if ($errors->has('second_password'))

                                  <span class="help-block has-error">{{ $errors->first('second_password') }}</span>

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