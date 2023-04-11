<template>
  <div>
    <div class="section-review">
      <div class="review-title title">Отзывы</div>
      <div class="review-body">
        <div class="review_total">
          <div class="total_content">
            <div class="review_left">
              <div class="total-rating">
                <h2 class="rating_medium">0</h2>
                <div class="rating_body main-rating" v-if="windowWidth >= 1280">
                  <ClientOnly>
                    <star-rating :star-size="12"
                                 :rating="props.rating"
                                 :read-only="true"
                                 :increment="0.5"
                                 :padding="2"
                                 :show-rating="false"
                                 :round-start-rating="1"
                                 :inline="true"
                                 :rounded-corners="false"
                                 inactive-color="#909CB5"
                                 active-color="#F99808"
                                 :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                  </ClientOnly>
                </div>
                <div class="rating_body main-rating" v-if="windowWidth < 1280 && windowWidth > 1020">
                  <ClientOnly>
                    <star-rating :star-size="10"
                                 :rating="props.rating"
                                 :read-only="true"
                                 :increment="0.5"
                                 :padding="2"
                                 :show-rating="false"
                                 :round-start-rating="1"
                                 :inline="true"
                                 :rounded-corners="false"
                                 inactive-color="#909CB5"
                                 active-color="#F99808"
                                 :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                  </ClientOnly>
                </div>
                <div class="rating_body main-rating" v-if="windowWidth <= 1020">
                  <ClientOnly>
                    <star-rating :star-size="8"
                                 :rating="props.rating"
                                 :read-only="true"
                                 :increment="0.5"
                                 :padding="2"
                                 :show-rating="false"
                                 :round-start-rating="1"
                                 :inline="true"
                                 :rounded-corners="false"
                                 inactive-color="#909CB5"
                                 active-color="#F99808"
                                 :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                  </ClientOnly>
                </div>
              </div>
              <div class="total">0 отзывов</div>
              <div class="btn_review">
                <Button :route_btn="'#writeRate'" v-if="windowWidth >= 640" :src_btn="'img/review.svg'"  :width_btn="12">Написать отзыв</Button>
                <Button :route_btn="'#writeRate'" v-if="windowWidth < 640" :src_btn="'img/review-max.svg'"  :width_btn="5"></Button>
              </div>
            </div>
            <div class="review_right">
              <div class="ratings">
                <div class="rating-item">
                  <div class="rating_body" v-if="windowWidth >= 1280">
                    <ClientOnly>
                      <star-rating :star-size="12"
                                   :rating="5"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth < 1280 && windowWidth > 1020">
                    <ClientOnly>
                      <star-rating :star-size="10"
                                   :rating="5"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth <= 1020">
                    <ClientOnly>
                      <star-rating :star-size="8"
                                   :rating="5"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <h4 class="total label_star">(0) отзывов</h4>
                </div>
                <div class="rating-item">
                  <div class="rating_body" v-if="windowWidth >= 1280">
                    <ClientOnly>
                      <star-rating :star-size="12"
                                   :rating="4"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth < 1280 && windowWidth > 1020">
                    <ClientOnly>
                      <star-rating :star-size="10"
                                   :rating="4"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth <= 1020">
                    <ClientOnly>
                      <star-rating :star-size="8"
                                   :rating="4"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <h4 class="total label_star">(0) отзывов</h4>
                </div>
                <div class="rating-item">
                  <div class="rating_body" v-if="windowWidth >= 1280">
                    <ClientOnly>
                      <star-rating :star-size="12"
                                   :rating="3"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth < 1280 && windowWidth > 1020">
                    <ClientOnly>
                      <star-rating :star-size="10"
                                   :rating="3"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth <= 1020">
                    <ClientOnly>
                      <star-rating :star-size="8"
                                   :rating="3"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <h4 class="total label_star">(0) отзывов</h4>
                </div>
                <div class="rating-item">
                  <div class="rating_body" v-if="windowWidth >= 1280">
                    <ClientOnly>
                      <star-rating :star-size="12"
                                   :rating="2"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth < 1280 && windowWidth > 1020">
                    <ClientOnly>
                      <star-rating :star-size="10"
                                   :rating="2"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth <= 1020">
                    <ClientOnly>
                      <star-rating :star-size="8"
                                   :rating="2"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <h4 class="total label_star">(0) отзывов</h4>
                </div>
                <div class="rating-item">
                  <div class="rating_body" v-if="windowWidth >= 1280">
                    <ClientOnly>
                      <star-rating :star-size="12"
                                   :rating="1"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth < 1280 && windowWidth > 1020">
                    <ClientOnly>
                      <star-rating :star-size="10"
                                   :rating="1"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <div class="rating_body" v-if="windowWidth <= 1020">
                    <ClientOnly>
                      <star-rating :star-size="8"
                                   :rating="1"
                                   :read-only="true"
                                   :increment="0.5"
                                   :padding="2"
                                   :show-rating="false"
                                   :round-start-rating="1"
                                   :inline="true"
                                   :rounded-corners="false"
                                   inactive-color="#909CB5"
                                   active-color="#F99808"
                                   :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                    </ClientOnly>
                  </div>
                  <h4 class="total label_star">(0) отзывов</h4>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="write_review">

          <h2 class="first_review">Отзывов к данному товару нет. Будьте первым и поделитесь своим мнением об этом товаре</h2>
          <Button :route_btn="'#writeRate'" :width_btn="12">Написать отзыв</Button>
          <div id="writeRate" class="form-review">
            <h2 class="title">Оставьте свой отзыв</h2>
            <div class="form-review_wrapp">
              <div class="disabled_review">
                <div class="disabled-body">
                  <nuxt-img class="img-lock" :src="`img/lock.png`" loading="lazy"/>
                  <h3 class="disabled_title">Для написания отзыва необходимо приобрести данный товар.</h3>
                </div>
              </div>
              <div class="common_rating">
                <h3 class="common_title">Общий рейтинг</h3>
                <div class="write_rating">
                  <ClientOnly>
                    <star-rating :star-size="15"
                                 :increment="0.5"
                                 :padding="2"
                                 :show-rating="true"
                                 :round-start-rating="1"
                                 :inline="true"
                                 :rounded-corners="false"
                                 inactive-color="#909CB5"
                                 active-color="#F99808"
                                 :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
                  </ClientOnly>
                </div>
                <form  class="form-review_section">
                  <input class="review_input" type="text" placeholder="ФИО">
                  <div class="contact">
                    <input class="review_input review_input-tel" type="tel" placeholder="Телефон">
                    <input class="review_input review_input-email" type="email" placeholder="Email">
                  </div>
                  <textarea placeholder="Плюсы" class="plus_text"></textarea>
                  <textarea placeholder="Минусы" class="minus_text"></textarea>
                  <textarea placeholder="Ваше сообщение" class="message_text"></textarea>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

