
<template>

<div>
<h1 class='subheading grey--text'>Suggestions</h1>
<br>
<span class="caption grey--text"><v-icon small left>access_time</v-icon>{{theDate}}</span>
<br><br><hr>
<v-layout row class="mb-3">
<v-flex xs12 md6 >
<v-btn flat  color='grey' v-on:click='fetchData()' ><span class="caption grey--text">view suggestions</span></v-btn>
  <v-card flat v-for="article in articles" v-bind:key="article.id">
  <v-card-title>
  <div class='caption purple--text'>
{{article.name}}
 </div>
 </v-card-title>
 <v-card text>
 <p>{{article.content}}</p>
 <h6><strong>posted  on {{article.date}}</strong></h6>
 <v-btn flat color='red'  v-on:click='deleteData(article.id)' ><v-icon small left>delete</v-icon></v-btn>
   <v-btn flat  color='blue' v-on:click='' ><v-icon small left>edit</v-icon></v-btn>
<hr>
 </v-card text>
 </v-card>
  </v-flex>
  </v-layout>
  <v-footer class="pa-3" absolute>
  <v-spacer></v-spacer>
  <div><span>Blockchain</span>&copy; {{ new Date().getFullYear() }}</div>
  </v-footer>
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
    article_id:'',
    pagination:{},
    edit:false
}
        },
        created() {
                this.getUser();


         },
        methods: {
        getUser() {

          let tokenStr = localStorage.getItem('access_token');
          axios.get('api/user', {
              headers: {
                "Authorization": `Bearer ${tokenStr}`
              }
            })
            .then((response) => {
              this.user_id = response.data.id
            })
            .catch(function(error) {
              console.log(error);
            });


        },
        fetchData(){

          axios.get('api/suggestion/'+this.user_id)
 .then((response) => {
                    this.articles = response.data.data;
                    console.log(this.user_id)
                })
  .catch(function (error) {
    console.log(error);
  });


        },
        deleteData(id){
        console.log(this.user_id)
        if
        (confirm("are you sure you want to delete"))
        {
 let tokenStr = localStorage.getItem('access_token');
         axios.delete('api/suggestion/'+id,{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
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
        theDate:function(){
        return Date();
        }
        }

        }

</script>
