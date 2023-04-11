<template>
  <div class="footer-body">
    <div class="footer_top">
      <div class="footer_top-client">
        <h2 class="client_title title">Покупателям</h2>
        <div class="client_body">
          <ul class="client_ul footer_ul">
            <nuxt-link to="#">
              <li class="footer_link">
                Каталог
              </li>
            </nuxt-link>
            <nuxt-link to="#">
              <li class="footer_link">
                Акциии и скидки
              </li>
            </nuxt-link>
            <nuxt-link to="#">
              <li class="footer_link">
                Бонусная система
              </li>
            </nuxt-link>
            <nuxt-link to="#">
              <li class="footer_link">
                Гарантии
              </li>
            </nuxt-link>
            <nuxt-link to="#">
              <li class="footer_link">
                Политика конфиденциальности
              </li>

            </nuxt-link>
            <nuxt-link to="#">
              <li class="footer_link footer_link-last">
                Кредит и рассрочка
              </li>
            </nuxt-link>
          </ul>
        </div>
      </div>
      <div class="footer_top-pay">
        <h2 class="pay_title title">Доставка и оплата</h2>
        <div class="pay_body">
          <ul class="pay_ul footer_ul">
            <nuxt-link to="#">
              <li class="footer_link">
                Способы оплаты
              </li>
            </nuxt-link>
            <nuxt-link to="#">
              <li class="footer_link">
                Способы доставки
              </li>
            </nuxt-link>
            <nuxt-link to="#">
              <li class="footer_link">
                Возврат товара
              </li>
            </nuxt-link>
            <nuxt-link to="#">
              <li class="footer_link footer_link-last">
                Сервисная заявка
              </li>
            </nuxt-link>
          </ul>
        </div>
      </div>
      <div class="footer_top-about">
        <h2 class="about_title title">О компании</h2>
        <div class="about_body">
          <ul class="about_ul footer_ul">
            <nuxt-link to="#">
              <li class="footer_link">
                «Телефон.Рум»
              </li>
            </nuxt-link>
            <nuxt-link to="#">
              <li class="footer_link footer_link-last">
                Магазины
              </li>
            </nuxt-link>
          </ul>
        </div>
      </div>
      <div class="contact-wrapp">
        <div class="footer_top-contact">
          <h2 class="contact_title title">Обратная связь</h2>
          <div class="contact_body">
            <h3 class="footer_link">Контакты</h3>
            <ul class="contact_ul footer_ul">
              <a href="tel:+78000000000"  target="_blank">
                <li class="footer_link"><span class="white">+7 (800) 000-00-00</span> по России</li>
              </a>
              <nuxt-link to="#">
                <span class="footer_link white">info@phone-room.ru</span>
                <li class="footer_link white footer_link-last">Написать</li>
              </nuxt-link>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="line"></div>
    <div class="footer_down">
      <div class="footer_logo">
        <div class="logo">
          <LogoImage />
          <LogoTitle />
        </div>
        <span class="company-text">@Телефон.Рум 2022-{{ new Date().getFullYear() }}. Все права защищены</span>
      </div>
      <div class="footer_icons">
        <div class="social-links__border">
          <a class="social-links__item social-links__item_whatsapp" href="https://wa.me/78000000000" target="_blank"></a>
        </div>
        <div class="social-links__border">
          <a class="social-links__item social-links__item_telegram icon-telegram" href="https://telegram.me/phoneroom" target="_blank"></a>
        </div>
        <div class="social-links__border">
          <a class="social-links__item social-links__item_vk" href="https://vk.me/phoneroom" target="_blank"></a>
        </div>
      </div>
      <div class="footer_payment">
        <svg xmlns="http://www.w3.org/2000/svg" width="4.8125rem" height="4.1825rem" viewBox="0 0 77 67" fill="none">
          <path d="M30.8307 23.5298L26.9175 43.5119H33.1761L37.0926 23.5298H30.8307Z" fill="#858FA4"/>
          <path d="M21.6698 23.5525L15.5399 37.1797L14.8863 35.1221C13.6774 32.6429 10.2455 29.0824 6.21631 26.8385L11.8214 43.5024L18.4438 43.4926L28.3002 23.5483L21.6698 23.5525Z" fill="#858FA4"/>
          <path d="M12.5108 24.9823C12.147 23.7651 11.0927 23.4023 9.78396 23.3589H0.0804867L0 23.7567C7.55126 25.3507 12.5479 29.1913 14.6212 33.8093L12.5108 24.9823Z" fill="#858FA4"/>
          <path d="M49.7785 27.361C51.826 27.333 53.3102 27.7224 54.4628 28.1258L55.0278 28.3569L55.8745 24.026C54.635 23.6212 52.6921 23.187 50.2678 23.187C44.0832 23.187 39.7241 25.8973 39.6903 29.7814C39.65 32.6514 42.7954 34.2538 45.1714 35.2104C47.6101 36.1909 48.4279 36.8142 48.4166 37.6896C48.3973 39.0273 46.4721 39.6408 44.674 39.6408C42.1676 39.6408 40.8364 39.3396 38.7808 38.5945L37.9743 38.2751L37.0938 42.7475C38.5586 43.3063 41.2614 43.7868 44.0671 43.812C50.6461 43.812 54.9216 41.1339 54.9666 36.9837C54.994 34.7132 53.3247 32.9805 49.7076 31.5589C47.5184 30.6316 46.1791 30.0153 46.192 29.0797C46.192 28.2491 47.3284 27.361 49.7785 27.361Z" fill="#858FA4"/>
          <path d="M71.935 23.5522H67.0994C65.5975 23.5522 64.4803 23.908 63.8203 25.2106L54.5273 43.5231H61.0999C61.0999 43.5231 62.172 41.0607 62.415 40.5214C63.1346 40.5214 69.5204 40.5299 70.4299 40.5299C70.6166 41.2274 71.1929 43.5231 71.1929 43.5231H76.9992L71.935 23.5522ZM64.2163 36.4315C64.7314 35.2843 66.7098 30.847 66.7098 30.847C66.676 30.9016 67.2201 29.6914 67.5436 28.9392L67.9654 30.6621C67.9654 30.6621 69.1646 35.4328 69.4158 36.4315H64.2163Z" fill="#858FA4"/>
        </svg>
        <svg class="icon-master" xmlns="http://www.w3.org/2000/svg" width="4.4375rem" height="3.8125rem" viewBox="0 0 71 61" fill="none">
          <path d="M71 30.5002C71 20.5631 61.6097 12.397 49.929 12.397C44.8903 12.397 40.3097 13.8728 36.6452 16.4308C39.3935 18.6937 41.5694 21.547 42.6 24.7937H40.8823C39.7371 21.9405 37.9048 19.3825 35.3855 17.3163C32.8661 19.3825 31.0339 21.9405 29.8887 24.7937H28.171C29.3161 21.547 31.3774 18.6937 34.1258 16.4308C30.4613 13.8728 25.9952 12.397 20.9564 12.397C9.39032 12.397 0 20.5631 0 30.5002C0 40.4373 9.39032 48.6034 21.071 48.6034C26.1097 48.6034 30.6903 47.0292 34.2403 44.5696C31.4919 42.3067 29.4306 39.4534 28.2855 36.2067H30.0032C31.1484 39.0599 32.9806 41.6179 35.5 43.6841C38.0194 41.6179 39.9661 39.0599 40.9968 36.2067H42.7145C41.5694 39.4534 39.5081 42.3067 36.7597 44.5696C40.4242 47.1276 45.0048 48.6034 50.0435 48.6034C61.6097 48.6034 71 40.4373 71 30.5002Z" fill="#858FA4"/>
          <path d="M55.5405 34.7308L57.0292 28.0405H58.8615L59.0905 28.7292C59.4341 28.4341 60.0067 28.0405 61.1518 28.0405L60.5792 29.8115C60.0067 29.8115 59.0905 29.7131 58.4034 31.6808L57.7163 34.7308H55.5405Z" fill="#1A1A25"/>
          <path d="M27.4836 26.3677H29.5449L29.0868 28.1386H30.232L29.8884 29.5161H28.8578L28.2852 32.1725C28.1707 32.6644 28.2852 33.1564 29.4304 32.9596L29.2013 34.4354C28.7433 34.7306 28.1707 34.7306 27.5981 34.7306C27.1401 34.7306 25.5368 34.4354 25.8804 32.6644L27.4836 26.3677Z" fill="#1A1A25"/>
          <path d="M36.6457 31.7792C36.8747 30.697 37.4473 28.0405 33.7828 28.0405C30.3473 28.0405 29.8892 30.9921 29.8892 31.3857C29.7747 31.7792 29.7747 34.7308 33.4392 34.7308C34.3554 34.7308 35.615 34.6325 36.1876 34.4357L36.5312 33.0583C36.1876 33.1567 35.0425 33.255 34.1263 33.255C33.3247 33.255 31.9505 33.255 32.1796 31.7792H36.6457Z" fill="#1A1A25"/>
          <path d="M25.4231 29.6145L25.8811 28.2371C24.8505 27.9419 24.0489 27.9419 23.8198 27.9419C23.4763 27.9419 20.9569 27.9419 20.6134 29.5161C20.2698 30.7951 20.8424 31.2871 21.3005 31.4838C22.1021 31.779 22.5602 32.0742 23.0182 32.2709C23.5908 32.4677 23.4763 33.2548 22.7892 33.2548C22.4457 33.2548 21.0715 33.3532 20.0408 33.058L19.6973 34.4354C20.7279 34.6322 21.415 34.6322 22.2166 34.6322C22.7892 34.6322 25.3086 34.7306 25.6521 32.7629C25.8811 31.779 25.3086 31.3854 24.965 31.0903C24.5069 30.8935 23.9344 30.5 23.4763 30.4016C23.0182 30.2048 22.6747 29.6145 23.4763 29.4177C23.8198 29.5161 24.8505 29.5161 25.4231 29.6145Z" fill="#1A1A25"/>
          <path d="M11.6809 34.7308L13.5132 26.6631H9.96316L7.44381 31.5825L6.98575 26.6631H3.66478L1.83252 34.7308H3.89381L5.268 28.926L5.84058 34.7308H7.78736L10.7648 29.0244L9.5051 34.7308H11.6809Z" fill="#1A1A25"/>
          <path d="M14.0855 28.2372L13.742 29.713C14.3146 29.713 15.6887 29.5163 16.3758 29.5163C17.0629 29.5163 17.9791 29.4179 17.6355 30.4018C17.0629 30.4018 13.2839 29.9098 12.7113 32.7631C12.4823 34.1405 13.8565 34.8292 14.8871 34.8292C15.9178 34.8292 16.2613 34.6324 16.6049 34.4356L16.8339 34.8292H18.7807L19.5823 31.1889C19.8113 30.3034 20.1549 28.1388 16.6049 28.1388C16.1468 28.0405 15.4597 28.0405 14.0855 28.2372Z" fill="#1A1A25"/>
          <path d="M48.3261 28.5323C47.7536 28.2371 47.41 28.2371 46.7229 28.2371C46.0358 28.2371 44.4326 28.8274 44.2036 30.4016C43.86 32.3694 45.3487 33.2549 47.5245 32.6645L48.0971 34.3371C47.41 34.6323 46.7229 34.7307 45.5778 34.7307C43.402 34.7307 40.9971 33.0581 42.0278 29.6145C42.8294 27.1549 45.3487 26.171 46.8374 26.2694C48.5552 26.3678 49.2423 26.8597 49.7003 27.3516L48.3261 28.5323Z" fill="#1A1A25"/>
          <path d="M66.3056 28.8276C65.8475 28.5324 65.6185 28.0405 64.7023 28.0405C63.5572 28.0405 61.7249 27.8437 60.6943 30.8937C60.0072 32.9599 61.3814 34.7308 62.8701 34.7308C63.5572 34.7308 64.2443 34.4357 64.7023 34.2389L64.9314 34.7308H67.2217L69.054 26.2695H66.8782L66.3056 28.8276Z" fill="#1A1A25"/>
          <path d="M49.8155 28.2372L49.472 29.713C50.0445 29.713 51.4187 29.5163 52.1058 29.5163C52.7929 29.5163 53.5945 29.4179 53.3655 30.4018C52.7929 30.4018 49.0139 29.9098 48.4413 32.7631C48.2123 34.1405 49.5865 34.8292 50.6171 34.8292C51.6478 34.8292 51.9913 34.6324 52.3349 34.4356L52.5639 34.8292H54.5107L55.3123 31.1889C55.5413 30.3034 55.8849 28.1388 52.3349 28.1388C51.9913 28.0405 51.1897 28.0405 49.8155 28.2372Z" fill="#1A1A25"/>
          <path d="M32.1792 30.5H34.8131C34.9276 29.8113 34.6985 29.3193 33.8969 29.3193C32.9808 29.3193 32.4082 29.7129 32.1792 30.5Z" fill="#858FA4"/>
          <path d="M17.2925 31.7792C16.949 31.7792 16.1473 31.5824 15.4603 31.9759C14.7732 32.3695 14.5441 33.0582 15.3457 33.255C16.0328 33.4517 16.949 33.0582 17.178 32.4679L17.2925 31.7792Z" fill="#858FA4"/>
          <path d="M65.6181 31.5824C65.8471 30.9921 65.7326 30.205 65.5036 29.9098C64.8165 29.1227 63.3278 29.7131 62.8697 31.1889C62.5262 32.1727 63.2132 32.8614 63.9003 32.8614C64.7019 32.8614 65.16 32.3695 65.6181 31.5824Z" fill="#858FA4"/>
          <path d="M53.1357 31.7792C52.7922 31.7792 51.9906 31.5824 51.3035 31.9759C50.6164 32.3695 50.3874 33.0582 51.189 33.255C51.8761 33.4517 52.9067 33.0582 53.0212 32.4679L53.1357 31.7792Z" fill="#858FA4"/>
          <path d="M36.645 34.7306L38.1337 28.1387H39.966L40.195 28.8274C40.5386 28.5322 41.1112 28.1387 42.2563 28.1387L41.6837 29.9096C41.2257 29.9096 40.195 29.8113 39.5079 31.779L38.8208 34.829H36.645" fill="#1A1A25"/>
          <path d="M21.0708 12.397C11.795 12.397 3.89341 17.6115 1.14502 24.7937H28.3999C29.545 21.547 31.6063 18.6937 34.3547 16.4308C30.5757 13.9712 25.995 12.397 21.0708 12.397Z" fill="#858FA4"/>
          <path d="M35.5002 17.4146C32.9808 19.4807 31.1486 21.9404 30.0034 24.892H40.997C39.8518 22.0387 38.0195 19.4807 35.5002 17.4146Z" fill="#858FA4"/>
          <path d="M49.9289 12.397C44.8902 12.397 40.3095 13.8728 36.645 16.4308C39.3934 18.6937 41.4547 21.547 42.5999 24.7937H69.8547C67.2208 17.6115 59.3192 12.397 49.9289 12.397Z" fill="#858FA4"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="4.0625rem" height="1.1875rem" viewBox="0 0 65 19" fill="none">
          <g clip-path="url(#clip0_328_3282)">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M57.7039 0H45.3672C46.0305 4.20714 50.01 8.14286 54.3876 8.14286H64.2039C64.3366 7.73571 64.3366 7.19286 64.3366 6.78571C64.3366 2.98571 61.4182 0 57.7039 0Z" fill="#858FA4"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M46.4287 8.82129V18.9999H52.3981V13.5713H57.7042C60.6226 13.5713 63.143 11.5356 63.9389 8.82129H46.4287Z" fill="#858FA4"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.2041 0V19H30.5102C30.5102 19 31.8368 19 32.5 17.6429C36.0817 10.3143 37.1429 8.14286 37.1429 8.14286H37.8061V19H43.7755V0H38.4694C38.4694 0 37.1429 0.135714 36.4796 1.35714C33.4286 7.6 31.8368 10.8571 31.8368 10.8571H31.1735V0H25.2041Z" fill="#858FA4"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 19V0H5.96939C5.96939 0 7.69388 0 8.62245 2.71429C11.0102 9.90714 11.2755 10.8571 11.2755 10.8571C11.2755 10.8571 11.8061 9.09286 13.9286 2.71429C14.8571 0 16.5816 0 16.5816 0H22.551V19H16.5816V8.82143H15.9184L12.602 19H9.94898L6.63265 8.82143H5.96939V19H0Z" fill="#858FA4"/>
          </g>
          <defs>
            <clipPath id="clip0_328_3282">
              <rect width="65" height="19" fill="white"/>
            </clipPath>
          </defs>
        </svg>
      </div>
    </div>
  </div>
