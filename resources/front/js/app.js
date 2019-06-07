
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

let Vue = require('vue');
let VueRouter = require('vue-router').default;
let BootstrapVue = require('bootstrap-vue').default;
let Vuex = require('vuex');
let VueMoment = require('vue-moment-jalaali');

require('./bootstrap');

Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(VueMoment);

Vue.component('main-layout', require('./views/layouts/main').default);

const router = new VueRouter({
    mode: 'history',
    routes: require('./routes').default,
});

const app = new Vue({
    el: '#app',
    router
});
