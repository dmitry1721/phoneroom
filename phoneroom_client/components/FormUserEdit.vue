<template>
  <div class="form-section">
    <form action="" >
      <div class="form-group multiply-group">
        <div class="group-1">
          <h2 class="form_label">Имя</h2>
          <div class="form-input_wrapp"
               :class="{
            'input-error': v$.name.$error,
            'input-invalid': !v$.name.$invalid,
           }">
            <input class="form_input"
                   id="name"
                   name="name"
                   type="text"
                   :disabled="isDisabledName"
                   placeholder="Имя"
                   v-model.trim="formData.name"
                   @change="v$.name.$touch">
            <nuxt-img @click="isNoDisabledName" :class="{'pen_active': isDisabledName===false}" class="pen_img" src="img/pen.svg" alt="user-edit-profile" loading="lazy" />
          </div>
          <div v-if="v$.name.$error" class="error_message">
            {{ v$.name.$errors[0].$message }}
          </div>
        </div>
        <div class="group-2">
          <h2 class="form_label">Email</h2>
          <div class="form-input_wrapp"
               :class="{
            'input-error': v$.email.$error,
            'input-invalid': !v$.email.$invalid,
           }">
            <input class="form_input"
                   id="email"
                   name="email"
                   type="email"
                   :disabled="isDisabledEmail"
                   placeholder="example@email.com"
                   v-model.trim="formData.email"
                   @change="v$.email.$touch">
            <nuxt-img @click="isNoDisabledEmail" :class="{'pen_active': isDisabledEmail===false}" class="pen_img" src="img/pen.svg" alt="user-edit-profile" loading="lazy" />
          </div>
          <div v-if="v$.email.$error" class="error_message">
            {{ v$.email.$errors[0].$message }}
          </div>
        </div>
      </div>

      <div class="form-group multiply-group">
        <div class="group-1">
          <h2 class="form_label">Фамилия</h2>
          <div class="form-input_wrapp input-invalid">
            <input class="form_input"
                   id="last_name"
                   name="last_name"
                   type="text"
                   :disabled="isDisabledLastName"
                   placeholder="Фамилия"
                   v-model.trim="formData.last_name"
                   @change="v$.last_name.$touch">
            <nuxt-img @click="isNoDisabledLastName" :class="{'pen_active': isDisabledLastName===false}" class="pen_img" src="img/pen.svg" alt="user-edit-profile" loading="lazy" />
          </div>
        </div>
        <div class="group-2">
          <h2 class="form_label">Отчество</h2>
          <div class="form-input_wrapp input-invalid">
            <input class="form_input"
                   id="middle_name"
                   name="middle_name"
                   type="text"
                   :disabled="isDisabledMiddleName"
                   placeholder="Отчество"
                   v-model.trim="formData.middle_name"
                   @change="v$.middle_name.$touch">
            <nuxt-img @click="isNoDisabledMiddleName" :class="{'pen_active': isDisabledMiddleName===false}" class="pen_img" src="img/pen.svg" alt="user-edit-profile" loading="lazy" />
          </div>
          <!--        <div v-if="v$.email.$error" class="error_message">-->
          <!--          {{ v$.email.$errors[0].$message }}-->
          <!--        </div>-->
        </div>
      </div>
      <div class="form-group">
        <h2 class="form_label">Адрес</h2>
        <div class="form-input_wrapp form-input_wrapp__address input-invalid">
          <vue-dadata class="form_input"
                      id="fullAddress"
                      name="fullAddress"
                      type="text"
                      :disabled="isDisabledAddress"
                      placeholder="Адрес"
                      v-model.trim="formData.address"
                      :token="token"
          />
          <nuxt-img @click="isNoDisabledAddress" :class="{'pen_active': isDisabledAddress===false}" class="pen_img" src="img/pen.svg" alt="user-edit-profile" loading="lazy" />
        </div>
      </div>
      <div class="edit_error" v-if="userEditError">{{ userEditError }}</div>
      <div class="login-form" >
        <Button @click.prevent="saveChanges()"
                :width_btn="22"
                :route_btn="''"
                :disabled_btn="disabled_reg=(v$.name.$error || v$.last_name.$error || v$.middle_name.$error || v$.email.$error || v$.address.$error ||
                               (formData.middle_name===useUserStore().userInfo.value.middle_name &&
                               formData.last_name===useUserStore().userInfo.value.last_name &&
                               formData.address===useUserStore().userInfo.value.address &&
                               formData.email===useUserStore().userInfo.value.email &&
                               formData.name===useUserStore().user.first_name))">
          Сохранить изменения</Button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { useVuelidate } from '@vuelidate/core'
import { required, minLength, maxLength, helpers, sameAs, email } from '@vuelidate/validators'
import {useUserStore} from "../stores/UserStore";
import {VueDadata} from "vue-dadata";
import {computed, reactive, ref} from "vue";

const appConfig = useRuntimeConfig();

const token = appConfig.public.dadataToken;
console.log('FormUserEdit');

const isDisabledName = ref(true);
const isNoDisabledName = () => {
  isDisabledName.value = false;
}

const isDisabledLastName = ref(true);
const isNoDisabledLastName = () => {
  isDisabledLastName.value = false;
}

const isDisabledMiddleName = ref(true);
const isNoDisabledMiddleName = () => {
  isDisabledMiddleName.value = false;
}

