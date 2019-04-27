<template>
<v-container mt-5>
  <v-layout align-center justify-center>
  <v-flex
    xs12
    md4
  >
  <h6>You are currently loggedout</h6>
  </v-flex>
  </v-layout>
  </v-container>
</template>
<script>
export default{
created(){
this.$store.dispatch('destroyToken')
}
}
</script>
