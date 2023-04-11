import {defineStore} from "pinia";

export const useCompareProductStore = defineStore('compareProductStore', () => {
    const compareProducts = ref([]);
    // const pressed = ref(false);
    const needUpdate = ref(false);

    function getCompareProducts() {
        if (localStorage.getItem('compareProducts')){
            compareProducts.value = JSON.parse(localStorage.getItem('compareProducts'));
        }
        return compareProducts;
        // compareProducts.value = localStorage.getItem('compareProducts') ? JSON.parse(localStorage.getItem('compareProducts')) : 0;
    }

    function pushProduct(product) {
        if (!checkProduct(product)){
            compareProducts.value.push(product);
            localStorage.setItem('compareProducts', JSON.stringify(compareProducts.value));
        }
    }

    function checkProduct(product) {
        for (const productCompare of compareProducts.value) {
            if(productCompare.id === product.id){
                return true;
            }
        }
        return false;
    }

    function removeProduct(product) {
        if(checkProduct(product)){
            compareProducts.value.splice(compareProducts.value.indexOf(product), 1);
            localStorage.setItem('compareProducts', JSON.stringify(compareProducts.value));
        }
    }

    return {
        compareProducts,
        pushProduct,
        needUpdate,
        removeProduct,
        checkProduct,
        getCompareProducts,
    }
});
