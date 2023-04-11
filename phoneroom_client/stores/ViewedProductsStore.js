import {defineStore} from "pinia";

export const useViewedProductsStore = defineStore('viewedProducts', () => {
    const viewedProducts = ref([]);
    // const pressed = ref(false);

    function getViewedProducts() {
        if (localStorage.getItem('viewedProducts')){
            viewedProducts.value = JSON.parse(localStorage.getItem('viewedProducts'));
        }
        return viewedProducts
        // viewedProducts.value = localStorage.getItem('viewedProducts') ? JSON.parse(localStorage.getItem('viewedProducts')) : 0;
    }

    function pushProduct(product) {
        if (!checkProduct(product) && viewedProducts.value.length <= 15){
            viewedProducts.value.push(product);
            localStorage.setItem('viewedProducts', JSON.stringify(viewedProducts.value));
        }
    }

    function checkProduct(product) {
        for (const productViewed of viewedProducts.value) {
            if(productViewed.id === product.id){
                return true;
            }
        }
        return false;
    }


    function removeProduct(product) {
        if (checkProduct(product)){
            viewedProducts.value.splice(viewedProducts.value.indexOf(product), 1);
            localStorage.setItem('viewedProducts', JSON.stringify(viewedProducts.value));
        }
    }

    return {
        viewedProducts,
        pushProduct,
        checkProduct,
        removeProduct,
        getViewedProducts,
    }
});
