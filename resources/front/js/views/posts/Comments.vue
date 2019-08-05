<template>
    <div class="container">
        <div class="mx-auto col-md-8 py-3">

            <h3>نظرات ({{ $props.post.comments_count }})</h3>
            <form :action="$root.api_url + '/posts/' + post_id + '/comments'" method="post" class="js-submit-form mt-3" data-clear-onsuccess="true">
                <textarea class="form-control" name="text" rows="5" placeholder="نوبت نظر شماست :) اینجا بنویسید ..." data-required></textarea>
                <button class="btn btn-success mt-1 btn-sm">ارسال</button>
            </form>

            <section v-if="items.length > 0">
                <hr>
                <div class="mt-3" v-for="item in items">
                    <b-media>
                        <div slot="aside" class="mr-n3">
                            <avatar :user="item.user" />
                        </div>
                        <div class="small">
                            <author-link :author="item.user">{{ item.user.name }}</author-link>
                            <span class="text-muted font-consolas"> - {{ item.user.username }}@</span>
                            <!-- <span class="text-muted">{{ item.created_at }}</span> -->
                        </div>
                        <div>
                        <p class="pr-1 mt-1">{{ item.text }}</p>
                        </div>
                    </b-media>
                </div>
            </section>
            <button class="btn btn-link d-block mt-3 mx-auto" v-if="$props.post.comments_count > 0 && ! loaded" @click="loadComments">نمایش نظرات</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        data() {
            return {
                items: [],
                loaded: false,
            }
        },
        computed: {
            post_id: function() {
                return this.$route.params.id
            }
        },
        methods: {
            loadComments() {
                this.loaded = true;

                $.get(this.$root.api_url + '/posts/' + this.post_id + '/comments', (response) => {
                    if (response.status == 1) {
                        this.items = response.data;
                    }

                });
            }
        }
    }
</script>