<template>

    <span>
        <h6 class="font-weight-bold">
            <a href="./article.html" class="text-dark">{{ data.title }}</a>
        </h6>
        <p class="text-muted">
            <span>{{ data.user.name }}</span>
        </p>
    </span>

</template>

<script>
    export default {
        props: ['data']
    }
</script>
