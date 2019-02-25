<template>
<v-dialog max-width='800px'>
<v-btn flat slot='activator' class='blue lighten-1'>Add Suggestion</v-btn>
<v-card>
<v-card-title>
 <div class='caption grey--text'>
Whats on Your Mind
</div>
</v-card-title>
<v-card text>
<v-form class="px-3">
<v-text-field label="user id" prepend-icon='person'></v-text-field>
<v-text-field label="Suggestion title" prepend-icon='folder'></v-text-field>
<v-textarea label="Content" prepend-icon='edit'>></v-textarea>
<v-btn flat class="blue lighten-1">Submit</v-btn>
</v-form>
</v-card text>
</v-card>
</v-dialog>
</template>
<script>
export default{
data(){
return{

}
}
}
</script>
