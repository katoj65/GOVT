<template>
    <MainLayout>
    <page-header :title="title">Citizens Engagement and Reporting System</page-header>
    <page-content>

    <div class="row">
    <div class="col-12 col-md-1"></div>
    <div class="col-12 col-md-10">


    <div class="card">
    <div class="card-header">
    <div class="card-title">
    CERS
    </div>
    </div>
    <div class="card-body">






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
    title:{}
    },

    data(){return{
    form:{
    email:'',
    password:'',
    }


    }},

    methods:{



    }
    }
    </script>
