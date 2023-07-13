<template>
<div class="alert alert-fill alert-icon bg-danger-dim" role="alert" v-if="has_errors>0">
<em class="icon ni ni-alert-circle" style="color:red;"></em>
<strong style="color:red;">Error has occurred. </strong>
<div>
<ul>
<li v-for="(e,key) in errors" :key="key" style="color:red;">
{{ e }}
</li>
</ul>
</div>
</div>
</template>
<script>
export default {
computed:{
errors(){
return this.$page.props.errors;
},

has_errors(){
const errors=this.$page.props.errors;
const item= Object.keys(errors);
return item.length;
}



}
}
</script>
