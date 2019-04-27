<template>
<div id='app'>

<nav>
<v-toolbar flat app>
<v-toolbar-side-icon class='grey--text' @click='drawer=!drawer'></v-toolbar-side-icon>
<v-toolbar title flat class="text-uppercase grey--text">
<span class="font-weight-dark">Dre Solutions </span>
<span></span>
</v-toolbar title>
<v-btn depressed  color="blue lighten-3" v-if='!loggedIn'>
<router-link :to="{name:'register'}">
<span>Register</span></router-link>
<v-icon right>exit_to_app</v-icon>
</v-btn>
<v-btn depressed color="blue lighten-3"  v-if='!loggedIn'><router-link :to="{name:'login'}"><span>Login</span>
</router-link>
<v-icon right>power_settings_new</v-icon>
</v-btn>
<v-btn depressed  color="blue lighten-4"  v-if='loggedIn' ><router-link :to="{name:'logout'}">
<span>Sign Out</span></router-link>

<v-icon right>exit_to_app</v-icon>
</v-btn>
</v-toolbar>
<v-navigation-drawer v-model='drawer' flat app class='indigo lighten-2'>
<v-layout column align-center>
<v-flex class="mt-5">
<v-avatar size='100'>
<img src="/images/pics.jpg">
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
{icon:'dashboard',text:'Dashboard',route:'/'},
{icon:'store',text:'My Team',route:'/views'},
{icon:'person',text:'Profile',route:'/rate'}
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
