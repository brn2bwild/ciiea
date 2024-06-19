import "../css/app.css";

import { createApp, h } from "vue";
import { Head, Link, createInertiaApp } from "@inertiajs/vue3";
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
    faBars,
    faXmark,
    faBook,
    faBookOpen,
    faFile,
    faUserLock,
    faUsers,
    faFileArrowUp,
    faCalendar,
    faAngleLeft,
    faAngleRight,
    faImages,
    faCircleXmark,
    faPlusCircle,
    faTriangleExclamation,
    faImage,
    faTrash,
    faPenToSquare,
    faCamera,
    faCameraRotate,
    faLocationPin,
} from "@fortawesome/free-solid-svg-icons";
import { faFacebook, faTwitter } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import VueLazyload from "vue-lazyload";
import { VueReCaptcha, useReCaptcha } from "vue-recaptcha-v3";

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
    faXmark,
    faBook,
    faBookOpen,
    faFile,
    faMagnifyingGlass,
    faUserLock,
    faUsers,
    faFileArrowUp,
    faFile,
    faCalendar,
    faAngleLeft,
    faAngleRight,
    faImages,
    faCircleXmark,
    faPlusCircle,
    faTriangleExclamation,
    faImage,
    faTrash,
    faPenToSquare,
    faCamera,
    faCameraRotate,
    faLocationPin,
);

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
            .component("font-awesome-icon", FontAwesomeIcon)
            .component("Link", Link)
            .component("Head", Head)
            .mount(el);
    },
    progress: {
        color: "#1e3a8a",
    },
});
