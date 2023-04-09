<script setup>
  import PublicLayout from '@/Layouts/PublicLayout.vue';
  import Content from '@/Components/Public/Content.vue';
</script>
<template>
  <PublicLayout>
    <div class="grid grid-cols-2 gap-4 md:gap-8 lg:gap-12 content-container">
      <Content>
          <div class="contacts-item regular gray">
            For any questions, you can contact us using any method:
          </div>
          <div class="contacts-item">
            <img src="/icons/phone.svg" />
            <span class="t-medium">Call us:</span>
            <span class="regular">+371 20002000</span>
          </div>
          <div class="contacts-item">
            <img src="/icons/letter.svg" />
            <span class="t-medium">Email us:</span>
            <span class="t-regular">getapetlatvia@gmail.com</span>
          </div>
          <div class="contacts-item">
            <hr />
          </div>
          <div class="social-networks">
              <a href="https://facebook.com/">
                <img src="/facebook.png" />
              </a>
              <a href="https://instagram.com/">
                <img src="/instagram.png" />
              </a>
          </div>
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
  width: 552px;
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

