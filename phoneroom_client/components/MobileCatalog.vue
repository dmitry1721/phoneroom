<template>
  <section v-if="openCatalog === true"  class="catalog-section">
    <div v-if="pending">
      <div class="container">
        <section class="wrapper-pen">
          <article class="article">
            <div class="bg">
              <div class="icons">
                <div class="icon-2 icon-2-2 i1"></div>
              </div>
              <div class="icons">
                <div class="icon-2 icon-2-2"></div>
              </div>
            </div>
          </article>
        </section>
      </div>
    </div>
    <div v-else class="catalog" :closeCat="closeCatalog">
      <div class="container catalog-wrapp">
        <div class="mob-catalog_top">
          <div class="header-main_city city">
            <h2 class="city_title" v-if="userCity" @click="toggleShowChoiceCity">{{ userCity }}</h2>
            <h2 class="city_title" v-if="ipInfoCity && !userCity" @click="toggleShowChoiceCity">{{ ipInfoCity }}</h2>
            <h2 class="city_title" v-if="!ipInfoCity && !userCity" @click="toggleShowChoiceCity">Выбрать город</h2>
            <Transition name="fade">
              <component  @openCity="isOpenCity" :is="choiceCity ? SelectCity : 'div'" />
            </Transition>
            <nuxt-img class="city_icon" src="img/city_icon.svg" alt="city_icon"  loading="lazy"/>
          </div>
          <div class="header_right">
            <div class="dropdown" v-if="user">
              <button @mouseenter="showDropDown" class="dropbtn">{{ user.first_name }}</button>

              <div id="myDropdown" @mouseleave="unShowDropDown" class="dropdown-content" :class="{'show': show}">
                <div class="content_rec"></div>
                <span>
              <nuxt-link :to="`/profile`" class="link_profile">Личный кабинет</nuxt-link>
            </span>
                <span @click.prevent="logout">Выйти</span>
              </div>
            </div>
            <div v-else >
              <AuthModal>Войти</AuthModal>
            </div>
            <!--        <nuxt-link to="/" class="header_link">Войти</nuxt-link>-->
            <nuxt-img class="header_right_profile" sizes="md:100vw sm:100vw xs:100vw" src="img/profile-user.svg" alt="user-profile" loading="lazy" />
            <nuxt-img class="header_right_phone" sizes="md:100vw sm:100vw xs:100vw" src="img/phone.svg" alt="phone" loading="lazy" />
          </div>
          <div class="modal_close" @click="toggleShow"></div>
        </div>
        <div class="mob-catalog_search" @submit="toggleShow">
          <Search />
        </div>
        <div class="mob-catalog_body">
          <h2 class="title mob-catalog_title">Каталог</h2>
          <ul class="catalog_ul">
            <div v-for="(categoryMain, idx) in categories.data">
              <div v-if="categoryMain.parent_id === null" >
                <div>
                  <li class="catalog_li" @click="openSub(categoryMain.id, categoryMain.name)">
                    <nuxt-link @click="toggleShow"
                               v-if="checkSubCategories(categoryMain.id)"
                               :to="`/catalog/${categoryMain.slug}`"
                               class="catalog_link title_catalog">
                      {{ categoryMain.name }}
                    </nuxt-link>
                    <div @click="toggleShow"
                         v-else
                         class="catalog_link title_catalog">
                      {{ categoryMain.name }}
                    </div>
                    <div v-if="checkSubCategories(categoryMain.id)" class="catalog-arrow">
                      <svg id="arrow" class="arrow" width="17" height="7" viewBox="0 0 32 14" fill="none">
                        <path d="M1.5 12.5L16 1.5L30.5 12.5" stroke="#858FA4" stroke-width="2"/>
                      </svg>
                    </div>
                  </li>
                </div>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <transition name="slide-fade">
    <component @backToMobileCatalog="backToMobileCatalog" :subCategories="subCatalog" :categories="categories" :is="opensubCatalog ? MobileSubCatalog : 'span'" />
  </transition>
</template>

<script setup>
import {useUserStore} from "../stores/UserStore";
import {computed, resolveComponent} from "vue";

const userCity = computed(() => useUserStore().userCity);
const ipInfoCity = computed(() => useUserStore().ipInfoCity);

const emits = defineEmits(['closeMobileCatalog']);

