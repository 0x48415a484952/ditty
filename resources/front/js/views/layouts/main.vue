<template>
    <div>
        <navbar />
        <main>
            <slot></slot>
        </main>
        <footer-layout />
    </div>
</template>

<script>
    export default {
        components: {
            navbar: require('./navbar').default,
            'footer-layout': require('./footer').default
        }
    };
</script>
