require('./bootstrap') ;
require('./select2') ;
require('./perfectscrollbar') ;
require('./jquerydatatables') ;

require('./dashboard') ;

window.Vue = require('vue');

Vue.component( 'donations', require( './components/Donations.vue' ) ) ;

const app = new Vue({

    el: '#app'

});

