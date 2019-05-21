<template>
    <div>
        <button class="btn btn-success" v-b-modal.new-post>پست جدید</button>

        <b-table
            id="posts"
            :items="posts.items"
            class="mt-5 bg-white"
            :fields="table_fields"
        >
            <template slot="edit" slot-scope="data">
                <button class="btn btn-primary" v-on:click="editPost(data.index)"><i class="fa fa-edit"></i></button>
            </template>
            <template slot="status" slot-scope="data">
                <span :class="'badge badge-' + post_statuses[data.item.status].color">{{ post_statuses[data.item.status].title }}</span>
            </template>
            <template slot="category" slot-scope="data">
                {{ data.item.category.title }}
            </template>
            <template slot="user" slot-scope="data">
                {{ data.item.user.name }}
            </template>
        </b-table>

        <b-modal size="lg" id="new-post" title="پست جدید" hide-footer>
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
                    <ckeditor tag-name="textarea" dir="rtl" name="text" :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
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
        </b-modal>

        <b-modal size="lg" id="edit-post" title="ویرایش پست" hide-footer>
            <div v-if="! $root.isEmptyObject(posts.edit)">
                <form :action="$root.api_url + '/posts/' + posts.edit.id" method="POST" class="js-submit-form" data-on-success="postUpdated">
                    <div class="form-group">
                        <label for="edit-title">عنوان</label>
                        <input id="edit-title" type="text" name="title" class="form-control" v-model="posts.edit.title" data-required>
                    </div>
                    <div class="form-group">
                        <label for="edit-slug">اسلاگ</label>
                        <input id="edit-slug" type="text" name="slug" class="form-control" v-model="posts.edit.slug">
                    </div>
                    <div class="form-group">
                        <label for="edit-brief-text">توضیح کوتاه</label>
                        <textarea id="edit-brief-text" name="brief_text" class="form-control" v-model="posts.edit.brief_text"></textarea>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="edit-category">دسته بندی</label>
                            <multiselect id="edit-category" dir="rtl" v-model="posts.edit.category" :options="categories" placeholder="دسته بندی" label="title" track-by="title"></multiselect>
                            <input type="hidden" name="category_id" v-model="posts.edit.category.id">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-tags">برچسب ها</label>
                            <tags-input element-id="tags" v-model="posts.edit.tags"></tags-input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-text">متن</label>
                        <ckeditor tag-name="textarea" dir="rtl" name="text" :editor="editor" v-model="posts.edit.text" :config="editorConfig"></ckeditor>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="edit-cover_image">تصویر کاور</label><br>
                            <input id="edit-cover_image" type="file" name="cover_image">
                        </div>
                        <div class="col-md-6">
                            <label for="edit-status">وضعیت</label>
                            <select name="status" id="edit-status" class="form-control" v-model="posts.edit.status">
                                <option v-for="(status, status_id) in post_statuses" :value="status_id">{{ status.title }}</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    <button class="btn btn-primary">ویرایش</button>
                </form>
            </div>
        </b-modal>
    </div>
</template>

<script>

import VoerroTagsInput from '@voerro/vue-tagsinput';

import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import EssentialsPlugin from '@ckeditor/ckeditor5-essentials/src/essentials';
import BoldPlugin from '@ckeditor/ckeditor5-basic-styles/src/bold';
import ItalicPlugin from '@ckeditor/ckeditor5-basic-styles/src/italic';
import LinkPlugin from '@ckeditor/ckeditor5-link/src/link';
import ParagraphPlugin from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder';




export default {
    components: {
        ckeditor: CKEditor.component,
        'tags-input': VoerroTagsInput
    },
    beforeCreate() {
        if (! this.$root.isAuthenticated()) {
            this.$root.redirectToLogin();
        }
    },
    data() {
        return {
            functionsInitialized: false,
            posts: {
                items: [],
                edit: {},
            },
            table_fields: [
                {key: 'id', label: 'شناسه'},
                {key: 'title', label: 'عنوان'},
                {key: 'user', label: 'کاربر'},
                {key: 'category', label: 'دسته بندی'},
                {key: 'status', label: 'وضعیت'},
                {key: 'created_at', label: 'ایجاد شده'},
                {key: 'edit', label: 'ویرایش'}
            ],
            new_post: {
                cateogry: {}
            },
            categories: [],
            post_statuses: {
                1: {title: 'عدم انتشار', color: 'light'},
                2: {title: 'پیش نویس', color: 'warning'},
                3: {title: 'منتشر شده', color: 'success'}
            },
            editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                ckfinder: {
                    uploadUrl: 'https://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
                },
                plugins: [EssentialsPlugin, BoldPlugin, ItalicPlugin, LinkPlugin, ParagraphPlugin, CKFinder],
                 toolbar: {
                    items: [ 'bold', 'italic', 'link', 'undo', 'redo', 'ckfinder']
                }
            }
        }
    },
    mounted() {
        if (! this.$root.isAuthenticated()) {
            return this.$root.redirectToLogin();
        }
        this.initializeFunctions();
        this.$root.setPageTitle('پست ها');
        this.loadPost();
        this.loadCategories();
    },
    methods: {
        initializeFunctions() {
            if (! this.functionsInitialized) {
                window.postUpdated = (response) => {
                    if (response.status == 1) {
                        var index = this.posts.edit.index;
                        var post  = response.data;
                        post.index = index;
                        this.posts.items[index] = post;
                        this.posts.edit = post;
                        window.success_notification(response.message);
                        this.$root.toggleModal('edit-post');
                        this.$root.updateTable('posts');
                    }
                }
            }
        },
        loadCategories: function() {
            $.get(this.$root.api_url + '/categories', (response) => {
                if (response.status == 1) {
                    this.categories = response.data;
                }
            });
        },
        loadPost: function() {
            $.get(this.$root.api_url + '/posts', (response) => {
                if (response.status == 1) {
                    this.posts.items = response.data;
                }
            });
        },
        editPost: function(index) {
            var post = window.clone(this.posts.items[index]);
            post.index = index;
            this.posts.edit = post;
            this.$root.toggleModal('edit-post');
        }
    }
}
</script>


