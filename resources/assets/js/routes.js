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
  },
  {
    name:'register',
    path:'/register',
    component:require('./components/register')
  }
];
export default new VueRouter({
  routes

});
