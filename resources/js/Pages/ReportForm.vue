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
Describe the Incident
</div>
</div>
<div class="card-body">






<div class="card-inner p-0">
<ul class="nav nav-tabs mt-n3">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#tabItem5" @click="form_type=1"><span>REPORT CRIME</span></a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#tabItem6" @click="form_type=2"><span>REPORT SERVICE DELIVERY</span></a>
</li>

</ul>
<div class="tab-content">
<div class="tab-pane active" id="tabItem5" v-if="form_type=1">


<modal v-if="form_status==true" :message="flash">
<a href="#" class="btn btn-success" @click="form_status=false">OK</a>
</modal>

<form @submit.prevent="submit" v-else>
<validation-errors/>

<div class="form-group">
<label class="form-label" for="default-02">Criminal Activity</label>
<div class="form-control-wrap">
<select class="form-control" id="default-02" style="padding:0;padding-left:20px;" @change="select_crime($event)">
<option value="">--Select--</option>
<option v-for="(c,key) in crimes" :key="key" :value="c.id">
{{ c.name }}
</option>
</select>
</div>
</div>



<div class="form-group">
<label class="form-label" for="default-02">Select your Region</label>
<div class="form-control-wrap">
<select class="form-control" id="default-02" style="padding:0;padding-left:20px;" @change="select_divisions($event)">
<option value="">--Select--</option>
<option v-for="(r,key) in region" :key="key" :value="r.id">
{{ r.name }}
</option>
</select>
</div>
</div>





<div class="form-group">
<label class="form-label" for="default-02">Police Station</label>
<div class="form-control-wrap">
<select class="form-control" id="default-02" style="padding:0;padding-left:20px;" @change="select_div($event)">
<option value="">--Select--</option>
<option v-for="(d,key) in div" :key="key" :value="d.id">
{{ d.name }}
</option>
</select>
</div>
</div>




<div class="form-group">
<label class="form-label" for="default-02">Telephone Number</label>
<div class="form-control-wrap">
<input type="number" class="form-control" id="default-02" v-model="form.telephone" />
</div>
</div>



<div class="form-group">
<label class="form-label" for="default-02">Provide More Details</label>
<div class="form-control-wrap">
<textarea  class="form-control" id="default-02" placeholder="Description" v-model="form.description"></textarea>
</div>
</div>



<div class="form-group">
<submit-button :name="'Submit Report'" :isLoading="isLoading"/>
</div>



</form>



</div>
<div class="tab-pane" id="tabItem6" v-if="form_type=2">

<modal v-if="form_status==true" :message="flash">
<a href="#" class="btn btn-success" @click="form_status=false">OK</a>
</modal>
<form v-else @submit.prevent="submit2">
<validation-errors/>


<div class="form-group">
<label class="form-label" for="default-02">Report a Public Service</label>
<div class="form-control-wrap">
<select class="form-control" id="default-02" style="padding:0;padding-left:20px;" @change="select_service($event)">
<option value="">--Select--</option>
<option v-for="(s,key) in get_services" :key="key" :value="s.id">
{{ s.name }}
</option>
</select>
</div>
</div>





<div class="form-group">
<label class="form-label" for="default-02">Issue</label>
<div class="form-control-wrap">
<select class="form-control" id="default-02" style="padding:0;padding-left:20px;" @change="select_issue($event)">
<option value="">--Select--</option>
<option v-for="(i,key) in issues" :key="key" :value="i.id">
{{ i.name }}
</option>
</select>
</div>
</div>



<div class="form-group">
<label class="form-label" for="default-02">Telephone Number</label>
<div class="form-control-wrap">
<input type="number" class="form-control" id="default-02" v-model="form2.telephone" />
</div>
</div>



<div class="form-group">
<label class="form-label" for="default-02">Provide more details</label>
<div class="form-control-wrap">
<textarea  class="form-control" id="default-02" placeholder="Description" v-model="form2.description"></textarea>
</div>
</div>

<div class="form-group">
<submit-button :name="'Submit Report'" :isLoading="isLoading"/>
</div>





</form>
</div>

</div>
</div>












<!-- {{ errors }} -->



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
import Modal from '../Components/Modal.vue';
export default {
components:{
MainLayout,
PageHeader,
Link,
PageContent,
SubmitButton,
ValidationErrors,
Modal,



},
props:{
title:{},
errors:{},
response:{},
flash:{}
},

data(){return{
form:this.$inertia.form({
telephone:this.$page.props.system.auth.tel,
crime:'',
station:'',
region:'',
description:'',
}),
isLoading:false,
div:[],
form_status:false,
//




form2:this.$inertia.form({
issue:'',
service:'',
description:'',
telephone:this.$page.props.system.auth.tel,
}),

form_type:1,
issues:[]



}},





methods:{
submit(){
this.isLoading=true;
this.form.post(route('report.store'),{
onSuccess:()=>{
this.form_status=true;
},
onFinish:()=>{
this.isLoading=false;
}

});


},



submit2(){
this.isLoading=true;
this.form2.post(route('report.store_service_delivery'),{
onSuccess:()=>{
this.form_status=true;
},
onFinish:()=>{
this.isLoading=false;
}

});


},



division(id){
this.div=[];
const item=this.response.division;
item.forEach(element=>{
if(element.police_regionID==id){
this.div.push(element);
}
});







},

select_divisions(event){
this.div=[];
const id=event.target.value;
this.division(id);
this.form.region=id;
},

select_crime(event){
this.form.crime=event.target.value;
},

select_div(event){
this.form.station=event.target.value;
},


//
select_service(event){
this.issues=[];
this.form2.service=event.target.value;
this.issue_formation(event.target.value);
},

issue_formation(id){
const item=this.response.issue;
item.forEach(element=>{
if(element.serviceID==id){
this.issues.push(element);
}
});
},

select_issue(event){
this.form2.issue=event.target.value;
}



},


computed:{
crimes(){
return this.response.crimes;
},

region(){
return this.response.region;
},

div_region(){
return this.div;
},

user(){
return this.$page.props.system.auth;
},
get_services(){
return this.response.services;
}











}








}
</script>
<style scoped>

</style>
