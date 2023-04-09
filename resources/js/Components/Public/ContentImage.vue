<script setup>
    const props = defineProps({
        src: String,
        align: String, 
    });
</script>
<template>
    <img :src="props.src" :class="props.align + '-image'" />
</template>
<style>
.left-image {
  float: left;
  margin: 0 20px 20px 0;
  max-width: 380px; 
}
.right-image {
  float: right;
  margin: 0 20px 20px 0;
  max-width: 380px; 
}
</style>