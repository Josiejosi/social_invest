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
                         
                        <div class="sec-title text-center">
                            <h4>Payment Details</h4> 
                            <p>Please feel free to leave any field that does not apply to you</p>
                        </div>

                                     
                            <div class="form-group style-two">
                                <select name="bank_name" class="form-control textarea" value="" placeholder="Bank Name">
                                    <option disabled="true">Please select</option>

                                    <option value="ABSA Bank" {{ ( old('bank_name') == 'ABSA Bank' )? 'selected': ''  }}>
                                        ABSA Bank
                                    </option>

                                    <option value="African Bank" {{ ( old('bank_name') == 'African Bank' )? 'selected': ''  }}>
                                        African Bank
                                    </option>

                                    <option value="Capitec Bank" {{ ( old('bank_name') == 'Capitec Bank' )? 'selected': ''  }}>
                                        Capitec Bank
                                    </option>

                                    <option value="FirstRand Bank" {{ ( old('bank_name') == 'FirstRand Bank' )? 'selected': ''  }}>
                                        FirstRand Bank
                                    </option>

                                    <option value="FNB" {{ ( old('bank_name') == 'FNB' )? 'selected': ''  }}>
                                        FNB
                                    </option>

                                    <option value="NedBank" {{ ( old('bank_name') == 'NedBank' )? 'selected': ''  }}>
                                        NedBank 
                                    </option>

                                    <option value="Standard Bank" {{ ( old('bank_name') == 'Standard Bank' )? 'selected': ''  }}>
                                        Standard Bank
                                    </option>

                                    <option value="U Bank" {{ ( old('bank_name') == 'U Bank' )? 'selected': ''  }}>
                                        U Bank
                                    </option>
                                    
                                </select>
                                @if ($errors->has('bank_name'))
                                <span class="help-block has-error">{{ $errors->first('bank_name') }}</span>
                                @endif
                            </div>
                        
                                    
                            <div class="form-group style-two">
                                <input type="text" name="account_number" class="form-control textarea" value="" placeholder="Account Number">
                                @if ($errors->has('account_number'))
                                <span class="help-block has-error">{{ $errors->first('account_number') }}</span>
                                @endif
                            </div>
                        
                            <div class="form-group style-two">
                                <input type="text" name="branch_name" class="form-control textarea" value="" placeholder="Branch Name">
                            </div>
                        
                            <div class="form-group style-two">
                                <input type="text" name="branch_code" class="form-control textarea" value="" placeholder="Branch Code">
                                @if ($errors->has('branch_code'))
                                <span class="help-block has-error">{{ $errors->first('branch_code') }}</span>
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