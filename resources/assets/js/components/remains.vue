<template>
<div>
<v-layout row wrap>
<vue-csv-downloader
      :data="data"
      :fields="fields"
      download-name='agent leads.csv'
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
    <v-text-field label="Deliquency 22" v-model='dp22' ></v-text-field>
    <v-text-field label="Deliquency 36" v-model='dp36' ></v-text-field>
    <v-text-field label="Deliquency 52" v-model='dp52'></v-text-field>
    <v-text-field label="Deliquency 112" v-model='dp112'></v-text-field>
    <v-text-field label="Deliquency 172" v-model='dp172'></v-text-field>
    <v-text-field label="Deliquency 232" v-model='dp232'></v-text-field>
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
    <v-btn type='submit' color="blue" v-bind:disabled="hasClicked" depressed><font color="white">Filter <v-icon small right>find_replace</v-icon></font></v-btn>
    <v-spacer></v-spacer>
    <v-btn color="red" v-on:click='Revert' v-if="hidden" depressed><font color="white">
      <span class="caption">Undo filter</span><v-icon small right>replay</v-icon></font> </v-btn>
  </v-card-actions>
  </v-card>
  </v-form>
  <br><br>
  </v-flex>
  <v-flex xs12 md1>
  </v-flex>
      <v-flex xs12 md6>
      <div style="overflow-x:auto;">
  <table style="width:100%" border="1">
  <tr>
    <th>Total calls made</th>
    <th> Total non contacted numbers</th>
    <th>non contacted numbers(dpd22)</th>
    <th>contacted numbers(dpd22)</th>
    <th>non contacted numbers(dpd36)</th>
    <th>contacted numbers(dpd36)</th>
    <th>non contacted numbers(dpd52)</th>
    <th>contacted numbers(dpd52)</th>
    <th>non contacted numbers(dpd112)</th>
    <th>contacted numbers(dpd112)</th>
    <th>non contacted numbers(dpd232)</th>
    <th>contacted numbers(dpd232)</th>
    <th>non contacted numbers(dpd172)</th>
    <th>contacted numbers(dpd172)</th>
  </tr>
  <tr>
    <td><div v-for="(value, name) in remains">
    {{ value.Called }}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New_22}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.Called_22 }}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New_36}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.Called_36 }}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New_52}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.Called_52 }}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New_112}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.Called_112}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New_232}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.Called_232 }}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.New_172}}
    </div></td>
    <td><div v-for="(value, name) in remains">
    {{ value.Called_172 }}
    </div></td>
  </tr>
</table>
</div>
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
<input type="checkbox" id="mike" value="1" v-model="Total_Contacted_22">
<label for="mike">Called(22)</label><br>
<input type="checkbox" id="john" value="1" v-model="Total_Uncontacted_22">
<label for="john">Uncontacted(22)</label>
<input type="checkbox" id="mike" value="1" v-model="Total_Contacted_36">
<label for="mike">Called(36)</label><br>
<input type="checkbox" id="john" value="1" v-model="Total_Uncontacted_36">
<label for="john">Uncontacted(36)</label>
<input type="checkbox" id="mike" value="1" v-model="Total_Contacted_52">
<label for="mike">Called(52)</label>
<input type="checkbox" id="john" value="1" v-model="Total_Uncontacted_52">
<label for="john">Uncontacted(52)</label>
<input type="checkbox" id="mike" value="1" v-model="Total_Contacted_112">
<label for="mike">Called(112)</label>
<input type="checkbox" id="john" value="1" v-model="Total_Uncontacted_112">
<label for="john">Uncontacted(112)</label>
<input type="checkbox" id="mike" value="1" v-model="Total_Contacted_232">
<label for="mike">Called(232)</label>
<input type="checkbox" id="john" value="1" v-model="Total_Uncontacted_232">
<label for="john">Uncontacted(232)</label>
<input type="checkbox" id="mike" value="1" v-model="Total_Contacted_172">
<label for="mike">Called(172)</label>
<input type="checkbox" id="john" value="1" v-model="Total_Uncontacted_172">
<label for="john">Uncontacted(172)</label>
<br>
</div>
  </v-card-text>

  <v-card-actions>
    <v-btn type='submit' color="blue" depressed><font color="white">Submit<v-icon small right>check_circle</v-icon></font></v-btn>
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
    <br><br>
