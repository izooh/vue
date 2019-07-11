<template>
<div class="row">
  <div class="col-md-12">

    <select v-model='selected' class="mdb-select colorful-select dropdown-primary md-form" multiple searchable="Search here..">
      <option value="" disabled selected>Choose your country</option>
      <option value="1">USA</option>
      <option value="2">Germany</option>
      <option value="3">France</option>
      <option value="4">Poland</option>
      <option value="5">Japan</option>
    </select>
{{selected}}
  </div>
</div>
</template>
<script>
export default{
data(){
return{
 selected:[]
}
},
methods: {
    selectAll() {
      const select = this.$refs.select;
      select.items.forEach(item => {
       select.select(item);
     });

     // bug caused by onAfterSelect
     select.open = false


    }
  }
}
</script>
<style>

</style>
