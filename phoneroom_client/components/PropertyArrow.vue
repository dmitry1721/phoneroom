<template>
  <svg :class="{'showProperty': props.showProperty}" class="arrow"  width="32" height="14" viewBox="0 0 32 14" fill="none">
    <path d="M1.5 12.5L16 1.5L30.5 12.5" stroke="#858FA4" stroke-width="2"/>
  </svg>
</template>

<script setup>
const props = defineProps({
  showProperty: Boolean
});
</script>

<style scoped>

</style>