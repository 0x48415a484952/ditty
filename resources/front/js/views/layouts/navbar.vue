<template>
    <nav class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <router-link class="navbar-brand" :to="{ name: 'index' }">
                <strong>بلاگ</strong>
            </router-link>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarColor02">
                <ul class="navbar-nav pr-0 ml-auto d-flex align-items-center mr-3">
                    <!-- <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'index' }">
                            <span>صفحه اصلی</span>
                        </router-link>
                    </li> -->
                    <li v-for="item in items" class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'categories.index', params: { id: item.id, slug: item.title } }">
                            <span>{{ item.title }}</span>
                        </router-link>
                    </li>
                </ul>
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
        }
    };
</script>
