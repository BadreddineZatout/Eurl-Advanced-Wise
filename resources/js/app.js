import "./bootstrap";

import { createApp } from "vue";
import { createPinia } from "pinia";
import piniaPluginPersistedState from "pinia-plugin-persistedstate";

import Header from "./components/layout/Header.vue";
import Footer from "./components/layout/Footer.vue";

import App from "./components/App.vue";
import Login from "./components/auth/Login.vue";
import Register from "./components/auth/Register.vue";
import Product from "./components/products/Product.vue";
import Orders from "./components/orders/Orders.vue";
import Order from "./components/orders/Order.vue";

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
app.component("orders", Orders);
app.component("order", Order);
app.mount("#app");

const footer = createApp({});
footer.component("nav-footer", Footer);
footer.mount("#footer-container");
