<template>
    <div>
        <b-table
            id="comments"
            :items="comments.items"
            class="mt-5 bg-white"
            :fields="table_fields"
        >
            <template slot="edit" slot-scope="data">
                <button class="btn btn-primary" v-on:click="editComment(data.index)"><i class="fa fa-edit"></i></button>
            </template>
            <template slot="delete" slot-scope="data">
                <button class="btn btn-danger" v-on:click="deleteComment(data.index)"><i class="fa fa-close"></i></button>
            </template>
            <template slot="status" slot-scope="data">
                <span :class="'badge badge-' + comment_statuses[data.item.status].color">{{ comment_statuses[data.item.status].title }}</span>
            </template>
            <template slot="post" slot-scope="data">

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
    mounted() {
        if (! this.$root.isAuthenticated()) {
            return this.$root.redirectToLogin();
        }
        this.initializeFunctions();
        this.loadItems();
    },
    data() {
        return {
            functionsInitialized: false,
            comments: {
                items: [],
                edit: {}
            },
            table_fields: [
                { key: 'id', label: 'شناسه '},
                { key: 'post', label: 'پست '},
                { key: 'name', label: 'نام '},
                { key: 'email', label: 'ایمیل '},
                { key: 'text', label: 'متن '},
                { key: 'status', label: 'وضعیت '},
                { key: 'created_at', label: 'ایجاد شده '},
                { key: 'edit', label: 'ویرایش '},
                { key: 'delete', label: 'حذف' }
            ],
            comment_statuses: {
                1: {title: 'رد شده', color: 'light '},
                2: {title: 'در انتظار تایید', color: 'warning '},
                3: {title: 'تایید شده', color: 'success'}
            },
        }
    },
    methods: {
        loadItems: function() {
            $.get(this.$root.api_url + '/comments', (response) => {
                if (response.status == 1) {
                    this.comments.items = response.data;
                }
            });
        },
        editComment(index) {
            var comment = window.clone(this.posts.items[index]);
            comment.index = index;
            this.comment.edit = post;
            this.$root.$emit('bv::toggle::modal', 'edit-post', '#btnToggle');
        },
        showComment(item) {
            this.comments.edit = window.clone(item);
        },
        deleteComment(id) {
            $.post(this.$root.api_url + '/comments/' + id, {_method: 'delete'}, (response) => {
                if (response.status == 1) {
                    this.comments.items = this.comments.items.delete(id);
                    this.comments.selected = null;
                    this.comments.edit = {};
                    window.success_notification(response.message);
                }
            });
        },
        initializeFunctions() {
            if (! this.functionsInitialized) {
                window.commentUpdated = (response) => {
                    if (response.status == 1) {
                        this.comments.items = this.comments.items.update(response.data.id, response.data);
                        this.comments.selected = response.data;
                        window.show_notification('', response.message);
                    }
                }
            }
        }
    }
}
</script>


