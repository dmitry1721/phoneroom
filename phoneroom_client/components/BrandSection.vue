<template>
  <section class="brand-section">
    <div class="brand_title">
      <h2 class="brand_name tag_title title">Популярные бренды</h2>
    </div>
    <div v-if="pending">Loading...</div>
    <div v-else>
      <div v-if="brands" class="slider-row-1">
        <Swiper
            :modules="[SwiperAutoplay, SwiperKeyboard]"
            :slides-per-view="slidesPerView"
            :loop="true"
            :lazy="true"
            :spaceBetween="30"
            :keyboard="{
                enabled: true,
              }"
            :free-mode-momentum="false"
            :free-mode-momentum-bounce="false"
            :effect="''"
            :speed="3000"
            :freeMode="true"
            :autoplay="{
                delay: 0,
                disableOnInteraction: true,
              }">

          <SwiperSlide v-for="brand_img in (!pending ? brands.data.slice(110, 119):[])" >
            <div class="brand_slide">
              <div class="img-slide-wrap brand-wrap">
                <nuxt-img class="swiper-lazy img-slide brand-slide_img" :src="config.public.baseUrl+brand_img.image" loading="lazy"/>
              </div>
            </div>
          </SwiperSlide>

        </Swiper>
      </div>
      <div v-if="brands" class="slider-row-2">
        <Swiper
            :modules="[SwiperAutoplay, SwiperKeyboard]"
            :slides-per-view="slidesPerView"
            :loop="true"
            :lazy="true"
            :spaceBetween="30"
            :keyboard="{
                enabled: true,
              }"
            :free-mode-momentum="false"
            :free-mode-momentum-bounce="false"
            :effect="''"
            :speed="3000"
            :freeMode="true"
            :autoplay="{
                delay: 0,
                disableOnInteraction: true,
                reverseDirection: true,
              }">

          <SwiperSlide v-for="brand_img in (!pending ? brands.data.slice(110, 119).reverse():[])" >
            <div class="brand_slide">
              <div class="img-slide-wrap brand-wrap">
                <nuxt-img class="swiper-lazy img-slide brand-slide_img" :src="config.public.baseUrl+brand_img.image" loading="lazy"/>
              </div>
            </div>
          </SwiperSlide>

        </Swiper>
      </div>
    </div>
  </section>
</template>

<script setup>
import {onMounted} from "vue";

const config = useRuntimeConfig();
// const brandsImages = ref();
const urlBrand = config.public.apiBaseUrl + "brands/";
const {pending, data: brands} = await useLazyAsyncData("brands", () => $fetch(urlBrand));
console.log(brands);

const slidesPerView = ref(5);
const windowWidth = ref(0);
const updateWidth = () => {
  windowWidth.value = window.innerWidth;
  if (windowWidth.value <= 768 && windowWidth.value > 600) {
    slidesPerView.value = 4;
  }
  if (windowWidth.value <= 600 && windowWidth.value > 410) {
    slidesPerView.value = 3;
  }
  if (windowWidth.value <= 410) {
    slidesPerView.value = 2;
  }
}

onMounted(()=>{
  updateWidth();
  window.addEventListener('resize', updateWidth);
  if (windowWidth.value <= 768 && windowWidth.value > 600) {
    slidesPerView.value = 4;
  }
  if (windowWidth.value <= 600 && windowWidth.value > 410) {
    slidesPerView.value = 3;
  }
  if (windowWidth.value <= 410) {
    slidesPerView.value = 2;
  }
});

</script>

<style scoped>
.brand_title{
  color: #333333;
  font-size: 1.75rem;
  font-weight: 700;
  font-family: 'Inter', sans-serif;
  line-height: 2.125rem;
  padding-bottom: 1.875rem;
}
.brand-wrap{
  display: flex;
  width: 100%;
  height: 100%;
}
.brand-section{
  width: 100%;
  margin-top: 5.625rem;
  margin-bottom: 7.5rem;
}
.brand_slide{
  width: 17.25rem;
  height: 6.25rem;
  border-radius: 5px;
  background-color: #FFFFFF;
  transition: all .5s ease;
}
.brand_slide:hover{
  border: 1px solid #E31235;
  transition: all .5s ease;
}
.brand-slide_img{
  display: flex;
  mix-blend-mode: darken;
  margin: auto;
  max-width: 7.5rem;
  max-height: 2.5rem;
  padding: 0;
  border-radius: 0;
  width: auto;
  position: relative;
  /*height: auto;*/
  /*--width: auto;*/
  /*width: auto;*/
  /*padding: var(--width);*/
}
.slider-row-1{
  height: 8.125rem;
  /*margin-bottom: 1.875rem;*/
}
.slider-row-2{
  height: 6.25rem;
}
.slider-row-1,
.slider-row-2{
  cursor: pointer;
}

@media (max-width: 1279px) {
  .swiper-button-next::after{
    content: url("../img/arrow-next-sm.svg");
  }
  .swiper-button-prev::after{
    content: url("../img/arrow-prev-sm.svg");
  }
}

@media (max-width: 930px) {
  .brand_slide{
    width: 16.25rem;
  }
}

@media (max-width: 880px) {
  .brand_slide{
    width: 15.25rem;
  }
}

@media (max-width: 830px) {
  .brand_slide{
    width: 14.25rem;
  }
}

@media (max-width: 768px) {
  .brand_slide{
    width: 13.25rem;
  }
  /*.brand-slide_img{*/
  /*  max-width: 5.5rem;*/
  /*}*/
}

@media (max-width: 710px) {
  .brand_slide{
    width: 13rem;
  }
}

@media (max-width: 690px) {
  .brand_slide{
    width: 12.225rem;
  }
}

@media (max-width: 650px) {
  .brand_slide{
    width: 11.225rem;
  }
}

@media (max-width: 600px) {
  .brand_slide{
    width: 13rem;
  }
}

@media (max-width: 520px) {
  .brand_slide{
    width: 12.25rem;
  }
}

@media (max-width: 520px) {
  .brand_slide{
    width: 12rem;
  }
}

@media (max-width: 480px) {
  .brand_slide{
    width: 11.2rem;
  }
}

@media (max-width: 450px) {
  .brand_slide{
    width: 10.2rem;
  }
  .brand-slide_img{
    max-width: 6rem;
  }
}

@media (max-width: 410px) {
  .brand_slide{
    width: 13.875rem;
  }
  .brand-slide_img{
    max-width: 8rem;
  }
}

@media (max-width: 376px) {
  .brand_slide{
    width: 13rem;
  }
}

@media (max-width: 350px) {
  .brand_slide{
    width: 12.5rem;
  }
}

@media (max-width: 340px) {
  .brand_slide{
    width: 12rem;
  }
}
</style>