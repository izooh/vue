<template>
<div>
<v-layout row wrap>
<vue-csv-downloader
      :data="data"
      :fields="fields"
  ><v-tooltip top>
  <template v-slot:activator="{ on }">
  <v-btn large fixed right bottom fab dark  color="blue" v-on="on">
        <v-icon dark>get_app</v-icon>
      </v-btn>
      </template>
      <span>Download leads</span>
      </v-tooltip>
  </vue-csv-downloader>

    <v-flex xs12 md5>
  <v-form@submit.prevent='sendData' >
  <v-card flat>
  <v-toolbar flat dark color="grey">
  <v-toolbar-title><v-icon left>low_priority</v-icon><small>Select number of calls</small></v-toolbar-title>
   <v-spacer></v-spacer>
  </v-toolbar>
  <v-card-text>
    <v-text-field label="Deliquency 43" v-model='dp43' ></v-text-field>
    <v-text-field label="Deliquency 36 and 22" v-model='dp36'></v-text-field>
    <div class="row">
      <div class="col-md-12">
      <label><p class="text-warning">Select Users</p></label>
        <select v-model='selected' class="mdb-select colorful-select dropdown-primary md-form" multiple searchable="Search here..">
          <option  v-for='user in users' v-bind:key="user.id" v-bind:value="user.s_id">{{user.name}}</option>
        </select>
      </div>
    </div>

  </v-card-text>
    <v-card-actions>
    <v-btn type='submit' color="blue" v-bind:disabled="hasClicked"><font color="white">Filter</font></v-btn>
    <v-spacer></v-spacer>
    <v-btn color="red" v-on:click='Revert'><font color="white">
    <span class="caption">Revert</span></font> <v-icon small right>replay</v-icon></v-btn>
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
<v-btn flat color='grey'  v-on:click='deleteData()' ><v-icon small left color='red'>delete</v-icon></v-btn>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  <a href="http://192.168.0.220/api/leads"><v-icon medium left>cloud_upload</v-icon></a>
</v-flex>
<v-flex xs12 md5>
<v-form@submit.prevent='Send'>
<v-card flat>
<v-toolbar flat>
<v-toolbar-title><v-icon left>call</v-icon><small>Call History</small></v-toolbar-title>
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
        <td>{{ props.item.user.name }}</td>
         <td>{{ props.item.total }}</td>

      </template>
    </v-data-table>
</v-flex>
<v-flex xs12 md1>
</v-flex>
<v-flex xs12 md6>
<v-form@submit.prevent='promise' >
<v-card flat>
<v-toolbar flat >
<v-toolbar-title><v-icon left>timeline</v-icon><small>Promise to Pay</small></v-toolbar-title>
 <v-spacer></v-spacer>
</v-toolbar>
<v-card-text>
<v-menu>
<v-text-field slot='activator' label='Starting date' :value='picker' prepend-icon='date_range'></v-text-field>
   <v-date-picker v-model="picker"></v-date-picker>
   <v-text-field slot='activator' label='End date' :value='picker1' prepend-icon='date_range'></v-text-field>
      <v-date-picker v-model="picker1"></v-date-picker>
   </v-menu>
  </v-card-text>

  <v-card-actions>
  <vue-csv-downloader
        :data="promise"
        :fields="fields1"
    >
    <template v-slot:activator="{ on }">
    <v-btn type='submit' color="blue"><font color="white">Export</font></v-btn>
    </template>
</vue-csv-downloader>

</v-card-actions>
</v-card>
</v-form>
</v-flex>
</v-layout>
<v-footer class="pa-3" absolute>
<v-spacer></v-spacer>
<div><span>Blockchain</span>&copy; {{ new Date().getFullYear() }}</div>
</v-footer>
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
      hasClicked:false,
      users:'',
      selected:[],
      data:[],
      picker:'',
      picker1:'',
      promise:'',
      fields: [],
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
this.getUser()
     },
    methods:{
    getUser(){
    axios.get('api/getUser').then((response)=>
    {
    console.log(response.data)
    this.users=response.data
    }).catch((error)=>
    {
    console.log(error)
    })
    },
    sendData(){
    this.hasClicked=true;
    axios.post('api/leads',{
    dp36:this.dp36,
    dp43:this.dp43,
    selected:this.selected

    })
.then((response)=>{
console.log(response.data)
this.data=response.data
this.fetchData()
alert('data processed successfully');
this.hasClicked=false;
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
    },
    Revert(){
    if
    (confirm("are you sure you want to undo changes in the database"))
    {
    axios.post('api/revert')
.then((response)=>{
console.log(response.data)
this.data=response.data
this.fetchData()
})
.catch(function (error) {
console.log(error);
});
    }
    },
    promise(){
    axios.post('api/ptps',{
    date1:this.picker,
    date2:this.picker1
    }).then((response)=>{
    console.log(response)
    }).catch((error)=>{
    console.log(error)
    }

    )

    },
    deleteData(){
    if
    (confirm("are you sure you want to permanently clear your database"))
    {
     axios.delete('api/lead_delete')
.then((response) => {

               this.fetchData();
               console.log(response.data)
               alert('deleted');

           })
.catch(function (error) {
console.log(error);
});
}

    }
    }
}
</script>
