@extends('layouts.backend')


@section('content')

    <?php 

        $user  = \App\Models\User::find( $data->donee_id ) ;

        $qrcode_string = "" ;

        $b = \App\Helpers\Helper::getCryptoData() ;
        $c = \App\Helpers\Helper::getCryptoData() ;

        $btc_val              = $data->growth_amount / $b ;
        $eth_val              = $data->growth_amount  / $c ;

        $cryptos = $user->crpyto()->get() ;

        $bitcoin = "" ;
        $eth = "" ;

        if ( count($cryptos) > 0 ) {
            foreach ( $cryptos as $crypto ) {
                
                if ( $crypto->name === "BITCOIN" ) {
                    $bitcoin = $crypto->address ;

                    $qrcode_string .= "BTC Address: $bitcoin" ;
                } else {
                    $eth = $crypto->address ; 

                    $qrcode_string .= ", ETH Address: $eth" ;
                }
            }
        }

    ?>


    <div class="element-wrapper">
        <div class="invoice-w">
            <div class="infos">
                <div class="info-1">
                    <div class="invoice-logo-w"><img alt="" src="{{ asset( 'images/favicon/favicon-32x32.png' ) }}"></div>
                    <div class="company-name">BITROSEED</div>
                </div>
                <div class="info-2">
                    <div class="invoice-logo-w" id="QRCode"></div>
                    <div class="company-name">{{ $user->name }} {{ $user->surname }}</div>
                </div>
            </div>
            <div class="invoice-heading">
                <h3>Transaction</h3>
                <div class="invoice-date">{{ $data->payday }}</div>
            </div>
            <div class="invoice-body">
                <div class="invoice-desc">
                    <div class="desc-label">Transaction Ref #</div>
                    <div class="desc-value">{{ $data->transaction_reference_code }}</div>
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
                            @if ( $data->deposit_type === "Both" )
                            <tr>
                                <td><strong><i class="fab fa-btc"></i> BTC</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $bitcoin }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">$ {{ $data->growth_amount }} USD</td>
                            </tr>
                            <tr>
                                <td class="text-right">{{ $btc_val }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">
    	                        	<a href="{{ url( '/confirm_contribution' ) }}/{{ $data->id }}" 
    	                        	   class="btn btn-success btn-sm" 
    	                        	   data-toggle="modal">
    	                        		<i class="os-icon os-icon-ui-49"></i> Send ( BTC ) & Confirm
    	                        	</a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><i class="fab fa-ethereum"></i> ETH</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $bitcoin }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">$ {{ $data->growth_amount }} USD</td>
                            </tr>
                            <tr>
                                <td class="text-right">{{ $eth_val }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">
    	                        	<a href="{{ url( '/confirm_contribution' ) }}/{{ $data->id }}" 
    	                        	   class="btn btn-success btn-sm" 
    	                        	   data-toggle="modal">
    	                        		<i class="os-icon os-icon-ui-49"></i> Send ( ETH ) & Confirm
    	                        	</a>
                                </td>
                            </tr>
                            @elseif ( $data->deposit_type === "BTC" )
                            <tr>
                                <td><strong><i class="fab fa-btc"></i> BTC</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $bitcoin }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">$ {{ $data->growth_amount }} USD</td>
                            </tr>
                            <tr>
                                <td class="text-right">{{ $btc_val }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <a href="{{ url( '/confirm_contribution' ) }}/{{ $data->id }}" 
                                       class="btn btn-success btn-sm" 
                                       data-toggle="modal">
                                        <i class="os-icon os-icon-ui-49"></i> Send ( BTC ) & Confirm
                                    </a>
                                </td>
                            </tr>
                            @elseif ( $data->deposit_type === "ETH" )
                            <tr>
                                <td><strong><i class="fab fa-ethereum"></i> ETH</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $eth }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">$ {{ $data->growth_amount }} USD</td>
                            </tr>

                            <tr>
                                <td class="text-right">{{ $eth_val }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <a href="{{ url( '/confirm_contribution' ) }}/{{ $data->id }}" 
                                       class="btn btn-success btn-sm" 
                                       data-toggle="modal">
                                        <i class="os-icon os-icon-ui-49"></i> Send ( ETH ) & Confirm
                                    </a>
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

    <script src="{{ asset('js/jquery-qrcode-0.14.0.min.js') }}"></script>
    <script>

        var text = '{{ $qrcode_string }}'
        
        $("#QRCode").qrcode({

            render: 'image',
            text: text

        });

    </script>

@endsection