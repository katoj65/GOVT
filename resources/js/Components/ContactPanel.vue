<template>
<div class="bg">
<div class="row">
<div class="col-10">
<a href="#"><em class="icon ni ni-call-fill" style="font-size:15px;"></em> {{ contact }} </a>
<a href="#"><em class="icon ni ni-clock" style="font-size:15px;"></em> {{ open }} </a>
</div>
<div class="col-2" style="text-align:right;">
    <div class="drodown" style="backgrounc:#273746;">
        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light " data-toggle="dropdown" aria-expanded="false" style="border:none;font-size:17px;font-weight:normal;">English</a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs" style="">
            <ul class="link-list-opt no-bdr">
                <li><a href="#" v-for="l in list" :key="l.id"><span>{{ l.name }} </span></a></li>
            </ul>
        </div>
    </div>

</div>
</div>
</div><!-- .nk-header-wrap -->
</template>

<script>
export default {

data(){return{
contact:'0752567534',
open:'Open during working days : Mon - Fri 7.00 am - 5.00 pm and Saturday 8.00 am - 2.00 pm',
language:'English',
list:[
{id:1,name:'Luganda'},
{id:2,name:'Luo'},
{id:3,name:'Lunyanole'},
{id:4,name:'Iteso'},
{id:5,name:'Lusoga'},

],



}}




}
</script>
<style scoped>
.bg{
background: #273746;
color:#ABB2B9;
padding:10px;
font-size:15px;
padding-left:25px;
padding-right:25px;
}

a{
color:#ABB2B9;
margin-right: 30px;
}


</style>
