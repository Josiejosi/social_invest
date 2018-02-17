

require('./bootstrap');
require('./custom');

window.Vue = require('vue');

const app = new Vue({
    el: '#app'
});


$('#flash-overlay-modal').modal();

$('div.alert').not('.alert-important').delay(6000).fadeOut(350);


Echo.channel( 'lastest-crypto' )
    .listen('LatestCryptoPrices', (e) => {

    	var btc_rate = $("#btc_rate") ;
    	var eth_rate = $("#eth_rate") ;

        var btc = e.lastest_crypto.btc ;
        var eth = e.lastest_crypto.eth ;

        btc_rate.html( btc ) ;
        eth_rate.html( eth ) ;

    });