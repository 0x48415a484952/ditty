<template>
    <div class="container">

        <section class="recent-posts">
            <div class="section-title text-right">
                <h2>
                    <span>{{ $root.getPageTitle() }}</span>
                </h2>
            </div>
            <div class="card-columns listrecent">
                <blog-item-style6 v-for="post of posts.data" :key="post.id" :data="post" />
            </div>
        </section>

    </div>
</template>

<script>
    import HttpRequest from '../../app/Classes/HttpRequest';

    export default {
        data() {
            return {
                posts: [],
            };
        },
        components: {
            blogItemStyle6: require("../elements/blog-items/blog-item-style6").default
        },
        mounted() {
            this.getCategory();
        },
        methods: {
            getCategory() {
                let category_id = this.$route.params.id;
                let request = new HttpRequest('/api/v1/categories/' + category_id);
                request.send(
                    (response) => {
                        this.category = response.data;
                        this.$root.setPageTitle('دسته بندی: ' + response.data.title);
                        this.getPosts();
                    }
                );
            },
            getPosts() {
                let category_id = this.$route.params.id;
                let request = new HttpRequest('/api/v1/posts?category_id=' + category_id);
                request.send(
                    (result) => {
                        this.posts = result.data
                    }
                );
            }
        },
        watch: {
            '$route.params.id': function() {
                this.getCategory();
            }
        }
    }
</script>
