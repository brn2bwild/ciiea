import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { Link, createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

import { library } from "@fortawesome/fontawesome-svg-core";
import {
    faPhone,
    faEnvelope,
    faMagnifyingGlass,
    faEllipsis,
    faHouse,
		faComment,
		faHeart,
		faH,
		faBars,
		faXmark
} from "@fortawesome/free-solid-svg-icons";
import { faFacebook, faTwitter } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import VueLazyload from "vue-lazyload";

library.add(
    faPhone,
    faFacebook,
    faTwitter,
    faEnvelope,
    faTwitter,
    faMagnifyingGlass,
    faEllipsis,
    faHouse,
		faComment,
		faHeart,
		faBars,
		faXmark
);

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
						.use(VueLazyload)
						.use(ZiggyVue, Ziggy)
            .component("font-awesome-icon", FontAwesomeIcon)
						.component("Link", Link)
            .mount(el);
    },
    progress: {
        color: "#450a0a",
    },
});
