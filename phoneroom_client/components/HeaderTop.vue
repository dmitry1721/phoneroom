<template>
  <div class="header-top">
    <div class="container header-top_container">
      <nav class="header_nav">
        <ul class="header_ul">
          <li>
            <nuxt-link to="/" class="header_link">Доставка</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/" class="header_link">Оплата</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/" class="header_link">О компании</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/" class="header_link">Гарантия</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/" class="header_link">Магазины</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/" class="header_link">Контакты</nuxt-link>
          </li>
        </ul>
      </nav>
      <div class="header_right">
        <div class="dropdown" v-if="user">
          <button @mouseenter="showDropDown" class="dropbtn">{{ user.first_name }}</button>

          <div id="myDropdown" @mouseleave="unShowDropDown" class="dropdown-content" :class="{'show': show}">
            <div class="content_rec"></div>
            <span>
              <nuxt-link :to="`/profile`" class="link_profile">Личный кабинет</nuxt-link>
            </span>
            <span @click.prevent="logout">Выйти</span>
          </div>
          <nuxt-img class="header_right_profile" sizes="xxl:100vw xl:100vw lg:110vw md:100vw sm:100vw xs:100vw" src="img/profile-user.svg" alt="user-profile" loading="lazy" />
        </div>
        <div v-else>
          <AuthModal>Войти</AuthModal>
          <AuthModal>
            <nuxt-img class="header_right_profile" sizes="xxl:100vw xl:100vw lg:110vw md:100vw sm:100vw xs:100vw" src="img/profile-user.svg" alt="user-profile" loading="lazy" />
          </AuthModal>
        </div>
<!--        <nuxt-link to="/" class="header_link">Войти</nuxt-link>-->
        <div class="delimiter"></div>
        <a class="phone-wrapp" href="tel:+78000000000">
          <nuxt-img class="header_right_phone" sizes="xxl:100vw xl:100vw lg:110vw md:100vw sm:100vw xs:100vw" src="img/phone.svg" alt="phone" loading="lazy" />
          <div class="phone_number">+7 (800) 000-00-00</div>
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
import {useUserStore} from "../stores/UserStore";
import {computed, onMounted} from "vue";

const user = computed(() => useUserStore().getUser().value);
onMounted(() => {
  user.value = useUserStore().getUser();
  useUserStore().getToken();
})

const show = ref(false);
const showDropDown = () => {
  show.value = true;
};

const unShowDropDown = () => {
  show.value = false;
};

const urlLogout = computed(() => config.public.apiBaseUrl + `users/logout/${useUserStore().getUser().value.id}`);

const logout = () => {
  logoutFormRequest().then((res) => {
    removeUser();
    console.log(res);
  }).catch((err) => {
    console.error('Contact form could not be send', err)
  });
};


const logoutFormRequest = async () => {
  return await $fetch(urlLogout.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'GET',
  });
};

const removeUser = () => {
  useUserStore().removeUser();
};

</script>

<style scoped>
.header-top{
  height: 2.5rem;
  background-color: #2A2C38;
  color: #fff;
  font-size: 0.875rem;
  font-family: 'Inter', sans-serif;
  font-weight: 600;

}
.header-top_container{
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.header_nav{
  display: flex;
}
.header_ul{
  display: flex;
}
.header_ul li{
  padding-left: 1.875rem;
  align-items: center;
}
.header_ul li:first-child{
  padding-left: 0;
}
.header_right{
  font-weight: 500;
  display: flex;
  align-items: center;
}
.header_link{
  color: #fff;
  transition: all .3s ease;
}
.header_link:hover{
  color: #BABAC0;
  transition: all .3s ease;
}
.header_right_profile{
  padding-left: 0.875rem;
  cursor: pointer;
}
.header_right_phone{
  padding-right: 5px;
  cursor: pointer;
}
.delimiter{
  width: 1px;
  height: 1.6825rem;
  background: rgba(133, 143, 164, 0.15);
  border-radius: 1px;
  margin: 0 1.0625rem;
}

.dropbtn {
  color: #fff;
  transition: all .3s ease;
  cursor: pointer;
}

.dropbtn:hover{
  color: #BABAC0;
  transition: all .3s ease;
}

.dropdown {
  position: relative;
  display: inline-block;
  transition: all .3s ease;
}

.dropdown-content {
  display: none;
  position: absolute;
  min-width: 11.25rem;
  margin-top: 5px;
  overflow: auto;
  background: #FFFFFF;
  box-shadow: 0 .625rem 1.875rem rgba(133, 143, 164, 0.1);
  border-radius: 5px;
  z-index: 999;
}
.content_rec{
  width: 0.84375rem;
  position: absolute;
  top: -9px;
  height: 9px;
  z-index: 9999;
  background: #FFFFFF;
  box-shadow: 0 1.625rem 1.875rem rgba(133, 143, 164, 0.1);
}
.dropdown-content span {
  color: #1A1A25;
  padding: 1rem;
  text-decoration: none;
  display: block;
  cursor: pointer;
}

.dropdown span:hover {background-color: #f7f7f7;}

.show {
  display: block;
  transition: all .3s ease;
}
.link_profile{
  color: #E31235;
}
.header_right_phone,
.phone_number{
  display: inline-block;
}
.phone_number{
  font-weight: 500;
  font-size: .875rem;
  line-height: 1.0625rem;
  color: #FFFFFF;
}
</style>
