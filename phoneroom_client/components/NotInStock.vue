<template>
  <div class="stock-status">
    <h3 class="status_title">Нет в наличии</h3>
    <div class="status_svg">
      <svg xmlns="http://www.w3.org/2000/svg" width="1.75rem" height="0.5rem" viewBox="0 0 28 8" fill="none">
        <circle cx="4" cy="4" r="3.5" stroke="#E31235"/>
        <circle cx="14" cy="4" r="3.5" stroke="#E31235"/>
        <circle cx="24" cy="4" r="3.5" stroke="#E31235"/>
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  name: "NotInStock"
}
</script>

<style scoped>
.status_title{
  color: #E31235;
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