const isDisabledEmail = ref(true);
const isNoDisabledEmail = () => {
  isDisabledEmail.value = false;
}

const isDisabledAddress = ref(true);
const isNoDisabledAddress = () => {
  isDisabledAddress.value = false;
}

const config = useRuntimeConfig();

const disabled_reg = ref(true);
const user = ref();

const userEditError = ref('');

const formData = reactive({
  name: useUserStore().getUser().value.first_name,
  email: useUserStore().userInfo.value.email,
  middle_name: useUserStore().userInfo.value.middle_name,
  last_name: useUserStore().userInfo.value.last_name,
  address: useUserStore().userInfo.value.address,
})

const rules = computed(() => {
  return {
    name: {
      required: helpers.withMessage('Имя обязательно для заполнения', required),
    },
    middle_name: {
      required: helpers.withMessage('Имя обязательно для заполнения', required),
    },
    last_name: {
      required: helpers.withMessage('Имя обязательно для заполнения', required),
    },
    email: {
      email: helpers.withMessage('Email неверного формата', email),
    },
    address: {
      required: helpers.withMessage('Адрес обязателен для заполнения', required),
    },
  }
});
const v$ = useVuelidate(rules, formData);

const emit = defineEmits(['openFormUserEdit',]);

const urlUserUpdate = computed(() => config.public.apiBaseUrl + `users/${useUserStore().getUser().value.id}`);

const saveChanges = () => {
  if (!disabled_reg.value){
    updateFormRequest().then((res) => {
      addUserInfo(res);
      if (formData.name !== useUserStore().getUser().value.first_name){
        useUserStore().addUser({
          'id': useUserStore().getUser().value.id,
          'first_name': formData.name,
        });
      }
      console.log(res);
      emit('openFormUserEdit');
    }).catch((err) => {
      userEditError.value = `Сохранение изменений не удалось. Проверьте корректность данных и повторите отправку формы.`;
      console.error('Contact form could not be send', err)
    });
  }
};

const updateFormRequest = async () => {
  return await $fetch(urlUserUpdate.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      'Accept': 'application/json',
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      first_name: formData.name,
      phone: useUserStore().userInfo.value.phone,
      middle_name: formData.middle_name,
      email: formData.email,
      last_name: formData.last_name,
      fullAddress: formData.address,
    },
  });
}

const addUserInfo = (user) => {
  useUserStore().addUserInfo(user);
};
</script>

<style scoped>
.form-section{
  position: relative;
  z-index: 99;
}
.form_title{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 1.25rem;
  line-height: 110%;
  color: #1A1A25;
  margin-bottom: 1.5rem;
}
.form-input_wrapp{
  width: 22rem;
  height: 3rem;
  padding: 0 1rem;
  background: #F7F7F7;
  border: 1px solid rgba(133, 143, 164, 0.5);
  /*border: 1px solid #bbb;*/
  border-radius: 5px;
  justify-content: space-between;
  display: flex;
  align-items: center;
}
.form-group{
  margin-top: 2rem;
}
.form-group:first-child{
  margin-top: 0;
}
.form-input_wrapp:focus-within{
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
  border-color: #66afe9;
  background: #FFFFFF;
}
.form-input_wrapp:hover {
  border: 1px solid rgba(133, 143, 164, 1);
}

.form_input{
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 1rem;
  line-height: 140%;
  color: #858FA4;
  /*width: 100%;*/
  border-radius: 5px;
}
.form_input:disabled{
  opacity: 0.5;
}
.form_input::placeholder {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 1rem;
  line-height: 140%;
  color: #858FA4;
}
.vue-tel-input{
  border-radius: 0 5px 5px 0;
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 1rem;
  line-height: 140%;
  color: #858FA4;
  width: 100%;
}
.vti__dropdown{
  border-radius: 5px;
}
.tel{
  width: 22rem;
  height: auto;
  margin-bottom: 2rem;
}
.vue-tel-input:hover{
  border: 1px solid rgba(133, 143, 164, 1);
}
.form_input_tel{
  padding: 0;
}
.code-wrapp{
  margin-bottom: 2rem;
}
.btn-form{
  /*margin-top: 1rem;*/
}
.login-form{
  margin-top: 5.25rem;
}
.login-form_disbled{
  opacity: 0.5;
}
.error_message{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: .875rem;
  line-height: 110%;
  color: #E31235;
  margin-top: 5px;
  /*margin-bottom: 2rem;*/
}
.input-error{
  border: 1px solid #E31235;
  background: #FFFFFF;
}
.input-invalid{
  border: 1px solid #66afe9;
  background: #FFFFFF;
}
.timeout-message{
  display: block;
  color: #BABAC0;
  font-size: 1rem;
  margin-top: .625rem;
}
.pen_img{
  /*vertical-align: sub;*/
  /*display: inline-block;*/
  /*margin-left: 4rem;*/
  height: 70%;
  opacity: .7;
  transition: all .3s ease;
  cursor: pointer;
}
.pen_img:hover{
  opacity: 1;
  transition: all .3s ease;
}
.pen_active{
  opacity: 1;
}
.form_label{
  padding-bottom: .3175rem;
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  color: #384255;
}
.multiply-group{
  display: flex;
}
.group-1{
  margin-right: 3rem;
}
.form-input_wrapp__address{
  width: 93%;
}
.edit_error{
  color: #E31235;
  font-size: 1rem;
  margin-top: 1rem;
}
</style>