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
Book Appointment or Register to Attend Public Event
</div>
</div>
<div class="card-body">


<div class="card-inner p-0">
<ul class="nav nav-tabs mt-n3">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#tabItem5" @click="form_type=1"><span>
BOOK APPOINTMENT</span></a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#tabItem6" @click="form_type=2"><span>
    ATTEND PUBLIC EVENT</span></a>
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
<label class="form-label" for="default-02">Ministry/ Agencies</label>
<div class="form-control-wrap">
<select class="form-control" id="default-02" style="padding:0;padding-left:20px;" @change="select_ministry($event)">
<option value="">--Select--</option>
<option v-for="(m,key) in get_ministries" :key="key" :value="m.id">
{{ m.name }}
</option>
</select>
</div>
</div>



<div class="form-group">
<label class="form-label" for="default-02">Department / Directorate</label>
<div class="form-control-wrap">
<select class="form-control" id="default-02" style="padding:0;padding-left:20px;" @change="select_department($event)">
<option value="">--Select--</option>
<option v-for="(d,key) in dept" :key="key" :value="d.id">
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
<label class="form-label" for="default-02">Reason</label>
<div class="form-control-wrap">
<textarea  class="form-control" id="default-02" placeholder="Tell us the reason for the appointment" v-model="form.reason"></textarea>
</div>
</div>



<div class="form-group">
<submit-button :name="'Book Now'" :isLoading="isLoading"/>
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
<label class="form-label" for="default-02">Public Event</label>
<div class="form-control-wrap">
<select class="form-control" id="default-02" style="padding:0;padding-left:20px;" @change="select_event($event)">
<option value="">--Select--</option>
<option v-for="(e,key) in get_events" :key="key" :value="e.id">
{{ e.name }}
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



<div class="card card-bordered mb-5" v-for="(p,key) in event_details" :key="key">
    <ul class="data-list is-compact">
        <li class="data-item">
            <div class="data-col">
                <div class="data-label">Event </div>
                <div class="data-value">{{ p.name }} </div>
            </div>
        </li>
        <li class="data-item">
            <div class="data-col">
                <div class="data-label">Date</div>
                <div class="data-value">{{ p.date }} </div>
            </div>
        </li>
        <li class="data-item">
            <div class="data-col">
                <div class="data-label">Time</div>
                <div class="data-value">{{ p.time }} </div>
            </div>
        </li>
        <li class="data-item">
            <div class="data-col">
                <div class="data-label">Guest </div>
                <div class="data-value">{{ p.guest }} </div>
            </div>
        </li>
    </ul>
</div>







<div class="form-group">
<submit-button :name="'Register to Attend'" :isLoading="isLoading"/>
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
import Modal from '../Components/Modal.vue';
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
ministry:'',
department:'',
reason:'',
}),
isLoading:false,
div:[],
form_status:false,
//


form2:this.$inertia.form({
event:'',
telephone:this.$page.props.system.auth.tel,
}),

form_type:1,
dept:[],
event_details:[],



}},





methods:{
submit(){
this.isLoading=true;
this.form.post(route('appointment.store'),{
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
this.form2.post(route('event.register'),{
onSuccess:()=>{
this.form_status=true;
},
onFinish:()=>{
this.isLoading=false;
}

});


},

//
select_ministry(event){
this.dept=[];
this.form.ministry=event.target.value;
this.department_formation(event.target.value);
},

//
department_formation(id){
const dept=this.response.departments;
dept.forEach(element=>{
if(element.serviceID==id){
this.dept.push(element);
}
});
},

select_department(event){
this.form.department=event.target.value;
},


select_event(event){
this.event_details=[];
const item=this.response.events;
this.form2.event=event.target.value;
item.forEach(element=>{
if(element.id==event.target.value){
this.event_details.push(element);
}
});

}







},


computed:{
get_events(){
return this.response.events;
},

get_ministries(){
return this.response.ministries;
}










}








}
</script>
<style scoped>
ul li{
text-transform: capitalize;
}
</style>
