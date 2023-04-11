<template>
  <div>
    <div class="search-section">
      <div v-if="pending">
        <div class="container">
          <section class="wrapper-pen">
            <article class="article">
              <div class="bg">
                <div class="icons">
                  <div class="icon-1"></div>
                  <div class="mask"></div>
                  <div class="icon-2"></div>
                  <div class="mask"></div>
                  <div class="icon-2"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                </div>

                <div class="titles_pen">
                  <div class="title_pen"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                </div>
                <div class="menu-w">
                  <div class="btn-menu"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="btn-menu"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="btn-menu"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="btn-menu"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="btn-menu"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="btn-menu"></div>

                </div>
                <div class="body-pen">
                  <div class="content-pen">
                    <div class="img-cont">
                      <div class="img-pen img-pen_left"></div>
                      <div class="mask"></div>
                    </div>
                  </div>
                  <div class="mask"></div>
                  <div class="mask"></div>
                  <div class="mask"></div>

                  <div class="img-cont">
                    <div class="img-pen"></div>
                  </div>
                  <div class="img-cont">
                    <div class="img-pen"></div>
                  </div>
                  <div class="img-cont">
                    <div class="img-pen"></div>
                  </div>
                  <div class="img-cont">
                    <div class="img-pen"></div>
                  </div>
                  <div class="mask"></div>
                </div>
              </div>
            </article>
          </section>
        </div>
      </div>
      <div v-else>
        <ais-instant-search :search-client="client"
                            index-name="category_variant_rating_desc"
                            :routing="routing">
          <ais-configure :query="query" />
          <ais-search-box  :show-loading-indicator="true" class="hidden" v-model="query"/>
          <div class="container">
            <Breadcrumbs
                :name="{title: 'Поиск', to: ''}"/>
            <div class="title_wrapp">
              <h1 class="title">Найдено <span style="display: inline-block">
                <ais-stats>
                  <template v-slot="{ nbHits }">
                    <div v-if="nbHits === 1">
                      {{ nbHits }} соответствие
                    </div>
                    <div v-else-if="nbHits === 2 || nbHits === 3 || nbHits === 4">
                      {{ nbHits }} соответствия
                    </div>
                    <div v-else>
                      {{ nbHits }} соответствий
                    </div>
                  </template>
                </ais-stats>
                </span>
              </h1>
            </div>
          </div>
          <div class="container">
            <section class="section-category">
              <ais-refinement-list :transform-items="checkCategory" operator="and" attribute="category_name">
                <template
                    v-slot="{
                                  items,
                                  isShowingMore,
                                  isFromSearch,
                                  canToggleShowMore,
                                  refine,
                                  createURL,
                                  toggleShowMore,
                                  searchForItems,
                                  sendEvent,
                                }">
                  <ul style="display: flex; flex-wrap: wrap">
                    <li v-for="item in items" :key="item.value">
                      <a
                          class="category_btn"
                          :href="createURL(item)"
                          :class="{ 'active': item.isRefined }"
                          @click.prevent="refine(item.value);getCurrentCategory(item.value)"
                      >
                        {{item.value}}
                      </a>
                    </li>
                  </ul>
                </template>
              </ais-refinement-list>
            </section>
          </div>
          <section class="section-body">
            <div class="container">
              <div v-if="windowWidth <= 768" @click="show = !show" class="mobile-btn-filter">Фильтры</div>
                <div class="sort-section">
                  <ais-sort-by :items="[
                    { value: `category_variant_rating_desc`, label: 'По&nbsp;популярности' },
                    { value: `category_variant_price_asc`, label: 'Сначала&nbsp;дешевле' },
                    { value: `category_variant_price_desc`, label: 'Сначала&nbsp;дороже' },
                    { value: `category_variant_created_at_desc`, label: 'Новинки' },]">
                    <template v-slot="{ items, currentRefinement, refine }">
                      <nuxt-img class="sort-svg" :src="'img/sort.svg'" />
                      <ul class="show-list">
                        <li class="show_item" v-for="item in items" :key="item.value" :value="item.value">
                          <a
                              class="show_item-link"
                              :class="{'active': item.value === currentRefinement}"
                              @click.prevent="refine(item.value)"
                          >
                            {{ item.label }}
                          </a>
                        </li>
                      </ul>
                    </template>
                  </ais-sort-by>

                  <div class="sort_show_count">
                    <ais-hits-per-page
                        :items="[
                        { label: '&nbsp;20&nbsp;', value: 20, default: true },
                        { label: '&nbsp;40&nbsp;', value: 40 },
                        { label: '&nbsp;60&nbsp;', value: 60 },
                      ]"
                    >
                      <template v-slot="{ items, refine }">
                        <div class="show-count_subtitle">Показывать&nbsp;по:</div>
                        <ul class="show-count_list">
                          <li class="show-count_item" v-for="item in items" :key="item.value">
                            <button
                                class="show_item-link"
                                :class="{'active': item.isRefined}"
                                @click="refine(item.value)"
                            >
                              {{ item.label }}
                            </button>
                          </li>
                        </ul>
                      </template>
                    </ais-hits-per-page>
                  </div>
                </div>
              <div class="search_container">
                  <transition  v-if="windowWidth <= 768" name="fade">
                    <div class="filter mob-filter" :class="{'mobile-filter': !show}">
                      <div class="modal_close" @click="show = false"></div>
                      <div class="filter-block">
                        <div class="filter-row">
                          <div class="filter_title filter_price">Цена</div>
                        </div>
                        <div class="filter-body price_body">
                          <ais-range-input attribute="price" :min="categories_min_price!== 100000 ? categories_min_price:0 " :max="categories_max_price!== 0 ? categories_max_price:1000000">
                            <template v-slot="{ currentRefinement, range, refine }">
                              <SliderElement :value="toValue(currentRefinement, range)" @change="refine({ min: $event[0], max: $event[1] })" :min="categories_min_price" :max="categories_max_price" :lazy="true"/>
                            </template>
                          </ais-range-input>
                        </div>

                        <div class="line red_line"></div>
                        <ais-toggle-refinement style="margin-top: 30px" attribute="with_old_price" label="Товары со скидкой">
                          <template v-slot="{ value, refine, createURL, sendEvent }">
                            <div class="in_stock-wrapp">
                              <span class="ais-ToggleRefinement-labelText filter_title">Товары со скидкой</span>
                              <label>
                                <a :href="createURL(value)" @click.prevent="refine(value)">
                                  <input :checked="value.isRefined ? true:false" class="ais-ToggleRefinement-checkbox input_radio" type="checkbox" />
                                </a>
                              </label>
                            </div>
                          </template>
                        </ais-toggle-refinement>
                        <div class="line red_line"></div>

                        <ais-hits :transform-items="checkOptionsNames" class="option-block" :class-names="{'ais-Hits-item': 'option_li'}" >
                          <template v-slot:item="{ item, index }" >
                            <div style="width: 115%" v-if="index === 0" v-for="(option_name, i) in item.options_names">
                              <div>
                                <div style="width: 115%">
                                  <div class="filter-row">
                                    <div class="filter_title">{{ option_name }}</div>
                                  </div>
                                  <div class="filter-body">
                                    <ais-refinement-list :transform-items="optionItems" operator="and" :attribute='`options_values.${toSlug(option_name).replace(/[^a-z ]/ig, "")}`'/>
                                  </div>
                                </div>
                                <div class="line red_line"></div>
                              </div>
                              <div style="display: none;"></div>
                            </div>
                            <div v-else style="display: none"></div>
                          </template>
                        </ais-hits>

                        <ais-toggle-refinement attribute="in_stock" label="Только в наличии">
                          <template v-slot="{ value, refine, createURL, sendEvent }">
                            <div class="in_stock-wrapp">
                              <span class="ais-ToggleRefinement-labelText filter_title">Только в наличии</span>
                              <label>
                                <a :href="createURL(value)" @click.prevent="refine(value)">
                                  <input :checked="value.isRefined ? true:false" class="ais-ToggleRefinement-checkbox input_radio" type="checkbox" />
                                </a>
                              </label>
                            </div>
                          </template>
                        </ais-toggle-refinement>

                        <div class="line red_line" ></div>
                        <div class="filter-row">
                          <div class="filter_title">Теги</div>
                        </div>
                        <div class="filter-body">
                          <ais-refinement-list operator="and" :limit="5" show-more attribute="tags"/>
                        </div>
                        <div class="line red_line"></div>

                        <ais-clear-refinements>
                          <template v-slot:resetLabel>Очистить</template>
                        </ais-clear-refinements>
                      </div>
                    </div>
                  </transition>
                  <div class="filter" v-if="windowWidth > 768">
                    <div class="filter-block">

                      <div class="filter-row">
                        <div class="filter_title filter_price">Цена</div>
                      </div>
                      <div class="filter-body price_body">
                        <ais-range-input attribute="price" :min="categories_min_price!== 100000 ? categories_min_price:0 " :max="categories_max_price!== 0 ? categories_max_price:1000000">
                          <template v-slot="{ currentRefinement, range, refine }">
                            <SliderElement :value="toValue(currentRefinement, range)" @change="refine({ min: $event[0], max: $event[1] })" :min="categories_min_price" :max="categories_max_price" :lazy="true"/>
                          </template>
                        </ais-range-input>
                      </div>

                      <div class="line red_line"></div>
                      <ais-toggle-refinement style="margin-top: 30px" attribute="with_old_price" label="Товары со скидкой">
                        <template v-slot="{ value, refine, createURL, sendEvent }">
                          <div class="in_stock-wrapp">
                            <span class="ais-ToggleRefinement-labelText filter_title">Товары со скидкой</span>
                            <label>
                              <a :href="createURL(value)" @click.prevent="refine(value)">
                                <input :checked="value.isRefined ? true:false" class="ais-ToggleRefinement-checkbox input_radio" type="checkbox" />
                              </a>
                            </label>
                          </div>
                        </template>
                      </ais-toggle-refinement>
                      <div class="line red_line"></div>

                      <ais-hits :transform-items="checkOptionsNames" class="option-block" :class-names="{'ais-Hits-item': 'option_li'}" >
                        <template v-slot:item="{ item, index }" >
                          <div style="width: 115%" v-if="index === 0" v-for="(option_name, i) in item.options_names">
                            <div>
                              <div style="width: 115%">
                                <div class="filter-row">
                                  <div class="filter_title">{{ option_name }}</div>
                                </div>
                                <div class="filter-body">
                                  <ais-refinement-list :transform-items="optionItems" operator="and" :attribute='`options_values.${toSlug(option_name).replace(/[^a-z ]/ig, "")}`'/>
                                </div>
                              </div>
                              <div class="line red_line"></div>
                            </div>
                            <div style="display: none;"></div>
                          </div>
                          <div v-else style="display: none"></div>
                        </template>
                      </ais-hits>

                      <ais-toggle-refinement attribute="in_stock" label="Только в наличии">
                        <template v-slot="{ value, refine, createURL, sendEvent }">
                          <div class="in_stock-wrapp">
                            <span class="ais-ToggleRefinement-labelText filter_title">Только в наличии</span>
                            <label>
                              <a :href="createURL(value)" @click.prevent="refine(value)">
                                <input :checked="value.isRefined ? true:false" class="ais-ToggleRefinement-checkbox input_radio" type="checkbox" />
                              </a>
                            </label>
                          </div>
                        </template>
                      </ais-toggle-refinement>

                      <div class="line red_line" ></div>
                      <div class="filter-row">
                        <div class="filter_title">Теги</div>
                      </div>
                      <div class="filter-body">
                        <ais-refinement-list operator="and" :limit="5" show-more attribute="tags"/>
                      </div>
                      <div class="line red_line"></div>

                      <ais-clear-refinements>
                        <template v-slot:resetLabel>Очистить</template>
                      </ais-clear-refinements>
                    </div>
                  </div>
                  <div class="card-section">
                    <ais-state-results>
                      <template v-slot="{ state: { query }, results: { hits } }">
                        <div class="not_results" v-show="!hits.length">
                          <p class="not_results-text">По запросу <q style="font-weight: bold">{{ query }}</q> ничего не найдено.</p>
                        </div>
                      </template>
                    </ais-state-results>
                    <ais-hits>
                      <template v-slot:item="{ item }">
                        <div class="item">
                          <ProductSearchCard :product_variant="item.product"/>
                        </div>
                      </template>
                    </ais-hits>
                    <ais-pagination  :padding="4" class="pagination" />
                  </div>
                </div>
              </div>
          </section>
        </ais-instant-search>
      </div>
    </div>
  </div>
