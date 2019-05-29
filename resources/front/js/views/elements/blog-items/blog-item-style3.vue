<template>

    <div class="mb-3 d-flex justify-content-between">
        <img :src="data.cover_image" height="120">
        <div class="pr-3">
            <h2 class="mb-1 h4 font-weight-bold">
                <a class="text-dark" href="./article.html">{{ data.title }}</a>
            </h2>
            <p>{{ data.brief_text }}</p>
            <div class="card-text text-muted small">
                <span>{{ data.user.name }}</span>
            </div>
            <small class="text-muted">۱۲ اردیبهشت ۹۷ · ۵ دقیقه</small>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['data']
    }
</script>

<style scoped>

</style>
