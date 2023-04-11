<template>
  <div class="compare-section">
    <div v-if="0">
      <div class="container">
        Loading...
      </div>
    </div>
    <div v-else>
      <div class="container">
        <Breadcrumbs :name="{title: 'Сравнение', to: '/comparison'}"/>
        <div class="title_wrapp">
          <h1 class="title">Сравнение</h1>
        </div>
      </div>
      <div class="line"></div>
      <div class="index-main-wrap">
        <section class="section-compare">
          <div class="container container-comparison">
            <div class="buttons">
              <div v-for="category in categories">
                <div @click="addOpenCategory(category)">
                  <div class="category_btn"
                       :class="{'category_btn-max': category.length > 20, 'active': openCategory === category}">{{ category }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="cards-section">
            <div class="container cards-section-wrapp">
              <div class="cards" v-if="hasUser" v-for="product in products">
                <div v-if="pending">
                  <section class="wrapper-pen">
                    <article class="article">
                      <div class="bg">
                        <div class="icons">
                          <div class="icon-2 icon-2-2"></div>
                        </div>
                      </div>
                    </article>
                  </section>
                </div>
                <div v-else>
                  <div v-if="product.published === true && openCategory === product.category">
                    <ProductCompareCard @deleteUserProduct="updateUserProducts" :product_variant="product" ></ProductCompareCard>
                  </div>
                </div>
              </div>
              <div class="cards" v-else v-for="product in products">
                <div v-if="product.published === true && (openCategory === product.category_name || openCategory === product.category)">
                  <ProductCompareCard @updateComparison="updateComparison" @deleteUserProduct="updateUserProducts" :product_variant="product" ></ProductCompareCard>
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
import {useCompareProductStore} from "../stores/CompareProductStore";
import ProductCompareCard from "../components/ProductCompareCard";
import {computed, ref, onBeforeUpdate, onBeforeMount} from "vue";
import {useFavoriteProductStore} from "../stores/FavoriteProductStore";
import {useBasketProductsStore} from "../stores/BasketProductsStore.js";

const config = useRuntimeConfig();

const user = computed(() => useUserStore().getUser().value);
const hasUser = ref();
onBeforeMount(() => {
  hasUser.value = useUserStore().getUser().value;
});
const products = ref(useCompareProductStore().getCompareProducts().value);
// const products = computed(() => useCompareProductStore().compareProducts);
// const products = ref(useCompareProductStore().getCompareProducts().value);

const openCategory = ref();
const pending = ref(true);

const addOpenCategory = (category) => {
  openCategory.value = category
  if (user.value){
    compareGetCategoryFormRequest(openCategory.value).then((res) => {
      products.value = res;
      console.log(products.value);
      // checkCategory();
    }).catch((err) => {
      console.error('Contact form could not be send', err);
    });
  }
};

const categories = ref([]);

onBeforeUpdate(() => {
  if (user.value){
    if (useCompareProductStore().needUpdate){
      pending.value = true;
      compareGetFormRequest().then((res) => {
        pending.value = false;
        products.value = res;
        checkCategoryUser();
        addOpenCategory(openCategory.value);
      }).catch((err) => {
        console.error('Contact form could not be send', err);
      });
      useCompareProductStore().needUpdate = false;
    }
  }
  else{
    updateComparison();
  }
});
const updateComparison = () => {
  products.value = useCompareProductStore().getCompareProducts().value;
  console.log(products.value);
  for (const product of products.value) {
    if (product.category_name){
      if (categories.value.indexOf(product.category_name) === -1){
        categories.value.push(product.category_name);
      }
    }
    else{
      if (categories.value.indexOf(product.category) === -1){
        categories.value.push(product.category);
      }
    }
  }
  // addOpenCategory(openCategory.value);
};
onBeforeMount(() => {
  openCategory.value = '';
  if (user.value){
    pending.value = true;
    compareGetFormRequest().then((res) => {
      products.value = res;
      pending.value = false;
      checkCategoryUser();
      addOpenCategory(openCategory.value);
    }).catch((err) => {
      console.error('Contact form could not be send', err);
    });
  }
  else{
    products.value = useCompareProductStore().getCompareProducts().value;
    console.log(products.value);
    checkCategory();
  }
});

const checkCategory = () => {
  for (const product of products.value) {
    if (product.category_name){
      if (categories.value.indexOf(product.category_name) === -1){
        categories.value.push(product.category_name);
      }
    }
    else{
      if (categories.value.indexOf(product.category) === -1){
        categories.value.push(product.category);
      }
    }
  }
  openCategory.value = categories.value[0] ? categories.value[0]:'';
};

const checkCategoryUser = () => {
  for (const product of products.value) {
    if (categories.value.indexOf(product.category) === -1){
      categories.value.push(product.category);
    }
  }
  openCategory.value = categories.value[0] ? categories.value[0]:'';
};

const updateUserProducts = () => {
  pending.value = true;
  openCategory.value = '';
  compareGetFormRequest().then((res) => {
    products.value = res;
    pending.value = false;
    checkCategoryUser();
    addOpenCategory(openCategory.value);
  }).catch((err) => {
    console.error('Contact form could not be send', err);
  });
};

const urlCompare = computed(() => config.public.apiBaseUrl + `compares/${useUserStore().getUser().value.id}`);
const urlCompareCategory = computed(() => config.public.apiBaseUrl + `compares/category/${useUserStore().getUser().value.id}`);

const compareGetFormRequest = async () => {
  return await $fetch(urlCompare.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'GET'
  });
}