const openCatalog = ref(true);
const opensubCatalog = ref(false);
const subCatalog = ref([]);
const openSub = (id, name) => {
  if (subCatalog.value.length){
    subCatalog.value = [];
  }
  opensubCatalog.value = !opensubCatalog.value;
  subCatalog.value.push(name);
  for (const category of categories.value.data) {
    if (category.parent_id === id){
      subCatalog.value.push(category);
      console.log(subCatalog.value);
    }
  }
};
const backToMobileCatalog = () => {
  if (subCatalog.value.length){
    subCatalog.value = [];
  }
  opensubCatalog.value = !opensubCatalog.value;
};
const checkSubCategories = (id) => {
  for (const category of categories.value.data) {
    if (category.parent_id === id){
      return true;
    }
  }
};

const closeCatalog = () => {
  openCatalog.value = false;
};
const config = useRuntimeConfig();
const urlCategories = config.public.apiBaseUrl + 'categories/';
// const emit = defineEmits(['open',]);

const MobileSubCatalog = resolveComponent('MobileSubCatalog');
const SelectCity = resolveComponent('SelectCity');

const {pending, data: categories} = await useLazyAsyncData('categories', () => $fetch(urlCategories));

const user = computed(() => useUserStore().getUser().value);
// onMounted(() => {
  user.value = useUserStore().getUser();
// })

const removeUser = () => {
  useUserStore().removeUser();
};
const choiceCity = ref(false);


const toggleShowChoiceCity = () => {
  choiceCity.value = true;
}

const isOpenCity = () => {
  choiceCity.value = !choiceCity.value;
}
const urlLogout = computed(() => config.public.apiBaseUrl + `users/logout/${useUserStore().getUser().value.id}`);

const logout = () => {
  logoutFormRequest().then((res) => {
    removeUser();
    console.log(res);
  }).catch((err) => {
    console.error('Contact form could not be send', err)
  });
};


const logoutFormRequest = async () => {
  return await $fetch(urlLogout.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'GET',
  });
};

const toggleShow = () => {
  openCatalog.value = false;
  emits('closeMobileCatalog');
}

const show = ref(false);
const showDropDown = () => {
  show.value = true;
};

const unShowDropDown = () => {
  show.value = false;
};
</script>

<style scoped>
html, body{
  overflow: hidden;
}
.mob-catalog_top{
  display: flex;
  justify-content: space-between;
}
.modal_close{
  display: inline-block;
  vertical-align: top;
}
.modal_close:before{
  content: '\2716';
  font-weight: 500;
  font-size: 2rem;
  color: #858FA4;
  cursor: pointer;
  opacity: .5;
  transition: all .3s ease;
}
.mob-catalog_search{
  margin-top: 1.25rem;
}
.catalog-section{
  position: absolute;
  /*width: 1920px;*/
  /*height: 751px;*/
  left: 0;
  top: 0;
  width: 100%;
  z-index: 999;
  height: 100vh;
  background: #2A2C38;
}
.mob-catalog_body{
  margin-top: 2rem;
}
.mob-catalog_title{
  color: #FFFFFF;
  margin-bottom: 1.225rem;
}
.catalog{
  display: flex;
  /*background: #FFFFFF;*/
  height: 100vh;
}
.catalog-wrapp{
  display: flex;
  flex-direction: column;
  height: 100%;
  padding-top: 1.5625rem;
  padding-bottom: 1.5625rem;
}
.city{
  display: flex;
  align-items: center;
  /*visibility: hidden;*/
}
.city_title{
  font-weight: 400;
  font-size: 0.875rem;
  color: #858FA4;
  margin: 0 5px 0 .625rem;
  line-height: 1.25rem;
  padding-bottom: 1px;
  transition: all .3s ease;
  cursor: pointer;
}
.city_title:hover{
  text-decoration-line: underline;
  transition: all .3s ease;
}
.header_right{
  font-weight: 500;
  display: flex;
  align-items: center;
}
.header_right_profile{
  padding-left: 0.875rem;
  cursor: pointer;
  padding-right: 1.75rem;
}
.header_right_phone{
  padding-right: 5px;
  cursor: pointer;
}
.catalog-arrow{
  transform: rotate(90deg);
}
.dropbtn {
  color: #fff;
  transition: all .3s ease;
  cursor: pointer;
}
.dropbtn:hover{
  color: #BABAC0;
  transition: all .3s ease;
}
.dropdown {
  position: relative;
  display: inline-block;
  transition: all .3s ease;
}

