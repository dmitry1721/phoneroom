<template>
  <div>
    <div class="container">
      <Breadcrumbs :name="{title: 'Личный кабинет', to: 'profile'}"/>
      <div class="title_wrapp">
        <h1 class="title">Личный кабинет</h1>
      </div>
    </div>
    <div class="line"></div>
    <div class="index-main-wrap">
      <section class="section-profile">
        <div v-if="pending">
          <div class="container">
            <section class="wrapper-pen">
              <article class="article">
                <div class="bg">
                  <div class="icons">
                    <div class="icon-1"></div>
                    <div class="mask"></div>
                    <div class="mask"></div>
                    <div class="icon-2 icon-2-2"></div>
                    <div class="mask"></div>
                    <div class="icon-2"></div>
                  </div>
                </div>
              </article>
            </section>
          </div>
        </div>
        <div v-else>
          <Transition name="fade" v-if="profile_page===false && message_page===false && orders_page===false">
            <div class="container container-profile">
              <div class="left-profile">
                <div class="prodile-svg">
                  <nuxt-img class="profile_img" sizes="xxl:100vw xl:110vw lg:100vw md:100vw sm:100vw xs:50vw" src="img/profile.svg" alt="user-profile" loading="lazy" />
                </div>
                <div class="prodile-info info">
                  <h2 class="info_name">Имя: {{ user.first_name }} {{ user.middle_name ? user.middle_name: ''}} {{ user.last_name ? user.last_name: '' }}</h2>
                  <h3 class="info_email">Email: {{ user.email }}</h3>
                  <h3 class="info_phone">Телефон: {{ user.phone }}</h3>
                </div>
                <div class="user-logout" v-if="windowWidth > 360">
                  <nuxt-link to="/">
                    <h3 class="logout_title" @click.prevent="logout">Выйти</h3>
                  </nuxt-link>
                </div>
              </div>
              <div class="user-logout" v-if="windowWidth <= 360">
                <nuxt-link to="/">
                  <h3 class="logout_title" @click.prevent="removeUser">Выйти</h3>
                </nuxt-link>
              </div>
              <div class="right-profile">
                <div class="right-profile_l">
                  <div class="right-profile_l-top">
                    <div class="l-top_title item-title">Профиль</div>
                    <div class="l-top_info">
                      <h3 class="name">{{ user.first_name }} {{ user.middle_name ? user.middle_name: ''}} {{ user.last_name ? user.last_name: '' }}</h3>
                      <h3 class="phone"><span class="name">тел: </span>{{ user.phone }}</h3>
                      <h3 class="address"><span class="name">Адрес: {{ user.address }}</span></h3>
                      <h3 class="profile-edit" @click="showUserEdit">Редактировать профиль</h3>
                      <Transition name="fade">
                        <component  @openUserEdit="openUserEdit" :is="userEdit ? UserEdit : 'div'" />
                      </Transition>
                    </div>
                  </div>
                  <div class="right-profile_l-bottom">
                    <h2 class="item-title">Ваши сообщения</h2>
                    <div class="l-bottom_info">
                      <div class="message_body">Оставте свое обращение, если у вас возникнут вопросы по работе интернет-магазина</div>
                      <h3 @click="message_page=true" class="message_send">Написать</h3>
                    </div>
                  </div>
                </div>
                <div class="right-profile_r">
                  <div class="item-title">Заказы</div>
                  <div class="profile_orders">
                    <div class="last_order"></div>
                    <div class="line"></div>
                    <div class="past_orders">
                      <h3 class="past_orders_title">Прошлые заказы:</h3>
                      <div class="orders">
                        <h3 class="no-orders_title">Нет заказов</h3>
                      </div>
                      <h3 @click="orders_page=true" class="all_orders">Все заказы</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </Transition>
          <div class="container" v-else >
            <div class="buttons">
              <div @click="profile_page=false;message_page=false;orders_page=false" class="profile_to_pages">Профиль</div>
              <div @click="profile_page=false;message_page=true;orders_page=false" :class="{'activePage': message_page}" class="profile_to_pages btn_messages">Ваши сообщения</div>
              <div @click="profile_page=false;message_page=false;orders_page=true" :class="{'activePage': orders_page}" class="profile_to_pages">Заказы</div>
            </div>
            <Transition name="fade" >
              <section class="section-orders" v-if="orders_page===true">
                <h2 class="section-no-orders-title">Нет заказов</h2>
                <div class="no_orders_text">
                  К сожалению, на данные момент история заказов пуста. <br> Перейдите в каталог и выберите нужные товары. <br> Акции и горячие предложения на главной старнице помогут вам в выборе.
                </div>
                <Button :width_btn="15" :route_btn="'/'">Вернуться на главную</Button>
              </section>
            </Transition>
            <Transition name="fade">
              <section class="section-messages" v-if="message_page===true">
                <h2 class="section-messages-title">Архив собщений</h2>
                <div class="messages-wrapp">
                  <div class="messages-archive" v-for="message in user.messages">
                    <div class="message_date">{{ new Date(message.created_at).toLocaleDateString()}}</div>
                    <div class="message_id">№ {{ message.id + 1348 }}</div>
                    <div class="message_content">
                      <div class="client_message">
                        <h3 class="client_message-theme">{{message.theme}}:</h3>
                        <div class="client_message_body">{{ message.message }}</div>
                      </div>
                      <div v-if="message.answered" class="answer_message">
                        <h3 class="answer_message-title">Ответ:</h3>
                        <div class="answer_message_body">{ message.answer }}</div>
                      </div>
                      <div v-else class="answer_message">
                        <h3 class="answer_message-title">Ответ:</h3>
                        <div class="answer_message_body">Ожидается ответ</div>
                      </div>
                    </div>
                  </div>
                  <div class="send-message" >
                    <FormMessageSend @newMessage="getNewMessage" />
                  </div>
                </div>
              </section>
            </Transition>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script setup>
