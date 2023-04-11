<template>
  <div>
    <div class="cards-section">
      <Swiper v-if="windowWidth > 768" class="swiper-wrapp-viewed"
              :modules="[SwiperAutoplay, SwiperEffectFade, SwiperLazy, SwiperKeyboard, SwiperNavigation]"
              :slides-per-view="3"
              :spaceBetween="85"
              :preloadImages="false"
              :loop="false"
              :lazy="true"
              :keyboard="{
            enabled: true,
          }"
              :navigation="{
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }">
<!--        <div class="cards" v-for="product in products"></div>-->
        <SwiperSlide class="cards" v-for="product in products">
          <div v-if="product.published === true">
            <ProductViewedCard :product_variant="product" ></ProductViewedCard>
          </div>
        </SwiperSlide>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </Swiper>
      <Swiper v-if="windowWidth <= 768 && windowWidth > 714" class="swiper-wrapp-viewed"
              :modules="[SwiperAutoplay, SwiperEffectFade, SwiperLazy, SwiperKeyboard, SwiperNavigation]"
              :slides-per-view="2"
              :spaceBetween="10"
              :preloadImages="false"
              :loop="false"
              :lazy="true"
              :keyboard="{
            enabled: true,
          }"
              :navigation="{
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }">
        <!--        <div class="cards" v-for="product in products"></div>-->
        <SwiperSlide class="cards" v-for="product in products">
          <div v-if="product.published === true">
            <ProductViewedCard :product_variant="product" ></ProductViewedCard>
          </div>
        </SwiperSlide>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </Swiper>
      <Swiper v-if="windowWidth <= 714 && windowWidth > 605" class="swiper-wrapp-viewed"
              :modules="[SwiperAutoplay, SwiperEffectFade, SwiperLazy, SwiperKeyboard, SwiperNavigation]"
              :slides-per-view="2"
              :spaceBetween="windowWidth/3+(570-windowWidth)"
              :preloadImages="false"
              :loop="true"
              :lazy="true"
              :keyboard="{
            enabled: true,
          }"
              :navigation="{
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }">
        <!--        <div class="cards" v-for="product in products"></div>-->
        <SwiperSlide class="cards" v-for="product in products">
          <div v-if="product.published === true">
            <ProductViewedCard :product_variant="product" ></ProductViewedCard>
          </div>
        </SwiperSlide>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </Swiper>
      <Swiper v-if="windowWidth <= 605 && windowWidth > 410" class="swiper-wrapp-viewed"
              :modules="[SwiperAutoplay, SwiperEffectFade, SwiperLazy, SwiperKeyboard, SwiperNavigation]"
              :slides-per-view="2"
              :spaceBetween="windowWidth/3+(650-windowWidth)"
              :preloadImages="false"
              :loop="true"
              :lazy="true"
              :keyboard="{
            enabled: true,
          }"
              :navigation="{
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }">
        <!--        <div class="cards" v-for="product in products"></div>-->
        <SwiperSlide class="cards" v-for="product in products">
          <div v-if="product.published === true">
            <ProductViewedCard :product_variant="product" ></ProductViewedCard>
          </div>
        </SwiperSlide>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </Swiper>
      <Swiper v-if="windowWidth <= 410 && windowWidth > 380" class="swiper-wrapp-viewed"
              :modules="[SwiperAutoplay, SwiperEffectFade, SwiperLazy, SwiperKeyboard, SwiperNavigation]"
              :slides-per-view="2"
              :spaceBetween="windowWidth/3+(600-windowWidth)"
              :preloadImages="false"
              :loop="true"
              :lazy="true"
              :keyboard="{
            enabled: true,
          }"
              :navigation="{
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }">
        <!--        <div class="cards" v-for="product in products"></div>-->
        <SwiperSlide class="cards" v-for="product in products">
          <div v-if="product.published === true">
            <ProductViewedCard :product_variant="product" ></ProductViewedCard>
          </div>
        </SwiperSlide>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </Swiper>
      <Swiper v-if="windowWidth <= 380" class="swiper-wrapp-viewed"
              :modules="[SwiperAutoplay, SwiperEffectFade, SwiperLazy, SwiperKeyboard, SwiperNavigation]"
              :slides-per-view="1"
              :spaceBetween="windowWidth/3+(250-windowWidth)"
              :preloadImages="false"
              :loop="true"
              :lazy="true"
              :keyboard="{
            enabled: true,
          }"
              :navigation="{
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }">
        <!--        <div class="cards" v-for="product in products"></div>-->
        <SwiperSlide class="cards" v-for="product in products">
          <div v-if="product.published === true">
            <ProductViewedCard :product_variant="product" ></ProductViewedCard>
          </div>
        </SwiperSlide>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </Swiper>

    </div>
  </div>
</template>

<script setup>
import {useViewedProductsStore} from "../stores/ViewedProductsStore";
import ProductViewedCard from "./ProductViewedCard";
import {computed, onMounted} from "vue";

const viewedProducts = computed(() => useViewedProductsStore().getViewedProducts().value);
const products = ref();

const windowWidth = ref(0);
const updateWidth = () => {
  windowWidth.value = window.innerWidth;
};
onMounted(()=>{
  products.value = viewedProducts.value;
  updateWidth();
  window.addEventListener('resize', updateWidth);
});
</script>

<style scoped>
.cards{
  display: flex;
  max-width: 28.125rem;
}
.swiper-wrapp-viewed{
  height: 15.125rem;
  width: 100%;
  padding: 0 1.5625rem;
  text-align: left;
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
  color: #E31235;
  writing-mode: vertical-lr;
  right: 0;
  border: .1px solid rgba(208, 51, 77, .3);
}
.swiper-button-next::after{
  content: url("../img/arrow-next.svg");
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
  .swiper-wrapp-viewed{
    padding: 0;
  }
  .swiper-button-next{
    display: none;
  }
  .swiper-button-prev{
    display: none;
  }
}
</style>