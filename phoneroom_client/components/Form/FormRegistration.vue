<template>
  <div class="form_title">Введите ваши данные</div>
  <div class="form-section">
    <form action="" >
      <div class="form-input_wrapp"
           :class="{
            'input-error': v$.name.$error,
            'input-invalid': !v$.name.$invalid,
           }">
        <input class="form_input"
               id="name"
               name="name"
               type="text"
               placeholder="Имя"
               v-model.trim="formData.name"
               @change="v$.name.$touch">
        <div v-if="v$.name.$error" class="error_message">
          {{ v$.name.$errors[0].$message }}
        </div>
      </div>
      <div class="tel">
        <vue-tel-input class="form_input form_input_tel"
                       :class="{
                        'input-error': v$.phone.$error,
                        'input-invalid': !v$.phone.$invalid,
                       }"
                       v-model.trim="formData.phone"
                       v-bind="bindProps"
                       @input="v$.phone.$touch"/>
        <div v-if="v$.phone.$error" class="error_message">
          {{ v$.phone.$errors[0].$message }}
        </div>
      </div>
      <div class="form-input_wrapp code-wrapp" v-if="!v$.name.$error && !v$.phone.$error && formData.phone!=='' && formData.name!==''">
        <input class="form_input"
               :class="{
                'input-error': v$.code.$error,
                'input-invalid': !v$.code.$invalid,
               }"
               type="number"
               id="code"
               name="code"
               placeholder="Код"
               v-model.trim="formData.code"
               @change="v$.code.$touch">
        <div v-if="v$.code.$error" class="error_message">
          {{ v$.code.$errors[0].$message }}
        </div>
      </div>

      <div class="btn-form">
        <div v-if="disabled_send_count >= 1 && currentTime > 0">
          <Button  @click.prevent="phoneAuth(disabled_send)"
                   :width_btn="14"
                   :route_btn="''"
                   :disabled_btn="disabled_send=true" >
            Получить код</Button>
          <span class="timeout-message" v-if="disabled_send_count >= 6">Кажется использовано слишком много попыток, попробуйте снова позже.</span>
          <span class="timeout-message" v-if="disabled_send_count >= 1 && disabled_send_count !== 6">До получения нового кода {{ currentTime }}с</span>
        </div>
        <div v-else>
          <Button  @click.prevent="phoneAuth(disabled_send)"
                   :width_btn="14"
                   :route_btn="''"
                   :disabled_btn="disabled_send=(v$.name.$error ||
                                              v$.phone.$error ||
                                              formData.phone==='' ||
                                              formData.name==='')" >
            Получить код</Button>
        </div>
      </div>
      <div class="register_error" v-if="registerError">{{ registerError }}</div>
      <div class="login-form" >
        <Button @click.prevent="register(disabled_reg)"
                :width_btn="22"
                :route_btn="''"
                :disabled_btn="disabled_reg=(v$.name.$error ||
                               v$.phone.$error ||
                               v$.code.$error ||
                               formData.phone==='' ||
                               formData.name==='' ||
                               formData.code==='')">
          Войти</Button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { useVuelidate } from '@vuelidate/core'
import { required, minLength, maxLength, helpers, sameAs } from '@vuelidate/validators'
import { VueTelInput } from 'vue-tel-input';

import {useUserStore} from "../../stores/UserStore";
import {computed, reactive, ref} from "vue";
const userStore = useUserStore();


const emit = defineEmits(['login,']);

const config = useRuntimeConfig();

const disabled_send = ref(true);
const disabled_send_count = ref(userStore.getDis());

const disabled_reg = ref(true);
const smsCode = ref("_");
const user = ref();
const formData = reactive({
  name: '',
  phone: '',
  code: '',
})

const rules = computed(() => {
  return {
    name: {
      required: helpers.withMessage('Имя обязательно для заполнения', required),
    },
    phone: {
      required: helpers.withMessage('Номер телефона обязателен для заполнения', required),
      minLength: helpers.withMessage('Неверный формат номера телефона', minLength(10)),
    },
    code: {
      required: helpers.withMessage('Код обязателен для заполнения', required),
      minLength: helpers.withMessage('Неверный формат кода', minLength(6)),
      maxLength: helpers.withMessage('Неверный формат кода', maxLength(6)),
      sameAs: helpers.withMessage('Неверный код', sameAs(smsCode.value)),
    },
  }
});
const v$ = useVuelidate(rules, formData);

const urlPhoneAuth = computed(() => config.public.apiBaseUrl + 'users/phone_auth');
const urlRegister = computed(() => config.public.apiBaseUrl + 'users/register');

const registerError = ref('');
const authToken = ref('');

const currentTime = ref(0);
let timer = null;
const phoneAuth = (disabled) => {
  if (!disabled){
    userStore.addDis();
    timer = null;
    currentTime.value = 45 * disabled_send_count.value;
    if (disabled_send_count.value >= 1 && disabled_send_count.value <= 5){
      if (timer !== 0){
        timer = setInterval(() => {
          currentTime.value--;
        }, 1000);
      }
      else if (timer === 0){
        clearTimeout(timer)
      }
    }
    if (disabled_send_count.value <= 5){
      formData.phone = formData.phone.replace(/[^\d]/g, '');
      phoneAuthFormRequest().then((res) => {
        res = JSON.parse(res);
        console.log(res)
        if (res.success === true){
          smsCode.value = parseInt(res.data.text.replace(/[^\d]/g, ''));
        }
        else {
          console.error('Sms code could not be send')
        }
      }).catch((err) => {
        console.error('Contact form could not be send', err)
      });

    }
  }
};

const register = (disabled) => {
  if (!disabled){
    if (smsCode.value === formData.code && formData.code !== ''){
      registerFormRequest().then((res) => {
        addUser(res);
        console.log(res);
        getUser();
        emit('login');
        userStore.removeDis();
      }).catch((err) => {
        registerError.value = `Регистрация не удалась. Данные некоректны или данный номер уже зарегистрирован.`;
        console.error('Contact form could not be send', err)
      });
    }
  }
};

const phoneAuthFormRequest = async () => {
  return await $fetch(urlPhoneAuth.value , {
    headers: {
      "Accept": "application/json",
      'Content-Type': 'application/json',
      // Authentication: `Bearer ${token.value}`,
    },
    method: 'POST',
    params: {
      first_name: formData.name,
      phone: formData.phone,
    },
  });
}

const registerFormRequest = async () => {
  return await $fetch(urlRegister.value , {
    headers: {
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      first_name: formData.name,
      phone: formData.phone,
    },
  });
}

const addUser = (user) => {
  userStore.addUser(user.data);
  userStore.addToken(user.token);
};

const getUser = () => {
  user.value =  userStore.getUser().value;
  authToken.value = userStore.getToken().value;
};

const bindProps = computed(() => {
  return {
    autoFormat: true,
    inputOptions: {
      maxlength: 14,
      placeholder: "Номер телефона",
      type: "tel",
      showDialCode: false,
    },
    dropdownOptions: {
      showDialCodeInList: true,
      showDialCodeInSelection: true,
      disabled: true,
    },
    validCharactersOnly: true,
  }
});
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
  background: #F7F7F7;
  border: 1px solid rgba(133, 143, 164, 0.5);
  /*border: 1px solid #bbb;*/
  border-radius: 5px;
  margin-bottom: 2rem;
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
  width: 100%;
  border-radius: 5px;
  padding: .75rem 1rem;
  margin-bottom: 5px;
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
  margin-top: 2rem;
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
.register_error{
  color: #E31235;
  font-size: 1rem;
  margin-top: 1rem;
}
</style>