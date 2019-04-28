
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

let Vue = require('vue');
let VueRouter = require('vue-router').default;

require('./bootstrap');

Vue.use(VueRouter);
Vue.component('main-layout', require('./components/layouts/main').default);

const router = new VueRouter({
    mode: 'history',
    routes: require('./routes').default,
});

const app = new Vue({
    el: '#app',
    router
});
