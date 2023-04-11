<template>
  <div>
    <div v-if="route_btn">
      <nuxt-link :to="props.route_btn || '/'" class="button" :style="{ 'width': props.width_btn+'rem', 'height': props.height_btn+'rem' }" :class="{'in_basket': props.pressed, 'disabled': props.disabled_btn}">
        <div v-if="src_btn">
          <ButtonImage :src_img="props.src_btn" />
        </div>
        <div v-if="!props.pressed">
          <ButtonTitle><slot/></ButtonTitle>
        </div>
        <div v-else>
          <ButtonTitle>В корзине</ButtonTitle>
        </div>
      </nuxt-link>
    </div>
    <div v-else>
      <button class="button" :style="{ 'width': props.width_btn+'rem', 'height': props.height_btn+'rem' }" :class="{'in_basket': props.pressed, 'disabled': props.disabled_btn}">
        <div v-if="src_btn">
          <ButtonImage :src_img="props.src_btn" />
        </div>
        <div v-if="!props.pressed">
          <ButtonTitle><slot/></ButtonTitle>
        </div>
        <div v-else>
          <ButtonTitle>В корзине</ButtonTitle>
        </div>
      </button>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  pressed: Boolean,
  route_btn: String,
  width_btn: Number,
  height_btn: Number,
  src_btn: String,
  disabled_btn: Boolean,
});
</script>

<style scoped>
.button{
  display: flex;
  width: 100%;
  height: 3rem;
  background-color: #E31235;
  border-radius: 4px;
  justify-content: center;
  align-items: center;
  transition: all .3s ease;
}
.button.disabled{
  opacity: 0.5;
}
.button.disabled:hover{
  cursor: default;
  background-color: #E31235;
}
.button:hover{
  background-color: #BD0F2C;
  cursor: pointer;
  transition: all .3s ease;
}
.in_basket{
  background-color: #BD0F2C;
}
</style>