const compareGetCategoryFormRequest = async (category_id) => {
  return await $fetch(urlCompareCategory.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'GET',
    params: {
      category_id: category_id,
    },
  });
}

</script>

<style scoped>
.section-compare{
  display: flex;
  margin-top: 3.5rem;
  padding-top: 2rem;
  /*height: 100vh;*/
  flex-direction: column;
  background: #F7F7F7;
  border-radius: 25px 25px 0px 0px;
}
.buttons{
  display: flex;
  flex-wrap: wrap;
  margin-bottom: 2rem;
}
.container-comparison{
  display: flex;
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
  flex-direction: column;
  margin-bottom: 38rem;
  background-color: #FFFFFF;
  /*padding: 3.125rem 0;*/
  overflow: auto;
}
.category_btn{
  display: flex;
  width: 10rem;
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
  margin-bottom: 1rem;
  opacity: 0.8;
  margin-right: 1.5rem;
}
.category_btn:hover{
  transition: all .3s ease;
  opacity: 1;
  cursor: pointer;
}
.category_btn.active{
  background-color: #E31235;
  transition: all .3s ease;
  border: none;
  opacity: 1;
  color: #FFFFFF;
}
.category_btn-max{
  display: flex;
  width: 18rem;
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
  margin-right: 1.5rem;
}
.category_btn-max:hover{
  transition: all .3s ease;
  opacity: 1;
  cursor: pointer;
}
.category_btn-max.active{
  background-color: #E31235;
  opacity: 1;
  transition: all .3s ease;
  border: none;
  color: #FFFFFF;
}
.cards-section-wrapp{
  display: flex;
}
.cards{
  margin-right: 1.875rem;
  border: none;
}
.cards:last-child{
  margin-right: 0;
}

.wrapper-pen{
  padding: 2rem 0;
  width: 100vh;
}

.article {
  width: 100%;
  background: white;
  padding: 0;
  margin-right: 0;
}
.mask{
  background: white;
}
.icons{
  border-bottom: solid 10.3125rem white;
}
.icon-2{
  width: 24.25rem;
  height: 37.625rem;
  border-radius: .625rem;
  box-shadow: .3125rem .625rem .3125rem .9375rem white, .625rem -.625rem .3125rem white, -.625rem .625rem .3125rem white, -.625rem -.625rem .3125rem white;
}
.icon-2-2{
  width: 100%;
  height: 100vh;
  box-shadow: .3125rem 2rem .3125rem .9375rem white, .625rem -.625rem .3125rem white, -.625rem 1.625rem .3125rem white, -.625rem -.625rem .3125rem white;
}
</style>