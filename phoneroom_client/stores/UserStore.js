import {defineStore} from "pinia";

export const useUserStore = defineStore('userStore', () => {
    const user = ref();
    const disabled_send_count = ref(0);
    const userCity = ref('');
    const apiToken = ref('');
    const userInfo = ref('');
    const ipInfoCity = ref('');
    const userCountBasketProducts = ref(0);

    function getUser() {
        if (localStorage.getItem('user')){
            user.value = JSON.parse(localStorage.getItem('user'));
        }
        return user
    }

    function getUserCity() {
        if (localStorage.getItem('userCity')){
            userCity.value = JSON.parse(localStorage.getItem('userCity'));
        }
        return userCity
    }

    function getUserCountBasketProducts() {
        if (localStorage.getItem('userCountBasketProducts')){
            userCountBasketProducts.value = JSON.parse(localStorage.getItem('userCountBasketProducts'));
        }
        return userCountBasketProducts
    }

    function getDis() {
        if (localStorage.getItem('disabled_send_count')){
            disabled_send_count.value = JSON.parse(localStorage.getItem('disabled_send_count'));
        }
        return disabled_send_count
    }

    function getToken() {
        if (localStorage.getItem('apiToken')){
            apiToken.value = JSON.parse(localStorage.getItem('apiToken'));
        }
        return apiToken
    }


    function addUser(data) {
        user.value = data;
        localStorage.setItem('user', JSON.stringify(user.value));
    }

    function addUserCountBasketProducts(data) {
        userCountBasketProducts.value = data;
        localStorage.setItem('userCountBasketProducts', JSON.stringify(userCountBasketProducts.value));
    }

    function addUserInfo(data) {
        userInfo.value = data;
    }

    function addUserCity(data) {
        userCity.value = data;

        localStorage.setItem('userCity', JSON.stringify(userCity.value));
    }

    function addDis() {
        disabled_send_count.value++;
        localStorage.setItem('disabled_send_count', JSON.stringify(disabled_send_count.value));
    }

    function addToken(data) {
        apiToken.value = data;
        localStorage.setItem('apiToken', JSON.stringify(apiToken.value));
    }

    function removeDis() {
        disabled_send_count.value = 0;
        localStorage.setItem('disabled_send_count', JSON.stringify(disabled_send_count.value));
    }

    function removeUser() {
        user.value = ''
        apiToken.value = ''
        localStorage.setItem('user', user.value);
        localStorage.setItem('apiToken', apiToken.value);
    }

    return {
        user,
        disabled_send_count,
        userCity,
        apiToken,
        userInfo,
        userCountBasketProducts,
        addUser,
        addUserInfo,
        addDis,
        addToken,
        ipInfoCity,
        removeDis,
        addUserCountBasketProducts,
        getDis,
        getUserCountBasketProducts,
        getToken,
        removeUser,
        getUser,
        getUserCity,
        addUserCity,
    }
})
