
export default [
    {
        path: '/dashboard',
        component: require('./components/pages/IndexComponent.vue').default,
        name: 'dashboard.index'
    },
    {
        path: '/dashboard/login',
        component: require('./components/pages/LoginComponent.vue').default,
        name: 'dashboard.login'
    },
    {
        path: '/dashboard/register',
        component: require('./components/pages/RegisterComponent.vue').default,
        name: 'dashboard.register'
    },
    {
        path: '/dashboard/posts',
        component: require('./components/pages/PostsComponent.vue').default,
        name: 'dashboard.posts'
    },
    {
        path: '/dashboard/categories',
        component: require('./components/pages/CategoriesComponent.vue').default,
        name: 'dashboard.categories'
    },
    {
        path: '/dashboard/profile',
        component: require('./components/pages/ProfileComponent.vue').default,
        name: 'dashboard.profile'
    }
];