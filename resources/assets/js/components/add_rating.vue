<template>
<div>
<v-snackbar v-model='snackbar' :timeout='3000' top color='blue'>
<span>{{snackval}}</span>
<v-btn flat color='white' @click='snackbar=false'>Close</v-btn>
</v-snackbar>
<div class="panel panel-default">

  <div class="panel-body">
    <v-form@submit.prevent='register'>
  <v-layout row wrap>
<v-flex xs12 md4>
  <div class="form-group">
  <label for="sel1">Opening</label>
  <select class="form-control" v-model='Opening' id="sel1">
    <option value='1'>1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
    <option value='4'>4</option>
    <option value='5'>5</option>
  </select>
</div>

</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Verification</label>
  <select  v-model="Verification" class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
    <option value='6'>6</option>
    <option value='7'>7</option>
    <option value='8'>8</option>
    <option value='9'>9</option>
    <option value='10'>10</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Closing</label>
  <select v-model='Closing'class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Understanding</label>
  <select v-model='Understanding' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Probing</label>
  <select v-model='Probing' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Negotiation</label>
  <select v-model='Negotiation' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Product Knowledge</label>
  <select v-model='Product_Knowledge' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
    <option value='6'>6</option>
    <option value='7'>7</option>
    <option value='8'>8</option>
    <option value='9'>9</option>
    <option value='10'>10</option>

  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Urgency</label>
  <select v-model='Urgency' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
    <option value='6'>6</option>
    <option value='7'>7</option>
    <option value='8'>8</option>
    <option value='9'>9</option>
    <option value='10'>10</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Commitment</label>
  <select v-model='Commitment' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Handling Efficiency</label>
  <select v-model='Handling_Efficiency' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Empathy</label>
  <select v-model='Empathy' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Language</label>
  <select v-model='Language' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Tone Manner</label>
  <select v-model='Tone_Manner' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Timeliness</label>
  <select v-model='Timeliness' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Listening</label>
  <select v-model='Listening' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">First Contact Resolution</label>
  <select v-model='First_Contact_Resolution' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Call Controlling</label>
  <select v-model='Call_Controlling' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
</div>
</v-flex>
<v-flex xs12 md4 >
  <div class="form-group">
  <label for="sel1">Users</label>
  <select v-model='user_id' class="form-control" id="sel1" >
  <option  v-for='user in users' v-bind:key="user.id" v-bind:value="user.s_id">{{user.name}}</option>

  </select>
</div>
</v-flex><br>
<v-btn type='submit'
       depressed
      :loading="loading4"
      :disabled="loading4"
      color="blue"

    >
      <font color="white">submit details</font>
      <template v-slot:loader>
        <span class="custom-loader">
          <v-icon light>cached</v-icon>
        </span>
      </template>
    </v-btn>
    <br>


</v-layout>
  </v-form>
</div><br><br>
<v-footer class="pa-3" absolute>
<v-spacer></v-spacer>
<div><span>Blockchain</span>&copy; {{ new Date().getFullYear() }}</div>
</v-footer>
</div




</template>
</div>
</template>

<script>

export default {

  data () {
    return {
    users:'',
    snackbar:false,
     snackval:'null',
      loader: null,
      loading: false,
      loading2: false,
      loading3: false,
      loading4: false,
      user_id:'',
      Call_Controlling:'',
      First_Contact_Resolution:'',
      Listening:'',
      Timeliness:'',
      Tone_Manner:'',
      Language:'',
      Empathy:'',
      Handling_Efficiency:'',
      Commitment:'',
      Urgency:'',
      Product_Knowledge:'',
      Negotiation:'',
      Probing:'',
      Understanding:'',
      Closing:'',
      Verification:'',
      Opening:''
    }
  },
  created(){
  this.getUser()
  },
  watch: {
    loader () {
      const l = this.loader
      this[l] = !this[l]
      setTimeout(() => (this[l] = false), 3000)
      this.loader = null
    }
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
  register(){
      let tokenStr = localStorage.getItem('access_token');
this.loader = 'loading4'
axios.post('api/rate',{
user_id:this.user_id,
Call_Controlling:this.Call_Controlling,
First_Contact_Resolution:this.First_Contact_Resolution,
Listening:this.Listening,
Timeliness:this.Timeliness,
Tone_Manner:this.Tone_Manner,
Language:this.Language,
Empathy:this.Empathy,
Handling_Efficiency:this.Handling_Efficiency,
Commitment:this.Commitment,
Urgency:this.Urgency,
Product_Knowledge:this.Product_Knowledge,
Negotiation:this.Negotiation,
Probing:this.Probing,
Understanding:this.Understanding,
Closing:this.Closing,
Verification:this.Verification,
Opening:this.Opening
}).then((res)=>{
console.log(res)
this.snackval=res.data
this.snackbar=true;
}).catch((error)=>{
console.log('failed')
this.snackval='sorry nothing saved'
this.snackbar=true;
})
  }
  }
}
</script>


<style>
  .custom-loader {
    animation: loader 1s infinite;
    display: flex;
  }
  @-moz-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-webkit-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-o-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
</style>
