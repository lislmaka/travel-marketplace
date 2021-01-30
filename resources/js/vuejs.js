//window.Vue = require('vue');
import Vue from 'vue';

window.Vue = Vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
let price = $('#price').val();
let old_price = $('#old_price').val();
let event_options = $('#event_options').val();

const app = new Vue({
    el: '#app',
    data: {
        event_options: JSON.parse(event_options),
        event_options_checked: [],
        price: price,
        old_price: old_price,
        quantity: 1
    },
    computed: {
        summa: function () {
            let total_summs = 0;
            let quantity = this.quantity;
            if (this.event_options_checked) {
                this.event_options_checked.forEach(function (item, i, arr) {
                    total_summs = total_summs + item * quantity;
                });
            }
            return this.quantity * this.price + total_summs;
        },
        summa_old: function () {
            let total_summs = 0;
            let quantity = this.quantity;
            if (this.event_options_checked) {
                this.event_options_checked.forEach(function (item, i, arr) {
                    total_summs = total_summs + item * quantity;
                });
            }
            return this.quantity * this.old_price + total_summs;
        },
    },
    methods: {
        formatPrice(value) {
            //let val = (value/1).toFixed(2).replace('.', ',')
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        downCount: function () {
            if (this.quantity === 1) {
                this.quantity = 1;
            } else {
                this.quantity--;
            }
        },
        upCount: function () {
            this.quantity++;
        },
    },
    filters: {
        truncate: function (str, len) {
            if (str && str.length > len) {
                str = str.substring(0, len) + '...';
            }
            return str
        }
    },
});
