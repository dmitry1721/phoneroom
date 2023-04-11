<template>
  <div class="container">
    <div class="index_links" v-if="windowWidth > 576">
      <ul class="index_links_ul">
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/flame.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:120vw md:140vw sm:140vw xs:100vw" alt="fire"/>
            <h3 class="index_link_title">Акции</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/catalog/smartfony" class="index_link">
            <nuxt-img class="index_link_png" src="img/iphone.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:120vw md:140vw sm:140vw xs:100vw" alt="iphone"/>
            <h3 class="index_link_title">Смартфоны</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/ipad.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:120vw md:140vw sm:140vw xs:100vw" alt="ipad" />
            <h3 class="index_link_title">Планшеты</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/headphone2.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:120vw md:140vw sm:140vw xs:100vw" alt="headphone"/>
            <h3 class="index_link_title">Наушники</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/catalog/smart-chasy-i-fitnes-braslety" class="index_link">
            <nuxt-img class="index_link_png" src="img/watch2.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:120vw md:140vw sm:140vw xs:100vw" alt="watch"   />
            <h3 class="index_link_title">Аксессуары</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/modem.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:120vw md:140vw sm:140vw xs:100vw" alt="modem" />
            <h3 class="index_link_title">Умная техника</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/sim-card.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:120vw md:140vw sm:140vw xs:100vw" alt="sim-card" />
            <h3 class="index_link_title">SIM-карты</h3>
          </nuxt-link>
        </li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <div class="index_slider">
      <Swiper class="swiper-wrapp"
              :modules="[SwiperAutoplay, SwiperEffectFade, SwiperPagination, SwiperLazy, SwiperKeyboard, SwiperNavigation]"
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
              :navigation="{
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }"
              :effect="'creative'">
        <SwiperSlide v-for="slide in 2" :key="slide">
          <div class="img-slide-wrap">
            <nuxt-img class="swiper-lazy img-slide" :src="`img/${slide}-main-slide.jpg`" loading="lazy"/>
<!--            <nuxt-img class="swiper-lazy img-slide" :src="`img/iPhone-14-Series-Accessories_Home-Banner-scaled 1.jpg`" loading="lazy"/>-->
          </div>

        </SwiperSlide>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination">
        </div>
      </Swiper>
    </div>
    <div class="index_links" v-if="windowWidth <= 576 && windowWidth > 375">
      <ul class="index_links_ul">
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/flame.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:170vw xs:100vw" alt="fire"/>
            <h3 class="index_link_title">Акции</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/catalog/smartfony" class="index_link">
            <nuxt-img class="index_link_png" src="img/iphone.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:170vw xs:100vw" alt="iphone"/>
            <h3 class="index_link_title">Смартфоны</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/ipad.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:170vw xs:100vw" alt="ipad" />
            <h3 class="index_link_title">Планшеты</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/headphone2.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:170vw xs:100vw" alt="headphone"/>
            <h3 class="index_link_title">Наушники</h3>
          </nuxt-link>
        </li>
      </ul>
      <ul class="index_links_ul">
        <li>
          <nuxt-link to="/catalog/smart-chasy-i-fitnes-braslety" class="index_link">
            <nuxt-img class="index_link_png" src="img/watch2.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:170vw xs:100vw" alt="watch"   />
            <h3 class="index_link_title">Аксессуары</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/modem.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:170vw xs:100vw" alt="modem" />
            <h3 class="index_link_title">Умная техника</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/sim-card.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:170vw xs:100vw" alt="sim-card" />
            <h3 class="index_link_title">SIM-карты</h3>
          </nuxt-link>
        </li>
      </ul>
    </div>
    <div class="index_links" v-if="windowWidth <= 375">
      <ul class="index_links_ul">
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/flame.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:200vw xs:200vw" alt="fire"/>
            <h3 class="index_link_title">Акции</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/catalog/smartfony" class="index_link">
            <nuxt-img class="index_link_png" src="img/iphone.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:200vw xs:200vw" alt="iphone"/>
            <h3 class="index_link_title">Смартфоны</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/ipad.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:200vw xs:200vw" alt="ipad" />
            <h3 class="index_link_title">Планшеты</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/headphone2.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:200vw xs:200vw" alt="headphone"/>
            <h3 class="index_link_title">Наушники</h3>
          </nuxt-link>
        </li>
      </ul>
      <ul class="index_links_ul">
        <li>
          <nuxt-link to="/catalog/smart-chasy-i-fitnes-braslety" class="index_link">
            <nuxt-img class="index_link_png" src="img/watch2.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:200vw xs:200vw" alt="watch"   />
            <h3 class="index_link_title">Аксессуары</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/modem.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:200vw xs:200vw" alt="modem" />
            <h3 class="index_link_title">Умная техника</h3>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/" class="index_link">
            <nuxt-img class="index_link_png" src="img/sim-card.svg" loading="lazy" sizes="xxl:100vw xl:100vw lg:100vw md:120vw sm:200vw xs:200vw" alt="sim-card" />
            <h3 class="index_link_title">SIM-карты</h3>
          </nuxt-link>
        </li>
      </ul>
    </div>
  </div>
  <div class="index-main-wrap">
    <div id="tagSectionNew" class="tag-new-section">
