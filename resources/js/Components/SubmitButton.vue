<template>
<div>
<button type="submit" class="btn" v-if="isLoading==false">{{ name }} </button>
<button class="btn " type="button" disabled v-else>
<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
<span class="sr-only">Loading...</span>
</button>
</div>
</template>
<script>
export default {
props:{
name:{},
isLoading:{}
}
}
</script>
<style scoped>
button{
background:#006064;
color: white;
font-size:15px;
}

button:hover{
color:white;
}


</style>
