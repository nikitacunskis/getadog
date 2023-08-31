<template>
    <div :class="this.class">
        <div v-for="(element, index) in this.countable" :class="this.elementClass + ' circle-container'" >
            <svg height="16" width="16">
                <circle cx="8" cy="8" r="8" stroke="none" v-if="index == (this.currentIndex - 1)" fill="#000000" />
                <circle cx="8" cy="8" r="8" stroke="none" v-if="index != (this.currentIndex - 1)" fill="#c6c6c6" />
            </svg>
        </div>
    </div>
  </template>
  
  <style>
  .circle-container {
    display: inline-block; /* or inline-flex */
    margin-left: 8px;
  }
  </style>
  
  <script>
  export default {
    props: {
      currentIndex: {
        type: Number,
        required: true, 
      },
      countable: {
        type: Object,
        required: true,
      },
      class: {
        type: String,
        required: false,
      },
      elementClass: {
        type: Object,
        required: false,
      }
    },
    mounted() {
      console.log("current index", this.currentIndex);
      console.log("max index", this.countable);
    },
  };
  </script>
  