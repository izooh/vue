<template>

<div>
  <input class="form-control " type="text" v-model="search" placeholder="Search Blogs"/>
  <hr>


<div class="card card-body mb-2" v-for="article in filteredBlogs" v-bind:key="article.id" >
<form @submit.prevent=(updateIt(article.id))>
<h3 v-show=showIt(article.id) >Update</h3>
<input v-show="showIt(article.id)" type="text" class="form-control" v-model="notebookEditData.user_id">
   <blockquote class="blockquote" v-show="!showIt(article.id)">{{article.name}}</blockquote>
   <input v-show="showIt(article.id)" type="text" class="form-control" v-model="notebookEditData.title">

<div v-show="!showIt(article.id)">{{article.content}}</div>
<input v-show="showIt(article.id)" type="text" class="form-control"  v-model="notebookEditData.body">
<button type="submit" v-show="showIt(article.id)">ok</button>
<button @click.prevent="editForm=false" v-show="showIt(article.id)">cancel</button>
</form>
  <h6><strong>posted by..{{article.user.name}}....date comming soon</strong></h6>
  <button v-on:click='deleteData(article.id)' class="btn btn-danger">Remove</button>
    <button v-on:click='editIt(article.id)' class="btn btn-info">edit</button>
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
    name:'',
    title:'',
    body:'',
    search:'',
    article_id:'',
    pagination:{},
    editForm:'',
    notebookEditData:{title:'',body:'',user_id:''}
}
        },
        created() {

       this.fetchData();


         },
        methods: {
    editIt(notebookId){

    return this.editForm=notebookId;
        },
        showIt(notebookId){
        if(this.editForm==notebookId)
        {
        return true;
        }
        return false;

        },
        updateIt(articleId){
        axios.put('api/article/'+articleId,this.notebookEditData)
        .then((response)=>{
        console.log(response);
        this.notebookEditData="";
        this.$router.push('/guest');
        }).catch(error=>{
        console.log(error.response);
        })
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
