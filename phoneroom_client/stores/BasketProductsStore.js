import {defineStore} from "pinia";

export const useBasketProductsStore = defineStore('basketProductsStore', () => {
    const basketProducts = ref([]);

    const needUpdate = ref(false);

    function getBasketProducts() {
        if (localStorage.getItem('basketProducts')){
            basketProducts.value = JSON.parse(localStorage.getItem('basketProducts'));
        }
        return basketProducts;
        // basketProducts.value = localStorage.getItem('basketProducts') ? JSON.parse(localStorage.getItem('basketProducts')) : 0;
    }

    function pushProduct(product) {
        if (!checkProduct(product)){
            basketProducts.value.push(product);
            localStorage.setItem('basketProducts', JSON.stringify(basketProducts.value));
        }

    }

    function checkProduct(product) {
        for (const productBasket of basketProducts.value) {
            if(productBasket.id === product.id){
                return true;
            }
        }
        return false;
    }

    function removeProduct(product) {
        if (checkProduct(product)){
            for (const productBasket of basketProducts.value) {
                if(productBasket.id === product.id){
                    basketProducts.value.splice(basketProducts.value.indexOf(productBasket), 1);
                }
            }
            // basketProducts.value.splice(basketProducts.value.indexOf(product), 1);
            // delete basketProducts.value[basketProducts.value.indexOf(product)];
            localStorage.setItem('basketProducts', JSON.stringify(basketProducts.value));
        }
    }

    return {
        basketProducts,
        pushProduct,
        needUpdate,
        removeProduct,
        checkProduct,
        getBasketProducts,
    }

})
