<template>
    <img :src="src" class="carousel_item" @click="handleClick"/>
</template>
<script>
    export default {
       props: {
           src: {
               type: String,
               required: true
           },
           index: {
               type: Number,
               required: true
           }
       },
       methods: {
           handleClick() {
               if (this.index === 0 || this.index === 2) {
                   this.$emit('clickImage', this.index);
               }
           }
       }
    };
</script>
<style scoped>
    .carousel_item {
       max-width: 100%;
       height: 520px;
       max-height: 520px;
    }
</style>