<template>
  <section class="offer-section">
    <div class="container container-offer">
      <div class="offer-slider">
        <Swiper class="swiper-wrapp-offer"
                :modules="[SwiperAutoplay, SwiperEffectFade, SwiperPagination, SwiperLazy, SwiperKeyboard]"
                :slides-per-view="1"
                :loop="true"
                :preloadImages="false"
                :lazy="true"
                :keyboard="{
            enabled: true,
          }"
                :pagination="{
            clickable: true,
            el: '.swiper-pagination',
          }"
                :effect="'fade'"
                :autoplay="{
            delay: 5000,
            disableOnInteraction: true,
          }">
          <SwiperSlide v-for="slide in 4" :key="slide">
            <div class="img-slide-wrap">
              <nuxt-img class="swiper-lazy img-slide offer-slide" :src="`img/${slide}-sale-slide.webp`" loading="lazy"/>
            </div>
          </SwiperSlide>
          <div class="swiper-pagination">
          </div>
        </Swiper>
      </div>
    </div>
  </section>
</template>

<script setup>
import {onMounted} from "vue";

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
.offer-section{
  margin-top: 2.8125rem;
  background-color: #FFFFFF;
  width: 100%;
  height: 24.375rem;
}
.img-slide{
  border-radius: 10px;
  position: absolute;
  /*object-fit: cover;*/
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  /*max-height: 31.875rem;*/
  padding: 0 1.5625rem;
  padding-bottom: 1.875rem;
}
.offer-slider{
  padding-top: 3.25rem;
  padding-bottom: 1.3125rem;
  width: 100%;
}
.swiper-wrapp-offer{
  height: 20.75rem;
}
.offer-slide{
  padding: 0;
  object-fit: cover;
  height: 17.6875rem;
}

.swiper-button-prev{
  width: 3.125rem;
  height: 3.125rem;
  border-radius: 50%;
  background-color: #FFFFFF;
  writing-mode: vertical-lr;
  color: #E31235;
  left: 0;
  border: .1px solid rgba(208, 51, 77, .3);
}
.swiper-button-prev::after{
  content: url("../img/arrow-prev.svg");
}
.swiper-button-next{
  width: 3.125rem;
  height: 3.125rem;
  border-radius: 50%;
  background-color: #FFFFFF;
  writing-mode: vertical-lr;
  color: #E31235;
  right: 0;
  border: .1px solid rgba(208, 51, 77, .3);
}
.swiper-button-next::after{
  content: url("../img/arrow-next.svg");
}

.swiper-pagination{
  bottom: 0;
}
@media (max-width: 1279px) {
  .swiper-button-next::after{
    content: url("../img/arrow-next-sm.svg");
  }
  .swiper-button-prev::after{
    content: url("../img/arrow-prev-sm.svg");
  }
}


@media (max-width: 768px) {
  .offer-slide{
    height: 15rem;
  }
  .offer-section{
    height: 22rem;
  }
  .img-slide{
    padding: 0;
  }
  .swiper-pagination{
    display: none;
  }
  .offer-section>.swiper-pagination{
    display: flex;
  }
}
@media (max-width: 740px) {
  .offer-slide{
    height: 12.9rem;
  }
  .swiper-wrapp-offer{
    height: 13.75rem;
  }
  .offer-section{
    height: 19.5rem;
  }
}
@media (max-width: 630px) {
  .offer-slide{
    height: 12rem;
  }
  .offer-section{
    height: 19rem;
  }
}
@media (max-width: 590px) {
  .offer-slide{
    height: 11.6875rem;
  }
  .swiper-wrapp-offer{
    height: 11.75rem;
  }
  .offer-section{
    height: 18.375rem;
  }
}
@media (max-width: 576px) {
  .offer-slide{
    height: 10.9rem;
  }
  .offer-section{
    height: 18rem;
  }
  .swiper-wrapp-offer{
    height: 11rem;
  }
}
@media (max-width: 530px) {
  .offer-slide{
    height: 10.225rem;
  }
  .offer-section{
    height: 17rem;
  }
}

@media (max-width: 500px) {
  .offer-slide{
    height: 10rem;
  }
  .swiper-wrapp-offer{
    height: 11.75rem;
  }
  .offer-section{
    height: 17.375rem;
  }
  .container-offer{
    padding: 0 8px;
  }
}

@media (max-width: 475px) {
  .offer-slide{
    height: 9.225rem;
  }
  .swiper-wrapp-offer{
    height: 10.8rem;
  }
  .offer-section{
    height: 16.375rem;
  }
}
@media (max-width: 440px) {
  .offer-slide{
    height: 8.8rem;
  }
  .swiper-wrapp-offer{
    height: 10.4rem;
  }
  .offer-section{
    height: 15.5rem;
  }
}
@media (max-width: 425px) {
  .offer-slide{
    height: 8.225rem;
  }
  .swiper-wrapp-offer{
    height: 10.5rem;
  }
  .offer-section{
    height: 15rem;
  }
}
@media (max-width: 410px) {
  .offer-slide{
    height: 8rem;
  }
  .offer-section{
    height: 14.5rem;
  }
}
@media (max-width: 390px) {
  .offer-slide{
    height: 7.625rem;
  }
  .swiper-wrapp-offer{
    height: 10.1rem;
  }
  .offer-section{
    height: 14rem;
  }
}
@media (max-width: 375px) {
  .offer-slide{
    height: 7.4rem;
  }
  .swiper-wrapp-offer{
    height: 9rem;
  }
  .offer-section{
    height: 14rem;
  }
  .container-offer{
    padding: 0 4px;
  }
}
@media (max-width: 355px) {
  .offer-slide{
    height: 6.9rem;
  }
  .swiper-wrapp-offer{
    height: 9rem;
  }
  .offer-section{
    height: 13.5rem;
  }
}
@media (max-width: 330px) {
  .offer-slide{
    height: 6.7rem;
  }
  .swiper-wrapp-offer{
    height: 8.7rem;
  }
  .offer-section{
    height: 13rem;
  }
}
</style>