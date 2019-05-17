<template>
    <nav class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <router-link class="navbar-brand" :to="{ name: 'index' }">
                <strong>بلاگ</strong>
            </router-link>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div dir="rtl" class="navbar-collapse collapse" id="navbarColor02" style="">
                <ul class="navbar-nav pr-0 ml-auto d-flex align-items-center">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'index' }">
                            <span>صفحه اصلی</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./article.html">فرهنگ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./article.html">تکنولوژی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./article.html">سیاست</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./article.html">سلامت</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./article.html">ورزشی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.html">درباره ما</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {

    };
</script>
