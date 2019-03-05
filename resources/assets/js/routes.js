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
    name:'login',
    path:'/login',
    component:require('./components/login')
  },
  {
    name:'logout',
    path:'/logout',
    component:require('./components/Logout')
  }
];
export default new VueRouter({
  routes

});
