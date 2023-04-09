<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import Content from '@/Components/Public/Content.vue';
import ImageCarousel from '@/Components/Public/ImageCarousel.vue';

const props = defineProps({
    images: Object,
    pet: Object,
});
</script>
<template>
    <ImageCarousel :images="props.images" />
    <PublicLayout>
        <div class="grid grid-cols-2 gap-4 md:gap-8 lg:gap-12 content-container">
            <Content>
                {{ props.pet.name }}
            </Content>
        </div>
    </PublicLayout>
</template>

<style>
body {
  background: #F8FAFC;
}

.content-container {
  display: flex; 
  justify-content: center;
}


.card {
  width: 940px;
  border-radius: 4px;
  border: 1px solid #E2E8F0;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden;
  background-color: #FFFFFF;
  padding: 32px;
}

.card-body {
  padding: 32px;
  color: #1A202C;
  font-family: 'Gotham Pro', sans-serif;
  font-size: 12pt;
  font-weight: regular;
}


.social-networks a {
  display: inline-block;
  padding-right: 24px;
}

.contacts-item {
  display: flex;
  align-items: center;
  padding-bottom: 24px;
}

.contacts-item > * {
  margin-right: 12px;
}

.contacts-item img {
  width: 24px;
  height: 24px;
}
</style>

