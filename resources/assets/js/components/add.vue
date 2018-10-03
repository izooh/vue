<template>
<div>
<h4>Add New Article</h4>

<form @submit.prevent="sendData" >
<div class="form-group">
<input type="text" class="form-control" style="width:170px;" placeholder="user_id" v-model="user_id">
</div>
<div class="form-group">
<input type="text" class="form-control" style="width:200px;" placeholder="name" v-model="title">
</div>
<div class="form-group">
<textarea class="form-control" rows="5" style="width:200px;" placeholder="content" v-model="body"></textarea>
</div>
<button type="submit" class="btn btn-light btn-block">save</button>
</form>
  <hr>
<div class="card card-body mb-2 w-25 p-3" v-if='article'>
<p class="text-danger">article successfully added</p>
<p class="text-primary"><h4>{{article.name}}</h4></p>
<p class="text-success">{{article.content}}</p>
<p class="text-muted">posted by..{{article.user.email}}</p>
  <hr>
</div>
</div>


</template>
<script>
import axios from "axios";
export default {
    data(){
return{
articles:[],
article:'',
name:'',
user_id:'',
title:'',
body:'',
search:''
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

alert('article added successfully');
console.log(response.data.data)
this.article=response.data.data
this.user_id='',
this.title='',
this.body=''

})
.catch(function (error) {
console.log(error);
});
    }

    }

}


</script>
