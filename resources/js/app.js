import "./bootstrap";

import { createApp } from "vue";
import { createPinia } from "pinia";
import piniaPluginPersistedState from "pinia-plugin-persistedstate";

import Header from "./components/Header.vue";
import App from "./components/App.vue";
import Login from "./components/Login.vue";
import Register from "./components/Register.vue";

const pinia = createPinia();
pinia.use(piniaPluginPersistedState);

const header = createApp({});
header.component("nav-header", Header);
header.use(pinia);
header.mount("#header-container");

const app = createApp({});
app.use(pinia);
app.component("app", App);
app.component("login", Login);
app.component("register", Register);
app.mount("#app");
