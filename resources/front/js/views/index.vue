<template>
    <div class="container">
        <!-- we will use these sections in near future!

        <div class="row">
            <div class="col-lg-6">
                <blog-item-style1 :data="post"/>
            </div>
            <div class="col-lg-6">
                <div class="flex-md-row mb-4 box-shadow h-xl-300 rtl text-right">
                    <blog-item-style2 :data="post"/>
                    <blog-item-style2 :data="post"/>
                    <blog-item-style2 :data="post"/>
                </div>
            </div>
        </div>


        <div class="row justify-content-between text-right rtl">
            <div class="col-md-8">
                <h5 class="font-weight-bold spanborder">
                    <span>جدیدترین نوشته ها</span>
                </h5>
                <blog-item-style3 :data="post" />
            </div>
            <div class="col-md-4 pr-4">
                <h5 class="font-weight-bold spanborder">
                    <span>محبوب ترین ها</span>
                </h5>
                <ol class="list-featured px-0">
                    <li>
                        <blog-item-style4 :data="post" />
                    </li>
                    <li>
                        <blog-item-style4 :data="post" />
                    </li>
                </ol>
            </div>
        </div>
    -->
        <section class="featured-posts">
            <div class="section-title text-right">
                <h2><span>مطالب داغ</span></h2>
            </div>
            <div class="card-columns listfeaturedtag">
                <blog-item-style5 v-for="(post, index) of posts.data" v-if="index < 4" :key="post.hash_id" :data="post" />
            </div>
        </section>

        <group-posts></group-posts>
        <br>
        <section class="recent-posts">
            <div class="section-title text-right">
                <h2><span>آخرین مطالب</span></h2>
            </div>
            <div class="card-columns listrecent">
                <blog-item-style6 v-for="post of posts.data" :key="post.hash_id" :data="post" />
            </div>
        </section>

    </div>
</template>

<script>
    import HttpRequest from '../app/Classes/HttpRequest';

    export default {
        data() {
            return {
                posts: [],
                categories: []
            };
        },
        components: {
            // blogItemStyle1: require("./elements/blog-items/blog-item-style1").default,
            // blogItemStyle2: require("./elements/blog-items/blog-item-style2").default,
            // blogItemStyle3: require("./elements/blog-items/blog-item-style3").default,
            // blogItemStyle4: require("./elements/blog-items/blog-item-style4").default,
            blogItemStyle5: require("./elements/blog-items/blog-item-style5").default,
            blogItemStyle6: require("./elements/blog-items/blog-item-style6").default,
            groupPosts: require("./posts/GroupPosts.vue").default,
        },
        mounted() {
            this.$root.setPageTitle('Ditty.ir');
            this.getPosts();
        },
        methods: {
            getPosts() {
                let request = new HttpRequest('/api/v1/posts');
                request.send(
                    (result) => this.posts = result.data
                );
            }
        }
    }
</script>