</template>

<script setup>
import {onMounted} from "vue";

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
.line{
  height: 1px;
  background: rgba(133, 143, 164, 0.2);
  border-radius: 1px;
}
.title{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 1.125rem;
  line-height: 1.375rem;
  color: #FFFFFF;
  padding-bottom: 2.5rem;
}
.logo{
  display: flex;
  align-items: center;
  cursor: pointer;
}
.footer_ul{
  list-style: none;
}
.footer_link{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 1rem;
  line-height: 1.1875rem;
  color: #858FA4;
  margin-bottom: 0.875rem;
  transition: all .3s ease;
}
li.footer_link:hover{
  color: #BABAC0;
  text-decoration-line: underline;
  transition: all .3s ease;
}
.white{
 color: #FFFFFF;
}
.footer_link-last{
  margin-bottom: 0;
}
.footer_top{
  display: flex;
  flex-direction: row;
  padding: 4.25rem 0;
}
.footer_top-client{
  flex: 30%;
}
.footer_top-pay{
  flex: 20%;
}
.footer_top-about{
  flex: 15%;
}
.footer_top-contact{
  flex: 35%;
}

.footer_down{
  display: flex;
  flex-direction: row;
  padding: 3.25rem 0;
  align-items: center;
}
.company-text{
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: .875rem;
  line-height: 1.0625rem;
  color: #858FA4;
  padding-top: .875rem;
}
.footer_logo,
.footer_icons,
.footer_payment{
  flex: 33.3%;
}
.footer_icons{
  display: flex;
  justify-content: center;
  align-self: center;
}
.footer_payment{
  display: flex;
  justify-content: end;
  align-items: center;
}
.icon-telegram{
  padding: 0 1.1875rem;
}
.icon-master{
  padding: 0 .75rem;
}

