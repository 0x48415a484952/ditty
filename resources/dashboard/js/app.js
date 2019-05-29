
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
// import VeeValidate from 'vee-validate';
import Multiselect from 'vue-multiselect';
import BootstrapVue from 'bootstrap-vue';

Vue.use(VueRouter);
Vue.use(BootstrapVue);

/* Vue.use(VeeValidate, {
    classes: true,
    locale: 'fa',
    classNames: {
        valid: 'is-valid',
        invalid: 'is-invalid'
    }
}); */

Vue.component('main-layout', require('./components/layouts/MainComponent.vue').default);
// Vue.directive('b-card', require('bootstrap-vue/es/components/card/card').default);

Vue.component('b-modal', require('bootstrap-vue/es/components/modal/modal').default);
Vue.directive('b-modal', require('bootstrap-vue/es/directives/modal/modal').default);

Vue.component('multiselect', Multiselect);

const router = new VueRouter({
    mode: 'history',
    routes
});

const App = new Vue({
    el: '#app',
    router,
    data: {
        base_url: document.head.querySelector('meta[name="base-url"]').content,
        api_url : document.head.querySelector('meta[name="api-url"]').content,
        user: null,
        isInitializing: true,
        footerStack: []
    },
    mounted() {
        $.get(this.$root.api_url + '/profile', (response) => {
            if (response.data.user) {
                this.$root.user = response.data.user;
            }
            this.$root.initTemplate();
        }).always(() => {
            this.$root.$set(this.$root, 'isInitializing', false);
        });
    },
    methods: {
        isEmptyObject(object) {
            return $.isEmptyObject(object);
        },
        isAuthenticated() {
            return this.user !== null;
        },
        redirectIfAuthenticated() {
            if (this.isAuthenticated()) {
                this.$router.push({ name: 'dashboard.index'});

                return true;
            }
            return false;
        },
        toggleModal(modal) {
            this.$emit('bv::toggle::modal', modal, '#btnToggle');
        },
        updateTable(table) {
            setTimeout(() => {
                this.$emit('bv::refresh::table', table);
            }, 50)
        },
        redirectToLogin() {
            this.$router.push({ name: 'dashboard.login'});
        },
        setPageTitle(title) {
            document.title = title;
        },
        initTemplate() {
            setTimeout(() => {
                window.initTemplate();
            }, 100);
        },
        uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: this.api_url + '/upload-image',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "post",
                success: function(response) {
                    if (response.status == 1) {
                        $('#text').summernote("insertImage", response.data.url);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    }
});
