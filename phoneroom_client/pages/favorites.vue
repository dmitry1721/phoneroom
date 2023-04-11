<template>
  <div class="favorites-section">
    <div v-if="0">
      <div class="container">
        Loading...
      </div>
    </div>
    <div v-else>
      <div class="container">
        <Breadcrumbs :name="{title: 'Избранное', to: '/favorites'}"/>
        <div class="title_wrapp">
          <h1 class="title">Избранное</h1>
        </div>
      </div>
      <div class="line"></div>
      <div class="index-main-wrap">
        <section class="section-favorites">
          <div class="container container-favorities">
            <div class="buttons">
              <nuxt-link to="/favorites">
                <Button :width_btn="7" :height_btn="2.5">Избранное</Button>
              </nuxt-link>
              <nuxt-link to="/basket">
                <div class="basket_to_favorites">Товары в корзине</div>
              </nuxt-link>
            </div>
            <div class="cards-section">
              <div class="cards" v-for="product in products">
                <div v-if="product.published === true">
                  <ProductCard @deleteUserProduct="updateUserProducts" :product_variant="product" ></ProductCard>
                </div>
              </div>
            </div>
          </div>

        </section>
      </div>
    </div>
  </div>
</template>

<script setup>
import {useUserStore} from "../stores/UserStore";
import {useFavoriteProductStore} from "../stores/FavoriteProductStore";
import {useBasketProductsStore} from "../stores/BasketProductsStore";
import {computed, onMounted, ref, onBeforeUpdate} from "vue";

const config = useRuntimeConfig();

const user = computed(() => useUserStore().getUser().value);
const products = computed(() => useFavoriteProductStore().favoriteProducts);
// const products = ref(useFavoriteProductStore().getFavoriteProducts().value);
const urlFavorite = computed(() => config.public.apiBaseUrl + `favorites/${useUserStore().getUser().value.id}`);
const pending = ref(true);

onBeforeUpdate(() => {
  if (user.value){
    if (useFavoriteProductStore().needUpdate){
      console.log(132);
      pending.value = true;
      favoriteGetFormRequest().then((res) => {
        pending.value = false;
        products.value = res;
      }).catch((err) => {
        console.error('Contact form could not be send', err);
      });
      useFavoriteProductStore().needUpdate = false;
    }
  }
});

onMounted(() => {
  if (user.value){
    pending.value = true;
    favoriteGetFormRequest().then((res) => {
      pending.value = false;
      products.value = res;
    }).catch((err) => {
      console.error('Contact form could not be send', err);
    });
  }
  else{
    products.value = useFavoriteProductStore().getFavoriteProducts().value;
  }
});

const updateUserProducts = () => {
  pending.value = true;
  favoriteGetFormRequest().then((res) => {
    pending.value = false;
    products.value = res;
  }).catch((err) => {
    console.error('Contact form could not be send', err);
  });
};

const favoriteGetFormRequest = async () => {
  return await $fetch(urlFavorite.value , {
      headers: {
        'Authorization': `Bearer ${useUserStore().getToken().value}`,
        "Accept": "application/json",
        'Content-Type': 'application/json',
      },
      method: 'GET',
    }
  )
};
</script>

<style scoped>
.section-favorites{
  /*height: 100vh;*/
  margin-top: 3.5rem;
  padding-top: 2rem;
  background: #F7F7F7;
  border-radius: 25px 25px 0px 0px;
}
.buttons{
  display: flex;
  margin-bottom: 3rem;
}
.container-favorities{
  display: flex;
  flex-direction: column;
}
.basket_to_favorites{
  display: flex;
  width: 12.125rem;
  height: 2.5rem;
  justify-content: center;
  font-size: 0.875rem;
  font-weight: 700;
  font-family: 'Inter', sans-serif;
  align-items: center;
  transition: all .3s ease;
  background-color: #FFFFFF;
  border: 1px solid #384255;
  border-radius: 4px;
  color: #384255;
  opacity: 0.8;
  margin-left: 1.5rem;
}
.basket_to_favorites:hover{
  transition: all .3s ease;
  opacity: 1;
  cursor: pointer;
}
.cards-section{
  display: flex;
  flex-direction: row;
  margin-bottom: 25rem;
  flex-wrap: wrap;
}
.cards{
  margin-bottom: 1.25rem;
  margin-right: 1.625rem;
}

@media (max-width: 690px) {
  .cards{
    margin-right: 0.875rem;
  }
}
@media (max-width: 660px) {
  .cards{
    margin-right: 0.225rem;
  }
}
@media (max-width: 640px) {
  .cards{
    margin-right: 4.625rem;
  }
}

@media (max-width: 540px) {
  .cards{
    margin-right: 2.625rem;
  }
  .cards-section{
    justify-content: space-between;
  }
}

@media (max-width: 500px) {
  .cards{
    margin-right: 2rem;
  }
}

@media (max-width: 475px) {
  .cards{
    margin-right: 0rem;
    margin-bottom: 2.25rem;
  }
}
@media (max-width: 440px) {
  .cards{
    margin-right: -1rem;
    margin-bottom: 1.25rem;
  }
}
@media (max-width: 424px) {
  .cards{
    margin-right: 0rem;
  }
}
@media (max-width: 400px) {
  .cards{
    margin-right: -1.125rem;
  }
}
@media (max-width: 390px) {
  .cards{
    margin-right: 1rem;
  }
  .cards-section{
    flex-wrap: nowrap;
    overflow: auto;
  }
}
</style>