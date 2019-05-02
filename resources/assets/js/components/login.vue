<template>
<div>
    <v-container mt-5>
      <v-layout align-center justify-center>
      <v-flex
        xs12
        md4
      >
      <v-form@submit.prevent='login' v-model="valid">
      <v-card class='elevation-12'>
      <v-toolbar dark color="primary">
      <v-toolbar-title>Login form</v-toolbar-title>
      <v-spacer></v-spacer>
      </v-toolbar>
      <v-card-text>

        <v-text-field
          v-model="email"
          :rules="emailRules"
          label="E-mail"
          required
        ></v-text-field>
        <v-text-field type='password'
            v-model="password"
            :rules="nameRules"
            :counter="10"
            label="Password"
            required
          ></v-text-field>

        </v-card-text>

        <v-card-actions>
        <v-btn type='submit' color="blue">Submit</v-btn>
      </v-card-actions>

      </v-card>
    </v-form>
        </v-flex>
      </v-layout>
      <v-footer class="pa-3" absolute>
      <v-spacer></v-spacer>
      <div><span>Tensor</span>&copy; {{ new Date().getFullYear() }}</div>
    </v-footer>
    </v-container>

  </div>
</template>
<script>
  export default {
    data: () => ({
      valid: false,
      password: '',

      nameRules: [
        v => !!v || 'Password is required',
        v => v.length <= 10 || 'Password must be less than 10 characters'
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ]
    }),
    mounted(){


    },
    methods:{
    login(){

    this.$store.dispatch('retrieveToken',{
    email:this.email,
    password:this.password
    }).then((res)=>{
    this.$router.push('/')
    this.user()
    }).catch((error)=>{
    console.log(error)
    })
    },
    user(){
    axios.get('api/user')
.then((response) => {
              console.log(response.data);


          })
.catch(function (error) {
console.log(error);
});
    }

    }
    }




</script>
