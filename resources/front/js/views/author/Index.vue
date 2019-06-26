<template>
    <div>
        <div class="container text-right">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="mainheading">
                        <div class="row post-top-meta authorpage">
                            <div class="col-md-10 col-xs-12">
                                <h1>{{ user.name }}</h1>
                                <p class="author-description">{{ user.biography }}</p>
                                <div class="social-urls mt-2">
                                    <a class="ml-2" :href="url" target="_blank" v-for="(url, item) in user.social_urls" v-if="url">
                                        <img :src="$root.base_url + '/images/social_icon-' + item + '.png'">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                <avatar :user="user" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="graybg authorpage">
            <div class="listrecent listrelated">
                <div class="authorpostbox">
                    <blog-item-style7 v-for="post of posts.data" :key="post.hash_id" :data="post" />
                </div>
            </div>
        </div>
    </div>
</template>

    <script>
        import HttpRequest from '../../app/Classes/HttpRequest';

        export default {
            data() {
                return {
                    posts: [],
                    user: {}
                };
            },
            components: {
                blogItemStyle7: require("../elements/blog-items/blog-item-style7").default,
            },
            mounted() {
                let username = this.$route.params.username;
                this.$root.setPageTitle(username);
                this.getData();
            },
            methods: {
                getData() {
                    let request = new HttpRequest('/api/v1/users?username=' + this.$route.params.username);

                    request.send(
                        (result) => {
                            if (result.status == 1) {
                                this.user = result.data;
                                this.getPosts();
                            }
                        }
                    );
                },
                getPosts() {
                    let request = new HttpRequest('/api/v1/posts?user_id=' + this.user.id);

                    request.send(
                        (result) => this.posts = result.data
                    );
                }
            }
        }
    </script>
