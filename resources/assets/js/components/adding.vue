<template>
<v-dialog max-width='800px' v-model='dialog'>
<v-btn flat slot='activator' class='blue lighten-1'>Add Suggestion</v-btn>
<v-card>
<v-card-title>
 <div class='caption grey--text'>
Whats on Your Mind
</div>
</v-card-title>
<v-card text>
<v-form class="px-3">
<v-text-field label="user id" prepend-icon='person' v-model='user_id'></v-text-field>
<v-text-field label="Suggestion title" prepend-icon='folder' v-model='title'></v-text-field>
<v-textarea label="Content" prepend-icon='edit' v-model='body'>></v-textarea>
<v-btn type="submit" flat class="blue lighten-1" @click='sendData' :loading='loading'>Submit</v-btn>
</v-form>
</v-card text>
</v-card>
</v-dialog>
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
search:'',
loading:false,
dialog:false
}
    },
    methods: {
    sendData(){
    this.loading=true;
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
this.body='',
this.loading=false,
this.dialog=false

})
.catch(function (error) {
console.log(error);
});
    }

    }

}
</script>
