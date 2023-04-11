<template>
  <div class="card">
    <div class="card_body">
<!--      <div class="card_icons">-->
<!--        <IconsHeartIcon @click="addFavoriteProduct(productVariant.id)" :pressed="pressedFavorite" />-->
<!--        <IconsCompareIcon @click="addCompareProduct(productVariant.id)" :pressed="pressedCompare" />-->
<!--      </div>-->
      <div class="card-content">
        <nuxt-link :to="`/catalog/products/${productVariant.slug}`" prefetch>
          <div class="card_image">
            <div class="img-wrap">
              <nuxt-img class="lazy img-product" :src="config.public.baseUrl+productVariant.image" alt="ProductImage" loading="lazy"/>
            </div>
          </div>
       </nuxt-link>


      <div class="card-content_text">
          <nuxt-link :to="`/catalog/products/${productVariant.slug}`" prefetch>
            <div class="card_name">
              <h2 class="card_product_name">{{ productVariant.product_name }}</h2>
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
          <div class="card_status">
            <div class="card_status">
              <InStock v-if="productVariant.units_in_stock >= 20" />
              <NotMuchLeftInStock v-if="productVariant.units_in_stock < 20" />
              <NotInStock v-if="productVariant.units_in_stock === 0" />
            </div>
          </div>
          <div class="line"></div>
          <div class="product-icons">
            <IconsHeartIcon class="heart_wrap" @click="addFavoriteProduct(productVariant)" :pressed="pressedFavorite" /><span class="title_heart">В избранное</span>
            <IconsDeleteIcon @click="removeProduct(productVariant)" /><span class="title_heart">Удалить</span>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="quantity-wrap">
          <div class="remove" @click="reduceQuantity(product_variant)">–</div>
          <div class="quantity">{{ quantity }}</div>
          <div class="add" @click="increaseQuantity(product_variant)">+</div>
        </div>
        <div class="card_price">
          <h2 class="price_title">{{ priceFormat(productVariant.price) }}&nbsp;₽</h2>
          <h2 class="old_price_title">{{ priceFormat(productVariant.old_price) }}&nbsp;₽</h2>
        </div>
      </div>

    </div>

  </div>
</template>

<script setup>
import {useBasketProductsStore} from "../stores/BasketProductsStore";
import {useFavoriteProductStore} from "../stores/FavoriteProductStore";
import {useUserStore} from "../stores/UserStore";

import {computed, ref, onMounted} from "vue";

const config = useRuntimeConfig();

const props = defineProps({
  product_variant: Object
});
let productVariant = props.product_variant;
// const pressedFavorite = computed(() => useFavoriteProductStore().getFavoriteProducts().value.indexOf(props.productVariant.id) !== -1);
// const pressedFavorite = ref(useFavoriteProductStore().getFavoriteProducts().value.indexOf(productVariant.id) !== -1);
const pressedFavorite = computed(() => useFavoriteProductStore().checkProduct(props.product_variant))

const urlBasket = computed(() => config.public.apiBaseUrl + `baskets/${useUserStore().getUser().value.id}`);
const urlFavorite = computed(() => config.public.apiBaseUrl + `favorites/${useUserStore().getUser().value.id}`);

const emit = defineEmits(['delete', 'editQuantity', 'deleteUserProduct']);


const addFavoriteProduct = (product) => {
  if  (useUserStore().getUser().value){
    if (pressedFavorite.value === false) {
      pressedFavorite.value = true;
      favoriteCreateFormRequest(product.id).then((res) => {
        useFavoriteProductStore().pushProduct(product);
        useFavoriteProductStore().needUpdate = true;
      }).catch((err) => {
        pressedFavorite.value = false;
        console.error('Contact form could not be send', err)
      });
    }
    else{
      favoriteDeleteFormRequest(product.id).then((res) => {
        useFavoriteProductStore().removeProduct(product);
        pressedFavorite.value = false;
        // emit('deleteUserProduct');
      }).catch((err) => {
        console.error('Contact form could not be send', err);
      });
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

const removeProduct = (product) => {
  if (useUserStore().getUser().value){
    basketDeleteFormRequest(product).then((res) => {
      console.log(res);
      useBasketProductsStore().removeProduct(product);
      emit('deleteUserProduct');
    }).catch((err) => {
      console.error('Contact form could not be send', err);
    });
  }
  else{
    useBasketProductsStore().removeProduct(product);
    emit('delete');
  }
};


const quantity = ref(props.product_variant.quantity);

const increaseQuantity = (product) =>{
  quantity.value++;
  if (useUserStore().getUser().value){
    basketUpdateFormRequest(product, quantity.value).then((res) => {
      console.log(res);
      emit('editQuantity');

    }).catch((err) => {
      console.error('Contact form could not be send', err);
    });
  }
  else {
    useBasketProductsStore().removeProduct(product);
    product.quantity = quantity.value;
    useBasketProductsStore().pushProduct(product);
    emit('editQuantity');
  }
}

const reduceQuantity = (product) =>{
  if (quantity.value >= 2){
    quantity.value--;
    if (useUserStore().getUser().value){
      basketUpdateFormRequest(product, quantity.value).then((res) => {
        console.log(res);
        emit('editQuantity');
      }).catch((err) => {
        console.error('Contact form could not be send', err);
      });
    }
    else {
      useBasketProductsStore().removeProduct(product);
      product.quantity = quantity.value;
      useBasketProductsStore().pushProduct(product);
      emit('editQuantity');
    }
  }
}

const basketUpdateFormRequest = async (product, quantity) => {
  return await $fetch(urlBasket.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      product_id: product.id,
      quantity: quantity,
    },
  });

}

const basketDeleteFormRequest = async (product) => {
  return await $fetch(urlBasket.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'DELETE',
    params: {
      product_id: product.id,
    },
  });
}

