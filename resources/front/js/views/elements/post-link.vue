<template>
    <router-link :to="{ name: 'posts.show', params: { id: post.id, slug: (post.slug ? post.slug : post.title) } }">
        <slot></slot>
    </router-link>
</template>

<script>
    export default {
        props: ['post'],
    }
</script>
