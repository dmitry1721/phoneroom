<template>
  <div class="card">
    <div class="card_body">
      <div class="card-content">
        <nuxt-link :to="`/catalog/products/${props.product_variant.slug}`" prefetch>
          <div class="card_image">
            <div class="img-wrap">
              <nuxt-img class="lazy img-product" :src="`http://127.0.0.1:8000/${props.product_variant.image}`" alt="ProductImage" loading="lazy"/>
            </div>
          </div>
        </nuxt-link>

        <div class="card-content_text">
          <div class="card_icons">
            <IconsHeartIcon @click="addFavoriteProduct(props.product_variant)" :pressed="pressedFavorite" />
            <IconsCompareIcon @click="addCompareProduct(props.product_variant)" :pressed="pressedCompare" />
          </div>

          <div class="card_status">
            <div class="card_status">
              <InStock v-if="props.product_variant.units_in_stock >= 20" />
              <NotMuchLeftInStock v-if="props.product_variant.units_in_stock < 20" />
              <NotInStock v-if="props.product_variant.units_in_stock === 0" />
            </div>
          </div>
          <nuxt-link :to="`/catalog/products/${props.product_variant.slug}`" prefetch>
            <div class="card_name">
              <h2 class="card_product_name" v-if="props.product_variant.product_name.length >= 41 && windowWidth <= 370">{{ props.product_variant.product_name.slice(0, 40) }}...</h2>
              <h2 class="card_product_name" v-else>{{ props.product_variant.product_name }}</h2>
            </div>
          </nuxt-link>

          <div class="card_rating">
            <h4 class="rating_title">Рейтинг</h4>
            <div class="rating_body" v-if="windowWidth > 1280">
              <ClientOnly>
                <star-rating :star-size="12"
                             :rating="parseInt(props.product_variant.rating)"
                             :read-only="true"
                             :increment="0.5"
                             :padding="2"
                             :show-rating="false"
                             :round-start-rating="true"
                             :inline="true"
                             :rounded-corners="false"
                             inactive-color="#909CB5"
                             active-color="#F99808"
                             :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
              </ClientOnly>
            </div>
            <div class="rating_body" v-if="windowWidth <= 1280 && windowWidth > 1020">
              <ClientOnly>
                <star-rating :star-size="10"
                             :rating="parseInt(props.product_variant.rating)"
                             :read-only="true"
                             :increment="0.5"
                             :padding="2"
                             :show-rating="false"
                             :round-start-rating="true"
                             :inline="true"
                             :rounded-corners="false"
                             inactive-color="#909CB5"
                             active-color="#F99808"
                             :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
              </ClientOnly>
            </div>
            <div class="rating_body" v-if="windowWidth <= 1020">
              <ClientOnly>
                <star-rating :star-size="8"
                             :rating="parseInt(props.product_variant.rating)"
                             :read-only="true"
                             :increment="0.5"
                             :padding="2"
                             :show-rating="false"
                             :round-start-rating="true"
                             :inline="true"
                             :rounded-corners="false"
                             inactive-color="#909CB5"
                             active-color="#F99808"
                             :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
              </ClientOnly>
            </div>
          </div>

          <div class="card-footer">
            <div class="card_price">
              <h2 class="price_title">{{ priceFormat(props.product_variant.price) }} ₽</h2>
              <h2 class="old_price_title">{{ priceFormat(props.product_variant.old_price) }} ₽</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import {useFavoriteProductStore} from "../stores/FavoriteProductStore";
import {useCompareProductStore} from "../stores/CompareProductStore";
import {useBasketProductsStore} from "../stores/BasketProductsStore";
import {useUserStore} from "../stores/UserStore";

import {computed, ref, onMounted} from "vue";

const props = defineProps({
  product_variant: Object
});

const user = computed(() => useUserStore().getUser().value);
const config = useRuntimeConfig();

const pressedFavorite = computed(() => useFavoriteProductStore().checkProduct(props.product_variant))
const pressedCompare = computed(() => useCompareProductStore().checkProduct(props.product_variant));
const pressedBasket = computed(() => useBasketProductsStore().checkProduct(props.product_variant));

