<template>
</div>
<button type="submit" class="btn btn-light btn-block">Save</button>
</form>
  <div class="card card-body" v-for="article in articles" v-bind:key="article.id" >
   <h3>{{article.name}}</h3>
  <p>{{article.content}}
  <hr>
  <button v-on:click='deleteArticle(article.id)' class="btn btn-danger">Delete</button>
  </div>
  </div>
</template>

<script>
export default{
data(){
return{
    articles:[],
    article:{
    user_id:'',
    id:'',
    name:'',
    content:''
    },
    article_id:'',
    pagination:{},
    edit:false
}
},
created(){
this.fetchArticles();
},
methods:{
fetchArticles(){
    fetch('api/articles')
    .then(res=>res.json())
    .then(res=>{this.articles=res.data});
},
deleteArticle(id){

  if(confirm('are you sure you want to delete?'))
  {
  fetch('api/article/'+id,{
  method:'delete'
  })
  .then(res=>res.json())
  .then(data=>{
  alert('article deleted');
  this.fetchArticles();
  }).catch(err=>console.log(err));
  }
},
addArticle(){
  if(this.edit===false){

  fetch('api/article/',
  {
  method:'post',
  //body:JSON.stringify(this.article),
  headers:{
  'content-type':'application/json'
  }
  })
  .then(res=>res.json())
  .then(data=>{
  this.article.user_id='';
  this.article.name='';
  this.article.content='';
  alert('article added');
  this.fetchArticles();
  })
  .catch(err=>console.log(err));
  }else{

  }
}

}

};
</script>
