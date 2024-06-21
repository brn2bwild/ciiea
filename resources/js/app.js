import "../css/app.css";

import { createApp, h } from "vue";
import { Head, Link, createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import VueLazyload from "vue-lazyload";
import { VueReCaptcha, useReCaptcha } from "vue-recaptcha-v3";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue"),
        ),
    setup({ el, App, props, plugin }) {
        const captchaKey = props.initialPage.props.recaptcha_site_key;

        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VueLazyload)
            .use(ZiggyVue, Ziggy)
            .use(VueReCaptcha, { siteKey: captchaKey })
            .component("Link", Link)
            .component("Head", Head)
            .mount(el);
    },
    progress: {
        color: "#1e3a8a",
    },
});
