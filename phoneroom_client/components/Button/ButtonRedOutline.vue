<template>
<!--  <div>-->
    <nuxt-link :to="props.route_btn || '/'" :style="{ 'width': props.width_btn+'rem'}" :class="{'basket_btn': basket_btn, 'button-outline': !basket_btn}">
      <h2 class="btn-red-outline_title">
        <slot/>
      </h2>
    </nuxt-link>
<!--  </div>-->
</template>

<script setup>
const props = defineProps({
  route_btn: String,
  width_btn: Number,
  basket_btn: Boolean
});
</script>

<style scoped>
.button-outline{
  display: flex;
  width: 11.25rem;
  height: 2.625rem;
  background-color: transparent;
  border-radius: 4px;
  /*border-radius: 4px;*/
  border: 1px solid #E31235;
  justify-content: center;
  align-items: center;
  transition: all .3s ease;
  cursor: pointer;
  /*margin-top: 1.875rem;*/
}
.btn-red-outline_title  {
  color: #E31235;
  font-size: 0.875rem;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  vertical-align: center;
  text-align: center;
  font-weight: 700;
  font-family: 'Inter', sans-serif;
  transition: all .3s ease;
}
.button-outline:hover{
  background-color: #E31235;
  transition: all .3s ease;
  color: #FFFFFF;
}
.btn-red-outline_title:hover{
  color: #FFFFFF;
  transition: all .2s ease;
}
.basket_btn{
  cursor: default;
  display: flex;
  width: 11.25rem;
  height: 3rem;
  background-color: transparent;
  border-radius: 4px;
  /*border-radius: 4px;*/
  border: 1px solid #E31235;
  justify-content: center;
  align-items: center;
  transition: all .3s ease;
}
</style>