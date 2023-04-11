<template>
  <div class="stock-status">
    <h3 class="status_title">Осталось мало</h3>
    <div class="status_svg">
      <svg xmlns="http://www.w3.org/2000/svg" width="1.75rem" height="0.5rem" viewBox="0 0 28 8" fill="none">
        <circle cx="4" cy="4" r="4" fill="#F99808"/>
        <circle cx="14" cy="4" r="3.5" stroke="#F99808"/>
        <circle cx="24" cy="4" r="3.5" stroke="#F99808"/>
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  name: "NotMuchLeftInStock"
}
</script>

<style scoped>
.status_title{
  color: #F99808;
  font-size: .75rem;
  font-weight: 500;
  font-family: 'Inter', sans-serif;
  line-height: .9375rem;
  display: inline-block;
}
.status_svg{
  display: inline-block;
  padding-left: .625rem;
}
</style>