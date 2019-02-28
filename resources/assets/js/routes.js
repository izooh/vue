import VueRouter from 'vue-router';


let routes=[
  {
    path:'/',
    component:require('./components/views')

  },
  {
    path:'/views',
    component:require('./components/add')
  },
  {
    path:'/guest',
    component:require('./components/guest')
  }
];
export default new VueRouter({
  routes

});