import {useUserStore} from "../../stores/UserStore";
import {computed, onMounted, resolveComponent, ref} from "vue";

const config = useRuntimeConfig();

const sendMessage = ref(false);
const sendUserEdit = ref(false);

definePageMeta({
  middleware: 'auth'
});
const removeUser = () => {
  useUserStore().removeUser();
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
const UserEdit = resolveComponent('UserEdit');
const userEdit = ref(false);

const showUserEdit = () => {
  console.log('showUserEdit');
  userEdit.value = true;
}
const openUserEdit = () => {
  userEdit.value = !userEdit.value;
  sendUserEdit.value = !sendUserEdit.value;
  useUserStore().addUserInfo(user);
}

const profile_page = ref(false);
const message_page = ref(false);
const orders_page = ref(false);

const getNewMessage = () => {
  message_page.value = false;
  sendMessage.value = !sendMessage.value;
};

const urlUserInfo = computed(() => config.public.apiBaseUrl + `users/user/${useUserStore().getUser().value.id}`);

const { pending, data: user } = await useLazyAsyncData(
    "user",
    () => $fetch(urlUserInfo.value, {
      headers: {
          'Authorization': `Bearer ${useUserStore().getToken().value}`,
          "Accept": "application/json",
          'Content-Type': 'application/json',
        },
        method: 'GET',
        withCredentials: true,
        credentials: 'include',
      }
    ), {
      watch: [sendMessage, sendUserEdit]
    }
);
useUserStore().addUserInfo(user);
console.log(user);

// console.log(user.value.messages);

const windowWidth = ref(0);
const updateWidth = () => {
  windowWidth.value = window.innerWidth;
};
onMounted(()=>{
  updateWidth();
  window.addEventListener('resize', updateWidth);
});

</script>

<style scoped>
.section-profile{
  margin-top: 3.5rem;
  background: #F7F7F7;
  border-radius: 25px 25px 0 0;
  padding-top: 3.5rem;
  min-height: 84vh;
}
.container-profile{
  display: flex;
}
.left-profile{
  flex: 30% 0 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: .5rem 0;
}
.prodile-svg{
  width: 12.5rem;
  height: 12.5rem;
  border-radius: 100%;
  background: #C4C4C4;
  display: flex;
  align-self: center;
  justify-content: center;
}
.prodile-info{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
}
.info_name{
  font-weight: 600;
  font-size: 1.125rem;
  line-height: 150%;
  color: #384255;
  text-align: center;
  margin: 2.5rem 0 1.875rem 0;
}
.info_phone{
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  text-align: center;
  color: #384255;
}
.logout_title{
  font-weight: 700;
  font-size: .875rem;
  line-height: 1.0625rem;
  text-align: center;
  color: #4B7EE8;
  margin-top: 5.5rem;
  cursor: pointer;
  transition: all .3s ease;
}

.logout_title:hover{
  transition: all .3s ease;
  color: rgb(36, 159, 255);
}
.profile-line{
  transform: rotate(90deg);
  width: 10%;
}
.left-profile{
  border-right: rgba(133, 143, 164, 0.2) 2px solid;
  height: max-content;
}

.right-profile{
  display: flex;
  margin-left: 4.2125rem;
  width: 100%;
  padding: .5rem 0;

}
.right-profile_l{
  flex: 65% 0 1;
  display: flex;
  flex-direction: column;
  width: 100%;
}
.right-profile_l-bottom{
  display: flex;
  width: 100%;
  flex-direction: column;
  align-items: flex-start;
  padding: 1.875rem;
}
.right-profile_l-top{
  width: 100%;
  background: #F53B49;
  border-radius: 6px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 1.875rem;
}
.item-title{
  font-weight: 800;
  font-size: 1.5rem;
  line-height: 120%;
  color: #1A1A25;
  margin-bottom: .625rem;
}
.l-top_title{
  color: #FFFFFF;
}
.name{
  font-weight: 700;
  font-size: 1.25rem;
  line-height: 150%;
  color: #FFFFFF;
}
.phone,
.address{
  font-weight: 400;
  font-size: 1.25rem;
  line-height: 150%;
  color: #FFFFFF;
}
.address{
  margin-top: .625rem;
}
.profile-edit{
  font-weight: 700;
  font-size: 1rem;
  line-height: 1.1875rem;
  color: #FFFFFF;
  padding-top: 1.875rem;
  transition: all .3s ease;
  cursor: pointer;
}
.profile-edit:hover{
  transition: all .3s ease;
  color: #efecec;
}

.right-profile_l-bottom{
  width: 100%;
  background: #FFFFFF;
  border-radius: 6px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 1.875rem;
  margin-top: 2.5rem;
}
.message_body{
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  color: #384255;
}
.message_send{
  font-weight: 700;
  font-size: .875rem;
  line-height: 1.0625rem;
  color: #F53B49;
  padding-top: 2.1875rem;
  cursor: pointer;
  transition: all .3s ease;
}
.message_send:hover{
  transition: all .3s ease;
  color: #BD0F2C;
}

.right-profile_r{
  background: #FFFFFF;
  border-radius: 6px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  height: max-content;
  flex: 35% 0 1;
  padding: 1.875rem;
  margin-left: 2rem;
}
.profile_orders{
  width: 100%;
}
.last_order{
  margin-bottom: .625rem;
}
.past_orders_title{
  font-weight: 700;
  font-size: 1rem;
  line-height: 150%;
  color: #384255;
  margin: .625rem 0;
}
.no-orders_title{
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  color: #384255;
}
.all_orders{
  font-weight: 700;
  font-size: .875rem;
  line-height: 1.0625rem;
  color: #4B7EE8;
  padding-top: 2.1875rem;
  cursor: pointer;
  transition: all .3s ease;
}
.all_orders:hover{
  transition: all .3s ease;
  color: rgb(36, 159, 255);
}
.buttons{
  display: flex;
  margin-bottom: 3.5rem;
}
.profile_to_pages{
  display: flex;
  width: 8rem;
  height: 2.5rem;
  justify-content: center;
  font-size: 0.875rem;
  font-weight: 700;
  font-family: 'Inter', sans-serif;
  align-items: center;
  transition: all .3s ease;
  background-color: #FFFFFF;
  border: 1px solid #384255;
  border-radius: 4px;
  color: #384255;
  opacity: 0.8;
  margin-left: 1.5rem;
}
.profile_to_pages:first-child{
  margin-left: 0;
}
.btn_messages{
  width: 12rem;
}
.profile_to_pages:hover{
  transition: all .3s ease;
  opacity: 1;
  cursor: pointer;
}
.activePage{
  transition: all .3s ease;
  background-color: #E31235;
  border: none;
  color: #FFFFFF;
  opacity: 1;
}

.section-no-orders-title,
.section-messages-title{
  color: #384255;
  font-weight: 700;
  font-size: 1.875rem;
  line-height: 120%;
  margin-top: 3.125rem;
  margin-bottom: 2rem;
}
.no_orders_text{
  color: #1A1A25;
  width: 90%;
  font-weight: 400;
  font-size: 1.25rem;
  line-height: 150%;
  margin-bottom: 5rem;
}
.messages-wrapp{
  margin-top: 5rem;
  width: 70%;
  display: flex;
  flex-direction: column;
}
.messages-archive{
  display: flex;
  justify-content: space-between;
}
.message_content{
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.answer_message-title,
.client_message-theme{
  font-weight: 700;
  font-size: 1rem;
  line-height: 150%;
  color: #384255;
  margin-bottom: .3175rem;
}
.answer_message-title{
  margin-top: 1.25rem;
}
.message_date,
.answer_message_body,
.client_message_body{
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  color: #384255;
}
.message_id{
  font-weight: 700;
  font-size: 1.125rem;
  line-height: 150%;
  color: #384255;
}
.message_id,
.message_date{
  flex: 20% 0 0;
}

.send-message{
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-top: 14.125rem;
}


.article {
  width: 100%;
  background: #F7F7F7;
  padding: 0;
  margin-right: 0;
}
.mask{
  background: #F7F7F7;
}
.icons{
  border-bottom: solid 10.3125rem #F7F7F7;
}
.icon-1{
  width: 20.25rem;
  height: 37.625rem;
  border-radius: .625rem;
  box-shadow: .3125rem .625rem .3125rem .9375rem #F7F7F7, .625rem -.625rem .3125rem #F7F7F7, -.625rem .625rem .3125rem #F7F7F7, -.625rem -.625rem .3125rem #F7F7F7;
}
.icon-2{
  width: 24.25rem;
  height: 37.625rem;
  border-radius: .625rem;
  box-shadow: .3125rem .625rem .3125rem .9375rem #F7F7F7, .625rem -.625rem .3125rem #F7F7F7, -.625rem .625rem .3125rem #F7F7F7, -.625rem -.625rem .3125rem #F7F7F7;
}
.icon-2-2{
  width: 44.25rem;
  height: 20.625rem;
  box-shadow: .3125rem 2rem .3125rem .9375rem #F7F7F7, .625rem -.625rem .3125rem #F7F7F7, -.625rem 1.625rem .3125rem #F7F7F7, -.625rem -.625rem .3125rem #F7F7F7;
}

@media (max-width: 1000px) {
  .icon-2-2{
    width: 40.25rem;
  }
  .icon-1{
    width: 18.25rem;
  }
}

@media (max-width: 940px) {
  .icon-2{
    width: 21.25rem;
  }
  .icon-2-2{
    width: 40.25rem;
  }
}

@media (max-width: 910px) {
  .icon-2{
    width: 20.25rem;
  }
  .icon-2-2{
    width: 38.25rem;
  }
  .icon-1{
    width: 17.25rem;
  }
}

@media (max-width: 870px) {
  .icon-2{
    width: 18.25rem;
  }
  .icon-2-2{
    width: 35.25rem;
  }
  .icon-1{
    width: 17.25rem;
  }
}

@media (max-width: 820px) {
  .icon-2{
    width: 16.25rem;
  }
  .icon-2-2{
    width: 32rem;
  }
  .icon-1{
    width: 18.25rem;
  }
}

@media (max-width: 768px) {
  .container-profile{
    flex-direction: column;
  }
  .left-profile{
    flex-direction: row;
    background: #FFFFFF;
    width: 80%;
    /*border-right: none;*/
    border: 2px solid rgba(133, 143, 164, 0.2);
    justify-content: flex-start;
    padding: 1.875rem;
    border-radius: 10px;
    margin-bottom: 1rem;
  }
  .right-profile{
    margin-left: 0;
  }
  .prodile-info{
    align-items: flex-start;
    width: 50%;
  }
  .info{
    padding: 0 3rem;
  }
  .info_name{
    margin: 1rem 0;
  }
  .info_name,
  .info_phone{
    text-align: left;
  }
  .logout_title{
    margin-top: 260%;
  }

  .icons{
    flex-direction: column;
  }
  .icon-2{
    width: 100%;
    height: 45vh;
  }
  .icon-2-2{
    width: 100%;
    height: 45vh;
  }
  .icon-1{
    width: 100%;
    height: 35vh;
  }
}
@media (max-width: 576px) {
  .right-profile{
    flex-direction: column;
  }
  .right-profile_r{
    margin-left: 0;
    margin-top: 2.5rem;
    margin-bottom: 20rem;
  }
  .left-profile{
    width: 100%;
  }
}

@media (max-width: 460px) {
  .right-profile{
    flex-direction: column;
  }
  .right-profile_r{
    margin-left: 0;
    margin-top: 2.5rem;
    margin-bottom: 20rem;
  }
  .info{
    padding: 0 1rem 0 1.625rem;
  }
}

@media (max-width: 375px) {
  .prodile-svg{
    width: 11.5rem;
    height: 11.5rem;
  }
}

@media (max-width: 360px) {
  .prodile-svg{
    width: 10.5rem;
    height: 10.5rem;
  }
  .info{
    padding: 0;
  }
  .left-profile{
    justify-content: space-between;
    margin-bottom: .625rem;
  }
  .logout_title{
    margin-top: 0;
    background: #FFFFFF;
    border-radius: 10px;
    line-height: 3.0625rem;
    margin-bottom: 1rem;
  }
  .icon-2{
    height: 40vh;
  }
  .icon-2-2{
    height: 40vh;
  }
  .icon-1{
    height: 30vh;
  }
}
</style>