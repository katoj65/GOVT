<template>
<div class="nk-app-root">

<!-- main @s -->
<div class="nk-main">
<!-- wrap @s -->
<div class="nk-wrap ">
<!-- main header @s -->

<div class="nk-header nk-header-fixed is-light p-0" style="border:none;">
<ContactPanel/>
<div style="border:solid 1px black;"></div>
<div style="border:solid 1px yellow;"></div>
<div style="border:solid 1px red;"></div>

<div class="container-fluid">

<div class="nk-header-wrap" >

<div class="nk-menu-trigger d-xl-none ml-n1">
<Link :href="route('index')" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></Link>
</div>
<div class="nk-header-brand d-xl-none">
<a href="html/index.html" class="logo-link">
<!-- <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
<img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark"> -->
</a>
</div><!-- .nk-header-brand -->
<div class="nk-header-news d-none d-xl-block">
<div class="nk-news-list">
<div class="nk-news-item">
<img :src="url+'public/icon/logo.png'" style="width:150px;margin:10px;"/>
<div class="nk-news-text">
<ul>
<li v-for="m in main_menu" :key="m.id"> <Link :href="route(m.url)"> {{ m.name }}</Link> </li>
</ul>
</div>
</div>
</div>
</div><!-- .nk-header-news -->
<div class="nk-header-tools">

<div v-if="user==null">
<Link :href="route('login')" class="mr-4" style="font-size:15px;color:#006064">Login</Link>
<Link :href="route('call-center')" style="padding:10px;border:solid 2px #006064;color:#006064;font-size:15px;border-radius:5px;font-weight:bold;">
<em class="icon ni ni-call-fill" style="color:#006064;"></em>
Call Center
</Link>
</div>



<div v-else>
<ul class="nk-quick-nav">

    <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="user-toggle">
                <div class="user-avatar sm mr-2" style="background:#006064;">
                    <em class="icon ni ni-user-alt"></em>
                </div>
                <div class="d-none d-md-block">
                    <div class="user-status" style="color:#006064;">Logged in as {{ user.role }} </div>
                    <div class="user-name dropdown-indicator" style="text-transform:uppercase;font-weight:bold;font-size:14px;color:#006064;">{{ user.firstname }} {{ user.lastname }} </div>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-s1 border" style="width:50px;">
            <div class="dropdown-inner pt-3 pb-3">
            <div style="margin-bottom:10px;"><Link :href="route('dashboard')" style="font-size:15px;">Dashboard</Link></div>
            <div><Link :href="route('logout')" style="font-size:15px;">Log out</Link></div>

            </div>
        </div>
    </li>

</ul>
</div>






















</div><!-- .nk-header-tools -->
</div><!-- .nk-header-wrap -->


</div><!-- .container-fliud -->
</div>
<!-- main header @e -->
<!-- content @s -->
<div class="nk-content"  style="padding:0;overflow-x:hidden;background:white;">
<div class="container-fluid"  style="padding:0;background:white;">
<div class="nk-content-inner" style="background:white;">
<div class="nk-content-body" style="margin-top:80px;background:white;">



<slot/>





</div>
</div>
</div>
</div>
<!-- content @e -->
<!-- footer @s -->
<div class="nk-footer" style="background: black;border:none;border-top:solid thin #212F3D;">
<div class="container-fluid">
<div class="nk-footer-wrap">
<div class="nk-footer-copyright">
© 2023 CERS|By NUX INNOVATIONS <a href="https://softnio.com" target="_blank"></a>
</div>
<div class="nk-footer-links">
<ul class="nav nav-sm">
<li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
<li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
<li class="nav-item"><a class="nav-link" href="#">Help</a></li>
</ul>
</div>
</div>
</div>
</div>
<!-- footer @e -->
</div>
<!-- wrap @e -->
</div>
<!-- main @e -->
</div>
</template>

<script>
import ContactPanel from '../Components/ContactPanel.vue';
import { Link } from '@inertiajs/inertia-vue3';
export default {
components:{
ContactPanel,
Link
},


data(){return{
main_menu:[
{id:1,name:'Home',url:'index'},
{id:2,name:'About',url:'about'},
{id:3,name:'Services',url:'services'},
{id:4,name:'News',url:'news'},
{id:5,name:'Contact Us',url:'contact'},

],
url:this.$page.props.system.url,
}},


computed:{
user(){
return this.$page.props.system.auth;
}

}









}
</script>
<style scoped>
ul li {
float:left;
margin-right:20px;
}
ul li a{
color:black;
font-size:17px;
}
.nav-link{
color:white;
}


</style>
