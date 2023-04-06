<script setup>
const menu = {
    activeIndex: 0,
    hoveredIndex: -1,
    menuItems: [
        {
            'label':'Dogs',
            'url':'/dogs',
        },
        {
            'label':'Cats',
            'url':'/cats',
        },
        {
            'label':'Adopted',
            'url':'/adopted',
        },
        {
            'label':'About',
            'url':'/about',
        },
        {
            'label':'Contacts',
            'url':'/contacts',
        }
    ],
}
const setActive = (index) => {
    this.activeIndex = index;
};
const setHovered = (index) => {
    this.hoveredIndex = index;
};
</script>
<template>
    <div class="menu">
      <div class="logo">
        <img src="/logo.svg" alt="Logo" width="32" height="32" />
        <span class="brand">Strudel</span>
      </div>
      <div class="menu-items">
        <div class="menu-item" v-for="(item, index) in menu.menuItems" :key="index"
          :class="{ 'active': menu.activeIndex === index }"
          @click="setActive(index)"
          @mouseover="setHovered(index)"
          @mouseleave="setHovered(-1)">
          <span><a :href="item.url">{{ item.label }}</a></span>
          <div class="border" v-if="menu.hoveredIndex === index"></div>
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
}
  
.logo {
    position: relative;
    display: flex;
    align-items: center;
    margin-left: 20px;
    font-family: Gotham Pro, sans-serif;
    font-size: 18px;
    font-weight: 500;
    line-height: 1.5;
    color: #1a202c;
}

  
.logo img {
    margin-right: 12px;
}

.menu-items {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin: 0 auto;
}
  
.menu-item {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 56px;
    padding: 0 20px;
    font-family: 'Raleway', sans-serif;
    font-size: 16px;
    font-weight: 500;
    line-height: 1.5;
    color: #1A202C;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}
  
.menu-item:hover,
.menu-item.active {
    border-bottom-color: #2e68c0;
    border-bottom-width: 2px;
    color: #2E68C0;
    font-weight: medium;
}
  
.menu-item:hover .border,
.menu-item.active .border {
    display: block;
}
  
.border {
    display: none;
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 2px;
    background-color: #2e68c0;
    border: none;
    box-sizing: border-box;
}

.brand {
    font-family: 'Raleway', sans-serif;
    font-size: 16pt;
    color: #2E68C0;
}
  </style>
  