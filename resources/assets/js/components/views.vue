<template>

<div>
  <input class="form-control " type="text" v-model="search" placeholder="Search Blogs"/>

<div class="card card-body mb-2" v-for="article in filteredBlogs" v-bind:key="article.id" >

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
