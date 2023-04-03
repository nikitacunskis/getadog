<script setup>

import AppLayout from '@/Layouts/PortalLayout.vue';
const props = defineProps({
    categories: Array,
});

</script>
<template>
    <AppLayout title="Pets">
        <div class="w-full grid grid-cols-2 gap-4" v-for="pet in pets" :key="pet.id">
            {{ pet.name }}
        </div>
    </AppLayout>
</template>