.dropdown-content {
  display: none;
  position: absolute;
  min-width: 11.25rem;
  margin-top: 5px;
  overflow: auto;
  background: #FFFFFF;
  box-shadow: 0 .625rem 1.875rem rgba(133, 143, 164, 0.1);
  border-radius: 5px;
  z-index: 1;
}
.content_rec{
  width: 0.84375rem;
  position: absolute;
  top: -9px;
  height: 9px;
  z-index: 1;
  background: #FFFFFF;
  box-shadow: 0 1.625rem 1.875rem rgba(133, 143, 164, 0.1);
}
.dropdown-content span {
  color: #1A1A25;
  padding: 1rem;
  text-decoration: none;
  display: block;
  cursor: pointer;
}

.dropdown span:hover {background-color: #f7f7f7;}

.show {
  display: block;
  transition: all .3s ease;
}
.catalog_titles{
  /*flex: 26%;*/
  /*background: #f7f7f791;*/
  padding-top: 2rem;
  /*height: 80vh;*/
  /*overflow: scroll;*/
  overflow-x: hidden;
}
.catalog_titles::-webkit-scrollbar{
  width: 3px;
  position: relative;
  z-index: -1;
  background-color: #BABAC0;
  border-radius: 8px;
  overflow: hidden;
}
.catalog_subtitles{
  flex: 74%;
  display: flex;
  padding: 0 4rem;
  flex-wrap: wrap;
  height: 80vh;
  width: 100%;
  overflow-x: hidden;
}
.catalog_subtitles::-webkit-scrollbar{
  width: 3px;
  position: relative;
  z-index: -1;
  background-color: #BABAC0;
  border-radius: 8px;
  overflow: hidden;
}

/*.category_title{*/
/*  padding: 2.5rem 0;*/
/*}*/
.catalog_ul{
  text-decoration: none;
  width: 100%;
}
.title_catalog{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 1.125rem;
  line-height: 1.1875rem;
  color: #1A1A25;
  cursor: pointer;
}
.title_all{
  color: #2e2e48;
}
.catalog_link{
  display: flex;
  transition: all .3s ease;
  color: #FFFFFF;
  align-items: center;
}
.catalog_link:hover{
  transition: all .3s ease;
  color: #E31235;
}
.hoverLink{
  transition: all .3s ease;
  color: #E31235;
}
.catalog_li{
  margin-bottom: .5rem;
  padding: 1.1rem .625rem;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  background: rgba(56, 66, 85, 0.5);
  transition: all .3s ease;
}
.catalog_li:hover{
  background: rgba(56, 66, 85, 1);
  transition: all .3s ease;
}
/*.catalog_li:hover a{*/
/*  transition: all .3s ease;*/
/*  color: #E31235;*/
/*}*/
.hoverLi{
  background: #FFFFFF;
  border-right: 3px solid #E31235;
  transition: background .3s ease;
}
.sub-category{
  /*flex: 33.3%;*/
  margin-right: 6.25rem;
  padding: 2.6rem 0;
}
.category_li{
  margin-top: 1.25rem;
  cursor: pointer;
}
.category_link{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 1rem;
  line-height: 1.1875rem;
  color: #333333;
  opacity: .8;
  transition: all .1s ease;
}
.category_link:hover{
  opacity: 1;
  transition: all .1s ease;
}
.link_profile{
  color: #E31235;
}

.wrapper-pen{
  padding: 2rem 0;
}

.article {
  width: 100%;
  background: #2A2C38;
  padding: 0;
  margin-right: 0;
}
.mask{
  background: #2A2C38;
}
.icons{
  border-bottom: solid 3.3125rem #2A2C38;
}
.icons:last-child{
  border-bottom: solid 10.3125rem #2A2C38;
}
.icon-2{
  width: 24.25rem;
  height: 37.625rem;
  border-radius: .625rem;
  box-shadow: .3125rem .625rem .3125rem .9375rem #2A2C38, .625rem -.625rem .3125rem #2A2C38, -.625rem .625rem .3125rem #2A2C38, -.625rem -.625rem .3125rem #2A2C38;
}
.bg{
  background: linear-gradient(to right, #00000063 8%, #ffffff 18%, #00000063 33%);
}
.icon-2-2{
  width: 100%;
  height: 60vh;
  /*background: #384255f2;*/
  background: #303847fa;
  box-shadow: .3125rem 2rem .3125rem .9375rem #2A2C38, .625rem -.625rem .3125rem #2A2C38, -.625rem 1.625rem .3125rem #2A2C38, -.625rem -.625rem .3125rem #2A2C38;
}
.i1{
  height: 10vh;
}
</style>