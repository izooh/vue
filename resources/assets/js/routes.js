import VueRouter from 'vue-router';


let routes=[
  {
    path:'/',
    component:require('./components/add')
  },
  {
    path:'/views',
    component:require('./components/views')
  },
  {
    path:'/guest',
    component:require('./components/guest')
  }
];
export default new VueRouter({
  routes

});