const addFavoriteProduct = (product) => {
  if  (user.value){
    if (pressedFavorite.value === false) {
      useFavoriteProductStore().pushProduct(product);
      pressedFavorite.value = true;
      favoriteCreateFormRequest(user.value.id, product.id)
          .then((res) => {
            console.log(res)
          }).catch((err) => {
        console.error('Contact form could not be send', err)
      });
    }
    else{
      useFavoriteProductStore().removeProduct(product);
      pressedFavorite.value = false;
    }
  }
  else{
    if (!pressedFavorite.value) {
      useFavoriteProductStore().pushProduct(product);
      pressedFavorite.value = true;
    }
    else{
      useFavoriteProductStore().removeProduct(product);
      pressedFavorite.value = false;
    }
  }
};

const addCompareProduct = (product) => {
  if  (user.value){
    if (pressedCompare.value === false) {
      useCompareProductStore().pushProduct(product);
      pressedCompare.value = true;
      compareCreateFormRequest(user.value.id, product.id, product.category_id)
          .then((res) => {
            console.log(res)
          }).catch((err) => {
        console.error('Contact form could not be send', err)
      });
    }
    else{
      useCompareProductStore().removeProduct(product);
      pressedCompare.value = false;
    }
  }
  else{
    if (!pressedCompare.value) {
      useCompareProductStore().pushProduct(product);
      pressedCompare.value = true;
    }
    else{
      useCompareProductStore().removeProduct(product);
      pressedCompare.value = false;
    }
  }

};

const addProductToBasket = (product) => {
  if  (user.value){
    if (pressedBasket.value === false) {
      useBasketProductsStore().pushProduct(product);
      pressedBasket.value = true;
      basketCreateFormRequest(user.value.id, product.id).then((res) => {
        console.log(res)
      }).catch((err) => {
        console.error('Contact form could not be send', err)
      });
    }
  }
  else{
    if (pressedBasket.value === false) {
      useBasketProductsStore().pushProduct(product);
      pressedBasket.value = true;
    }

  }
};


const urlBasket = computed(() => config.public.apiBaseUrl + 'baskets/create');
const urlFavorite = computed(() => config.public.apiBaseUrl + 'favorites/create');
const urlCompare = computed(() => config.public.apiBaseUrl + 'compares/create');

const favoriteCreateFormRequest = async (user_id, product_id) => {
  return await $fetch(urlFavorite.value , {
    headers: {
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      user_id: user_id,
      product_id: product_id,
    },
  });
}
const compareCreateFormRequest = async (user_id, product_id, category_id) => {
  return await $fetch(urlCompare.value , {
    headers: {
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      user_id: user_id,
      product_id: product_id,
      category_id: category_id,
    },
  });
}

const basketCreateFormRequest = async (user_id, product_id) => {
  return await $fetch(urlBasket.value , {
    headers: {
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      user_id: user_id,
      product_id: product_id,
    },
  });
}

const priceFormat = (value) => {
  let res;
  value = String(value);
  (value.indexOf(',') != -1) ? res = new Intl.NumberFormat('ru-RU').format(value.replace(',', '.')).replace('.', ',') : res = new Intl.NumberFormat('ru-RU').format(value).replace(',', '.');

  return res;
};

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
.card-section{
  display: flex;
}
.card{
  /*width: 100%;*/
  flex: 33.3% 1 0;
  /*height: 31.25rem;*/
  background: #FFFFFF;
  margin-bottom: 2.875rem;
  border-radius: 6px;
  transition: all .3s ease;
}
.card_body{
  display: flex;
  padding: .75rem;
  justify-content: space-around;
  height: 13.125rem;
  /*padding-top: 0;*/
  border: 2px solid rgba(133, 143, 164, 0.2);
  border-radius: 5px;
  transition: all .3s ease;
  margin: 1rem 0;
}
.card_body:hover{
  box-shadow: 0 0 15px 1px rgba(51, 51, 51, 0.25);
  transition: all .3s ease;
}
.card-content{
  cursor: default;
  display: flex;
  align-items: center;
}
.card_image {
  margin-right: 1.25rem;
  vertical-align: center;
  cursor: pointer;
}
.card-content_text{
  display: flex;
  flex-direction: column;
}

