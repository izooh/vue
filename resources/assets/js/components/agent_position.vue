<template>
<div>
<h1 class='subheading grey--text'>Perfomance Dashboard</h1>
  <hr>
<v-container >
<v-form@submit.prevent='filtered'>
<v-layout row wrap>

<v-flex xs12 md5>
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
  <v-flex xs12 md7 >
  <line-chart/>
  </v-flex>
<v-flex xs12 md12 >
<br><hr>
</v-flex>
  <v-flex xs12 md6>
    <div class="form-group">
    <label for="sel1">Select Status</label>
    <select class="form-control" v-model='status' id="sel1">
    <option value=''>......</option>
      <option value='Opening'>Opening</option>
      <option value='Verification'>Verification</option>
      <option value='Closing'>Closing</option>
      <option value='Understanding'>Understanding</option>
      <option value='Probing'>Probing</option>
          <option value='Negotiation'>Negotiation</option>
              <option value='Product_Knowledge'>Product_Knowledge</option>
                  <option value='Urgency'>Urgency</option>
                      <option value='Commitment'>Commitment</option>
                          <option value='Handling_Efficiency'>Handling_Efficiency</option>
                              <option value='Empathy'>Empathy</option>
                                  <option value='Language'>Language</option>
    <option value='Tone_Manner'>Tone_Manner</option>
        <option value='Timeliness'>Timeliness</option>
            <option value='Listening'>Listening</option>
                <option value='First_Contact_Resolution'>First_Contact_Resolution</option>
                    <option value='Call_Controlling'>Call_Controlling</option>
    </select>
  </div>

  </v-flex>
  <v-flex xs12 md7>
        <v-btn type='submit' color="blue">Submit</v-btn>
  </v-flex>
  <v-flex xs12 md5>
  </v-flex>
  <v-flex xs12 md5>
  <v-data-table
      :headers="headers"
      :items="datar"
      class="elevation-1"
    >
      <template  v-slot:items="props">
        <td>{{ props.item.user.name }}</td>
        <td class="text-xs-right">{{ props.item.Points }}</td>

      </template>
    </v-data-table>
    </v-flex>
  </v-layout>
  </v-form>

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
        desserts:[],
        datar:[],
        status:''
      }
    },created() {

   this.fetchData();
   this.filtered();


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


    },
    filtered(){
    axios.post('api/default',{status:this.status})
  .then((response) => {
              console.log(response.data.data);
              this.datar=response.data.data


          })
  .catch(function (error) {
  console.log(error);
  });
    }
    }

  }
</script>
