import {defineStore} from "pinia";

export const useSearchStore = defineStore('searchStore', () => {
    const query = ref('');

    function editQuery(text) {
        query.value = text;
        return query.value;
    }

    return {
        query,
        editQuery,
    };
});