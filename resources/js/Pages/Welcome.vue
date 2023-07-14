<template>
<MainLayout>
<div :style="'min-height:450px;margin-top:0px;padding-top:100px;background-image:url('+url+'public/images/bg11.jpeg);background-size:cover;background-position:100% 50%;'" class="nk-block">
</div>






<div class="nk-block" style="margin-top:0px;background:#006064;min-height:300px;">
<div class="row">
<div class="col-12 col-md-1"></div>
<div class="col-12 col-md-10">
<div class="card" style="margin-top:-100px;">
<div class="card-body">
<div class="row">
<div class="col-12 col-md-2" v-for="m in menu" :key="m.id">
<Link :href="route(m.url)" class="main-menu-items">
<div class="card text-center">
<div  style="text-align:center;" class="text-center">
<!-- <div class="user-avatar bg-success-dim" style="height:80px;width:80px;margin-left:30px;margin-right:30px;">
<em class="icon ni ni-b-firefox" style="font-size:60px;"></em></div> -->
<img :src="url+m.icon" style="width:40%;margin-left:30%;margin-right:30%;"/>
</div>
<div>
<h6 style="text-align:center;font-size:20px;" class="mt-2 main-menu-list">
{{ m.name }}
</h6>
</div>
</div>
</Link>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 col-md-1"></div>
<div class="col-12 col-md-12 pt-3">
<h3 class="text-center m-5 pb-5" style="color:white;">
Government Services
</h3>
</div>
</div>


<div class="row" style="margin:100px;margin-top:0;margin-bottom:0;padding-bottom:50px;">
<div class="col-12 col-md-3" v-for="l in list2" :key="l.id">

<div class="card" style="background:#006064;margin-bottom:10px;border-radius:0px;">
<div style="background:white;padding:20px;border-radius:0;">
<img :src="url+'public/icon/logo.png'" class="card-img-top"/>
</div>
<div class="card-footer">
<div class="card-title">
<h4 style="color:white;font-size:18px;" class="text-center">{{ l.name }} </h4>
</div>
</div>
</div>


</div>
</div>


</div>







<div class="nk-block" style="margin-top:0px;background: #273746;border-bottom:solid 5px #006064">
<div>
<h4 style="color:white;" class="text-center pb-4">
    LATEST NEWS AND UPDATES
</h4>
</div>
</div>


<div class="nk-block pt-5 pb-5" style="margin-top:0px;">
<div class="row">
<div class="col-12 col-md-1"></div>
<div class="col-12 col-md-7">

<div class="card m-0">
    <div class="card-body p-0">

        <div class="row">

        <div class="col-12 col-md-6" v-for="(n,key) in news" :key="key">
        <div class="card">
        <div class="card-header" style="background:white;">
        <!-- <h6 style="color:#006064;">
        {{ n.title }}
        </h6> -->
        </div>
        <img :src="url+'public/images/bg11.jpeg'" class="card-img-top"/>
        <div class="card-body p-0" style="color:#006064;font-size:18px;height:150px;">
        {{ n.description }}
        </div>

        </div>
        </div>
        </div>









</div>
</div>

</div>
<div class="col-12 col-md-3">
<div class="card shadow h-100" style="border-radius:0;background:#006064;border-radius:5px;">
<div class="card-header">
<h6 class="pt-4" style="color:white;">GOVERNMENT PROGRAMS</h6>
</div>
<ul class="list-group list-group-flush" style="background:#006064;">
<li class="list-group-item" v-for="(p,key) in programs" :key="key" style="background:#006064;">
<a href="#" style="color:white;">
<em class="icon ni ni-chevron-right"></em>
{{ p.name }}
</a>
</li>
</ul>

</div>

</div>
<div class="col-12 col-md-1"></div>
</div>
</div>






<public-links :response="response"/>
</MainLayout>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue';
import PublicLinks from '../Components/PublicLinks.vue';
export default {
components:{
MainLayout,
Link,
PublicLinks
},

props:{
title:{},
response:{}
},

data(){return{
menu:[
{id:1,name:'Report Incident',url:'report.create',icon:'public/icon/report.png'},
{id:3,name:'Make Appointment',url:'appointment.create',icon:'public/icon/calendar.png'},
{id:2,name:'Emergence Services',url:'report.create',icon:'public/icon/ambulance1.png'},
{id:4,name:'Government Services',url:'services',icon:'public/icon/govt.png'},
{id:5,name:'Pay Taxes',url:'report.create',icon:'public/icon/tax.png'},
{id:6,name:'Legal Documents',url:'report.create',icon:'public/icon/documents.png'},

],
url:this.$page.props.system.url,


list:[
{id:1,title:'Law and Order',description:'Ensure safty of and security of your neighbourhood by reporting any criminal activities in your community and we shall respond.',icon:'public/icon/police.png',url:''},
{id:2,title:'Report Emergencies',description:'In case of emergence, accident, fire, natural disaster. Please report to us and request services necessary.',icon:'public/icon/ambulance.png',url:''},
{id:3,title:'Services',description:'You can now access to all public services including Hospitals, health centers, schools, entertainment and recreation centers among others.',icon:'public/icon/police.png',url:''}],

//
list2:[
{id:1,name:'Land & Property',url:'',icon:''},
{id:2,name:'Banking and Finance',url:'',icon:''},
{id:3,name:'Infrastructure',url:'',icon:''},
{id:4,name:'Businesses',url:'',icon:''},
]










}},

computed:{
news(){
return this.response.news;
},
programs(){
return this.response.programs;
}



}




}
</script>
<style scoped>
div,h3,h4, h5,h6{
font-family: "Gill Sans", sans-serif;
letter-spacing:0.7px;
}

.main-menu-list:hover{
color:black;
}
.main-menu-list{
color:#006064;
font-family: system-ui;
}
</style>
