
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
    {
        path: '/@:username',
        component: require('./views/author/Index').default,
        name: 'author.index',
        props: true
    },
    {
        path: '/tags/:tag',
        component: require('./views/posts/Tags').default,
        name: 'tags.index',
        props: true
    },

    // categories

    {
        path: '/categories/:id-:slug',
        component: require('./views/posts/Categories').default,
        name: 'categories.index'
    },
    // error pages

    {
        path: '/404',
        component: require('./views/404').default,
        alias: '*',
        name: '404'
    },
];
