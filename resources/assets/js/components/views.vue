<template>

<div>
  <input class="form-control " type="text" v-model="search" style="width:200px;" placeholder="Search Blogs"/>
  <hr>

<h1 class='subheading grey--text'>Notices</h1>

  <v-expansion-panel popout>
    <v-expansion-panel-content  v-for="article in filteredBlogs" v-bind:key="article.id">
    <div slot="header"><div class='caption grey--text' v-show="!showIt(article.id)"><strong>{{article.name}}</strong></div>

    <div class="right">
    <v-chip small class="white--text caption my-2">
  New
    </v-chip>
    </div>

</div>
    <v-card>
      <v-card-text><div v-show="!showIt(article.id)"><p class="text-success">{{article.content}}</p></div></v-card-text>
      <h6 class="text-muted"><strong>posted by *{{article.user.name}}* on *{{article.date}}*</strong></h6>
      <form @submit.prevent=(updateIt(article.id))>
      <h3 v-show=showIt(article.id) >Update</h3>
      <input v-show="showIt(article.id)" type="text" class="form-control" v-model="notebookEditData.user_id">

         <input v-show="showIt(article.id)" type="text" class="form-control" v-model="notebookEditData.title">
      <input v-show="showIt(article.id)" type="text" class="form-control"  v-model="notebookEditData.body">
      <button type="submit" v-show="showIt(article.id)">ok</button>
      <button @click.prevent="editForm=false" v-show="showIt(article.id)">cancel</button>
      </form>
        <v-btn  flat color="red" v-on:click='deleteData(article.id)' >Delete<v-icon small left>delete</v-icon></v-btn>
          <v-btn flat color="blue"  v-on:click='editIt(article.id)' >edit<v-icon small left>edit</v-icon></v-btn>

    </v-card>

      </v-expansion-panel-content>
    </v-expansion-panel>




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
        console.log(articles)
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
<style>

</style>
