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
            blogItemStyle1: require("../elements/blog-items/blog-item-style1").default,
            blogItemStyle2: require("../elements/blog-items/blog-item-style2").default,
            blogItemStyle3: require("../elements/blog-items/blog-item-style3").default,
            blogItemStyle4: require("../elements/blog-items/blog-item-style4").default,
            blogItemStyle5: require("../elements/blog-items/blog-item-style5").default,
            blogItemStyle6: require("../elements/blog-items/blog-item-style6").default,
        },
        mounted() {
            let category = this.$route.params.slug;
            this.$root.setPageTitle('دسته بندی: ' + category);
            this.getPosts();
        },
        methods: {
            getPosts() {
                let category_id = this.$route.params.id;
                let request = new HttpRequest('/api/v1/posts?category_id=' + category_id);

                request.send(
                    (result) => {
                        this.posts = result.data
                    }
                );
            }
        }
    }
</script>