.card_rating{
  cursor: default;
  margin: 8px 0;
  margin-bottom: .9375rem;
  height: .9375rem;
}
.card_icons{
  text-align: right;
  line-height: 0;
}
.card_status{
  line-height: 0;
}
.rating_title{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: .75rem;
  line-height: .9375rem;
  color: #858FA4;
  display: inline-block;
  vertical-align: text-top;
}
.rating_body{
  display: inline-block;
  vertical-align: text-bottom;
  margin-left: .625rem;
}
.img-wrap{
  position: relative;
  height: 10rem;
  width: 10rem;
}
.card_product_name{
  color: #1A1A25;
  font-weight: 700;
  font-family: 'Inter', sans-serif;
  font-size: 1.125rem;
  line-height: 1.5625rem;
  cursor: pointer;
}
.stock-status{
  margin-bottom: .625rem;
}
.card-footer{
  /*display: flex;*/
  /*flex-direction: row;*/
  /*align-items: center;*/
}
.price_title{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  display: inline-block;
  font-size: 1.125rem;
  line-height: 1.375rem;
  color: #1A1A25;
  margin-bottom: 5px;

}
.old_price_title{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  padding-left: .625rem;
  display: inline-block;
  font-size: 1.0625rem;
  line-height: 1.3125rem;
  color: #858FA4;
  text-decoration: line-through;
}
.quantity-wrap{
  display: flex;
  height: 2rem;
  margin-right: 1.875rem;
}
.quantity{
  display: flex;
  align-items: center;
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 1.125rem;
  line-height: 135.94%;
  color: #858FA4;
  padding: 0 .75rem;
}
.remove,
.add{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 1rem;
  line-height: 140%;
  width: 2rem;
  text-transform: lowercase;
  color: #384255;
  /*padding: 2px 10px 4px;*/
  border: 1px solid #909CB5;
  border-radius: 50px;
  cursor: pointer;
  display: flex;
  /*justify-content: center;*/
  /*flex-direction: column;*/
  align-items: center;
  justify-content: center;
  transition: all .3s ease;
}
.add:hover,
.remove:hover {
  background-color: #384255;
  opacity: .8;
  color: #FFFFFF;
  transition: all .3s ease;
}
.title_heart,
.title_compare{
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  color: #384255;
  padding-left: .75rem;
  vertical-align: text-bottom;
}
.title_heart{
  padding-right: .875rem;
}
.product-icons{
  display: flex;
  margin-top: .625rem;
  justify-content: end;
  align-items: center;
}

@media (max-width: 715px) {
  .card,
  .card_body{
    width: 28rem;
  }
}

@media (max-width: 605px) {
  .card,
  .card_body{
    width: 30rem;
  }
}

@media (max-width: 500px) {
  .card,
  .card_body{
    width: 29rem;
  }
}
@media (max-width: 410px) {
  .card,
  .card_body{
    width: 26rem;
  }
}
@media (max-width: 380px) {
  .card,
  .card_body{
    width: 26rem;
  }
}
@media (max-width: 370px) {
  .card,
  .card_body{
    width: 25rem;
  }
  .old_price_title{
    padding-left: 0.225rem;
  }
}
@media (max-width: 357px) {
  .card,
  .card_body{
    width: 24.5rem;
  }
}
@media (max-width: 357px) {
  .card,
  .card_body{
    width: 24rem;
  }
  .old_price_title{
    padding-left: 0;
    display: block;
  }
  .price_title{
    margin-bottom: 0;
  }
  .card_rating{
    margin: 2px 0;
    margin-bottom: 0.875rem;
  }
}
@media (max-width: 345px) {
  .card,
  .card_body{
    width: 23rem;
  }
  .card_rating{
    display: none;
    margin: 0 0;
    margin-bottom: 0.625rem;
  }
  .card_product_name{
    line-height: 1.25rem;
    margin-bottom: 0.875rem;
  }
}
@media (max-width: 330px) {
  .card,
  .card_body{
    width: 22.1rem;
  }
  .card_product_name{
    line-height: 1.25rem;
  }
  .stock-status{
    margin-top: .5rem;
  }
}
</style>