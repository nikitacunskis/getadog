<script setup>
import Menu from '@/Components/Public/Menu.vue';
import Footer from '@/Components/Public/Footer.vue';
    const menu = [
        {'name': 'Dogs', 'url': '/dogs'},
        {'name': 'Cats', 'url': '/cats'},
        {'name': 'About', 'url': '/about'},
        {'name': 'Contacts', 'url': '/contacts'},
    ];
</script>
<template>
    <Menu :menu="menu" />
    <div class="py-10 flex justify-center">
        <slot />
    </div>
    <Footer />
</template>