<template>
  <div class="form-section">
    <form action="" >
      <div class="form-group">
        <h2 class="form_label">Тема обращения</h2>
        <div class="form-input_wrapp"
             :class="{
          'input-error': v$.theme.$error,
          'input-invalid': !v$.theme.$invalid,
         }">
          <input class="form_input"
                 id="theme"
                 name="theme"
                 type="text"
                 placeholder="Тема"
                 v-model.trim="formData.theme"
                 @change="v$.theme.$touch">

        </div>
        <div v-if="v$.theme.$error" class="error_message">
          {{ v$.theme.$errors[0].$message }}
        </div>
      </div>

      <div class="form-group">
        <h2 class="form_label">Ваше сообшение</h2>
        <div class="form-input_wrapp form-textarea"
             :class="{
          'input-error': v$.message.$error,
          'input-invalid': !v$.message.$invalid,
         }">
            <textarea class="form-input_wrapp form_input form-message"
                   id="message"
                   name="message"
                   placeholder="Сообщение"
                   v-model.trim="formData.message"
                   @change="v$.message.$touch"></textarea>
          </div>
        <div v-if="v$.message.$error" class="error_message">
          {{ v$.message.$errors[0].$message }}
        </div>
      </div>
      <div class="message_error" v-if="countMessageError">{{ countMessageError }}</div>
      <div class="message_error" v-if="sendMessageError">{{ sendMessageError }}</div>
      <div class="login-form" >
        <Button @click.prevent="sendMessage"
                :width_btn="22"
                :route_btn="''"
                :disabled_btn="disabled_reg=(v$.theme.$error || v$.message.$error || formData.theme === '' || formData.message === '' || countNotAnsweredMessages !== 0)">
          Отправить заявку</Button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { useVuelidate } from '@vuelidate/core'
import { required, minLength, maxLength, helpers, sameAs, email } from '@vuelidate/validators'
import {useUserStore} from "../stores/UserStore";
import {computed, reactive} from "vue";

const disabled_reg = ref(true);

const emit = defineEmits(['newMessage',]);

const config = useRuntimeConfig();
const formData = reactive({
  theme: '',
  message: '',
})

const rules = computed(() => {
  return {
    theme: {
      required: helpers.withMessage('Тема обязательна для заполнения', required),
    },
    message: {
      required: helpers.withMessage('Введите ваше сообщение', required),
    },
  }
});
const v$ = useVuelidate(rules, formData);
const sendMessageError = ref('');
const countMessageError = ref('');
const countNotAnsweredMessages = ref(0);
if (useUserStore().userInfo.value.messages){
  for (const message of useUserStore().userInfo.value.messages) {
    if (message.answered === false){
      countNotAnsweredMessages.value++;
      break;
    }
  }
}
if (countNotAnsweredMessages.value !== 0){
  countMessageError.value = 'Для отправки нового сообщения, дождитесь ответа на неотвеченное';
}
const urlSendMessage = computed(() => config.public.apiBaseUrl + `messages/${useUserStore().getUser().value.id}/create`);

const sendMessage = () => {
  if (!disabled_reg.value){
    messageCreateFormRequest().then((res) => {
      countNotAnsweredMessages.value++;
      emit('newMessage');
    }).catch((err) => {
      sendMessageError.value = `Отправка сообщения не удалась. Проверьте корректность данных.`;
      console.error('Contact form could not be send', err)
    });
  }
};

const messageCreateFormRequest = async () => {
  return await $fetch(urlSendMessage.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      'Accept': 'application/json',
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      theme: formData.theme,
      message: formData.message,
    },
  });
}

</script>

<style scoped>

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
  justify-content: space-between;
  display: flex;
  align-items: center;
  transition: all .3s ease;
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
  width: 100%;
  height: 100%;
  padding: 0 1rem;
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

.login-form{
  margin: 5.25rem 0;
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
}
.input-error{
  border: 1px solid #E31235;
  background: #FFFFFF;
  transition: all .3s ease;
}
.input-invalid{
  border: 1px solid #66afe9;
  background: #FFFFFF;
  transition: all .3s ease;
}
.form_label{
  padding-bottom: .3175rem;
  font-weight: 700;
  font-size: 1rem;
  line-height: 150%;
  color: #384255;
}
.form-message{
  border: none;
  min-height: 100%;
  padding-top: 3%;
  resize: none;
  outline: none;
}
.form-textarea{
  width: 43rem;
  height: 14rem;
}
.form-message:hover{
  border: none;
}
.message_error{
  color: #E31235;
  font-size: 1rem;
  margin-top: 1rem;
}

@media (max-width: 550px) {
  .form-textarea{
    width: 38rem;
  }
}

@media (max-width: 500px) {
  .form-textarea{
    width: 34rem;
  }
}

@media (max-width: 440px) {
  .form-textarea{
    width: 32rem;
  }
}

@media (max-width: 360px) {
  .form-textarea{
    width: 30rem;
  }
}

@media (max-width: 340px) {
  .form-textarea{
    width: 100%;
  }
}
</style>