
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');



window.Vue = require('vue');

import VueRouter from 'vue-router';
window.Vue.use(VueRouter)
import router from './routes.js'
import Vuetify from 'vuetify'
import StoreData from './store.js'
import 'vuetify/dist/vuetify.min.css'
import Vuex from 'vuex'
import materialIcons from 'material-design-icons/iconfont/material-icons.css'
import JsonExcel from 'vue-json-excel'
import axios from "axios"
Vue.component('remains', JsonExcel)
window.Vue.use(Vuex)
Vue.use(Vuetify)
const store  = new Vuex.Store(StoreData);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('navb', require('./components/Navb.vue'));
//Vue.component('articles', require('./components/Articles.vue'));


const app = new Vue({
    el: '#app',
    router,
    store
});
