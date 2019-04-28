
/**
 * web routes
 */

export default [
    {
        path: '/',
        component: { template: '<div>foo</div>' },
        name: 'index',
    },
    {
        path: '*',
        component: { template: '<div>page not found</div>' },
        name: '404',
    }
];
