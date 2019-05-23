<template>
<div id='app'>

<nav>
<v-toolbar class='white' flat app>
<v-toolbar-side-icon class='grey--text' @click.stop='drawer=!drawer'></v-toolbar-side-icon>
<v-toolbar title flat class="text-uppercase grey--text white">
<span class="font-weight-dark"><img src="/images/logo1.jpg" Width='250' height='30'> </span>
<span></span>
</v-toolbar title>
<router-link :to="{name:'register'}">
<v-btn flat color="white lighten-2" v-if='!loggedIn'>
<img src="/images/register1.jpg" Width='40' height='15'>
</v-btn>
</router-link>
<router-link :to="{name:'login'}"><v-btn flat  color="white lighten-2"  v-if='!loggedIn'><img src="/images/login.jpg" Width='40' height='15'>

</v-btn>
</router-link>
<v-btn flat  color="white lighten-2"  v-if='loggedIn' ><router-link :to="{name:'logout'}">
<img src="/images/sign-out.jpg" Width='40' height='15'></router-link>
</v-btn>
</v-toolbar>
<v-navigation-drawer   v-model='drawer' flat app absolute temporary disable-resize-watcher class='indigo lighten-1' >
<v-layout column align-center>
<v-flex class="mt-5">
<v-avatar size='100'>
<img src="/images/avatar.jpg">
</v-avatar>
</v-flex>
<v-flex class='mt-4 mb-3'>
<adding/>
</v-flex>
</v-layout>
<v-list>
<v-list-tile  v-for='link in links' :key='link.text' router :to="link.route" >
<v-list-tile-action>
<v-icon class='white--text'>{{link.icon}}</v-icon>
</v-list-tile-action>
<v-list-tile-content>
<v-list-tile-title class='white--text'>{{link.text}}</v-list-tile-title>
</v-list-tile-content>
</v-list-tile>
</v-list>

</v-navigation-drawer>
</nav>
</div>
</template>
<script>
import adding from './adding.vue'
export default{
components:{adding},
data(){
return{
drawer:false,
links:[
{icon:'dashboard',text:'Notice Board',route:'/'},
{icon:'store',text:'My Profile',route:'/views'},
{icon:'person',text:'Ratings',route:'/rate'},
{icon:'call',text:'Leads',route:'/remains'},
{icon:'bubble_chart',text:'Agent Position',route:'/agent_position'},
{icon:'account_balance',text:'Human Resource',route:''}
]

}
},
computed:{
loggedIn(){
return this.$store.getters.loggedIn
}




}
}
</script>
