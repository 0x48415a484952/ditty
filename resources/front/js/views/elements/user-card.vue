<template>

    <div class="row post-top-meta">
        <div class="col-md-12">
            <a href="author.html">
                <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal">
            </a>
            <a class="link-dark" href="author.html">{{ user.name }}</a>
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
