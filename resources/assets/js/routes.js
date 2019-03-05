import VueRouter from 'vue-router';


let routes=[
  {
    path:'/',
    component:require('./components/views')

  },
  {
    path:'/views',
    component:require('./components/notices')
  },
  {
    path:'/guest',
    component:require('./components/myprofile')
  },
  {
    path:'/login',
    component:require('./components/login')
  }
];
export default new VueRouter({
  routes

});
