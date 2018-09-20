<template>
<div>
<h4>Add New Article</h4>
<form @submit.prevent="sendData" >
<div class="form-group">
<input type="text" class="form-control" placeholder="user_id" v-model="user_id">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="name" v-model="title">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="content" v-model="body">
</div>
<button type="submit" class="btn btn-light btn-block">save</button>
</form>
</div>
</template>
<script>
import axios from "axios";
export default {
    data(){
return{
articles:[],
article:{},
name:'',
user_id:'',
title:'',
body:'',
search:'',
article_id:'',
pagination:{},
edit:false
}
    },
    methods: {
    sendData(){
    axios.post('api/article',{
    user_id:this.user_id,
    title:this.title,
    body:this.body
    })
.then((response)=>{
console.log(response);
alert('article added successfully');
})
.catch(function (error) {
console.log(error);
});
    }

    }

}


</script>