.social-links__item{
  display:                    block;
  height:                     2.5rem;
  left:                       0;
  opacity:                    0.3;
  position:                   relative;
  top:                        0;
  transition-duration:         0.3s;
  transition-property:        opacity, left, top;
  transition-timing-function: ease-in-out;
  width:                      2.75rem;
}

/*.social-links{*/
/*  display: flex;*/
/*}*/

.social-links__border{
  border:     1px solid transparent;
  margin:     0 1.125rem;
  transition: border-color 0.3s ease-in-out;
}

.social-links__border:hover{
  border-color: #E31235;
}

.social-links__item_whatsapp{
  background: #1A1A25 url('../img/icon-whatsapp.svg') no-repeat center;
}
.social-links__item_telegram{
  background: #1A1A25 url('../img/icon-telegram.svg') no-repeat center;
}
.social-links__item_vk{
  background: #1A1A25 url('../img/icon-vk.svg') no-repeat center;
}

@keyframes flashing{
  0%, 40%, 100%{
    box-shadow: 0 0 .9375rem 3px #BD0F2C;
  }
  20%, 60%{
    box-shadow: none;
  }
}

.social-links__border:hover .social-links__item{
  animation:    flashing 0.3s linear 0.3s forwards;
  border-color: #BD0F2C;
  left:         -3px;
  opacity:      1;
  top:          4px;
}

@media (max-width: 1300px) {

  .social-links__item_whatsapp{
    background: #1A1A25 url('../img/icon-whatsapp-sm.svg') no-repeat center;
  }
  .social-links__item_telegram{
    background: #1A1A25 url('../img/icon-telegram-sm.svg') no-repeat center;
  }
  .social-links__item_vk{
    background: #1A1A25 url('../img/icon-vk-sm.svg') no-repeat center;
  }
}

</style>