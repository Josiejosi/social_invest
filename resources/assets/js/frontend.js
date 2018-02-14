

require('./bootstrap');
require('./custom');

window.Vue = require('vue');

const app = new Vue({
    el: '#app'
});


$('#flash-overlay-modal').modal();

$('div.alert').not('.alert-important').delay(6000).fadeOut(350);