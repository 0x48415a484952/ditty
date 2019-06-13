
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
Vue.component('avatar', require('./views/elements/avatar').default);
Vue.component('post-link', require('./views/elements/post-link').default);
Vue.component('author-link', require('./views/elements/author-link').default);

const router = new VueRouter({
    mode: 'history',
    routes: require('./routes').default,
});

const app = new Vue({
    el: '#app',
    router,
    data: {
        base_url: document.head.querySelector('meta[name="base-url"]').content,
        api_url : document.head.querySelector('meta[name="api-url"]').content
    }
});
