<template>
<div>
<nav>
<v-toolbar flat app>
<v-toolbar-side-icon class='grey--text' @click='drawer=!drawer'></v-toolbar-side-icon>
<v-toolbar title flat class="text-uppercase grey--text">
<span class="font-weight-dark">Kidyavai Advocate </span>
<span></span>
</v-toolbar title>
<span class="caption grey--text"><v-icon small left>access_time</v-icon>{{theDate}}</span>
<v-btn flat color="grey">
<span>Sign Out</span>
<v-icon right>exit_to_app</v-icon>
</v-btn>
</v-toolbar>
<v-navigation-drawer v-model='drawer' flat app class='indigo lighten-4'>
<v-layout column align-center>
<v-flex class="mt-5">
<v-avatar size='100'>
<p>image here</p>
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
{icon:'store',text:'My work',route:'/views'},
{icon:'person',text:'Admin',route:'/guest'}
]

}
},
computed:{
theDate:function(){
return Date();
}




}
}
</script>
