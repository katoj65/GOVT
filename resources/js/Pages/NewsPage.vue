<template>
<MainLayout>
<page-header :title="title">Citizens Engagement and Reporting System
<div class="row mt-3">
<div class="col-5"></div>
<div class="col-2" style="text-align:center;">


    <div class="">
        <ul>

        <li>
        <a href="">
        <em class="icon ni ni-facebook-fill"></em>
        </a>
        </li>



        <li>
        <a href="">
        <em class="icon ni ni-twitter-round"></em>
        </a>
        </li>

        <li>
        <a href="">
        <em class="icon ni ni-linkedin-round"></em>
        </a>
        </li>




        </ul>
        </div>
</div>
<div class="col-5"></div>
</div>



</page-header>

<page-content  style="background:white;">

<div class="row">
<div class="col-1 col-md-2"></div>
<div class="col-10 col-md-8 mb-5">

<div class="pb-3">
<h6 style="color:#006064;"><em class="icon ni ni-article"></em> Latest News and Updates
<span class="ml-5"><em class="icon ni ni-search"></em> Search </span>
<span class="ml-5"><em class="icon ni ni-opt-dot-alt"></em> Filter Articles </span>
</h6>
</div>


<div class="card" style="padding:0;margin:0;margin-bottom:30px;margin-top:20px;" v-for="n in 40" :key="n">
<div class="row">
<div class="col-4 p-0 m-0" :style="'background-image:url('+url+'public/images/bg10.jpeg);background-size:cover;'">

</div>
<div class="col-8 m-0 p-2">
<h6 style="color:#006064;">
<span style="font-size:20px;">10/12/2023</span>
<span class="ml-3" style="font-size:25px;">
Heading
</span></h6>
<p class="pb-3 pl-2" style="padding-right:20px;">
    The mandate of the Ministry of Trade, Industry and Cooperatives (MoTIC) as derived from the Constitution of the Republic of Uganda (1995 – Article 189, Sixth Schedule Sections 11, 12, 13, 20, 23, 25 and 29) is: “To formulate, review and support policies, strategies, plans and programs that promote and ensure expansion and diversification of trade, cooperatives, environmentally sustainable industrialization, appropriate technology development and transfer to generate wealth for poverty eradication and benefit the country socially and economically.”
</p>
</div>
</div>
</div>
</div>
<div class="col-1 ol-md-2"></div>

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
title:{}
},

data(){return{
url:this.$page.props.system.url,

}},

methods:{



}
}
</script>
<style scoped>
ul li{
float:left;
margin-right:10px;
}

ul li a em{
color:white;
font-size:50px;
}
</style>
