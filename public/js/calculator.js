!function(t){var n={};function e(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,e),o.l=!0,o.exports}e.m=t,e.c=n,e.d=function(t,n,r){e.o(t,n)||Object.defineProperty(t,n,{configurable:!1,enumerable:!0,get:r})},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="",e(e.s=48)}({48:function(t,n,e){t.exports=e(49)},49:function(t,n){var e=btc_rate,r=eth_rate,o=0,a=0,u=0;function i(t,n){t=parseFloat(t);var i=30*(n=parseInt(n))/100,c=t*(i=parseFloat(i))+t;o=Math.round(c,10),a=o/e,u=o/r,$("#display_investment").show(),$("#cash_span").html("$ "+o+" USD"),$("#bitcoin_span").html(a),$("#ethereum_span").html(u)}$("#btnCalculate").on("click",function(t){t.preventDefault(),i($("#investment_amount").val(),$("#number_of_months").val())}),$(function(){i(200,1),$("#display_investment").hide()})}});