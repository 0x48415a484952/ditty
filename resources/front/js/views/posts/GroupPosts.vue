<template>
    <div>
        <section class="recent-posts" v-for="groups, title in $props.groups">
            <div class="section-title text-right">
                <h2><span>{{ title }}</span></h2>
            </div>
            <div class="card-columns listrecent">
                <blog-item-style6 v-for="post in groups" :key="post.hash_id" :data="post" />
            </div>
        </section>
    </div>
</template>


<script>
    export default {
        props: ['groups'],
        components: {
            blogItemStyle6: require("../elements/blog-items/blog-item-style6").default,
        }
    }
</script>