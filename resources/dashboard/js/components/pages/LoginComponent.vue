<template>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <b-card title="ورود">
                <form method="POST" class="js-submit-form" :action="$root.api_url + '/login'" data-on-success="successfullLogin">
                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input id="email" type="email" class="form-control" name="email" v-validate="'required|email'">
                        <span>{{ errors.first('email') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="password">رمز عبور</label>
                        <input id="password" name="password" type="password" class="form-control" v-validate="'required'">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label class="custom-control-label" for="remember">به یاد داشتن</label>
                            <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">ورود</button>
                    </div>
                </form>
            </b-card>
        </div>
    </div>
</template>





<script>
    export default {
        beforeCreate() {
            if (this.$root.redirectIfAuthenticated()) {
                return;
            }
        },
        mounted() {
            if (this.$root.redirectIfAuthenticated()) {
                return;
            }
            this.$root.setPageTitle('ورود');

            if (! window.successfullLogin) {
                var root = this;

                window.successfullLogin = function(response) {
                    if (response.status) {
                        Cookies.remove('authorization');

                        var token = 'Bearer ' + response.data.token;
                        Cookies.set('authorization', token, { expires: 30});

                        $.ajaxSetup({
                            headers: {Authorization: token}
                        });

                        root.$root.$set(root.$root, 'user', response.data.user);
                        root.$router.push({ name: 'dashboard.index'});
                        // window.show_notification();
                    }
                }
            }
        }
    }
</script>