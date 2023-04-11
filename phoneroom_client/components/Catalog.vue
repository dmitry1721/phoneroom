<template>
  <section v-if="openCatalog === true" class="catalog-section">
    <div class="container">
      <div class="catalog">
        <div class="catalog_titles">
          <div v-if="pending">
            <section class="wrapper-pen">
              <article class="article">
                <div class="bg">
                  <div class="icons">
                    <div class="icon-2 icon-2-2 i1"></div>
                  </div>
                  <div class="icons">
                    <div class="icon-2 icon-2-2"></div>
                  </div>
                  <div class="icons">
                    <div class="icon-2 icon-2-2"></div>
                  </div>
                  <div class="icons">
                    <div class="icon-2 icon-2-2"></div>
                  </div>
                  <div class="icons">
                    <div class="icon-2 icon-2-2"></div>
                  </div>
                  <div class="icons">
                    <div class="icon-2 icon-2-2"></div>
                  </div>
                </div>
              </article>
            </section>
          </div>
          <ul v-else class="catalog_ul">
            <div v-for="(categoryMain, idx) in categories.data">
              <div v-if="categoryMain.parent_id === null" >
                <div v-if="idx === 0">
                  <li
                      :class="{hoverLi: hoverClassLi}"
                      class="catalog_li"
                      @mouseenter="hoverMainCategory(categoryMain.id)"
                      @mouseleave="hoverClassLi=false">
                    <nuxt-link @click="toggleShow"
                               :to="`/catalog/${categoryMain.slug}`"
                               :class="{hoverLink: hoverClassLink}"
                               class="catalog_link title_catalog"
                               @mouseover="addHover"
                               @mouseenter="hoverClassLink=true"
                               @mouseleave="hoverClassLink=false">{{ categoryMain.name }}</nuxt-link>
                  </li>
                </div>
                <div v-else>
                  <li
                      :id="idx"
                      class="catalog_li"
                      @mouseenter="hoverMainCategory(categoryMain.id)">
                    <nuxt-link @click="toggleShow"
                               :to="`/catalog/${categoryMain.slug}`"
                               @mouseover="addHover"
                               class="catalog_link title_catalog">{{ categoryMain.name }}</nuxt-link>
                  </li>
                </div>
              </div>
            </div>
          </ul>
        </div>
        <div class="catalog_subtitles">
          <div v-if="pending" style="width: 100%">
            <section class="wrapper-pen wrapper-pen-sub">
              <article class="article article-sub">
                <div class="bg bg-sub">
                  <div class="icons-sub">
                    <div class="icon-2 icon-2-2 icon-sub"></div>
                  </div>
                </div>
              </article>
            </section>
          </div>
          <div v-else v-for="categorySub in categories.data">
            <div v-if="categorySub.parent_id === currentMainCategory">
              <div class="sub-category">
                <div class="category_title">
                  <nuxt-link @click="toggleShow"
                             :to="`/catalog/${categorySub.slug}`"
                             class="title_catalog catalog_link"> {{ categorySub.name }}</nuxt-link>
                </div>
                <ul class="category_ul">
                  <div v-for="categoryBrand in categorySub.brands">
                    <li class="category_li">
                      <nuxt-link @click="toggleShow"
                                 :to="`/catalog/${categorySub.slug}?query=${categorySub.slug}&menu%5Bbrand%5D=${categoryBrand.name}`"
                                 class="category_link">{{ categoryBrand.name }}</nuxt-link>
                    </li>
                  </div>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const config = useRuntimeConfig();
const urlCategories = config.public.apiBaseUrl + 'categories/';
const emit = defineEmits(['open',]);

const openCatalog = ref(true);
const {pending, data: categories} = await useLazyAsyncData('categories', () => $fetch(urlCategories));
// const {pending, data: categories} = await useFetch(urlCategories});
const currentMainCategory = ref();

const hoverClassLi = ref(true);
const hoverClassLink = ref(true);
const hoverMainCategory = (id) => {
  currentMainCategory.value = categories.value.data[0].id;
  currentMainCategory.value = id;
  hoverClassLi.value = false;
  hoverClassLink.value = false;
}
const toggleShow = () => {
  openCatalog.value = !openCatalog.value;
  emit('open');
}

const addHover = ({target}) => {
  const div = target.parentElement.parentElement.parentElement.parentElement.parentElement;
  let catalogLi = div.querySelectorAll('.catalog_li');
  let catalogLink = div.querySelectorAll('.catalog_link');
  target.parentElement.classList.add('hoverLi');
  target.classList.add('hoverLink');
  for (let i = 0; i < catalogLi.length; i++) {
    if (target.parentElement.id === catalogLi[i].id){
      continue;
    }
    catalogLi[i].classList.remove('hoverLi');
    catalogLi[i].classList.remove('hoverLink');
    catalogLink[i].classList.remove('hoverLi');
    catalogLink[i].classList.remove('hoverLink');
  }
}

</script>

<style scoped>
html, body{
  overflow: hidden;
}
.catalog-section{
  position: absolute;
  /*width: 1920px;*/
  /*height: 751px;*/
  left: 0;
  top: 8.75rem;
  width: 100%;
  height: 100vh;
  background: rgba(26, 26, 37, 0.5);
}
.catalog{
  display: flex;
  background: #FFFFFF;
  height: 80vh;
}
.catalog_titles{
  flex: 26%;
  background: #f7f7f791;
  padding-top: 2rem;
  height: 80vh;
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
  font-size: 1rem;
  line-height: 1.1875rem;
  color: #1A1A25;
  cursor: pointer;
}
.title_all{
  color: #2e2e48;
}
.catalog_link{
  display: inline-block;
  width: 100%;
  transition: all .3s ease;
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
  margin-bottom: 1rem;
  padding: .6rem 3.25rem;
  cursor: pointer;
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


.wrapper-pen{
  padding: .6rem 3.25rem;
}

.article {
  /*width: 100%;*/
  background: #f7f7f791;
  padding: 0;
  margin-right: 0;
}
.mask{
  background: #f7f7f791;
}
.bg {
  animation-duration: 8s;
}
.icons{
  border-bottom: solid 3.3125rem #f7f7f7;
}
.icons:last-child{
  border-bottom: solid 10.3125rem #f7f7f7;
}
.icon-2{
  width: 100%;
  height: 37.625rem;
  border-radius: .625rem;
  box-shadow: .3125rem .625rem .3125rem .9375rem #f7f7f791, .625rem -.625rem .3125rem #f7f7f791, -.625rem .625rem .3125rem #f7f7f791, -.625rem -.625rem .3125rem #f7f7f791;
}
.icon-2-2{
  width: 100%;
  height: 4vh;
  /*background: #f7f7f7;*/
  box-shadow: .3125rem 2rem .3125rem .9375rem #f7f7f791, .625rem -.625rem .3125rem #f7f7f791, -.625rem 1.625rem .3125rem #f7f7f791, -.625rem -.625rem .3125rem #f7f7f791;
}

.wrapper-pen-sub{
  padding: 2rem 3.25rem;
  width: 100%;
}
.article-sub{
  flex-direction: row;
}
.bg-sub{
  width: 50rem;
}
.icon-sub{
  height: 60vh;
  width: 50rem;
  box-shadow: .3125rem 2rem .3125rem .9375rem white, .625rem -.625rem .3125rem white, -.625rem 1.625rem .3125rem white, -.625rem -.625rem .3125rem white;
}
.icons-sub{
  width: 50rem;
  border-bottom: solid 3.3125rem white;
}
.icons-sub:last-child{
  border-bottom: solid 10.3125rem white;
}
</style>