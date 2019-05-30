<template>
    <div>
        <b-card title="پست جدید">
            <form :action="$root.api_url + '/posts'" method="POST" class="js-submit-form">
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input id="title" type="text" name="title" class="form-control" data-required>
                </div>
                <div class="form-group">
                    <label for="slug">اسلاگ</label>
                    <input id="slug" type="text" name="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="brief-text">توضیح کوتاه</label>
                    <textarea id="brief-text" name="brief_text" class="form-control"></textarea>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="category">دسته بندی</label>
                        <multiselect id="category" dir="rtl" v-model="new_post.cateogry" :options="categories" placeholder="دسته بندی" label="title" track-by="title"></multiselect>
                        <input type="hidden" name="category_id" v-model="new_post.cateogry.id">
                    </div>
                    <div class="col-md-6">
                        <label for="tags">برچسب ها</label>
                        <tags-input element-id="tags"></tags-input>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text">متن</label>
                    <div id="text"></div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="cover_image">تصویر کاور</label><br>
                        <input id="cover_image" type="file" name="cover_image">
                    </div>
                    <div class="col-md-6">
                        <label for="status">وضعیت</label>
                        <select name="status" id="status" class="form-control">
                            <option v-for="(status, status_id) in post_statuses" :value="status_id">{{ status.title }}</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success">ثبت</button>
            </form>
        </b-card>
    </div>
</template>

<script>

import VoerroTagsInput from '@voerro/vue-tagsinput';

export default {
    components: {
        'tags-input': VoerroTagsInput,

    },
    beforeCreate() {
        if (! this.$root.isAuthenticated()) {
            this.$root.redirectToLogin();
        }
    },
    data() {
        return {
            functionsInitialized: false,
            new_post: {
                cateogry: {}
            },
            categories: [],
            post_statuses: {
                1: {title: 'عدم انتشار', color: 'light'},
                2: {title: 'پیش نویس', color: 'warning'},
                3: {title: 'منتشر شده', color: 'success'}
            },
        }
    },
    mounted() {
        if (! this.$root.isAuthenticated()) {
            return this.$root.redirectToLogin();
        }

        this.initializeFunctions();
        this.$root.setPageTitle('پست جدید');
        this.loadCategories();

        $('#text').summernote({
            dialogsInBody: true,
            callbacks: {
                onImageUpload: (image) => {
                    this.$root.uploadImage(image[0]);
                }
            }
        });
    },
    methods: {
        initializeFunctions() {
            if (! this.functionsInitialized) {

            }
        },
        loadCategories: function() {
            $.get(this.$root.api_url + '/categories', (response) => {
                if (response.status == 1) {
                    this.categories = response.data;
                }
            });
        }
    },
    beforeRouteLeave(to, from, next) {
        $('#text').summernote('destroy');
        next();
    }
}
</script>


