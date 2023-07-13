<template>
<MainLayout>
<page-header :title="title">Citizens Engagement and Reporting System</page-header>
<page-content>

<div class="row">
<div class="col-12 col-md-4"></div>
<div class="col-12 col-md-4 pb-4">


<div class="card borders  mt-5 mb-5">
<div class="card-header">
<div class="card-title text-center" style="font-weight:bold;">
Fill in your credentials
</div>
</div>
<div class="card-body p-5">
<!-- {{ errors }} -->
<validation-errors/>
<form @submit.prevent="submit">
<div class="form-group">
<label class="form-label" for="default-01">Email / NIN Number</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="default-01" placeholder="Enter email or NIN Number" v-model="form.email">
</div>
</div>


<div class="form-group">
<label class="form-label" for="default-02">Password</label>
<div class="form-control-wrap">
<input type="password" class="form-control" id="default-02" placeholder="Enter Password" v-model="form.password">
</div>
</div>

<div class="form-group">
<submit-button :name="'Login'" :isLoading="isLoading"/>
</div>



<div class="form-group">
<Link :href="route('register')" style="color:#006064">Create account</Link>
</div>



</form>


</div>
</div>
</div>
<div class="col-12 col-md-4"></div>

</div>



</page-content>
</MainLayout>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue';
import PageHeader from '../Components/PageHeader.vue';
import PageContent from '../Components/PageContent.vue';
import SubmitButton from '../Components/SubmitButton.vue';
import ValidationErrors from '../Components/ValidationErrors.vue';
export default {
components:{
MainLayout,
PageHeader,
Link,
PageContent,
SubmitButton,
ValidationErrors,



},
props:{
title:{},
errors:{}
},

data(){return{
form:this.$inertia.form({
email:'',
password:'',
remember:false,
}),




isLoading:false,

}},

methods:{
submit(){
this.isLoading=true;
this.form.post(route('login'),{
onFinish:()=>{
this.isLoading=false;
this.form.reset('password');
}


});


}









}
}
</script>
<style scoped>

</style>
