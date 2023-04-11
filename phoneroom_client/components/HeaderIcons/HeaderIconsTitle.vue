<template>
  <h4 class="icon_title">
    <slot />
  </h4>
</template>

<script>
export default {
  name: "HeaderIconsTitle"
}
</script>

<style scoped>
.icon_title{
  font-size: 0.875rem;
  color: #fff;
  font-weight: 400;
}
</style>