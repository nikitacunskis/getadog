<script setup>
    const props = defineProps({
        menu: Object,
    });

    const go = (url) => {
        window.location.href = url;
    }
</script>
<template>
    <div class="menu">
        <div class="logo">
            <img src="/logo.svg" alt="Logo" width="32" height="32" />
            <span class="brand">Strudel</span>
        </div>
        <div class="menu-items">
            <div v-for="item in menu" :key="item.id" class="item" @click="go(item.url)">
                {{ item.name }}
            </div>
        </div>
    </div>
</template>
  
<style scoped>
.menu {
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 100%;
    height: 56px;
    background-color: #ffffff;
    border-bottom: 1px solid #e2e8f0;
    padding: 0 20px;
    box-sizing: border-box;
}
.menu-items {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 1;
}

.logo {
    position: relative;
    display: flex;
    align-items: center;
    font-family: Gotham Pro, sans-serif;
    font-size: 18px;
    font-weight: 500;
    line-height: 1.5;
    color: #1a202c;
}

.logo img {
    margin-right: 12px;
}

.brand {
    font-family: 'Raleway', sans-serif;
    font-size: 16pt;
    color: #2E68C0;
}

.item {
    font-family: Gotham Pro, sans-serif;
    font-size: 16pt;
    color: #1A202C;
    height: 56px;
    border-bottom: 3px solid transparent;
    cursor: pointer;
    font-weight: normal;
    text-align: center;
    padding: 16px 16px;
    display: flex;
    justify-content: center;
    align-items: center;
}


.item a {
    display: flex;
    align-items: center;
    height: 100%;
    width: 100%;
}

.item:hover {
    color: #2E68C0;
    border-bottom: 3px solid #2E68C0;
    font-weight: 500;
}
</style>
  