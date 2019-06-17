<template>
<div>
<v-layout row wrap>
<vue-csv-downloader
      :data="data"
      :fields="fields"
  ><v-tooltip top>
  <template v-slot:activator="{ on }">
  <v-btn medium depressed fixed right bottom fab dark  color="blue" v-on="on">
        <v-icon dark>get_app</v-icon>
      </v-btn>
      </template>
      <span>Download leads</span>
      </v-tooltip>
  </vue-csv-downloader>

    <v-flex xs12 md5>
  <v-form@submit.prevent='sendData' >
  <v-card flat>
  <v-toolbar dark color="grey">
  <v-toolbar-title><small>Select number of calls</small></v-toolbar-title>
   <v-spacer></v-spacer>
  </v-toolbar>
  <v-card-text>
    <v-text-field label="Deliquency 43" v-model='dp43' ></v-text-field>
    <v-text-field label="Deliquency 36 and 22" v-model='dp36'></v-text-field>
          <div class="form-group">
          <label>agent name</label>
          <select  v-model='user_id' class="form-control" id="sel1">
          <option value='1'>all</option>
          <option value='2'>mavin</option>
          <option value='3'>paul</option>
          <option value='4'>kevin</option>
          <option value='5'>joseph</option>
          <option value='6'>rodgers</option>
          <option value='7'>levi</option>
           </select>
          </div>
  </v-card-text>
    <v-card-actions>
    <v-btn type='submit' depressed color="blue">Export</v-btn>
  </v-card-actions>
  </v-card>
  </v-form>
  </v-flex>
</v-layout>
</div>
</template>
<script>
import VueCsvDownloader from 'vue-csv-downloader';
import remainsChart from './remainsChart'
  export default {
  components:{
     VueCsvDownloader
  },
    data () {
      return {
      data:[],
     fields: ['cfid', 'contact', 'user_id','last_name'],
     dp36:'',
     dp43:'',
     user_id:''
      }
    },created() {

     },
    methods:{
    sendData(){
    axios.post('api/leads',{
    dp36:this.dp36,
    dp43:this.dp43

    })
.then((response)=>{
console.log(response.data)
this.data=response.data
})
.catch(function (error) {
console.log(error);
});
    }

    }
  }
</script>
