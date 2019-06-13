<template>

    <div class="row post-top-meta">
        <div class="col-md-12">
            <author-link :author="user">
                <avatar :user="user"></avatar>
            </author-link>
            <author-link :author="user">
                <span class="link-dark">{{ user.name }}</span>
            </author-link>

            <!--<a href="#" class="btn follow">دنبال کردن</a>-->
            <p class="author-description">{{ user.biography }}</p>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['user'],
    }
</script>

<style scoped>

</style>
