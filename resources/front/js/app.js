
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
import Notifications from 'vue-notification';


require('./bootstrap');
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(Notifications);
Vue.use(VueMoment);

Vue.component('main-layout', require('./views/layouts/Main').default);
Vue.component('avatar', require('./views/elements/avatar').default);
Vue.component('post-link', require('./views/elements/post-link').default);
Vue.component('author-link', require('./views/elements/author-link').default);

const router = new VueRouter({
    mode: 'history',
    routes: require('./routes').default,
});

router.afterEach((to, from) => {
    gtag('config', 'UA-142575214-1', { page_path: to.path });
});

window.Vue = new Vue({
    el: '#app',
    router,
    data: {
        user: null,
        base_url: document.head.querySelector('meta[name="base-url"]').content,
        api_url : document.head.querySelector('meta[name="api-url"]').content,
        document: {
            title: '',
            appName: window.appName
        },
    },
    methods: {
        setPageTitle(title) {
            document.title = title;
            this.document.title = title;
        },
        getPageTitle() {
            return this.document.title;
        },
        isEmptyObject(object) {
            return $.isEmptyObject(object);
        },
        redirectIfAuthenticated() {
            if (this.isAuthenticated()) {
                this.$router.push({ name: 'index'});
                return true;
            }
            return false;
        },
        isAuthenticated() {
            return ! this.isEmptyObject(this.user);
        }
    },
    mounted() {
        $.get(this.api_url + '/profile', (response) => {
            if (response.status == 1) {
                this.user = response.data.user;
            }
        });
    }
});
