import "./bootstrap";

import { createApp } from "vue";
import { createPinia } from "pinia";
import piniaPluginPersistedState from "pinia-plugin-persistedstate";

import Header from "./components/layout/Header.vue";
import App from "./components/App.vue";
import Login from "./components/auth/Login.vue";
import Register from "./components/auth/Register.vue";
import Product from "./components/products/Product.vue";

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
app.component("product", Product);
app.mount("#app");
