<template>
<MainLayout>
<page-header :title="title">Citizens Engagement and Reporting System</page-header>
<page-content>

<div class="row">
<div class="col-12 col-md-4"></div>
<div class="col-12 col-md-4 pb-4">
{{ errors }}

<div class="card borders  mt-5 mb-5">
<div class="card-header">
<div class="card-title text-center" style="font-weight:bold;">
Create new account
</div>
</div>
<div class="card-body p-5">
<!-- {{ errors }} -->
<validation-errors/>
<form @submit.prevent="submit">

<div class="form-group">
<label class="form-label" for="default-01">First name</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="default-01" placeholder="Enter your first name" v-model="form.firstname">
</div>
</div>

<div class="form-group">
<label class="form-label" for="default-01">Last name</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="default-01" placeholder="Enter your last name" v-model="form.lastname">
</div>
</div>




<div class="form-group">
<label class="form-label" for="default-01">Gender</label>
<div class="form-control-wrap">
<select class="form-control" id="default-01" style="width:100%;padding:0;padding-left:20px;" @change="select_gender($event)">
<option value="">--Select--</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</div>
</div>




<div class="form-group">
    <label class="form-label" for="default-01">Telephone Number</label>
    <div class="form-control-wrap">
    <input type="number" class="form-control" id="default-01" placeholder="Enter telephone number" v-model="form.tel">
    </div>
    </div>



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
<label class="form-label" for="default-02">Re-type password</label>
<div class="form-control-wrap">
<input type="password" class="form-control" id="default-02" placeholder="Enter Password" v-model="form.password_confirmation">
</div>
</div>



<div class="form-group">
<submit-button :name="'Create Account'" :isLoading="isLoading"/>
</div>



<div class="form-group">

Already have an account   <Link :href="route('login')" style="color:#006064;font-weight:bold;" class="ml-3">Login</Link>
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
import PageContent from '../Components/PageContent.vue';
import PageHeader from '../Components/PageHeader.vue';
import SubmitButton from '../Components/SubmitButton.vue';
import ValidationErrors from '../Components/ValidationErrors.vue';
import MainLayout from '../Layouts/MainLayout.vue';
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
firstname:'',
lastname:'',
gender:'',
tel:'',
email:'',
password:'',
password_confirmation:''
}),




isLoading:false,

}},

methods:{
submit(){
this.isLoading=true;
this.form.post(route('register'),{
onFinish:()=>{
this.isLoading=false;
this.form.reset('password');
this.form.reset('password_confirmation');
}


});


},

select_gender(event){
this.form.gender=event.target.value;
}









}
}
</script>
<style scoped>

</style>
