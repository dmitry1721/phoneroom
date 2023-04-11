<template>
  <div ref="autocompleteContainer"></div>
</template>

<script lang="jsx">
import { h as createElement, Fragment, render } from 'vue';
import { createWidgetMixin } from 'vue-instantsearch/vue3/es';
import { connectSearchBox } from 'instantsearch.js/es/connectors';
import * as autocomplete from '@algolia/autocomplete-js';
import * as createLocalStorageRecentSearchesPlugin from '@algolia/autocomplete-plugin-recent-searches';

import '@algolia/autocomplete-theme-classic';

const INSTANT_SEARCH_INDEX_NAME = 'category_variant_rating_desc';

export default {
  mixins: [createWidgetMixin({ connector: connectSearchBox })],
  mounted() {
    const { instantSearchInstance } = this;

    function setInstantSearchUiState({ query }) {
      instantSearchInstance.setUiState((uiState) => ({
        ...uiState,
        [INSTANT_SEARCH_INDEX_NAME]: {
          ...uiState[INSTANT_SEARCH_INDEX_NAME],
          // We reset the page when the search state changes
          page: 1,
          query,
        },
      }));
    }

    const recentSearchesPlugin = createLocalStorageRecentSearchesPlugin.createLocalStorageRecentSearchesPlugin({
      key: 'instantsearch',
      limit: 3,
      transformSource({ source }) {
        return {
          ...source,
          onSelect({ item }) {
            setInstantSearchUiState({ query: item.label });
          },
        };
      },
    });

    const initialState =
        instantSearchInstance.mainIndex.getHelper()?.state || {};

    this.autocompleteInstance = autocomplete.autocomplete({
      container: this.$refs.autocompleteContainer,
      placeholder: 'Поиск по сайту',
      detachedMediaQuery: 'none',
      initialState: { query: initialState.query || '' },
      onSubmit({ state }) {
        setInstantSearchUiState({ query: state.query });
        navigateTo('/catalog/search/'+state.query);
      },
      onReset() {
        setInstantSearchUiState({ query: '' });
      },
      onStateChange({ prevState, state }) {
        if (prevState.query !== state.query) {
          setInstantSearchUiState({ query: state.query });
        }
      },

      openOnFocus: true,
      plugins: [recentSearchesPlugin],
      renderer: { createElement, Fragment, render },
    });
  },
  beforeUnmount() {
    this.autocompleteInstance?.destroy();
  }
};
</script>