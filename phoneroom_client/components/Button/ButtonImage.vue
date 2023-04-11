<template>
  <div id="btn-img">
<!--    {{ $props.src_img }}-->
<!--    <nuxt-img v-if="windowWidth > 500" class="btn-svg" sizes="xxl:100vw xl:100vw lg:130vw md:140vw sm:200vw" :src="$props.src_img" alt="btn-svg" loading="lazy"/>-->
    <nuxt-img v-if="windowWidth > 500" class="btn-svg" sizes="xxl:200vw xl:230vw lg:250vw md:360vw sm:400vw" :src="$props.src_img" alt="btn-svg" loading="lazy"/>
<!--    <nuxt-img v-if="windowWidth <= 500" class="btn-svg" sizes="xxl:100vw xl:100vw lg:100vw md:140vw sm:300vw" :src="$props.src_img" alt="btn-svg" loading="lazy"/>-->
    <nuxt-img v-if="windowWidth <= 500" class="btn-svg" sizes="md:0vw sm:250px xs:90vw" :src="$props.src_img" alt="btn-svg" loading="lazy"/>
  </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

const props = defineProps({
  src_img: String
});

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
#btn-img{
  padding-right: .4375rem;
  display: flex;
}
/*.btn-svg{*/
/*  transition: all 10.3s ease;*/
/*}*/

@media (max-width: 640px) {
  #btn-img {
    padding-right: 0;
  }
}
</style>