</v-flex>
<v-flex xs12 md1>
</v-flex>
<v-flex xs12 md6>
<v-form@submit.prevent='promises' >
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
  <v-btn type='submit' color="blue" depressed><font color="white">Filter<v-icon small right>find_replace</v-icon></font></v-btn>
  <v-spacer></v-spacer>
  <vue-csv-downloader
       :data="data1"
       :fields="fields"
       download-name='promise_to_pay.csv'
   >
   <v-btn color="green" depressed><font color="white">Export<v-icon small right>import_export</v-icon></font></v-btn>
   </vue-csv-downloader>



</v-card-actions>
</v-card>
</v-form>

</v-flex>

<v-flex xs12 md4>
<v-form@submit.prevent='Operations'>
<v-card flat>
<v-toolbar flat>
<v-toolbar-title><v-icon left>build</v-icon><small>Table Operations</small></v-toolbar-title>
 <v-spacer></v-spacer>
</v-toolbar>
<v-card-text>
<div class="row">
     <div>
<label><p class="text-warning">Select Users name to reset</p></label><br>
  <select v-model='operations'  multiple>
  <option  v-for='user in users1' v-bind:key="user.id" v-bind:value="user.s_id">{{user.name}}<br></option>
  </select>
  </div>
  </div>
<br><br>
  <div class="input-group mb-3">
  <select class="custom-select" id="inputGroupSelect01" v-model="lastname">
    <option selected>Choose Deliquency</option>
    <option value="Taladpd22.">Taladpd22</option>
    <option value="Taladpd36.">Taladpd36</option>
    <option value="Taladpd52.">Taladpd52</option>
    <option value="Taladpd112.">Taladpd112</option>
    <option value="Taladpd232.">Taladpd232</option>
    <option value="Taladpd172.">Taladpd172</option>
  </select>
  </div>
</v-card-text>
<v-card-actions>
  <v-btn type='submit' color="red" depressed><font color="white">Reset<v-icon small right>autorenew</v-icon></font></v-btn>
  <v-spacer></v-spacer>
  <v-tooltip top>
      <template v-slot:activator="{ on }">
  <v-btn color="primary" dark v-on="on" depressed>upload<a href="http://192.168.0.220/import-excel"><v-icon medium left>cloud_upload</v-icon></a></v-btn>
  </template>
     <span>upload new leads</span>
   </v-tooltip>
</v-card-actions>
</v-card>
</v-form>
</v-flex>
<v-flex xs12 md2>
</v-flex>
<v-flex xs12 md6>
<v-form@submit.prevent='Close'>
        <v-textarea
          outlined
          rows="4"
          name="input-7-4"
          label="Close Accounts"
          v-model="closed"
          >
          </v-textarea>

        <p class="lead text-muted"><small><mark>input format: <pre>
     Cfid
     Cfid
</pre></mark></small></p>
          <v-btn type='submit' color="blue" depressed><font color="white">Close<v-icon small right>no_sim</v-icon></font></v-btn>
          </v-form>
        </v-flex>
