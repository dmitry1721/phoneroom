<template>
  <div>
    <h2 class="btn-red_title">
      <slot/>
    </h2>
  </div>
</template>

<script>
export default {
  name: "ButtonTitle"
}
</script>

<style scoped>
.btn-red_title{
  color: #fff;
  font-size: 0.875rem;
  font-weight: 700;
  font-family: 'Inter', sans-serif;
}
</style>