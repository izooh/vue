<template>
<div v-cloak>
<br><br>
<h1 class='subheading grey--text'>Perfomance Dashboard</h1>
  <hr>
<v-container >
  <v-layout row wrap>
  <v-flex xs12 md5>
<rating/>
</v-flex>
  <v-flex xs12 md1>
  </v-flex>
<v-flex xs12 md6>
<v-form@submit.prevent='position' >
<v-card flat>
<v-card-text>
<v-menu>
<v-text-field slot='activator' label='Starting date' :value='picker' prepend-icon='date_range'></v-text-field>
   <v-date-picker v-model="picker"></v-date-picker>
   <v-text-field slot='activator' label='End date' :value='picker1' prepend-icon='date_range'></v-text-field>
      <v-date-picker v-model="picker1"></v-date-picker>
   </v-menu>
  </v-card-text>

  <v-card-actions>
    <v-btn type='submit' color="blue"><font color="white">Filter</font></v-btn>
</v-card-actions>

</v-card>
</v-form>

<v-data-table
    :headers="headers"
    :items="desserts"
    class="elevation-1"
  >
    <template  v-slot:items="props">
      <td>{{ props.item.user.name }}</td>
      <td>{{ props.item.count }}</td>
      <td class="text-xs-right">{{ props.item.perc }}%</td>

    </template>
  </v-data-table>
<br>
<hr>
</v-flex>
<v-flex xs12 md4>
<v-form@submit.prevent='filtered'>
<v-card flat>
<v-card-text>
<v-menu>
<v-text-field slot='activator' label='Starting date' :value='date3' prepend-icon='date_range'></v-text-field>
   <v-date-picker v-model="date3"></v-date-picker>
   <v-text-field slot='activator' label='End date' :value='date4' prepend-icon='date_range'></v-text-field>
      <v-date-picker v-model="date4"></v-date-picker>
   </v-menu>
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
  </v-card-text>

  <v-card-actions>
    <v-btn type='submit' color="blue"><font color="white">Filter</font></v-btn>
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
         <td>{{ props.item.count }}</td>
        <td class="text-xs-right">{{ props.item.perc }}</td>

      </template>
    </v-data-table>
</v-flex>
<v-flex xs12 md1>
</v-flex>
<v-flex xs12 md7>
    <line-chart v-if="dataLoaded" :deta=desserts></line-chart>
</v-flex>

  <v-footer class="pa-3" absolute>
  <v-spacer></v-spacer>
  <div><span>Blockchain</span>&copy; {{ new Date().getFullYear() }}</div>
  </v-footer>
</v-layout>
</v-container>
</div>
</template>
<script>
import LineChart from './LineChart';
import add_rating from './add_rating.vue'
  export default {
  components:{
  'line-chart':LineChart,
  'rating':add_rating
  },
  data () {
      return {
      dataLoaded: false,
      picker1:'',
      picker:'',
      date3:'',
      date4:'',
        headers: [
          {
            text: 'Agent Name',
            align: 'left',
            sortable: false,
            value: 'name'
          },
            { text: 'Number of calls',value: 'desserts.count' },
          { text: 'Agent Score', value: 'desserts.perc' },

        ],
        desserts:[],
        datar:[],
        status:'',
      }
    },
    methods:{
    position(){
        let tokenStr = localStorage.getItem('access_token');
          this.dataLoaded=false
      axios.post('api/rating',{date1:this.picker,date2:this.picker1},{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
.then((response) => {

                this.desserts=response.data.data
                this.dataLoaded=true

            })
.catch(function (error) {
console.log(error);
});


    },
    filtered(){
    let tokenStr = localStorage.getItem('access_token');
    axios.post('api/default',{status:this.status,date1:this.date3,date2:this.date4},{ headers: {"Authorization" : `Bearer ${tokenStr}`} })
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
<style>
[v-cloak] {
     display: none;
}
</style>
