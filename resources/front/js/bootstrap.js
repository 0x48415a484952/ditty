
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('es6-promise/auto');
    require('sticky-kit/dist/sticky-kit.js');
    window.hljs = require('highlight.js');
    require('./custom.js');
    window.Cookies = require('js-cookie');

} catch (e) {
    console.warn(e);
}


$.ajaxSetup({
    headers: {'Authorization': Cookies.get('authorization')}
});