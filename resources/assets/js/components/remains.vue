<template>
<div>
<h1 class='subheading grey--text'>Leads Record</h1>
  <hr>
<v-container >

<v-layout row wrap>
<v-flex xs12 md5>
<v-tooltip top>
<template v-slot:activator="{ on }">
<v-btn small fab dark  color="grey" v-on="on">
      <v-icon dark>get_app</v-icon>
    </v-btn>
    </template>
    <span>Download remaining leads</span>
    </v-tooltip>

</v-flex>
<v-flex xs12 md5>
</v-flex>
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

  <v-flex xs12 md5>
  </v-flex>

    </v-flex>
  </v-layout>
  </v-form>

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
        headers: [
          {
            text: 'Member Name',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          { text: 'Member Score', value: 'desserts.TotalPoints' },

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
