<template>
<div>
<v-layout row wrap>
<v-flex xs12 md5>
<add_rating/>
</v-flex>
<v-flex xs12 md2>
</v-flex>
<v-flex xs12 md5>
<agent_position/>
</v-flex>
</v-layout>
</div>
</template>
<script>
import add_rating from './add_rating.vue'
import agent_position from './agent_position.vue'
export default{
components:{add_rating,agent_position},
data(){
return{

}
}
}
</script>
