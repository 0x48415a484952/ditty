
/**
 * web routes
 */

export default [

    // home page

    {
        path: '/',
        component: require('./views/index').default,
        name: 'index',
    },

    // posts

    {
        path: '/posts',
        component: require('./views/posts/index').default,
        name: 'posts.index',
    },
    {
        path: '/posts/:id-:slug',
        component: require('./views/posts/show').default,
        name: 'posts.show',
        props: true
    },

    // categories

    {
        path: '/categories/:id-:slug',
        component: require('./views/posts/index').default,
        name: 'categories.show',
        props: true
    },

    // tags

    {
        path: '/tags/:id-:slug',
        component: require('./views/posts/index').default,
        name: 'tags.show',
        props: true
    },

    // error pages

    {
        path: '/404',
        component: require('./views/404').default,
        alias: '*',
        name: '404'
    },
];
