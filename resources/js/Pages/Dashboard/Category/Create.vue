<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout title="Create category">
        <form action="/action_page.php">
            <label for="fname">category:</label><br>
            <input type="text" id="name" name="name" placeholder="animal"><br>
            <input type="submit" value="Submit">
        </form>
    </AppLayout>


</template>
