<template>
<div class="nk-block pt-3" style="margin:0;background:#006064;">
<h3 style="color:white;" class="pt-4 text-center pb-1">
{{ title }}
</h3>
<div class="text-center pb-4 pt-0" style="color:white;font-size:18px;">
<slot/>
</div>
</div>
</template>
<script>
export default {
    props:{
    title:{}
    }
}
</script>
<style scoped>
.nk-block{
background:#006064
}
</style>
