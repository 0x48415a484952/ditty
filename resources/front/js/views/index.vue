<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <blog-item-style1 :data="post"/>
            </div>
            <div class="col-lg-6">
                <div dir="rtl" class="flex-md-row mb-4 box-shadow h-xl-300 rtl text-right">
                    <blog-item-style2 :data="post"/>
                    <blog-item-style2 :data="post"/>
                    <blog-item-style2 :data="post"/>
                </div>
            </div>
        </div>

        <div dir="rtl" class="row justify-content-between text-right rtl">
            <div class="col-md-8">
                <h5 class="font-weight-bold spanborder">
                    <span>جدیدترین نوشته ها</span>
                </h5>
                <blog-item-style3 :data="post" />
            </div>
            <div class="col-md-4 pr-4">
                <h5 class="font-weight-bold spanborder">
                    <span>محبوب ترین ها</span>
                </h5>
                <ol class="list-featured px-0">
                    <li>
                        <blog-item-style4 :data="post" />
                    </li>
                    <li>
                        <blog-item-style4 :data="post" />
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

                <blog-item-style5 :data="post" />
                <blog-item-style5 :data="post" />
                <blog-item-style5 :data="post" />
                <blog-item-style5 :data="post" />

            </div>
        </section>

        <section class="recent-posts">
            <div class="section-title text-right">
                <h2>
                    <span>مطالب تصادفی</span>
                </h2>
            </div>
            <div class="card-columns listrecent">

                <blog-item-style6 :data="post" />
                <blog-item-style6 :data="post" />
                <blog-item-style6 :data="post" />
                <blog-item-style6 :data="post" />
                <blog-item-style6 :data="post" />
                <blog-item-style6 :data="post" />
                <blog-item-style6 :data="post" />
                <blog-item-style6 :data="post" />

            </div>
        </section>

    </div>
</template>

<script>
    import BlogItemStyle1 from "./elements/blog-items/blog-item-style1";
    import BlogItemStyle2 from "./elements/blog-items/blog-item-style2";
    import BlogItemStyle3 from "./elements/blog-items/blog-item-style3";
    import BlogItemStyle4 from "./elements/blog-items/blog-item-style4";
    import BlogItemStyle5 from "./elements/blog-items/blog-item-style5";
    import BlogItemStyle6 from "./elements/blog-items/blog-item-style6";
    export default {
        data() {
            return {
                post: {
                    title: 'طرح‌نما یا لورم ایپسوم به متنی آزمایشی و بی‌معنی در صنعت چاپ',
                    brief_text: 'از آنجایی که طراحان عموماً نویسندهٔ متن نیستند و وظیفهٔ رعایت حق تکثیر متون را ندارند و در همان حال، کار آن‌ها به‌نوعی وابسته به متن است',
                    cover_image: './images/demo/blog4.jpg',
                    created_at: 1398,
                    user: {name: 'mahdi'}
                }
            };
        },
        components: {
            BlogItemStyle1,
            BlogItemStyle2,
            BlogItemStyle3,
            BlogItemStyle4,
            BlogItemStyle5,
            BlogItemStyle6
        }
    }
</script>
