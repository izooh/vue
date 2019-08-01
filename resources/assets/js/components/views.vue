<template>
<div>
<div v-cloak>
<br><br>
    <v-dialog max-width='800px' v-model='dialog'>
    <v-btn slot='activator' large fixed right center fab dark  color="blue">
          <v-icon style="height:auto;" dark>note_add</v-icon>
        </v-btn>

    <v-card flat>
    <v-card-title>
     <div class='caption grey--text'>
    Post to NoticeBoard
    </div>
    </v-card-title>
    <v-card text>
    <v-form class="px-3">
    <v-text-field label="notice title" prepend-icon='folder' v-model='title'></v-text-field>
    <v-textarea label="content" prepend-icon='edit' v-model='body'>></v-textarea>
    <v-btn type="submit" flat class="indigo lighten-3" @click='sendData' :loading='loading'>Submit</v-btn>
    </v-form>
    </v-card text>
    </v-card>
    </v-dialog>
<h1 class='subheading grey--text'>Notice Board</h1>
<br>
<span class="caption grey--text"><v-icon small left>access_time</v-icon>{{theDate}}</span>
<br><br>
<v-layout row class="mb-3">
<v-flex xs12 md6 >
<input class="form-control " type="text" v-model="search" placeholder="Search Notes..."/>
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
    <v-chip small :class="`${article.user.name} black--text caption my-2`">
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
          <v-btn flat  color='blue' v-on:click='' ><v-icon small left>edit</v-icon></v-btn>
          <v-btn flat  color='black' v-on:click='' ><v-icon small left>message</v-icon></v-btn>

    </v-card>

      </v-expansion-panel-content>
    </v-expansion-panel>
    </v-flex>

</v-layout>
<v-footer class="pa-3" absolute>
<v-spacer></v-spacer>
<div><span>Blockchain</span>&copy; {{ new Date().getFullYear() }}</div>
</v-footer>
</div>
<template>
<div class="text-center">
  <loading-balls
    v-if="loading"
    :count="10"
    :radius="8"
    color="#4b0082"
  />
  </div>
</template>
</div>
</template>
<script>
var moment=require('moment');
import LoadingBalls from 'vue-loading-balls'
    export default {
    components: {
      LoadingBalls
    },
        data(){
return{
    articles:[],
    loading:true,
    title:'',
    body:'',
    search:'',
    user_id:'',
    article_id:'',
    pagination:{},
    editForm:'',
    dialog:false,
    notebookEditData:{title:'',body:'',user_id:''}
}
        },
        created() {

       this.fetchData();
       this.getUser();

         },
        methods:{
        getUser(){
    let tokenStr = localStorage.getItem('access_token');
          axios.get('api/user',{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
    .then((response) => {
          console.log(response.data.s_id)
            this.user_id=response.data.s_id

                })
    .catch(function (error) {
    console.log(error);
    });


        },
        sendData(){
        let tokenStr = localStorage.getItem('access_token');
        this.loading=true;
        axios.post('api/article',{
        user_id:this.user_id,
        title:this.title,
        body:this.body
        },{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
    .then((response)=>{


    console.log(response.data.data)
    this.article=response.data.data
    this.title='',
    this.body='',
    this.loading=false,
    this.dialog=false
    this.fetchData();

    })
    .catch(function (error) {
    console.log(error);
    });
        },
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
                    console.log(response);
                    this.articles = response.data.data;
                    this.loading=false;

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
  let tokenStr = localStorage.getItem('access_token');
          axios.delete('api/article/'+id,{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
 .then((response) => {

                    this.fetchData();
                    console.log(response.data)
                    alert(response.data);

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

        },
        theDate:function(){
        return Date();
        }




        }
    }
</script>
<style>
.Isaac{
border-left:4px solid #3cd1c2;
}
.Junior{
border-left:4px solid indigo;
}
.Sherley{
border-left:4px solid red;
}
.v-chip.Isaac{
border:4px solid #3cd1c2;
}
.v-chip.Sherley{
border:4px solid indigo;
}
.v-chip.Junior{
border:4px solid indigo;
}
[v-cloak] {
     display: none;
}

</style>
