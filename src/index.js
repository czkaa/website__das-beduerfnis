import { createApp } from "vue";
import { initRouter } from "./router";
import { useServiceWorker } from "./hooks";
import nextDOMUpdate from './plugins/nextDOMUpdate';
import sleep from './plugins/sleep';
import smoothscroll from './plugins/smoothscroll';
import lazysizes from 'lazysizes';

import VueCookieAcceptDecline from 'vue-cookie-accept-decline';
import 'vue-cookie-accept-decline/dist/vue-cookie-accept-decline.css';

/*
* Store
*/
import { store } from './store'

/*
/*
* Kirby
*/
import KirbyTextDirective from "./plugins/KirbyTextDirective";

/*
* Endpoint
*/
import App from "./App.vue";

/*
* CSS
*/
import "./index.css";

/*
* Definitions
*/
const { initSw } = useServiceWorker();
const router = initRouter();
const app = createApp(App);
app.config.devtools = true

/*
* Usage
*/
app.use(nextDOMUpdate);
app.use(sleep);
app.use(router);
app.use(VueCookieAcceptDecline);
app.use(store);
app.use(smoothscroll);
app.component('vue-cookie-accept-decline', VueCookieAcceptDecline);
app.use(KirbyTextDirective);

app.mount("#app");

initSw();
