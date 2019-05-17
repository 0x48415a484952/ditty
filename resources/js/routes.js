
/**
 * web routes
 */

export default [
    {
        path: '/',
        component: require('./views/elements/blog-items/blog-item-style2').default,
        name: 'index',
    },
    {
        path: '*',
        component: { template: '<div>page not found</div>' },
        name: '404',
    }
];
