<template>
<div>
<br>
<br>
<br>
<br>
<br>
<br>

you are currently logged out
</div>
</template>
<script>
export default{
created(){
this.$store.dispatch('destroyToken')
}
}
</script>
