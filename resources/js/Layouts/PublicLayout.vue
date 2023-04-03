<template>
    <Menu />
    <div class="py-10 flex justify-center">
        <slot />
    </div>
    <Footer />
</template>
  
<script>
    import Menu from '@/Components/Public/Menu.vue';
    import Footer from '@/Components/Public/Footer.vue';

    export default {
        name: 'TestComponent',
        components: { Menu, Footer }
    }
</script>