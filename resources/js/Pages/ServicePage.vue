<template>
<MainLayout>
<page-header :title="title">
<div>Citizens Engagement and Reporting System</div>
<div class="row">
<div class="col-3"></div>
<div class="col-6">
<div class="mt-4">
<ul class="mins">
<li v-for="i in list" :key="i.id">
<a href="#">{{ i.name }} </a>
</li>

</ul>

</div>
</div>
<div class="col-3"></div>
</div>
</page-header>

<page-content>

<div class="row">
<div class="col-1"></div>
<div class="col-10 mb-5 mt-5">
<div class="row">
<div class="col-12 col-md-3" v-for="l in services" :key="l.id">
<div class="card shadow  mb-4">
<img :src="url+'public/icon/logo.png'" class="card-img-top mt-4"/>
<div class="card-header" style="height:120px;background:white;">
<h6>{{ l.name }} </h6>
</div>
<div class="card-footer" style="background:#006064;">
<a href="#" class="btn" style="width:100%;text-align:center;color:white;">Get Service</a>
</div>
</div>
</div>
</div>





</div>
<div class="col-12 col-md-1"></div>
</div>
</page-content>
</MainLayout>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
import PageContent from '../Components/PageContent.vue';
import PageHeader from '../Components/PageHeader.vue';
import MainLayout from '../Layouts/MainLayout.vue';
export default {
components:{
MainLayout,
PageHeader,
Link,
PageContent,



},
props:{
title:{},
response:{},
},

data(){return{
url:this.$page.props.system.url,
list:[
{id:1,name:'Ministries',url:''},
{id:2,name:'Government Agencies',url:''},
{id:3,name:'Programs',url:''},
{id:4,name:'Commissions',url:''},
{id:5,name:'Projects',url:''},
{id:6,name:'Other Services',url:''},



]

}},

methods:{




},


computed:{
services(){
return this.response.services;
}


}






}
</script>
<style scoped>
.mins li{
float:left;
margin-right:5px;
margin-bottom:20px;
margin-top:10px;
}

.mins li a {
color:white;
border:solid thin white;
padding:10px;
border-radius:5px;
}
.mins li a:hover{
color:black;
background:white;
}
</style>