</template>

<script setup>
import SliderElement from '@vueform/slider'
import '@vueform/slider/themes/default.css';
import {
  AisConfigure,
  AisHits,
  AisMenu,
  AisHitsPerPage,
  AisInstantSearch,
  AisSortBy,
  AisPagination,
  AisRangeInput,
  AisRefinementList,
  AisClearRefinements,
  AisStats,
  AisSearchBox,
  AisStateResults,
  AisToggleRefinement,
} from 'vue-instantsearch/vue3/es'

import {history as historyRouter} from 'instantsearch.js/es/lib/routers';
import {singleIndex as singleIndexMapping} from 'instantsearch.js/es/lib/stateMappings';
import Button from "../../../components/Button/Button";
import {useUserStore} from "../../../stores/UserStore";
import ProductSearchCard from "../../../components/ProductSearchCard";
import {computed, onMounted, ref} from "vue";

const config = useRuntimeConfig();
const route = useRoute();
const query = computed(() => route.params.query);

const open = ref(false);

const client = useMeilisearchClient();

const routing = {
  router: historyRouter(),
  stateMapping: singleIndexMapping('category_variant'),
};

const show = ref(false);
const windowWidth = ref(0);
const updateWidth = () => {
  windowWidth.value = window.innerWidth;
};
onMounted(()=>{
  updateWidth();
  window.addEventListener('resize', updateWidth);
});
const toValue = (value, range) => {
  return [
    typeof value.min === "number" ? value.min : range.min,
    typeof value.max === "number" ? value.max : range.max,
  ];
};

