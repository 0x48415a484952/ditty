
export default [
    {
        path: '/dashboard',
        component: require('./components/pages/IndexComponent.vue').default,
        name: 'dashboard.index'
    },
    {
        path: '/dashboard/login',
        component: require('./components/pages/Login.vue').default,
        name: 'dashboard.login'
    },
    {
        path: '/dashboard/register',
        component: require('./components/pages/Register.vue').default,
        name: 'dashboard.register'
    },
    {
        path: '/dashboard/register-author',
        component: require('./components/pages/RegisterAuthor.vue').default,
        name: 'dashboard.register'
    },
    {
        path: '/dashboard/posts',
        component: require('./components/pages/posts/Index.vue').default,
        name: 'dashboard.posts.index'
    },
    {
        path: '/dashboard/posts/create',
        component: require('./components/pages/posts/Create.vue').default,
        name: 'dashboard.posts.create'
    },
    {
        path: '/dashboard/posts/:post_id/edit',
        component: require('./components/pages/posts/Edit.vue').default,
        name: 'dashboard.posts.edit'
    },
    {
        path: '/dashboard/categories',
        component: require('./components/pages/CategoriesComponent.vue').default,
        name: 'dashboard.categories'
    },
    {
        path: '/dashboard/comments',
        component: require('./components/pages/CommentsComponent.vue').default,
        name: 'dashboard.comments'
    },
    {
        path: '/dashboard/profile',
        component: require('./components/pages/ProfileComponent.vue').default,
        name: 'dashboard.profile'
    }
];