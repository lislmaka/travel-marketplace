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
let event_options_price = $('#event_options_price').val();
let event_options_free = $('#event_options_free').val();

const app = new Vue({
    el: '#app',
    data: {
        event_options_price: event_options_price ? JSON.parse(event_options_price) : [],
        event_options_free: event_options_free ? JSON.parse(event_options_free) : [],
        event_options_checked_price: [],
        event_options_checked_free: [],
        price: price,
        old_price: old_price,
        quantity: 1
    },
    computed: {
        summa: function () {
            let total_sums = 0;
            // let quantity = this.quantity;
            // let event_options_price = this.event_options_price;
            // let event_options_free = this.event_options_free;
            // let event_options_checked = this.event_options_checked;

            //
            this.event_options_price.forEach(function (item, i, arr) {
                arr[i].active = false;
            });
            //
            this.event_options_free.forEach(function (item, i, arr) {
                arr[i].active = false;
            });

            if (this.event_options_checked_price) {
                this.event_options_checked_price.forEach(function (item, i, arr) {
                    if (this.event_options_price.length > 0 && this.event_options_price[item].price) {
                        total_sums += this.event_options_price[item].price * this.quantity;
                        this.event_options_price[item].active = true;
                    }
                }, this);
            }

            if (this.event_options_checked_free) {
                this.event_options_checked_free.forEach(function (item, i, arr) {
                    if (this.event_options_free.length > 0 && this.event_options_free[item].free) {
                        this.event_options_free[item].active = true;
                    }
                }, this);
            }

            return this.quantity * this.price + total_sums;
        },
        summa_old: function () {
            let total_sums = 0;
            // let quantity = this.quantity;
            // let event_options_price = this.event_options_price;

            if (this.event_options_checked_price) {
                this.event_options_checked_price.forEach(function (item, i, arr) {
                    if (this.event_options_price.length > 0 && this.event_options_price[item].price) {
                        total_sums += this.event_options_price[item].price * this.quantity;
                    }
                }, this);
            }
            return this.quantity * this.old_price + total_sums;
        },
    },
    methods: {
        formatPrice(value) {
            //let val = (value/1).toFixed(2).replace('.', ',')
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
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
