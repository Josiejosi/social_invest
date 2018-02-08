	var bitcoin_value 			= crypto_rate ;
	var ethuruem_value 			= crypto_rate ;

	var total_cash_amount 		= 0 ;
	var total_bitcoin_amount 	= 0 ;
	var total_ethuruem_amount 	= 0 ;

	var errors 					= "" ;

$("#btnCalculate").on('click', function(e){
	e.preventDefault() ;


	var amount 					= $("#investment_amount").val() ;
	var months 					= $("#number_of_months").val() ;


	amount 						= parseFloat(amount) ;

	months 						= parseInt(months) ;
	var perc 					= ( months * 30 ) / 100 ;
	perc 						= parseFloat(perc) ;

	var compond_growth 			= ( amount * perc ) + amount ;

	total_cash_amount 			= Math.round( compond_growth, 10 ) ;

	total_bitcoin_amount 		= total_cash_amount / bitcoin_value ;
	//total_bitcoin_amount 		= Math.round( total_bitcoin_amount, 8 ) ;
	total_ethuruem_amount 		= total_cash_amount / ethuruem_value ;
	//total_ethuruem_amount 		= Math.round( total_ethuruem_amount, 8 ) ;

	$("#display_investment").show() ;
	$("#cash_span").html( "$ " + total_cash_amount + " USD" )
	$("#bitcoin_span").html( total_bitcoin_amount )
	$("#ethereum_span").html( total_ethuruem_amount )
}) ;

$(function(){
	$("#display_investment").hide() ;
});

