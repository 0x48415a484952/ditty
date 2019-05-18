<template>
    <div>
        <navbar />
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div dir="rtl" class="card border-0 mb-4 box-shadow h-xl-300 rtl">
                        <div style="background-image: url(./images/demo/1.jpg); height: 150px;background-size: cover;background-repeat: no-repeat;"></div>
                        <div class="card-body px-0 pb-0 d-flex flex-column align-items-start text-right">
                            <h2 class="h4 font-weight-bold">
                                <a class="text-dark" href="./article.html">طرح‌نما یا لورم ایپسوم به متنی آزمایشی و بی‌معنی در صنعت چاپ</a>
                            </h2>
                            <p class="card-text">
                                از آنجایی که طراحان عموماً نویسندهٔ متن نیستند و وظیفهٔ رعایت حق تکثیر
                                متون را ندارند و در همان حال، کار آن‌ها به‌نوعی وابسته به متن است
                            </p>
                            <div>
                                <small class="d-block">
                                    <a class="text-muted" href="./author.html">مهدی خانزادی</a>
                                </small>
                                <small class="text-muted">۱۲ اردیبهشت ۹۷ · ۵ دقیقه</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div dir="rtl" class="flex-md-row mb-4 box-shadow h-xl-300 rtl text-right">
                        <div v-for="item in [4,5,6]" class="mb-3 d-flex align-items-center">
                            <img :src="'./images/demo/blog'+item+'.jpg'" height="80">
                            <div class="pr-3">
                                <h2 class="mb-2 h6 font-weight-bold">
                                    <a class="text-dark" href="./article.html">از آنجایی که طراحان عموماً نویسندهٔ متن نیستند و وظیفهٔ</a>
                                </h2>
                                <div class="card-text text-muted small">
                                    مهدی خانزادی
                                </div>
                                <small class="text-muted">۱۲ اردیبهشت ۹۷ · ۵ دقیقه</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div dir="rtl" class="row justify-content-between text-right rtl">
                <div class="col-md-8">
                    <h5 class="font-weight-bold spanborder">
                        <span>جدیدترین نوشته ها</span>
                    </h5>
                    <div class="mb-3 d-flex justify-content-between">
                        <img :src="'./images/demo/blog8.jpg'" height="120">
                        <div class="pr-3">
                            <h2 class="mb-1 h4 font-weight-bold">
                                <a class="text-dark" href="./article.html">طرح‌نما یا لورم ایپسوم به متنی آزمایشی و بی‌معنی در صنعت چاپ</a>
                            </h2>
                            <p>
                                از آنجایی که طراحان عموماً نویسندهٔ متن نیستند و
                                وظیفه ٔ رعایت حق تکثیر متون را ندارند و در
                                همان حال، کار آن‌ها به‌نوعی وابسته به متن است
                            </p>
                            <div class="card-text text-muted small">
                                <span>مهدی خانزادی</span>
                            </div>
                            <small class="text-muted">۱۲ اردیبهشت ۹۷ · ۵ دقیقه</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-4">
                    <h5 class="font-weight-bold spanborder">
                        <span>محبوب ترین ها</span>
                    </h5>
                    <ol class="list-featured px-0">
                        <li>
            				<span>
                                <h6 class="font-weight-bold">
                                    <a href="./article.html" class="text-dark">از آنجایی که طراحان عموماً نویسندهٔ متن نیستند و وظیفهٔ</a>
                                </h6>
                                <p class="text-muted">
                                    <span>مهدی خانزادی</span>
                                </p>
            				</span>
                        </li>
                        <li>
                            <span>
                                <h6 class="font-weight-bold">
                                    <a href="./article.html" class="text-dark">از آنجایی که طراحان عموماً نویسندهٔ متن نیستند و وظیفهٔ</a>
                                </h6>
                                <p class="text-muted">
                                    <span>مهدی خانزادی</span>
                                </p>
                            </span>
                        </li>
                    </ol>
                </div>
            </div>

            <section class="featured-posts">
                <div class="section-title text-right">
                    <h2>
                        <span>آخرین مطالب</span>
                    </h2>
                </div>
                <div class="card-columns listfeaturedtag">
                    <!-- begin post -->
                    <div v-for="item in 4" dir="rtl" class="card rtl">
                        <div class="row">
                            <div class="col-md-5 wrapthumbnail">
                                <a href="post.html">
                                    <div class="thumbnail" :style="{ backgroundImage: 'url(./images/demopic/'+item+'.jpg)' }"></div>
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="card-block p-4">
                                    <h2 class="card-title text-right">
                                        <a href="post.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a>
                                    </h2>
                                    <h4 class="card-text text-justify">
                                        لورم ایپسوم متن ساختگی با تولید
                                        سادگی نامفهوم از صنعت چاپ و با استفاده
                                        از طراحان گرافیک است چاپگرها و متون
                                    </h4>
                                    <div class="metafooter">
                                        <div class="wrapfooter">
                                            <span class="meta-footer-thumb">
                                                <a href="author.html">
                                                    <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal">
                                                </a>
                                            </span>
                                            <span class="author-meta">
	                							<span class="post-name">
                                                    <a href="author.html">مهدی خانزادی</a>
                                                </span>
                                                <br>
					                			<span class="post-date">۱۲ فروردین ۱۳۹۷</span>
                                                <span class="dot"></span>
                                                <span class="post-read">۶ دقیقه</span>
								            </span>

                                            <span class="post-read-more">
                                                <a href="post.html" title="Read Story">
                                                    <svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                                                        <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post -->
                </div>
            </section>

            <section class="recent-posts">
                <div class="section-title text-right">
                    <h2>
                        <span>مطالب تصادفی</span>
                    </h2>
                </div>
                <div class="card-columns listrecent">

                    <!-- begin post -->
                    <div v-for="item in 6" dir="rtl" class="card rtl">
                        <a href="post.html">
                            <img class="img-fluid" :src="'./images/demopic/'+item+'.jpg'" alt="">
                        </a>
                        <div class="card-block p-4">
                            <h2 class="card-title text-right">
                                <a href="post.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a>
                            </h2>
                            <h4 class="card-text text-justify">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                                متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </h4>
                            <div class="metafooter clearfix">
                                <div class="wrapfooter">
                                    <span class="meta-footer-thumb">
                                        <a href="author.html">
                                            <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal">
                                        </a>
                                    </span>
                                    <span class="author-meta">
                                        <span class="post-name">
                                            <a href="author.html">مهدی خانزادی</a>
                                        </span>
                                        <br>
                                        <span class="post-date">۱۲ فروردین ۱۳۹۷</span>
                                        <span class="dot"></span>
                                        <span class="post-read">۶ دقیقه</span>
                                    </span>
                                    <span class="post-read-more">
                                        <a href="post.html" title="Read Story">
                                            <svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                                                <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post -->

                </div>
            </section>

            <footer-layout />
        </div>


        <main>
            <slot></slot>
        </main>
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
