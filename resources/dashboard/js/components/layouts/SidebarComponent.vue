<template>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html">مدیریت پاترونیک</a>
            </div>
          <ul class="sidebar-menu">
            <li class="menu-header">داشبورد</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>داشبورد</span></a>
                <ul class="dropdown-menu">

                </ul>
            </li>
            <li class="nav-link"><router-link :to="{name: 'dashboard.register'}" v-if="! $root.isAuthenticated()">ثبت نام</router-link></li>
            <li class="nav-link"><router-link :to="{name: 'dashboard.login'}" v-if="! $root.isAuthenticated()">ورود</router-link></li>

            <li class="dropdown" v-if="$root.isAuthenticated()">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fire"></i><span>پست‌ها</span></a>
                <ul class="dropdown-menu">
                    <li><router-link class="nav-link" :to="{name: 'dashboard.posts.index'}">پست ها</router-link></li>
                    <li><router-link class="nav-link" :to="{name: 'dashboard.categories'}">دسته‌بندی ها</router-link></li>
                    <li><router-link class="nav-link" :to="{name: 'dashboard.comments'}">نظرات</router-link></li>
                </ul>
            </li>
            <li><router-link :to="{name: 'dashboard.profile'}" v-if="$root.isAuthenticated()"><i class="fas fa-fire"></i> پروفایل</router-link></li>
          </ul>


        </aside>
      </div>
</template>

<script>
    export default {
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