import {onMounted} from "vue";

const props = defineProps({
  rating: Object,
});

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
.section-review{
  padding-bottom: 3.75rem;
}
.review-title{
  margin-bottom: 1.875rem;
}
.review-body{
  display: flex;
  align-content: baseline;
  margin-bottom: 3rem;
  justify-content: space-between;
}
.review_total{
  width: 30rem;
  height: 12.5rem;
  background-color: #FFFFFF;
  border-radius: 10px;
  padding: 1.875rem 3.4375rem 4.375rem 1.875rem;
  order: 2;
}
.total_content{
  display: flex;
}
.rating_medium{
  font-weight: 700;
  font-size: 1.875rem;
  line-height: 110%;
  display: inline-block;
  color: #1A1A25;
}
.review_left,
.review_right{
  flex: 50% 0 1;
}
.total{
  font-weight: 400;
  font-size: .875rem;
  line-height: 140%;
  color: rgba(0, 0, 0, 0.5);
  margin-top: 3px;
  margin-left: 3px;
}
.total-rating{
  display: flex;
}
.label_star{
  display: inline-block;
  margin-left: .625rem;
}
.rating_body{
  display: inline-block;
}
.main-rating{
  margin-left: .625rem;
}
.main-rating{
  display: flex;
  align-items: center;
}
.first_review{
  font-size: 1.225rem;
  width: 90%;
  display: inline-block;
  padding-bottom: 1rem;
}
.write_review{
  max-width: 50%;
  align-self: center;
}

