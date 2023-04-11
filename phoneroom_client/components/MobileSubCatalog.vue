<template>
  <section v-if="openSubCatalog === true" class="catalog-section">
    <div class="catalog">
      <div class="container catalog-wrapp">
        <div class="mob-catalog_top">
          <div class="header-main_city city">
            <h2 class="city_title" @click.prevent="backToMobileCatalog">Назад</h2>
          </div>
        </div>
        <div class="mob-catalog_body">
          <h2 class="title mob-catalog_title">{{ props.subCategories[0] }}</h2>
          <ul class="catalog_ul">
            <div v-for="(categoryMain, idx) in props.subCategories">
              <span v-if="checkChildren(categoryMain.id)">
                <li class="catalog_li2" @click="openSub(categoryMain.id, categoryMain.name)">
                  <nuxt-link @click="backToMobileCatalog"
                             :to="`/catalog/${categoryMain.slug}`"
                             class="catalog_link title_catalog">
                    {{ categoryMain.name }}
                  </nuxt-link>
                  <div class="catalog-arrow">
                    <svg id="arrow" class="arrow" width="17" height="7" viewBox="0 0 32 14" fill="none">
                      <path d="M1.5 12.5L16 1.5L30.5 12.5" stroke="#858FA4" stroke-width="2"/>
                    </svg>
                  </div>
                </li>
              </span>
              <span v-else class="cat-item">
                <div v-if="idx !== 0">
                  <div class="line"></div>
                  <li class="catalog_li">
                    <nuxt-link @click="backToMobileCatalog"
                               :to="`/catalog/${categoryMain.slug}`"
                               class="catalog_link title_catalog">
                      {{ categoryMain.name }}
                    </nuxt-link>
                  </li>
                </div>
              </span>

            </div>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <transition name="slide-fade">
    <component :subCategories="subCatalog" :categories="categories" :is="opensubCatalog ? MobileSubCatalog : 'span'" />
  </transition>
</template>

<script setup>
import {resolveComponent} from "vue";

const openSubCatalog = ref(true);
const openCatalog = ref(true);
const props = defineProps({
  subCategories: Object,
  categories: Object,
});
const opensubCatalog = ref(false);
const MobileSubCatalog = resolveComponent('MobileSubCatalog');

const subCatalog = ref([]);
const openSub = (id, name) => {
  if (subCatalog.value.length){
    subCatalog.value = [];
  }
  opensubCatalog.value = !opensubCatalog.value;
  subCatalog.value.push(name);
  for (const category of props.categories.value.data) {
    if (category.parent_id === id){
      subCatalog.value.push(category);
      console.log(subCatalog.value);
    }
  }

};

const emits = defineEmits(['backToMobileCatalog',])
const backToMobileCatalog = () => {
  openSubCatalog.value = false;
  emits('backToMobileCatalog');
};
const toggleShow = () => {
  openCatalog.value = !openCatalog.value;
}
console.log(props.categories.data);
const hasChildren = ref(false);

const checkChildren = (id) => {
  for (const category of props.categories.data) {
    if (category.parent_id === id){
      return true
    }
  }
  return false
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
  margin-bottom: 1.25rem;
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
  font-size: 1rem;
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
  display: inline-block;
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
  /*padding-bottom: .5rem;*/
  padding: 1.1rem .625rem;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  /*background: rgba(56, 66, 85, 0.5);*/
  transition: all .3s ease;
}
.cat-item{
  margin-bottom: .5rem;

}
.catalog_li2{
  margin-bottom: .5rem;
  padding: 1.1rem .625rem;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  background: rgba(56, 66, 85, 0.5);
  transition: all .3s ease;
}
.catalog_li2:hover{
  background: rgba(56, 66, 85, 1);
  transition: all .3s ease;
}
/*.catalog_li:hover{*/
/*  background: #FFFFFF;*/
/*  border-right: 2px solid #E31235;*/
/*  transition: background .3s ease;*/
/*}*/
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

</style>