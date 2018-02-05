@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h3>Calculate your profit</h3>
            </div>
            <div class="col-md-8 col-md-offset-2">
                
                <div class="default-form-area">
                    <form  class="col-md-10 col-md-offset-1 default-form">

                        <div id="display_investment">
                            <div class="well">
                                <h4 class="text-center">
                                    CASH: <span id="cash_span">200 ZAR</span><br />
                                    BITCOIN: <span id="bitcoin_span">0.000200</span><br /> 
                                    ETHEREUM: <span id="ethereum_span">0.000200</span>
                                </h4>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <div class="form-group">
                                    <input type="text" name="investment_amount" id="investment_amount" class="form-control" value="200" placeholder="Amount to invest">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <div class="form-group">
                                    <select name="number_of_months" id="number_of_months" class="form-control" placeholder="Number of months to mature">
                                        <option value="1">1 Month</option>
                                        <option value="2">2 Months</option>
                                        <option value="3">3 Months</option>
                                        <option value="4">4 Months</option>
                                        <option value="5">5 Months</option>
                                        <option value="6">6 Months</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="contact-section-btn text-center">
                            <div class="form-group style-two">
                                <button class="thm-btn thm-color" id="btnCalculate" type="submit" data-loading-text="Please wait...">Calculate</button>
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
        var crypto_rate = {{ $data["crypto_rate"] }} ;
    </script>
    <script src="{{ asset( 'js/calculator.js' ) }}"></script>
@endsection
