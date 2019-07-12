<template>
    <div class="container">
        <div class="mx-auto col-md-8 py-3">

            <h3>نظرات ({{ $props.post.cnt_comments }})</h3>
            <form :action="$root.api_url + '/posts/' + post_id + '/comments'" method="post" class="js-submit-form mt-3">
                <textarea class="form-control" name="text" rows="5" placeholder="نوبت نظر شماست :) اینجا بنویسید ..."></textarea>
                <button class="btn btn-success mt-1 btn-sm">ارسال</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        computed: {
            post_id: function() {
                return this.$route.params.id
            }
        }
    }
</script>