import VueRouter from 'vue-router';


let routes=[
  {
    path:'/',
    component:require('./components/add')
  },
  {
    path:'/views',
    component:require('./components/views')
  }
];
export default new VueRouter({
  routes

});