const getCategoriesPrices = async (url) => {
  return await $fetch(url , {
      headers: {
        "Accept": "application/json",
        'Content-Type': 'application/json',
      },
      method: 'GET',
    }
  )
};
const url = computed(() => config.public.apiBaseUrl + "categories/price/" + `${current_category.value}`);
const count = ref(1);
const categories_min_price = ref(100000);
const categories_max_price = ref(0);
const categories_names = [];
const current_category = ref('');

const getCurrentCategory = (category_name) => {
  if (current_category.value !== category_name){
    current_category.value = category_name;
    getCategoriesPrices(url.value).then((res) => {
      categories_min_price.value = parseInt(res.min_price);
      categories_max_price.value = parseInt(res.max_price);
    }).catch((err) => {
      console.error('Contact form could not be send', err);
    });
  }
  else{
    current_category.value = '';
    getMinMaxCategoriesPrices(categories_names);
  }
};

const checkCategory = (items) => {
  for (const item of items) {
    if (categories_names.indexOf(item.value) === -1) {
      categories_names.push(item.value);
    }
  }

  if (count.value <= 1 && current_category.value === ''){
    getMinMaxCategoriesPrices(categories_names);
  }

  return items;
};

const getMinMaxCategoriesPrices = (categories_names) => {
  for (const category_name of categories_names) {
    getCategoriesPrices(url.value+category_name).then((res) => {
      if(parseInt(res.min_price) < categories_min_price.value) {
        categories_min_price.value = parseInt(res.min_price);
      }
      if(parseInt(res.max_price) > categories_max_price.value) {
        categories_max_price.value = parseInt(res.max_price);
      }
    }).catch((err) => {
      console.error('Contact form could not be send', err);
    });
  }
  count.value++;
};

