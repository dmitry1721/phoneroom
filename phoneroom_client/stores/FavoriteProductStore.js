import {defineStore} from "pinia";

export const useFavoriteProductStore = defineStore('favoriteProductStore', () => {
    const favoriteProducts = ref([]);

    const needUpdate = ref(false);


    function getFavoriteProducts() {
        if (localStorage.getItem('favoriteProducts')){
            favoriteProducts.value = JSON.parse(localStorage.getItem('favoriteProducts'));
        }
        return favoriteProducts;
    }

    function pushProduct(product) {
        if (!checkProduct(product)){
            favoriteProducts.value.push(product);
            localStorage.setItem('favoriteProducts', JSON.stringify(favoriteProducts.value));
        }
    }

    function checkProduct(product) {
        for (const productFavorite of favoriteProducts.value) {
            if (productFavorite.id === product.id){
                return true;
            }
        }
        return false;
    }

    function removeProduct(product) {
        if (checkProduct(product)){
            favoriteProducts.value.splice(favoriteProducts.value.indexOf(product), 1);
            localStorage.setItem('favoriteProducts', JSON.stringify(favoriteProducts.value));
        }
    }

    return {
        favoriteProducts,
        pushProduct,
        needUpdate,
        checkProduct,
        removeProduct,
        getFavoriteProducts,
    }
});