</v-layout>
<br>
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
      users1:'',
      selected:[],
      operations:[],
      hidden:false,
      lead_id:[],
      data:[],
      data1:[],
      picker:'',
      picker1:'',
      promise:'',
      fields: [],
      fields: ['cfid', 'contact', 'user_id','last_name'],
     dp22:'',
     dp36:'',
     dp52:'',
     dp112:'',
     dp232:'',
     dp172:'',
     remains:[],
     closed:'',
     user_id:'',
     Total_Contacted:'',
     Total_Uncontacted:'',
     Total_Contacted_22:'',
     Total_Uncontacted_22:'',
     Total_Contacted_52:'',
     Total_Uncontacted_52:'',
     Total_Contacted_36:'',
     Total_Uncontacted_36:'',
     Total_Contacted_112:'',
     Total_Uncontacted_112:'',
     Total_Contacted_232:'',
     Total_Uncontacted_232:'',
     Total_Contacted_172:'',
     Total_Uncontacted_172:'',
     lastname:'',
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
    this.users1=response.data
    }).catch((error)=>
    {
    console.log(error)
    })
    },
    sendData(){
    let tokenStr = localStorage.getItem('access_token');
    this.hasClicked=true;
    axios.post('api/leads',{
    dp22:this.dp22,
    dp36:this.dp36,
    dp52:this.dp52,
    dp112:this.dp112,
    dp232:this.dp232,
    dp172:this.dp172,

    selected:this.selected

    },{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
.then((response)=>{
console.log(response.data)
this.data=response.data
this.hidden=true
this.fetchData()
this.dp36=""
this.dp22=""
this.dp52=""
this.dp112=""
this.dp172=""
this.dp232=""
alert('data processed successfully');
this.hasClicked=false;
})
.catch(function (error) {
console.log(error);
});
    },
    fetchData(){
let tokenStr = localStorage.getItem('access_token');
      axios.get('api/remains',{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
.then((response) => {
                console.log(response.data);
                this.remains=response.data
            })
.catch(function (error) {
console.log(error);
});


    },
    Send(){
    let tokenStr = localStorage.getItem('access_token');
    axios.post('api/user_remains',{
    Total_Contacted:this.Total_Contacted,
    Total_Uncontacted:this.Total_Uncontacted,
    Total_Contacted_22:this.Total_Contacted_22,
    Total_Uncontacted_22:this.Total_Uncontacted_22,
    Total_Contacted_36:this.Total_Contacted_36,
    Total_Uncontacted_36:this.Total_Uncontacted_36,
    Total_Contacted_52:this.Total_Contacted_52,
    Total_Uncontacted_52:this.Total_Uncontacted_52,
    Total_Contacted_112:this.Total_Contacted_112,
    Total_Uncontacted_112:this.Total_Uncontacted_112,
    Total_Contacted_232:this.Total_Contacted_232,
    Total_Uncontacted_232:this.Total_Uncontacted_232,
    Total_Contacted_172:this.Total_Contacted_172,
    Total_Uncontacted_172:this.Total_Uncontacted_172

    },{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
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
    let undo=this.data
    undo.forEach(element => {
    this.lead_id.push(element.id);
    });
    axios.post('api/revert',
    {undo:this.lead_id}
  )
.then((response)=>{
console.log(response.data)
this.hidden=false
this.fetchData()
})
.catch(function (error) {
console.log(error);
});
    }
  },
    promises(){
    axios.post('api/ptps',{
    date1:this.picker,
    date2:this.picker1
    }).then((response)=>{
    console.log(response.data)
    let prom=response.data
    prom.forEach(element => {
    this.data1.push(element.lead)


    });
console.log(this.data1)
    }).catch((error)=>{
    console.log(error)
    }

    )

    },
    Operations(){
    if
    (confirm("are you sure you want to undo changes in the database"))
    {
    let tokenStr = localStorage.getItem('access_token');
      axios.post('api/revertAll',
      {
      revert_id:this.operations,
      last_name:this.lastname
      },
      { headers: {"Authorization" : `Bearer ${tokenStr}`} }).then((response)=>{
      console.log(response)
      this.fetchData()
      alert('operation complete');
      }).catch((error)=>{
      console.log(error)
      })
      }
    },
    Close(){
       axios.post('api/close',{closed:this.closed}).then((response)=>{
       console.log(response)
       alert(response.data);
       }).catch((error)=>{
       console.log(error)
       })
    },
    resetData(){
    if
    (confirm("are you sure you want to permanently reset your database"))
    {
    let tokenStr = localStorage.getItem('access_token');
     axios.get('api/revertAll',{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
.then((response) => {

               this.fetchData();
               console.log(response.data)
               alert('reset complete');

           })
.catch(function (error) {
console.log(error);
});
}

    }
    }
}
</script>
