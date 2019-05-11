
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
import axios from "axios";

Vue.component('remains', JsonExcel)


window.Vue.use(Vuex)
Vue.use(Vuetify)
const store  = new Vuex.Store(StoreData);
axios.defaults.headers.common['Authorization'] ="Bearer:eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRiZTZkYjQ2M2IwN2VlMzU3Nzc2NjVmMThjZTFjNTY0YTQyZjI4YjNiNzhkYzJkOGNmNzhjY2QzYjQxNTg3YjM5OTNlY2M0YjBjN2IzNWYxIn0.eyJhdWQiOiIyIiwianRpIjoiNGJlNmRiNDYzYjA3ZWUzNTc3NzY2NWYxOGNlMWM1NjRhNDJmMjhiM2I3OGRjMmQ4Y2Y3OGNjZDNiNDE1ODdiMzk5M2VjYzRiMGM3YjM1ZjEiLCJpYXQiOjE1NTc0OTE4NzgsIm5iZiI6MTU1NzQ5MTg3OCwiZXhwIjoxNTg5MTE0Mjc4LCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.hJ_W6PeYvpEKPXVCWwcnSjhllD2rr3BsNZ0MYuTClQ2r8dUVqi_MWjymF10IoE_7rCVGXOagyYndLWMDVbjVc6gaQTBjj66oSv0QsvRw4tJAqMtMG-GjJYiKXejhWl9ngavxgYBw_o6jHMLyOvmkAzKXzseN-v4end4pLRdsFBLFMU_ZTN-ydkJW5RJvjLXJPZ3g14mEi6vKR_51Hmv_WGfoztLR9sItCTKZxzyddFSo7Uj9pZmChcvefRzFBC-wIg5wKWgCH8G9zvJVzGpK_E1Jj-t8t3_z5ZwvxZEeNuszXhChHvSzGAlW8wlF11XhFL1CqXBk-oIpPoXKTrnk91hrms6lZ9ybBBpf08HjXdWmq4aCiIvn3vJkG-RU5YzR0TtqB24B3xPEK1pNF48M7RbT_64j9JWRbVMwpH24pTStiQWJTZyE42skHLxHtKcSReChmj6qVU5SE8de17kCnVKDCqKWVaSj4rnU_IsiJ7TlO4ofzb8BrfCdabBq8t_xzEaaskWVv0jqN14x0CbkJlE5MNhHTKT2YRVx-rMBvAYgs1_bCfsxoSwrllPNU1d5ouvymMvmpMkvgn1CibeLA0k0_i7QicboNjesGXxUHPY77rMCSsnoKp6ucVDCcUIVkhIeGORdoRxQvivB0cL7ugnXMDtyXIFbuiTLJUfsu2s"



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
