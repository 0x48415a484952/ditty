<template>
    <div class="card border-0 mb-4 box-shadow h-xl-300">
        <div class="cover" style="background-image: url(https://picsum.photos/200/300);"></div>
        <div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
            <h2 class="h4 font-weight-bold">
                <a class="text-dark" href="#">
                    {{ data.title }}
                </a>
            </h2>
            <p class="card-text">
                {{ data.body }}
            </p>
            <div>
                <small class="d-block">
                    <a class="text-muted" href="#">{{ data.user.name }}</a>
                </small>
                <small class="text-muted">
                    <span>{{ data.created_at }}</span>
                    ·
                    <span>Dec 12 5 min read</span>
                </small>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data']
    }
</script>

<style scoped>
    .cover {
        height: 150px;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
