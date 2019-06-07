<template>

    <span>
        <h6 class="font-weight-bold">
            <router-link class="text-dark" :to="{ name: 'posts.show', params: { id: data.id, slug: (data.slug ? data.slug : data.title) } }">
                {{ data.title }}
            </router-link>
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