<!--      <TagSectionNew :slug="'new'" />-->
      <component :slug="'new'" :is="showTagSectionNew ? TagSectionNew : 'div'" />
    </div>
    <div class="tag_line line"></div>
    <div id="brandSection" class="container">
<!--      <BrandSection />-->
      <component :is="showBrandSection ? BrandSection : 'div'" />
    </div>
    <div id="tagSectionRecommend" class="tag-rec-section">
<!--      <TagSectionRecommend :slug="'rekomenduem'" />-->
      <component :slug="'rekomenduem'" :is="showTagSectionRecommend ? TagSectionRecommend : 'div'" />
    </div>
    <div class="tag_line line"></div>
    <div id="offerSection">
<!--      <OfferSection />-->
      <component :is="showOfferSection ? OfferSection : 'div'" />
    </div>
    <div id="salesSection">
<!--      <SalesSection />-->
      <component :is="showSalesSection ? SalesSection : 'div'" />
    </div>
    <div id="viewedProducts" class="viewed">
      <div class="container">
        <h2 class="viewed_title tag_title title">Вы смотрели</h2>
      </div>
      <div class="container-fluid">
<!--        <ViewedProducts />-->
        <component :is="showViewedProducts ? ViewedProducts : 'div'" />
      </div>
    </div>
  </div>
</template>
<script setup>
import {onMounted, onUnmounted, ref, resolveComponent} from "vue";

definePageMeta({
  title: 'Телефон.Рум',
  breadcrumb: 'Главная'
})
const route = useRoute();
const windowWidth = ref(0);
const updateWidth = () => {
  windowWidth.value = window.innerWidth;
};

const TagSectionNew = resolveComponent('TagSectionNew');
const BrandSection = resolveComponent('BrandSection');
const TagSectionRecommend = resolveComponent('TagSectionRecommend');
const ViewedProducts = resolveComponent('ViewedProducts');
const OfferSection = resolveComponent('OfferSection');
const SalesSection = resolveComponent('SalesSection');

const showTagSectionNew = ref(false);
const showBrandSection = ref(false);
const showTagSectionRecommend = ref(false);
const showOfferSection = ref(false);
const showSalesSection = ref(false);
const showViewedProducts = ref(false);

// onBeforeMount(() => {
//
// });


onMounted(()=>{
  updateWidth();
  window.addEventListener('resize', updateWidth);

  const observerNew = new IntersectionObserver((entries) => {
    showTagSectionNew.value = true;
  },{
    rootMargin: '50px',
  });

  const observerBrand = new IntersectionObserver((entries) => {
    showBrandSection.value = true;
  },{
    rootMargin: '25px',
  });

  const observerRec = new IntersectionObserver((entries) => {
    showTagSectionRecommend.value = true;
  },{
    rootMargin: '25px',
  });

  const observerOffer = new IntersectionObserver((entries) => {
    showOfferSection.value = true;
  },{
    rootMargin: '25px',
  });

  const observerSales = new IntersectionObserver((entries) => {
    showSalesSection.value = true;
  },{
    rootMargin: '25px',
  });

  const observerViewed = new IntersectionObserver((entries) => {
    showViewedProducts.value = true;
  },{
    rootMargin: '25px',
  });

  const idTagSectionNew = document.querySelector('#tagSectionNew');
  const idBrandSection = document.querySelector('#brandSection');
  const idTagSectionRecommend = document.querySelector('#tagSectionRecommend');
  const idOfferSection = document.querySelector('#offerSection');
  const idSalesSection = document.querySelector('#salesSection');
  const idViewedProducts = document.querySelector('#viewedProducts');

  observerNew.observe(idTagSectionNew);
  observerBrand.observe(idBrandSection);
  observerRec.observe(idTagSectionRecommend);
  observerOffer.observe(idOfferSection);
  observerSales.observe(idSalesSection);
  observerViewed.observe(idViewedProducts);
});

