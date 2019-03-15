
<template>

<div>
  <input class="form-control " type="text" style="width:300px;" v-model="search" placeholder="Search Blogs"/>
  <h4>Add New Article</h4>
<form @submit.prevent="sendData">
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
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;" v-for="article in filteredBlogs" v-bind:key="article.id" >

   <blockquote class="blockquote">{{article.name}}</blockquote>
  <p>{{article.content}}</p>
  <h6><strong>posted by....on....</strong></h6>
  <button v-on:click='deleteData(article.id)' class="btn btn-danger">Remove</button>
    <button v-on:click='' class="btn btn-info">Edit</button>
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
        created() {
       this.fetchData();

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
  this.fetchData();
  })
  .catch(function (error) {
    console.log(error);
  });
        },
        fetchData(){

          axios.get('api/articles')
 .then((response) => {
                    console.log(response.data.data);
                    this.articles = response.data.data;

                })
  .catch(function (error) {
    console.log(error);
  });


        },
         deleteData(id){
         if
         (confirm("are you sure you want to delete"))
         {

          axios.delete('api/article/'+id)
 .then((response) => {
                    //console.log(response.data.data);
                    alert("alert deleted");
                    this.fetchData();

                })
  .catch(function (error) {
    console.log(error);
  });
  }


        }

        },
        computed:{
        filteredBlogs:function(){
        return this.articles.filter((article)=>{
        return article.name.match(this.search);
        });

        }

        }
    }
</script>
