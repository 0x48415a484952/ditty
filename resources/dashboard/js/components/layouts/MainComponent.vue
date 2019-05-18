<template>
    <div>
        <div class="main-wrapper main-wrapper-1">
            <navbar />
            <sidebar />
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>عنوان صفحه</h1>
                    </div>
                </section>
                <slot></slot>
            </div>
            <footer-layout />
        </div>
    </div>
</template>


<script>

import navbar from './NavbarComponent.vue';
import sidebar from './SidebarComponent.vue';
import footerLayout from './FooterComponent.vue';

export default {
    components: {
        navbar, sidebar, footerLayout
    },
    beforeCreate() {
        this.$root.setPageTitle('داشبورد');
    }
}
</script>