.btn_review{
  padding-top: 1.25rem;
  padding-right: 1.25rem;
}
.form-review{
  padding-top: 8rem;
}
.common_rating{
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  color: #1A1A25;
  margin-top: 1.875rem;
}
.common_title{
  display: inline-block;
}
.write_rating{
  display: inline-block;
  margin-left: .625rem;
}
.form-review_section{
  margin-top: 1.875rem;
}
.review_input{
  background: #FFFFFF;
  border: 1px solid rgba(144, 156, 181, 0.3);
  border-radius: 6px;
  padding: 8px .625rem;
  margin-bottom: 1.875rem;
  transition: all .3s ease;
  width: 90%;
  height: 3rem;
}
.review_input-email,
.review_input-tel{
  display: inline-block;
  width: 40%;
}
.review_input-tel{
  margin-right: .625rem;
}
.plus_text,
.minus_text,
.message_text{
  background: #FFFFFF;
  border: 1px solid rgba(144, 156, 181, 0.3);
  border-radius: 6px;
  padding: 8px .625rem;
  margin-bottom: 1.875rem;
  width: 90%;
  transition: all .3s ease;
  min-height: 12rem;
}

textarea:hover,
.review_input:hover,
.review_input:focus-within {
  border: 1px solid #234a9d;
  transition: all .3s ease;
}
textarea:hover,
textarea:focus{
  transition: all .3s ease;
  outline-color: #234a9d;
}
.form-review_wrapp{
  position: relative;
}
.disabled_review{
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  position: absolute;
  top: 0;
  right: 0;
  background-color: rgba(0,0,0,.025);
}
.disabled_title{
  color: #BD0F2C;
  width: 100%;
  height: 100%;
  font-size: 1.75rem;
  font-weight: 500;
  text-align: center;
  padding-top: .625rem;
}
.disabled-body{
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
}
.title{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 2.375rem;
  line-height: 140%;
  color: #1A1A25;
}
@media (max-width: 768px) {
  .review_total{
    width: 100%;
  }
  .disabled_review{
    width: max-content;
    left: 0;
  }
  .disabled_title{
    width: 99%;
  }
}
@media (max-width: 740px) {
  .review-body{
    flex-direction: column-reverse;
  }
  .disabled_review{
    width: 100%;
  }
  .review_total{
    width: 70%;
  }
  .write_review{
    max-width: 70%;
    align-self: flex-start;
  }
  .first_review{
    font-size: 1.25rem;
    padding-top: 3rem;
  }
  .disabled_title{
    font-size: 1.5rem;
  }
}
@media (max-width: 640px) {
  .review_total{
    width: 80%;
  }
  .write_review{
    max-width: 80%;
    align-self: flex-start;
  }
}
@media (max-width: 530px) {
  .review_total{
    width: 90%;
  }
  .write_review{
    max-width: 90%;
    align-self: flex-start;
  }
  .disabled_title{
    font-size: 1.225rem;
  }
}
@media (max-width: 460px) {
  .review_total{
    width: 100%;
  }
  .write_review{
    max-width: 90%;
    align-self: flex-start;
  }
}
@media (max-width: 375px) {
  .review_right{
    flex: 70% 0 1;
    text-align: end;
  }
  .review_left{
    flex: 30% 0 1;
  }
  .write_review{
    max-width: 100%;
  }
}
</style>
