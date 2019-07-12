<template>
    <nav class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <router-link class="navbar-brand" :to="{ name: 'index' }">
                <strong>{{ $root.document.appName }}</strong>
            </router-link>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarColor02">
                <ul class="navbar-nav pr-0 ml-auto d-flex align-items-center mr-3">
                    <li v-for="item in items" class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'categories.index', params: { id: item.id, slug: item.title } }">
                            <span>{{ item.title }}</span>
                        </router-link>
                    </li>
                </ul>
                <nav class="navbar navbar-expand-lg main-navbar p-0">
                    <ul class="navbar-nav navbar-right mr-auto" v-if="$root.user">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-inline-block small align-middle">سلام {{ $root.user.name }}</div>
                                <div class="d-inline-block align-middle">
                                    <avatar :user="$root.user" class="align-middle"></avatar>
                                </div>
                            </a>
                        <div class="dropdown-menu dropdown-menu-right text-right">
                            <div class="dropdown-item has-icon text-danger" @click="logout">
                                <span>خروج</span>
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                        </div>
                        </li>
                    </ul>
                    <div v-else>
                        <router-link class="small" :to="{ name: 'login' }">ورود</router-link>
                        <span class="text-light small"> | </span>
                        <router-link class="small" :to="{ name: 'register' }">ثبت نام</router-link>
                    </div>
                </nav>
            </div>
        </div>
    </nav>
</template>

<script>
    import HttpRequest from '../../app/Classes/HttpRequest';

    export default {
        data() {
            return {
                items: [],
            }
        },
        mounted() {
            // retrieve categories
            this.getCategories();

        },
        methods: {
            getCategories() {
                let request = new HttpRequest('/api/v1/categories');
                request.send(
                    (result) => this.items = result.data
                );
            },
            logout() {
                var root = this.$root;
                Cookies.remove('authorization');
                $.ajaxSetup({
                    headers: null,
                });
                this.$root.$set(this.$root, 'user', null);
                this.$root.redirectToLogin();

                $.post(root.api_url + '/logout');
            },
        }
    };
</script>
