<template>
<div id='app'>
  <p v-if='name' style="text-align:center" class="text-white small"> welcome {{name}} </p>
  <v-dialog max-width='800px' v-model='dialog'>
    <v-btn flat slot='activator' class='blue lighten-1'>Add Suggestion</v-btn>
    <v-card flat>
      <v-card-title>
        <div class='caption grey--text'>
          Whats on Your Mind
        </div>
      </v-card-title>
      <v-card text>
        <v-form class="px-3">
          <v-text-field label="suggestion title" prepend-icon='folder' v-model='title'></v-text-field>
          <v-textarea label="content" prepend-icon='edit' v-model='body'>></v-textarea>
          <v-btn type="submit" flat class="indigo lighten-3" @click='sendData' :loading='loading'>Submit</v-btn>
        </v-form>
      </v-card text>
    </v-card>
  </v-dialog>
</div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      articles: [],
      article: '',
      name: '',
      user_id: '',
      title: '',
      body: '',
      search: '',
      loading: false,
      dialog: false
    }
  },
  created() {
    this.getUser();

  },
  methods: {
    getUser() {
      let tokenStr = localStorage.getItem('access_token');
      axios.get('api/user', {
          headers: {
            "Authorization": `Bearer ${tokenStr}`
          }
        })
        .then((response) => {
          this.user_id = response.data.id
          this.name = response.data.name


        })
        .catch(function(error) {
          console.log(error);
        });


    },
    sendData() {
      this.loading = true;
      axios.post('api/suggestion', {
          user_id: this.user_id,
          title: this.title,
          body: this.body
        })
        .then((response) => {
          this.$router.push('/suggestion')
          this.title='',
          this.body='',
          this.loading=false,
          this.dialog=false


        })
        .catch(function(error) {
          console.log(error);
        });
    }

  }

}
</script>