onUnmounted(() => {
  observerNew.value.disconnect();
  observerBrand.value.disconnect();
  observerRec.value.disconnect();
  observerOffer.value.disconnect();
  observerSales.value.disconnect();
  observerViewed.value.disconnect();
});


</script>

<style scoped>
.index_links {
  padding: 1rem 0 1.5rem 0;
}
.img-slide-wrap{
  position: relative;
  width: 100%;
  height: 100%;
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
.index_links_ul {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
}
.index_link{
  opacity: .75;
}
.index_link:hover {
  opacity: 1;
}
.index_link:hover > .index_link_title {
  color: #234a9d;
  text-decoration: underline;
  opacity: 1;
  transition: all .3s ease;
}
.index_link_title {
  font-weight: 600;
  font-size: 1rem;
  color: #1A1A25;
  transition: all .3s ease;
  text-align: center;
  opacity: 1;
}
.index_link_title:hover{
  color: #234a9d;
  text-decoration: underline;
  opacity: 1;
  transition: all .3s ease;
}
.index_link_png {
  display: block;
  padding: 1rem 0;
  margin: 0 auto;
}

.index_slider {
  width: 100%;
  max-height: 35.625rem;
  overflow: hidden;
  margin-bottom: 3.875rem;
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
.swiper-wrapp{
  height: 35.3125rem;
  width: 100%;
  text-align: center;
}
.index-main-wrap{
  width: 100%;
  background: #F7F7F7;
  border-radius: 25px 25px 0px 0px;
}

.tag-new-section{
  padding: 3.25rem 0 1.875rem 0;
}

.tag-rec-section{
    margin-bottom: 1.875rem;
}

.sales-section{
  padding-top: 6.4375rem;
}
.sales_swiper{
  height: 18.9375rem;
}
.swiper-wrapp-sales{
  height: 100%;
  width: 100%;
  padding: 0 1.5625rem;
  text-align: center;
}
.sales-slide{
  width: 100%;
  height: 100%;
  /*background-color: #FFFFFF;*/
}
.sales_title{
  padding-bottom: 2.5rem;
}
.sales-img{
  padding: 0;
  border-radius: 10px;
  height: 18.5rem;
  object-fit: cover;
  object-fit: cover;
}
.viewed{
  padding: 7.5rem 0 15rem 0;
}
.format{
  width: 100%;
  height: 31.25rem;
}
.format_brands{
  width: 100%;
  height: 18.75rem;
}

@media (max-width: 1279px) {
  .swiper-button-next::after{
    content: url("../img/arrow-next-sm.svg");
  }
  .swiper-button-prev::after{
    content: url("../img/arrow-prev-sm.svg");
  }
}

@media (max-width: 855px) {
  .swiper-wrapp{
    /*height: 32.3125rem;*/
  }
}

@media (max-width: 830px) {
  .swiper-wrapp{
    height: 33.3125rem;
  }
}

@media (max-width: 768px) {
  .swiper-wrapp{
    height: 25rem;
  }
  .offer-slide{
    height: 15rem;
  }
  .offer-section{
    height: 22rem;
  }
  .img-slide{
    padding: 0;
  }
  .swiper-button-next,
  .swiper-button-prev{
    display: none;
  }
  .swiper-pagination{
    display: none;
  }
  .offer-section>.swiper-pagination{
    display: flex;
  }
  .tag-new-section {
    padding: 2.25rem 0 1.875rem 0;
  }
  .swiper-wrapp-sales>.swiper-button-next{
    display: flex;
  }
  .swiper-wrapp-sales>.swiper-button-prev{
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
  .swiper-wrapp{
    height: 23rem;
  }
}

@media (max-width: 700px) {
  .swiper-wrapp{
    /*height: 22.625rem;*/
  }
}

@media (max-width: 690px) {
  .swiper-wrapp{
    height: 22rem;
  }
}

@media (max-width: 670px) {
  .swiper-wrapp{
    height: 21rem;
  }
}
@media (max-width: 630px) {
  .swiper-wrapp{
    height: 19rem;
  }
  .offer-slide{
    height: 12rem;
  }
  .offer-section{
    height: 19rem;
  }
}

@media (max-width: 590px) {
  .swiper-wrapp{
    /*height: 19.3125rem;*/
  }
  .offer-slide{
    height: 11.6875rem;
  }
  .swiper-wrapp-offer{
    height: 11.75rem;
  }
  .offer-section{
    height: 18.375rem;
  }

  .sales-img{
    height: 17.5rem;
  }
  .sales_swiper{
    height: 17.9375rem;
  }
}

@media (max-width: 576px) {
  .swiper-wrapp{
    margin-top: 2rem;
    height: 18rem;
  }
  .index_links {
    padding: 0 0 3rem 0;
  }
  .index_slider{
    margin-bottom: 1.5rem;
  }
  .index_links_ul{
    justify-content: space-evenly;
    margin-top: 1.5rem;
  }
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

@media (max-width: 550px){
  .sales-img{
    height: 16.5rem;
  }
  .sales_swiper{
    height: 16.9375rem;
  }
}

@media (max-width: 530px) {
  .swiper-wrapp{
    height: 17rem;
  }
  .offer-slide{
    height: 10.225rem;
  }
  .offer-section{
    height: 17rem;
  }

  .sales-img{
    height: 15.5rem;
  }
  .sales_swiper{
    height: 15.9375rem;
  }
}

@media (max-width: 510px) {
  .index_slider{
    margin-bottom: 1rem;
  }
  .index_links_ul{
    margin-top: 1rem;
  }
}

@media (max-width: 500px) {
  .swiper-wrapp{
    height: 16rem;
  }
  .swiper-wrapp-sales{
    padding: 0;
  }
  .swiper-wrapp-sales>.swiper-button-next{
    display: none;
  }
  .swiper-wrapp-sales>.swiper-button-prev{
    display: none;
  }
  .sales-img{
    height: 14.5rem;
  }
  .sales_swiper{
    height: 14.9375rem;
  }
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
  .swiper-wrapp{
    height: 15rem;
  }
  .offer-slide{
    height: 9.225rem;
  }
  .swiper-wrapp-offer{
    height: 10.8rem;
  }
  .offer-section{
    height: 16.375rem;
  }
  .sales-img{
    height: 13.3rem;
  }
  .sales_swiper{
    height: 13.7375rem;
  }
}

@media (max-width: 440px) {
  .swiper-wrapp{
    height: 14rem;
  }
  .offer-slide{
    height: 8.8rem;
  }
  .swiper-wrapp-offer{
    height: 10.4rem;
  }
  .offer-section{
    height: 15.5rem;
  }
  .sales-img{
    height: 12.5rem;
  }
  .sales_swiper{
    height: 12.9375rem;
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
  .sales-img{
    height: 13.5rem;
  }
  .sales_swiper{
    height: 13.9375rem;
  }
}

@media (max-width: 410px) {
  .swiper-wrapp{
    height: 13.5rem;
  }
  .offer-slide{
    height: 8rem;
  }
  .offer-section{
    height: 14.5rem;
  }

  .sales-img{
    height: 12.5rem;
  }
  .sales_swiper{
    height: 12.9375rem;
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

@media (max-width: 380px) {
  .swiper-wrapp {
    height: 13rem;
  }

  .sales-img{
    height: 11.5rem;
  }
  .sales_swiper{
    height: 11.9375rem;
  }
}

@media (max-width: 375px) {
  .index_links_ul {
    justify-content: space-around;
  }
  .swiper-wrapp {
    height: 12.5rem;
  }
  .index_links_ul-one{
    justify-content: center;
    margin-right: 2rem;
  }
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
  .swiper-wrapp {
    height: 12rem;
  }
  .sales-img{
    height: 10.5rem;
  }
  .sales_swiper{
    height: 10.9375rem;
  }
}

@media (max-width: 340px) {
  .swiper-wrapp {
    height: 11.5rem;
  }
}

@media (max-width: 330px) {
  .swiper-wrapp {
    height: 11rem;
  }
  .offer-slide{
    height: 6.7rem;
  }
  .swiper-wrapp-offer{
    height: 8.7rem;
  }
  .offer-section{
    height: 13rem;
  }
  .sales-img{
    height: 10rem;
  }
  .sales_swiper{
    height: 10.4375rem;
  }
}
</style>
