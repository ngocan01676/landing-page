const mix = require('laravel-mix');

// Admin
mix.webpackConfig({
    output: {
        path:__dirname+'/public',
    }

});

mix.sass('public/sass/app.scss','css');
mix.sass('public/sass/contact.scss','css');
// ----------------------------------------------------------------------------------------------------
//Ravi Website
mix.sass('public/module/user/scss/user.scss','module/user/css');
mix.sass('public/module/user/scss/profile.scss','module/user/css');
mix.sass('public/module/news/scss/news.scss','module/news/css');
mix.sass('public/module/list-jobs/scss/list-jobs.scss','module/list-jobs/css');
mix.sass('public/sass/home.scss','module/core/css');
mix.sass('public/sass/custom-style.scss','module/core/css');
mix.sass('public/sass/headerBanner.scss','module/core/css');
mix.sass('public/sass/projects-list.scss','module/core/css');
mix.sass('public/sass/projects-list-details.scss','module/core/css');
mix.sass('public/sass/paging.scss','module/core/css');
mix.sass('public/sass/notfound.scss','css');
mix.sass('public/module/media/scss/browser.scss','module/media/css');
