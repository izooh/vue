<template>
<div v-cloak>
<br><br>
<h1 class='subheading grey--text'>Leads Record</h1>
  <hr>
<v-container>

<v-layout row wrap>
<v-flex xs12 md5>
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


</v-flex>
<v-flex xs12 md7></v-flex>
<v-flex xs12 md5>
<v-data-table
    :headers="headers"
    :items="remains"
    class="elevation-1"
  >
    <template  v-slot:items="props">
      <td>{{ props.item.user.name }}</td>
      <td class="text-xs-right">{{ props.item.Remains }}</td>

    </template>
  </v-data-table>
  </v-flex>
  <v-flex xs12 md7 >
<remainsChart/>
  </v-flex>
<v-flex xs12 md12 >
<br><hr>
    </v-flex>
  </v-form>
<v-flex xs12 md5 >
<v-form@submit.prevent='login' >
<v-card flat>
<v-toolbar dark color="grey">
<v-toolbar-title><small>Leads Distribution</small></v-toolbar-title>

<v-spacer></v-spacer>
</v-toolbar>
<v-card-text>
<v-text-field
        label="Deliquency 43"
        placeholder=""
      ></v-text-field>
      <v-text-field
              label="Deliquency 36 and 22"
              placeholder=""
            ></v-text-field>
            <div class="form-group">
            <label for="sel1">agent name</label>
            <select v-model='user_id' class="form-control" id="sel1">
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
  <v-btn type='submit' depressed color="blue">Export to excel</v-btn>
</v-card-actions>

</v-card>
</v-form>
</v-flex>
  </v-layout><br>
  <v-footer class="pa-3" absolute>
  <v-spacer></v-spacer>
  <div><span>Blockchain</span>&copy; {{ new Date().getFullYear() }}</div>
  </v-footer>
</v-container>

</div>
</template>
<script>
import VueCsvDownloader from 'vue-csv-downloader';
import remainsChart from './remainsChart'
  export default {
  components:{
  'remainsChart':remainsChart,
     VueCsvDownloader
  },
    data () {
      return {
      picker:'',
      data:[],
                 fields: ['cfid', 'contact', 'user_id','last_name'],
      name:'',
      switch1: true,
      switch2: true,
        headers: [
          {
            text: 'Agent Name',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          { text: '43 remaing', value: 'desserts.TotalPoints' },
        ],
    remains:[]
      }
    },created() {
   this.fetchData();
   this.fetchLeads();
     },
    methods:{
     fetchData(){
let tokenStr = localStorage.getItem('access_token');
      axios.get('api/remains',{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
.then((response) => {
                console.log(response.data.data);
                   this.remains=response.data.data
            })
.catch(function (error) {
console.log(error);
});
    },
    fetchLeads(){
  let tokenStr = localStorage.getItem('access_token');
     axios.get('api/lead',{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
.then((response) => {
               console.log(response.data.data);
               this.data=response.data.data
                this.loading=false
           })
.catch(function (error) {
console.log(error);
});
   }
    }
  }
</script>
<style>
[v-cloak] {
     display: none;
}
</style>
