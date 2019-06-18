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
          <select v-model='user_id' class="form-control" id="sel1">
          <option  value='1'>all</option>
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
    <v-btn type='submit' color="blue"><font color="white">Filter</font></v-btn>
    <v-spacer></v-spacer>
    <v-btn color="red"><font color="white">
    <span class="caption">Revert</span></font> <v-icon small left>replay</v-icon></v-btn>
  </v-card-actions>
  </v-card>
  </v-form>
  <br><br>
  </v-flex>
  <v-flex xs12 md1>
  </v-flex>
      <v-flex xs12 md6>
  <table style="width:100%" border="1">
  <tr>
    <th>Total calls made</th>
    <th> Total non contacted numbers</th>
    <th>non contacted numbers(dpd43)</th>
    <th>contacted numbers(dpd43)</th>
    <th>non contacted numbers(dpd36)</th>
    <th>contacted numbers(dpd36)</th>
  </tr>
  <tr>
    <td><div v-for="(value, name) in remains">
    {{ value.Called }}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New_43}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.Called_43 }}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New_36}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.Called_36 }}
    </div></td>
  </tr>
</table>
</v-flex>
<v-flex xs12 md4>
<v-form@submit.prevent='Send'>
<v-card flat>
<v-toolbar dark color="grey">
<v-toolbar-title><small>Call History</small></v-toolbar-title>
 <v-spacer></v-spacer>
</v-toolbar>
<v-card-text>
<div>
<input type="checkbox" id="jack" value="1" v-model="Total_Contacted">
<label for="jack">Total called</label>
<input type="checkbox" id="john" value="1" v-model="Total_Uncontacted">
<label for="john">Uncontacted</label>
<input type="checkbox" id="mike" value="1" v-model="Total_Contacted_43">
<label for="mike">Called(43)</label><br>
<input type="checkbox" id="john" value="1" v-model="Total_Uncontacted_43">
<label for="john">Uncontacted(43)</label>
<input type="checkbox" id="mike" value="1" v-model="Total_Contacted_36">
<label for="mike">Called(36)</label>
<input type="checkbox" id="john" value="1" v-model="Total_Uncontacted_36">
<label for="john">Uncontacted(36)</label>
<br>
</div>
  </v-card-text>

  <v-card-actions>
    <v-btn type='submit' color="blue"><font color="white">Submit</font></v-btn>
</v-card-actions>

</v-card>
  </v-form>


  <v-data-table
      :headers="headers"
      :items="datar"
      class="elevation-1"
    >
      <template  v-slot:items="props">
        <td>{{ props.item.user_id }}</td>
         <td>{{ props.item.total }}</td>

      </template>
    </v-data-table>
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
     remains:[],
     user_id:'',
     Total_Contacted:'',
     Total_Uncontacted:'',
     Total_Contacted_43:'',
     Total_Uncontacted_43:'',
     Total_Contacted_36:'',
     Total_Uncontacted_36:'',
     headers: [
       {
         text: 'Agent Name',
         align: 'left',
         sortable: false,
         value: 'name'
       },
         { text: 'Number of calls',value: 'desserts.count' }
     ],
     datar:[]
      }
    },created() {
this.fetchData()
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
this.fetchData()
})
.catch(function (error) {
console.log(error);
});
    },
    fetchData(){

      axios.get('api/remains')
.then((response) => {
                console.log(response.data);
                this.remains=response.data
            })
.catch(function (error) {
console.log(error);
});


    },
    Send(){
    axios.post('api/user_remains',{
    Total_Contacted:this.Total_Contacted,
    Total_Uncontacted:this.Total_Uncontacted,
    Total_Contacted_43:this.Total_Contacted_43,
    Total_Uncontacted_43:this.Total_Uncontacted_43,
    Total_Contacted_36:this.Total_Contacted_36,
    Total_Uncontacted_36:this.Total_Uncontacted_36

    })
.then((response)=>{
console.log(response.data)
this.datar=response.data
})
.catch(function (error) {
console.log(error);
});
    }

    }
  }
</script>
