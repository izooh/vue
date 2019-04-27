<template>
<div>
<h1 class='subheading grey--text'>Firm Rating</h1>

  <hr>
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
  <label for="sel1">Product_Knowledge</label>
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
  <label for="sel1">Handling_Efficiency</label>
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
  <label for="sel1">Tone_Manner</label>
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
  <label for="sel1">First_Contact_Resolution</label>
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
  <label for="sel1">Call_Controlling</label>
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
  <label for="sel1">user id</label>
  <select v-model='user_id' class="form-control" id="sel1">
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  <option value='6'>6</option>
  <option value='7'>7</option>

  </select>
</div>
</v-flex><br>
<v-btn type='submit'
       depressed
      :loading="loading4"
      :disabled="loading4"
      color="blue"

    >
      submit details
      <template v-slot:loader>
        <span class="custom-loader">
          <v-icon light>cached</v-icon>
        </span>
      </template>
    </v-btn>


</v-layout>
  </v-form>
</div>
  <div class="panel-footer"> </div>
</div




</template>
</div>
</template>


<script>
export default {
  data () {
    return {
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
  watch: {
    loader () {
      const l = this.loader
      this[l] = !this[l]

      setTimeout(() => (this[l] = false), 3000)

      this.loader = null
    }
  },
  methods:{
  register(){
this.loader = 'loading4'
axios.post('api/rating',{
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
this.$router.push('/agent_position')
}).catch((error)=>{
console.log('failed')
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
