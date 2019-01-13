
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import $ from 'jquery'
window.Vue = require('vue');
import Chart from 'chart.js'
// window.printJs = require('print-js')
// window.printThis = require('print-this')
// import printThis from 'print-this'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chart-performance-component', require('./components/ChartPerformanceComponent.vue'));
Vue.component('chart-csi-component', require('./components/ChartCsiComponent.vue'));

const app = new Vue({
    el: '#app'
});
