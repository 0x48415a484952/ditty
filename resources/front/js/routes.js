
/**
 * web routes
 */

export default [
    {
        path: '/',
        component: require('./views/index').default,
        name: 'index',
    },
    {
        path: '/posts/detail',
        component: require('./views/detail').default,
        name: 'posts.detail',
    },
    {
        path: '*',
        component: { template: '<div>page not found</div>' },
        name: '404',
    }
];
