<template>
    <div class="card">
      <div class="card-text">
        <slot />
      </div>
    </div>
</template>


  <style scoped>
  .card {
    width:940px;
    border-radius: 4px;
    border: 1px solid #E2E8F0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
    background-color: #FFFFFF;
  }
  
  .card-text {
    padding: 20px;
    color: #1A202C;
    font-family: 'Raleway', sans-serif;
    font-size: 20pt;
    font-weight: bold;
  }
  </style>
  