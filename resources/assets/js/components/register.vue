<template>
  <v-form@submit.prevent='register' v-model="valid">
    <v-container>
      <v-layout>
      <v-flex
         xs12
         md4
       >
         <v-text-field
           v-model="name"
           :rules="nameRules"
           :counter="10"
           label="name"
           required
         ></v-text-field>
       </v-flex>

      <v-flex
        xs12
        md4
      >
        <v-text-field
          v-model="email"
          :rules="emailRules"
          label="E-mail"
          required
        ></v-text-field>
      </v-flex>
      <v-spacer></v-spacer>
        <v-flex
          xs12
          md4
        >
          <v-text-field type='password'
            v-model="password"
            :rules="nameRules"
            :counter="10"
            label="Password"
            required
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md2>
        <v-btn type='submit' color="blue">Submit</v-btn>
        </v-flex>




      </v-layout>
    </v-container>
  </v-form>
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
      name:'',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ]
    }),
    methods:{
    register(){
    console.log('login')
    this.$store.dispatch('retrieveToken2',{
    email:this.email,
    name:this.name,
    password:this.password
    }).then((res)=>{
    this.$router.push('/')
    }).catch((error)=>{
    console.log(error)
    })
    }

    }
    }




</script>
