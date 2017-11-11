
require('./bootstrap');

window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

import Buefy from "buefy";

Vue.use(Buefy);

// var app = new Vue({
//   el: '#app',
//   data: {}
// });
Vue.component('slugWidget', require('./components/slugWidget.vue'));

require('./manage.js');