const favoriteCreateFormRequest = async (product_id) => {
  return await $fetch(urlFavorite.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      product_id: product_id,
    },
  });
}

const favoriteDeleteFormRequest = async (product_id) => {
  return await $fetch(urlFavorite.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'DELETE',
    params: {
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
.card{
  width: 100%;
  /*height: 31.25rem;*/
  background: #FFFFFF;
  margin-bottom: 2.875rem;
  border-radius: 6px;
  transition: all .3s ease;
}
.card_body{
  display: flex;
  padding: 1.25rem;
  justify-content: space-between;
}
.card-content{
  cursor: default;
  display: flex;
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
  height: .9375rem;
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
  height: 10r1.5625rem;
  width: 10rem;
}
.card_product_name{
  color: #1A1A25;
  font-weight: 400;
  font-family: 'Inter', sans-serif;
  font-size: 1.125rem;
  line-height: 1.5625rem;
  cursor: pointer;
}
.stock-status{
  margin-bottom: .625rem;
}
.card-footer{
  display: flex;
  flex-direction: row;
  align-items: center;
}
.price_title{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 1.125rem;
  line-height: 1.375rem;
  color: #1A1A25;
  margin-bottom: 5px;

}
.old_price_title{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
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

@media (max-width: 785px) {
  .title_heart,
  .title_compare{
    padding-left: .5rem;
    line-height: 2.5rem;
  }
  .title_heart{
    padding-right: .75rem;
  }
}

@media (max-width: 768px) {
  .title_heart,
  .title_compare{
    display: none;
  }
  .heart_wrap{
    margin-right: 1rem;
  }
  .card_rating{
    margin: 8px 0;
    margin-bottom: 4px;
  }
  .img-wrap{
    width: 10rem;
  }
  .card-footer{
    flex-direction: column;
    justify-content: center;
    margin-left: 2rem;
  }
  .quantity-wrap{
    margin-right: 0;
    margin-bottom: 1rem;
  }
  .card_product_name,
  .price_title,
  .old_price_title,
  .quantity{
    font-size: 1.375rem;
  }
  .quantity-wrap{
    margin-bottom: 1.25rem;
  }
  .rating_title {
    font-size: .9rem;
  }
  .remove,
  .add{
    width: 2.325rem;
    height: 2.325rem;
    font-size: 1.25rem;
  }
  .card{
    width: 80%;
  }
}
@media (max-width: 700px) {
  .card{
    width: 90%;
  }
}
@media (max-width: 600px) {
  .card{
    width: 100%;
  }
}
@media (max-width: 425px) {
  /*.card_rating{*/
  /*  margin: 4px 0;*/
  /*}*/
  /*.img-wrap{*/
  /*  width: 10rem;*/
  /*}*/
  /*.card_product_name,*/
  /*.price_title,*/
  /*.old_price_title,*/
  /*.quantity{*/
  /*  font-size: 1.225rem;*/
  /*}*/
  /*.quantity-wrap{*/
  /*  margin-bottom: 1rem;*/
  /*}*/
  /*.rating_title {*/
  /*  font-size: .75rem;*/
  /*}*/
  /*.remove,*/
  /*.add{*/
  /*  width: 2rem;*/
  /*  height: 2rem;*/
  /*  font-size: 1rem;*/
  /*}*/
}
@media (max-width: 368px) {
  .card_body{
    flex-direction: column;
  }
  .card-footer{
    flex-direction: row;
    margin-top: 1.875rem;
  }
  .quantity-wrap{
    margin-right: 1.75rem;
  }
}
</style>