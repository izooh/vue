<template>
<div>
<router-view></router-view>
</div>
</template>
<script>
import addArticles from './components/addArticles.vue';
export default{
components:{
'add-articles':addArticles
},
data(){
return{

}
}
}
</script>
