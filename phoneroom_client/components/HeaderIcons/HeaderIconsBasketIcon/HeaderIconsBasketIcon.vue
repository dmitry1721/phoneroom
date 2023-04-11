<template>
  <div v-if="windowWidth > 400" class="basket-svg">
    <svg viewBox="0 0 21 27" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g opacity="1">
        <path d="M0.9 8.6207H20.1V22.3874C20.1 24.0995 18.7121 25.4874 17 25.4874H4C2.28792 25.4874 0.9 24.0995 0.9 22.3874V8.6207Z" stroke="white" stroke-width="1.8"/>
        <path d="M5.83464 13.5541L5.83464 5.88741C5.83464 3.67827 7.6255 1.88741 9.83464 1.88741H11.168C13.3771 1.88741 15.168 3.67827 15.168 5.88741L15.168 13.5541" stroke="white" stroke-width="1.8"/>
      </g>
    </svg>
  </div>
  <div v-else class="basket-svg">
    <svg viewBox="0 0 21 27" width="13" height="19" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g opacity="1">
        <path d="M0.9 8.6207H20.1V22.3874C20.1 24.0995 18.7121 25.4874 17 25.4874H4C2.28792 25.4874 0.9 24.0995 0.9 22.3874V8.6207Z" stroke="white" stroke-width="1.8"/>
        <path d="M5.83464 13.5541L5.83464 5.88741C5.83464 3.67827 7.6255 1.88741 9.83464 1.88741H11.168C13.3771 1.88741 15.168 3.67827 15.168 5.88741L15.168 13.5541" stroke="white" stroke-width="1.8"/>
      </g>
    </svg>
  </div>
</template>

<script setup>
import {onMounted} from "vue";

const windowWidth = ref(0);
const updateWidth = () => {
  windowWidth.value = window.innerWidth;
};
onMounted(()=>{
  updateWidth();
  window.addEventListener('resize', updateWidth);
});
</script>

<style scoped>
.basket-svg{
  width: 1.2rem;
  height: auto;
}
</style>