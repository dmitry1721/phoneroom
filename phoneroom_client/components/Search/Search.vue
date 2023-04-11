<template>
  <div>
    <ais-instant-search class="search_container" :search-client="client" index-name="category_variant" :routing="routing">
      <div class="autocomplete_box">
        <Autocomplete />
      </div>
    </ais-instant-search>
  </div>
</template>
<script setup>
import {useSearchStore} from "../../stores/SearchStore";
import {
  AisInstantSearch,
} from 'vue-instantsearch/vue3/es'
const client = useMeilisearchClient();
// const { data: search } = useFetch('http://localhost:7700//indexes/variants/documents');

import { history as historyRouter } from 'instantsearch.js/es/lib/routers';
import { singleIndex as singleIndexMapping } from 'instantsearch.js/es/lib/stateMappings';
import { simple as simpleStateMapping } from 'instantsearch.js/es/lib/stateMappings';
import {useRouter} from "nuxt/app";


const router = useRouter();
const routing = {
  router: historyRouter(),
  // stateMapping: simpleStateMapping(),
  stateMapping: singleIndexMapping('variants'),
};

const onSelected = (selected) => {
  if (selected) {
    const { query } = selected.item;
    this.query = query;
  }
};

const query = ref('');
const changeQuery = () => {
  console.log(query.value);
  query.value = useSearchStore().editQuery(query.value);
  console.log(query.value);
};

</script>

<style scoped>
.search_container{
  width: 37.5rem;
  /*height: 48px;*/
  /*display: flex;*/
  align-items: center;
  background: #FFFFFF;
  /*border: 1px solid #858FA4;*/
  border-radius: 4px
}
.aa-Input{
  color: #BD0F2C;
}
.main-search{
  color: #1A1A25;
  padding: 0 1.25rem 0 1rem;
  width: 100%;
}
.search_span{
  padding-left: 1.25rem;
  cursor: pointer;
}
.ais-SearchBox-input{
  width: 31rem;
}


@media (max-width: 885px) {
  .search_container{
    width: 35rem;
  }
}

@media (max-width: 855px) {
  .search_container{
    width: 32rem;
  }
}

@media (max-width: 855px) {
  .search_container{
    width: 29.9rem;
  }
}

@media (max-width: 805px) {
  .search_container{
    width: 26.6rem;
  }
}

@media (max-width: 768px) {
  .search_container{
    width: 100%;
  }
}
</style>