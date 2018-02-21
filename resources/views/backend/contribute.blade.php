@extends('layouts.backend')


@section('content')

    <div class="element-wrapper">
        <div class="invoice-w">
            <div class="infos">
                <div class="info-1">
                    <div class="invoice-logo-w"><img alt="" src="{{ asset( 'images/favicon/favicon-32x32.png' ) }}"></div>
                    <div class="company-name">BITROSEED</div>
                </div>
                <div class="info-2">
                    <div class="invoice-logo-w" id="QRCode"></div>
                    <div class="company-name">{{ $data[ "donee" ]->name }} {{ $data[ "donee" ]->surname }}</div>
                </div>
            </div>
            <div class="invoice-heading">
                <h3>Transaction</h3>
                <div class="invoice-date">{{ $data[ "transaction" ]->payday->format('l jS \\of F Y') }}</div>
            </div>
            <div class="invoice-body">
                <div class="invoice-desc">
                    <div class="desc-label">Transaction Ref #</div>
                    <div class="desc-value">{{ $data[ "transaction" ]->transaction_reference_code }}</div>
                </div>
                    <div class="terms">
                        <div class="terms-content">
                        	<div class="alert alert-info alert-important">
                        		<strong>NOTE:</strong> You need only contribute using <strong>BTC OR ETH</strong> not both.
                        	</div>
                        </div>
                    </div>
                <div class="invoice-table">
                    <table class="table">
                        <tbody>
                            @if ( $data[ "transaction" ]->deposit_type === "Both" )
                            <tr>
                                <td><strong><i class="fab fa-btc"></i> BTC</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $data[ "btc_address" ] }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">$ {{ $data[ "amount" ] }} USD</td>
                            </tr>
                            <tr>
                                <td class="text-right">{{ $data[ "btc_amount" ] }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    @if ( isset( request()->route()->parameters['amount'] ) )
                                    <a href="{{ url( '/confirm_contribution' ) }}/{{ $data[ 'transaction' ]->id }}/{{request()->route()->parameters['amount']}}" 
                                       class="btn btn-success btn-sm" 
                                       data-toggle="modal">
                                        <i class="os-icon os-icon-ui-49"></i> Send ( BTC ) & Confirm
                                    </a>
                                    @else
    	                        	<a href="{{ url( '/confirm_contribution' ) }}/{{ $data[ 'transaction' ]->id }}" 
    	                        	   class="btn btn-success btn-sm" 
    	                        	   data-toggle="modal">
    	                        		<i class="os-icon os-icon-ui-49"></i> Send ( BTC ) & Confirm
    	                        	</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong><i class="fab fa-ethereum"></i> ETH</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $data[ "eth_address" ] }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">$ {{ $data[ "amount" ] }} USD</td>
                            </tr>
                            <tr>
                                <td class="text-right">{{ $data[ "eth_amount" ] }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">

                                    @if ( isset( request()->route()->parameters['amount'] ) )

                                    <a href="{{ url( '/confirm_contribution' ) }}/{{ $data[ 'transaction' ]->id }}/{{request()->route()->parameters['amount']}}" 
                                       class="btn btn-success btn-sm" 
                                       data-toggle="modal">
                                        <i class="os-icon os-icon-ui-49"></i> Send ( ETH ) & Confirm
                                    </a>

                                    @else

    	                        	<a href="{{ url( '/confirm_contribution' ) }}/{{ $data->id }}" 
    	                        	   class="btn btn-success btn-sm" 
    	                        	   data-toggle="modal">
    	                        		<i class="os-icon os-icon-ui-49"></i> Send ( ETH ) & Confirm
    	                        	</a>

                                    @endif
                                </td>
                            </tr>
                            @elseif ( $data[ "transaction" ]->deposit_type === "BTC" )
                            <tr>
                                <td><strong><i class="fab fa-btc"></i> BTC</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $data[ "btc_address" ] }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">$ {{ $data[ "amount" ] }} USD</td>
                            </tr>
                            <tr>
                                <td class="text-right">{{ $data[ "btc_amount" ] }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">

                                    @if ( isset( request()->route()->parameters['amount'] ) )
                                    <a href="{{ url( '/confirm_contribution' ) }}/{{ $data[ 'transaction' ]->id }}/{{request()->route()->parameters['amount']}}" 
                                       class="btn btn-success btn-sm" 
                                       data-toggle="modal">
                                        <i class="os-icon os-icon-ui-49"></i> Send ( BTC ) & Confirm
                                    </a>

                                    @else

                                    <a href="{{ url( '/confirm_contribution' ) }}/{{ $data[ 'transaction' ]->id }}" 
                                       class="btn btn-success btn-sm" 
                                       data-toggle="modal">
                                        <i class="os-icon os-icon-ui-49"></i> Send ( BTC ) & Confirm
                                    </a>

                                    @endif

                                </td>
                            </tr>
                            @elseif ( $data[ "transaction" ]->deposit_type === "ETH" )
                            <tr>
                                <td><strong><i class="fab fa-ethereum"></i> ETH</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $data[ "eth_address" ] }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">$ {{ $data[ "amount" ] }} USD</td>
                            </tr>

                            <tr>
                                <td class="text-right">{{ $data[ "eth_amount" ] }}</td>
                            </tr>
                            <tr>

                                <td class="text-center">
                                    
                                    @if ( isset( request()->route()->parameters['amount'] ) )

                                    <a href="{{ url( '/confirm_contribution' ) }}/{{ $data[ 'transaction' ]->id }}/{{request()->route()->parameters['amount']}}" 
                                       class="btn btn-success btn-sm" 
                                       data-toggle="modal">
                                        <i class="os-icon os-icon-ui-49"></i> Send ( ETH ) & Confirm
                                    </a>

                                    @else

                                    <a href="{{ url( '/confirm_contribution' ) }}/{{ $data[ 'transaction' ]->id }}" 
                                       class="btn btn-success btn-sm" 
                                       data-toggle="modal">
                                        <i class="os-icon os-icon-ui-49"></i> Send ( ETH ) & Confirm
                                    </a>

                                    @endif

                                </td>

                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="terms">
                        <div class="terms-header">Terms and Conditions</div>
                        <div class="terms-content">Please click one button, either BTC or ETH after you made the transaction.</div>
                    </div>
                </div>
            </div>
            <div class="invoice-footer">
                <div class="invoice-logo"><img alt="" src="{{ asset( 'images/favicon/favicon-32x32.png' ) }}"><span>BITROSEED</span></div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    <script>

        var transaction_id = {{ $data[ 'transaction' ]->id }} ;

    </script>

    <script src="{{ asset('js/confirmation.js') }}"></script>
    <script src="{{ asset('js/jquery-qrcode-0.14.0.min.js') }}"></script>

    <script>

        var text = "{{ $data[ 'qrcode_string' ]}}" ;
       
        $("#QRCode").qrcode( { render: 'image', text: text } );

    </script>


@endsection