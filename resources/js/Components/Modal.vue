<template>
<div class="modal-body modal-body-lg text-center">
<div class="nk-modal">
<em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success" v-if="message.success!=null"></em>
<em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-warning" v-if="message.warning!=null"></em>
<em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-error" v-if="message.error!=null"></em>
<h4 class="nk-modal-title" v-if="message.success!=null">Successful</h4>
<h4 class="nk-modal-title" v-if="message.warning!=null">Warning</h4>
<h4 class="nk-modal-title" v-if="message.error!=null">Error</h4>
<div class="nk-modal-text">
<div class="caption-text" v-if="message!=null">

<span v-if="message.success!=null">
{{ message.success }}
</span>
<span v-if="message.warning!=null">
{{ message.warning }}
</span>

<span v-if="message.error!=null">
    {{ message.error }}
    </span>


</div>

</div>
<div class="nk-modal-action">
<slot/>
</div>
</div>
</div><!-- .modal-body -->

</template>

<script>
export default {
props:{
message:{}
}


}
</script>
