<template>
<MainLayout>
<page-header :title="title">Citizens Engagement and Reporting System</page-header>
<page-content>

<div class="row">

<div class="col-12 col-md-2"></div>
<div class="col-12 col-md-8">






<table class="shadow">
<thead>
<tr>
<th scope="col"></th>
<th scope="col">GOVERNMENT INSTITUTION</th>
<th scope="col">ADDRESS</th>
</tr>
</thead>
<tbody>
<tr v-for="(s,key) in services" :key="key">
<td style="color:#006064;font-weight:bold;">{{ s.id }}</td>
<td>{{ s.name }} </td>
<td>---</td>

</tr>
</tbody>
</table>










</div>
<div class="col-12 col-md-2"></div>
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
form:{
email:'',
password:'',
}


}},

computed:{
services(){
return this.response.services;
}
}
}
</script>

<style scoped>
table{
border:solid thin #006064;
width:100%;
margin:50px;
margin-top:0;

}

table th,table thead{
background:#006064;
color:white;
padding:10px;
}
table tr td{
padding:10px;
color:#006064;
}

table tr{
border-bottom:solid thin #006064;
}
</style>