const optionItems = (items) => {
  return Array.from(items);
};
const new_items_options = ref([]);
const new_items = ref([]);
const checkOptionsNames = (items) => {
  for (let itm = 0; itm<items.length; itm++) {
    for (let i = 0; i<items[itm].options_names.length; i++) {
      if (new_items_options.value.indexOf(items[itm].options_names[i]) !== -1) {
        continue;
      }
      new_items.value.push(items[itm]);
      new_items_options.value.push(items[itm].options_names[i]);
    }
  }
  new_items.value[0].options_names = new_items_options.value;
  return new_items.value;
};

const toSlug = (str) => {
  str = str.replace(/ /g,"");

  let ru = {
    'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd',
    'е': 'e', 'ё': 'e', 'ж': 'j', 'з': 'z', 'и': 'i',
    'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
    'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
    'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh',
    'щ': 'shch', 'ы': 'y', 'э': 'e', 'ю': 'yu', 'я': 'ya',
    'ъ': '', 'ь': '', 'й': 'y'
  };
  let newString = [];

  return [...str].map(l => {
    let latL = ru[l.toLocaleLowerCase()];
    if (latL === undefined) {
      if (l === ' '){
        latL = '-';
      }
      else{
        latL = l.toLocaleLowerCase();
      }
    }

    return latL;
  }).join('');
};

</script>

<style scoped>
.section-category {
  display: flex;
  margin-top: 3.5rem;
  flex-direction: column;
  margin-bottom: 1rem;
}

