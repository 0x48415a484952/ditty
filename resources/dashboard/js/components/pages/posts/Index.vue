<template>
    <div>
        <router-link class="btn btn-success" :to="{name: 'dashboard.posts.create'}">پست جدید</router-link>

        <b-table id="posts" :items="posts.items" class="mt-5 bg-white" :fields="table_fields">
            <template slot="edit" slot-scope="data">
                <router-link class="btn btn-primary" :to="{ name: 'dashboard.posts.edit', params: { post_id: data.item.hash_id } }"><i class="fa fa-edit"></i></router-link>
            </template>
            <template slot="delete" slot-scope="data">
                <button class="btn btn-danger" v-on:click="deletePost(data.index)">×</button>
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
    </div>
</template>

<script>
export default {
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
            },
            table_fields: [
                {key: 'id', label: 'شناسه'},
                {key: 'title', label: 'عنوان'},
                {key: 'user', label: 'کاربر'},
                {key: 'category', label: 'دسته بندی'},
                {key: 'status', label: 'وضعیت'},
                {key: 'created_at', label: 'ایجاد شده'},
                {key: 'edit', label: 'ویرایش'},
                {key: 'delete', label: 'حذف'}
            ],
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
        this.$root.setPageTitle('پست ها');
        this.loadPosts();
        this.loadCategories();
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
        },
        loadPosts: function() {
            $.get(this.$root.api_url + '/posts', (response) => {
                if (response.status == 1) {
                    this.posts.items = response.data;
                }
            });
        },
        deletePost(index) {
            if (confirm('Really?')) {
                let post = this.posts.items[index];
                $.post(this.$root.api_url + '/posts/' + post.id, { _method: 'delete' }, (response) => {
                    if (response.status == 1) {
                        this.$root.$delete(this.posts.items, index);
                        window.success_notification(response.message);
                    }
                });
            }

        }
    }
}
</script>


