

require('./bootstrap');

window.Vue = require('vue').default;


import appp from './app.vue'

const app = new Vue({
    el: '#app',
    components:{
        appp
    }
});