.buttons {
  display: flex;
  margin-bottom: 2rem;
  flex-wrap: wrap;
}

.category_btn {
  display: flex;
  height: 2.5rem;
  padding: 1rem 3rem;
  justify-content: center;
  font-size: 0.875rem;
  font-weight: 700;
  margin-bottom: 1rem;
  font-family: 'Inter', sans-serif;
  align-items: center;
  transition: all .3s ease;
  background-color: #FFFFFF;
  cursor: pointer;
  border: 1px solid #384255;
  /*background-color: #E31235;*/
  border-radius: 4px;
  color: #384255;
  /*color: #FFFFFF;*/
  opacity: 0.9;
  margin-right: 1.5rem;
}

.menu-item_active {
  background-color: #E31235;
  transition: all .3s ease;
  border: none;
  cursor: pointer;
  color: #FFFFFF;
}

.menu-item:hover {
  transition: all .3s ease;
  opacity: 1;
  cursor: pointer;
  color: #FFFFFF;
}

.category_btn:hover a {
  transition: all .3s ease;
  opacity: 1;
  cursor: pointer;
  color: #FFFFFF;
}

.category_btn:hover {
  background-color: #E31235;
  transition: all .3s ease;
  border: none;
  color: #FFFFFF;
}
.category_btn.active{
  background-color: #E31235;
  transition: all .3s ease;
  border: none;
  color: #FFFFFF;
}

.section-body {
  display: flex;
  width: 100%;
  /*background: #F7F7F7;*/
  border-radius: 25px 25px 0 0;
  padding-top: 2rem;
}

.filter {
  flex: 20% 0 1;
  background-color: #FFFFFF;
  border-radius: 10px;
  padding: 2rem 1.5rem;
  margin-top: 0.219rem;
  margin-right: 1rem;
  min-width: 18rem;
  height: 100%;
}

.card-section {
  flex: 80% 0 1;
}

.filter-row {
  display: flex;
  justify-content: space-between;
}

.filter_title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 1rem;
  line-height: 1.0625rem;
  color: #1A1A25;
}

.filter_price {
  display: flex;
  justify-content: space-between;
  margin-bottom: 2rem;
}

.price_body {
  padding: 0 1rem;
}

.search_container {
  display: flex;
  justify-content: space-between;
  width: 100%;
}

.filter-body {
  margin-top: 1rem;
}

.pagination {
  margin: 12rem 0;
}

.hidden {
  display: none;
}

.red_line {
  margin: 1.875rem 0;
}

.input_radio {
  transform: scale(1.3);
  margin-right: .625rem;
}
.in_stock-wrapp{
  display: flex;
  justify-content: space-between;
}
.not_results {
  width: 100%;
  height: 100%;
  display: flex;
}


