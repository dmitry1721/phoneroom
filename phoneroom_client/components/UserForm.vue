<template>
  <div class="form-section">
    <form action="/eqd">
      <input type="text" placeholder="ssssfae" @blur="v$.state.name.$touch" v-model.trim="state.name">
      <div class="tel">
        <vue-tel-input v-model.number="state.phone" v-bind="bindProps"></vue-tel-input>
      </div>
      {{ state.name }}

      <input
          type="submit"
          value="Отправить
      ">
    </form>

  </div>
</template>

<script setup>
import { useVuelidate } from '@vuelidate/core'
import { required, minLength } from '@vuelidate/validators'
import { VueTelInput } from 'vue-tel-input';
import {computed, reactive} from "vue";

const state = reactive({
  name: '',
  phone: '',
})

const rules = {
  name: {
    required,
    minLength: minLength(10)
  }
};
const v$ = useVuelidate(rules, state);
const bindProps = computed(() => {
  return {
    autoFormat: true,
    inputOptions: {
      maxlength: 16,
      placeholder: "Введите номер телефона",
      type: "tel",
      showDialCode: true,
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
.form-section input,
.tel{
  /*border: #BD0F2C 2px solid;*/
}
</style>