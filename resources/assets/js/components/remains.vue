<template>
<div>
<h1 class='subheading grey--text'>Leads Record</h1>
  <hr>
<v-container >

<v-layout row wrap>
<v-flex xs12 md5>
<v-tooltip top>
<template v-slot:activator="{ on }">
<v-btn medium depressed fixed right bottom fab dark  color="blue" v-on="on">
      <v-icon dark>get_app</v-icon>
    </v-btn>
    </template>
    <span>Download remaining leads</span>
    </v-tooltip>

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
  <v-form@submit.prevent='login' v-model="valid">
  <v-card class='elevation-12'>
  <v-toolbar dark color="grey">
  <v-toolbar-title><small>Agent Cycles</small></v-toolbar-title>
  <v-spacer></v-spacer>
  </v-toolbar>
  <v-card-text>
    <div class="form-group">
    <label for="sel1">Select Agent Name</label>
    <select class="form-control" v-model='name' id="sel1">
    <option value=''>......</option>
      <option value='Ken'>Ken</option>
      <option value='Lous'>Louis</option>
      <option value='Kent'>Kent</option>
    </select>
  </div>
  <v-switch
      v-model="switch1"
      :label="`22&36: ${switch1.toString()}`"
    ></v-switch>
    <v-switch
      v-model="switch2"
      :label="`43: ${switch2.toString()}`"
    ></v-switch>
    </v-card-text>

    <v-card-actions>
    <v-btn type='submit' depressed color="blue">Submit</v-btn>
  </v-card-actions>

  </v-card>
</v-form>
</v-flex>
  </v-layout><br>
  <v-footer class="pa-3" absolute>
  <v-spacer></v-spacer>
  <div><span>Tensor</span>&copy; {{ new Date().getFullYear() }}</div>
  </v-footer>
</v-container>
</div>
</template>
<script>
import remainsChart from './remainsChart'
  export default {
  components:{
  'remainsChart':remainsChart
  },

    data () {
      return {
      naeme:'',
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



     },
    methods:{
    fetchData(){

      axios.get('api/remains')
.then((response) => {
                console.log(response.data.data);
                this.remains=response.data.data


            })
.catch(function (error) {
console.log(error);
});


    }
    }

  }
</script>