.sort-section{
  display: flex;
  width: 100%;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 3.375rem;
}
.sort_show{
  display: flex;
  align-items: center;
  justify-content: center;
}
.show-list{
  display: inline-flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.show_item{
  padding-right: .75rem;
}
.show_item-link{
  font-weight: 400;
  font-size: 1rem;
  line-height: 1.25rem;
  color: #384255;
  cursor: pointer;
  opacity: 0.5;
  transition: all .3s ease;
}
.show_item:last-child{
  padding-right: 0;
}
.show_item-link:hover{
  opacity: 1;
  transition: all .3s ease;
}
.show_item-link.active{
  font-weight: 700;
  opacity: 1;
  color: #384255
}
.sort-svg{
  transition: all .3s ease;
  display: inline-block;
  transform: rotateX(180deg);
  margin-right: 5px;
  cursor: pointer;
}
.sort-svg.active{
  transform: rotateX(180deg);
  transition: all .3s ease;
}
.show-count_subtitle{
  display: inline-block;
  font-weight: 700;
  font-size: 1rem;
  line-height: 1.0625rem;
  color: #384255;
  padding-right: .75rem;
}
.show-count_list{
  display: inline-flex;
  flex-direction: row;
}
.show-count_item{
  padding-right: .75rem;
}
.show-count_item:nth-child(2):before{
  content: '| ';
  height: 100%  ;
  font-weight: 400;
  font-size: .875rem;
  line-height: 1.25rem;
  color: #384255;
  opacity: 0.5;
}
.show-count_item:nth-child(2):after{
  content: ' |';
  font-weight: 400;
  font-size: .875rem;
  line-height: 1.25rem;
  color: #384255;
  opacity: 0.5;
}


/*pending*/
.article {
  width: 100%;
}

.icon-1 {
  width: 1.25rem;
  height: .625rem;
  box-shadow: none;
  /*border-radius: 10px;*/
}

.icon-2 {
  width: 6.25rem;
  height: .625rem;
  box-shadow: none;
}

.titles_pen {
  display: flex;
  border-top: 1.6525rem solid white;
  border-bottom: 2.8125rem solid white;
}

.title_pen {
  width: 45rem;
  height: 1.875rem;
  border-radius: 6.25rem;
}

.menu-w {
  display: flex;
  border-bottom: 3.75rem solid white;
}

.btn-menu {
  width: 6.25rem;
  height: 1.875rem;
}

.img-pen {
  width: 17.5rem;
  height: 100vh;
  background: transparent;
  border-bottom: solid 6.25rem white;
}


/*pending*/
.article {
  width: 100%;
  padding: 0;
  padding-top: 1.875rem;
}

.icon-1 {
  width: 7.25rem;
  height: 1.5625rem;
  border-radius: .625rem;
  box-shadow: 5px 10px 5px 15px white, 10px -10px 5px white, -10px 10px 5px white, -10px -10px 5px white;
}

.titles_pen {
  display: flex;
  border-top: 1.5625rem solid white;
  border-bottom: 2.8125rem solid white;
}

.title_pen {
  width: 46.875rem;
  height: 1.875rem;
  border-radius: 10px;
  box-shadow: 10px 10px 5px white, 10px -10px 5px white, -10px 10px 5px white, -10px -10px 5px white;
}

.menu-w {
  display: flex;
  border-bottom: 3.75rem solid white;
}

.btn-menu {
  width: 12.5rem;
  height: 1.875rem;
  border-radius: 10px;
  box-shadow: 10px 10px 5px white, 10px -10px 5px white, -10px 10px 5px white, -10px -10px 5px white;
}

.img-pen {
  width: 17.5rem;
  height: 100vh;
  background: transparent;
  border-bottom: solid 6.25rem white;
}

.img-pen_left {
  border-radius: 10px;
  box-shadow: 10px 10px 5px white, 10px -10px 5px white, -10px 10px 5px white, -10px -10px 5px white;
}


.mobile-filter{
  display: none;
  transition: all .3s ease;
}

.mobile-filter.active{
  display: block;
  transition: all .3s ease;
}
.mobile-btn-filter{
  font-weight: 700;
  display: flex;
  color: #FFFFFF;
  background: #E31235;
  border-radius: 6px;
  width: 11rem;
  align-items: center;
  justify-content: center;
  transition: all .3s ease;
  cursor: pointer;
  height: 2.25rem;
  margin-bottom: 1.625rem;
}
.mobile-btn-filter:hover{
  background: #BD0F2C;
  transition: all .3s ease;
}

.mob-filter{
  position: fixed;
  z-index: 999;
  padding-bottom: 13rem;
  top: 25vh;
  box-shadow: 0 0 5px 7px rgba(133, 143, 164, .2);
  overflow-y: auto;
  overflow-x: hidden;
  left: 0;
  width: 100%;
  border-radius: 10px;
  border: solid 2px rgba(133, 143, 164, 0.3);
  padding-top: 1rem;
  animation: showMobFilter .3s linear;
  /*transition: all .3s linear;*/
}
.modal_close{
  display: flex;
  justify-content: end;
  vertical-align: top;
  transition: hiddenMobFilter .3s linear;
  /*padding-bottom: 1rem;*/
}
.modal_close:before{
  content: '\2716';
  font-weight: 900;
  font-size: 1.5rem;
  color: #858FA4;
  cursor: pointer;
  opacity: .5;
  /*transition: all .3s ease;*/
  transition: hiddenMobFilter .3s linear;
}

@keyframes showMobFilter {
  0%{
    top: 100vh;
  }

  100%{
    top: 25vh;
  }
}

@keyframes hiddenMobFilter {
  0%{
    top: 25vh;
  }
  100%{
    top: 100vh;
  }
}

@media (max-width: 768px) {
  .card-section{
    flex: 100% 0 1;
  }
  .red_line{
    margin-bottom: 3rem;
  }

}
@media (max-width: 640px){
  .sort-section{
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
  }
  .sort_show_count{
    margin-top: 1rem;
    margin-left: 2.25rem;
  }
}
</style>