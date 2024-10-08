import "./bootstrap";
import router from "./router";
import { createApp } from "vue";

import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/reset.css';

import App from "./App.vue";

createApp(App).use(router).use(Antd).mount("#app");
