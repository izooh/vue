<template>

<v-container mt-5 >
  <v-layout align-center justify-center>
  <v-flex
    xs12
    md4
  >
  <v-form@submit.prevent='register' v-model="valid">
  <v-card class='elevation-12'>
  <v-toolbar dark color="primary">
  <v-toolbar-title>Register form</v-toolbar-title>
  <v-spacer></v-spacer>
  </v-toolbar>
      <v-card-text>
        <v-text-field
           v-model="name"
           :rules="nameRules"
           :counter="10"
           label="name"
           required
         ></v-text-field>
        <v-text-field
          v-model="email"
          :rules="emailRules"
          label="E-mail"
          required
        ></v-text-field>
          <v-text-field type='password'
            v-model="password"
            :rules="passRules"
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
  </v-form>
</template>
<script>
  export default {
    data: () => ({
      valid: false,
      password: '',

      passRules: [
        v => !!v || 'Password is required',
        v => v.length <= 10 || 'Password must be less than 10 characters'
      ],
      email: '',
      name:'',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      nameRules: [
        v => !!v || 'name is required',
        v => v.length <= 10 || 'name must be less than 10 characters'
      ],
    }),
    methods:{
    register(){
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
