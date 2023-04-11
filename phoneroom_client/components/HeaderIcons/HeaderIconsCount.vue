<template>
  <div class="circle-count">
    <span class="circle-count_title">
      <slot />
    </span>
  </div>
</template>

<script>
export default {
  name: "HeaderIconsCount"
}
</script>

<style scoped>
.circle-count{
  width: 1rem;
  height: 1rem;
  background: #E31235;
  outline: 2px solid #1A1A25;
  border-radius: 50%;
}
.circle-count_title{
  color: #fff;
  font-weight: 400;
  line-height: 1.0625rem;
  display: flex;
  align-items: center;
  padding-right: 1px;
  font-size: 0.625rem;
  justify-content: center;
}
</style>