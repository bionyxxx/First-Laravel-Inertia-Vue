import './bootstrap';

import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'

import '../sass/app.scss'
// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'



createInertiaApp({
    progress: {
        showSpinner: true,
    },
    title: title => `${title} - My App`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        return pages[`./Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .mixin({methods: {route}})
            .mount(el)
    },
}).then(r => r)
