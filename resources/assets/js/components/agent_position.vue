<template>
<div>
<h1 class='subheading grey--text'>Perfomance Dashboard</h1>
  <hr class="grey">
<v-container >
<v-layout>

<v-flex xs12 md4>
<v-data-table
    :headers="headers"
    :items="desserts"
    class="elevation-1"
  >
    <template  v-slot:items="props">
      <td>{{ props.item.user.name }}</td>
      <td class="text-xs-right">{{ props.item.TotalPoints }}</td>

    </template>
  </v-data-table>
  </v-flex>
  <v-flex xs12 md6 >
  <line-chart/>
  </v-flex>
  </v-layout>
</v-container>
</div>
</template>
<script>
import LineChart from './LineChart'
  export default {
  components:{
  'line-chart':LineChart
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
        desserts:[]
      }
    },created() {

   this.fetchData();


     },
    methods:{
    fetchData(){

      axios.get('api/rating')
.then((response) => {
                console.log(response.data.data);
                this.desserts=response.data.data


            })
.catch(function (error) {
console.log(error);
});


    }
    }

  }
</script>
