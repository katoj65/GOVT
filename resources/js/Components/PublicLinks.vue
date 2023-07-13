<template>
<div class="nk-block pt-0 pb-5" style="margin-top:0px;background: #273746;min-height:300px;border-top:solid 5px #006064;">
<div class="pl-5 pr-5 ">
<!-- <h4   class="text-center pb-4">
LATEST NEWS AND UPDATES
</h4> -->



<div class="row pl-5 pr-5 ">
<div class="col-12 col-md-3">
<h6>SERVICES</h6>
<ul>
<li v-for="(g,key) in government" :key="key">
<a href=""><em class="icon ni ni-dot-sq"></em> {{ g.name }} </a>
</li>
</ul>

</div>
<div class="col-12 col-md-3">
<h6></h6>
<ul>
<li v-for="(s,key) in social" :key="key">
<a href=""><em class="icon ni ni-dot-sq"></em> {{ s.name }} </a>
</li>
</ul>

</div>
<div class="col-12 col-md-3">
<h6>GOVERNMENT PROGRAMS</h6>
<ul>
<li v-for="(p,key) in programs" :key="key">
<a href=""><em class="icon ni ni-dot-sq"></em> {{ p.name }} </a>
</li>
</ul>

</div>
<div class="col-12 col-md-3">
<h6>PROJECTS</h6>
<ul>
<li v-for="(p,key) in projects" :key="key">
<a href=""><em class="icon ni ni-dot-sq"></em> {{ p.name }} </a>
</li>
</ul>

</div>
</div>



</div>
</div>
</template>
<script>
export default {
props:{
response:{}
},

computed:{
government(){
return this.response.government;
},

projects(){
return this.response.projects;
},
social(){
return this.response.social;
},
programs(){
return this.response.programs;
}


}




}
</script>

<style scoped>
a {
color:#D5DBDB;
font-size:14px;

}
h1,h2,h3,h4,h5,h6{
color:#D5DBDB ;
font-family: "Gill Sans", sans-serif;
letter-spacing:0.7px;
font-size:20px;
margin-bottom:25px;
}
ul li{
margin-bottom:5px;
}
em{margin-right:3px;}
.col-12 {
padding-top:30px;
}
em{
color:#006064;
font-size:10px;
}
</style>
