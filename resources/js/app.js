require('./bootstrap');
import {createApp} from 'vue';
import router from "./router";
import App from './components/App.vue';



createApp(App).use(router).mount("#employee_section");

/*window.Vue = require('vue').default;

import Vue from "vue";
import VueRouter from "vue-router";
// import {routes} from "./routes"
// Vue.use(VueRouter);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// const router =new VueRouter({
//     mode:"history",
//     routes:routes
// });

const app = new Vue({
    el: '#app',
});*/
