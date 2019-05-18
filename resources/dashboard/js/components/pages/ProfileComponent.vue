<template>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <b-card title="ویرایش پروفایل">
                <form method="POST" class="js-submit-form" :action="$root.api_url + '/profile'" data-on-success="profileUpdated">
                    <div class="form-group">
                        <label for="name">نام و نام خانوادگی</label>
                        <input id="name" type="text" class="form-control" name="name" :value="$root.user.name" data-required>
                        <span>{{ errors.first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="password">رمز عبور</label>
                        <input id="password" type="password" class="form-control" name="password">
                        <span>{{ errors.first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">تکرار رمز عبور</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                        <span>{{ errors.first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">ویرایش</button>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </b-card>
        </div>
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

        this.$root.setPageTitle('پروفایل');

        if (! window.profileUpdated) {
            var _this = this;

            window.profileUpdated = function(response) {
                if (response.status) {
                    if (response.data.token) {
                        Cookies.set('authorization', 'Bearer ' + response.data.token, { expires: 30});
                    }
                    _this.$root.$set(_this.$root, 'user', response.data.user);
                    _this.$router.push({ name: 'dashboard.index'});
                }
            }
        }
    }
}
</script>


