import "./bootstrap";

import { createApp } from "vue";
import Header from "./components/Header.vue";
import App from "./components/App.vue";

const header = createApp({});
header.component("nav-header", Header);
header.mount("#header-container");

const app = createApp({});
app.component("app", App);
app.mount("#app");
