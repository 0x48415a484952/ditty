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
            navbar: require('./Navbar').default,
            'footer-layout': require('./Footer').default
        }
    };
</script>
