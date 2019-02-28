<template>
<div>
<br><br>
<h1 class='subheading grey--text'>Notice Board</h1>
<br>
<v-layout row class="mb-3">
<v-flex xs12 md6 >
<input class="form-control " type="text" v-model="search" placeholder="Search Blogs"/>
  </v-flex>

  <v-flex xs12 md6>
<v-tooltip top>
<v-btn small flat color="grey" @click="sortBy('name')" slot="activator">
<v-icon small left>folder</v-icon>
<span class="caption text-lowercase">By Note Title</span>
</v-btn>
<span>sorting items by notes title</span>
</v-tooltip>

<v-tooltip top>
<v-btn small flat color="grey" @click="sortBy('content')" slot="activator">
<v-icon small left>person</v-icon>
<span class="caption text-lowercase">By Note Content</span>
</v-btn>
<span>sorting items by  notes content</span>
</v-tooltip>
</v-flex>

</v-layout>
  <hr class="grey">


<v-layout row wrap>
<v-flex xs12 md12>
  <v-expansion-panel popout>
  <v-expansion-panel-content   v-for="article in filteredBlogs" v-bind:key="article.id">
    <div slot="header" :class="`${article.user.name} `" ><div class='caption grey--text' v-show="!showIt(article.id)"><strong>{{article.name}}</strong></div>

    <div class="right" >
    <v-chip small :class="`${article.user.name} white--text caption my-2`">
{{article.date}}
    </v-chip>
    </div>



</div>
    <v-card>
      <v-card-text><div v-show="!showIt(article.id)"><p class="">{{article.content}}</p></div></v-card-text>
      <h6 class="text-muted"><strong>posted by {{article.user.name}}</strong></h6>
      <form @submit.prevent=(updateIt(article.id))>
      <h3 v-show=showIt(article.id) >Update</h3>
      <input v-show="showIt(article.id)" type="text" class="form-control" v-model="notebookEditData.user_id">

         <input v-show="showIt(article.id)" type="text" class="form-control" v-model="notebookEditData.title">
      <input v-show="showIt(article.id)" type="text" class="form-control"  v-model="notebookEditData.body">
      <button type="submit" v-show="showIt(article.id)">ok</button>
      <button @click.prevent="editForm=false" v-show="showIt(article.id)">cancel</button>
      </form>
        <v-btn flat color='red'  v-on:click='deleteData(article.id)' ><v-icon small left>delete</v-icon></v-btn>
          <v-btn flat  color='blue' v-on:click='editIt(article.id)' ><v-icon small left>edit</v-icon></v-btn>
          <v-btn flat  color='black' v-on:click='' ><v-icon small left>message</v-icon></v-btn>

    </v-card>

      </v-expansion-panel-content>
    </v-expansion-panel>
    </v-flex>

</v-layout>
</div>

</div>
</template>
<script>
var moment=require('moment');
    import axios from "axios";

    export default {
        data(){
return{
    articles:[],
    article:'',
    articl:'',
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
        methods:{
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

        sortBy(prop){
this.articles.sort((a,b) => a[prop] < b[prop] ? -1 : 1)
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
        return article.name.match(this.search)
              });

        }




        }
    }
</script>
<style>
.louis{
border-left:4px solid #3cd1c2;
}
.Junior{
border-left:4px solid indigo;
}
.v-chip.louis{
border:12px solid #3cd1c2;
}
.v-chip.Junior{
border:12px solid indigo;
}

</style>
