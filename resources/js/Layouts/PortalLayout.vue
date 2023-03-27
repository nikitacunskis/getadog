<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    title: String,
});
</script>

<template>
    <div>
        <Head :title="title" />

        <!-- Page Content -->
        <main>
            <slot />
        </main>
    </div>
</template>
