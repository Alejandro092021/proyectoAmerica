require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

//importamos el plugin que usaremos
import VueGates from 'vue-gates';
import Permissions from './Plugins/Permissions';
import Notifications from 'vue3-vt-notifications';
import loader from "vue-ui-preloader";

import VueViewer from 'v-viewer';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            //agregamos lo importado de permisos
            .use(VueGates)
            .use(Permissions)      
            .use(Notifications)

            .use(loader)

            .use(VueViewer)

            .mixin({ methods: { route } })
            .mount(el)
            ;
    },

});

InertiaProgress.init({ color: '#4B5563' });
