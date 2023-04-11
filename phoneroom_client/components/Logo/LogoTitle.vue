<template>
  <div>
    <nuxt-link class="logo_title" to="/">Телефон<span>.<span>Рум</span></span></nuxt-link>
  </div>
</template>

<script>
export default {
  name: "LogoTitle"
}
</script>

<style scoped>
.logo_title{
  font-size: 1.75rem;
  font-weight: bold;
  font-family: 'Montserrat Alternates', sans-serif;
  color: #fff;
  padding-left: .625rem;
}
.logo_title>span{
  color: #E31235;
  font-family: 'Leckerli One', cursive;
}
.logo_title>span>span{
  color: #E31235;
  font-family: 'Montserrat Alternates', sans-serif;
}
.logo_title:hover{
  color: #ffffff;
}

@media (max-width: 400px) {
  .logo_title{
    font-size: 1.5rem;
    padding-left: .6rem;
  }
}

@media (max-width: 360px) {
  .logo_title{
    font-size: 1.4rem;
    padding-left: .5rem;
  }
}
</style>