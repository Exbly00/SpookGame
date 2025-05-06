import { createApp } from "vue";
import { setDefaultHeaders, setDefaultBaseUrl } from "@/utils/fetchJson.js";
import App from "./App.vue";

// Laravel Breeze
import "./bootstrap";
import Alpine from "alpinejs";

// Protection CSRF
const csrfToken =
    document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content") ?? "";
console.log("CSRF Token:", csrfToken);

// API
setDefaultHeaders({ "X-CSRF-TOKEN": csrfToken });
const urlApi =
    document
        .querySelector('meta[name="api-base-url"]')
        ?.getAttribute("content") ?? "";
console.log("API Base URL:", urlApi);
setDefaultBaseUrl(urlApi);

// Vue
const myApp = createApp(App);
myApp.mount("#app");

// Laravel Breeze
window.Alpine = Alpine;
Alpine.start();
