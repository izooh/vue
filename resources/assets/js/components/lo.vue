<template>
<div>
<form action='#' @submit.prevent='login'>
      <div class="input-group form-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="username" v-model='username'>

      </div>
      <div class="input-group form-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-key"></i></span>
        </div>
        <input type="password" class="form-control" placeholder="password" v-model='password'>
      </div>

      <div class="form-group">
        <input type="submit" value="Login" class="btn float-right login_btn">
      </div>
    </form>
    </div>
</template>
<script>

export default{
name:'login',
data(){
return{
username:'',
password:''

}
},
methods:{
login(){
this.$store.dispatch('retrieveToken',{
email:this.username,
password:this.password
}).then((res)=>{
this.$router.push('/')
})
}
}
}
</script>
