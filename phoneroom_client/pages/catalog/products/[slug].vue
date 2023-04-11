<template>
  <div>
    <div v-if="pending">
      <div class="container">
        <section class="wrapper-pen">
          <article class="article">
            <div class="bg">
              <div class="icons">
                <div class="icon-1"></div>
                <div class="mask"></div>
                <div class="icon-2"></div>
                <div class="mask"></div>
                <div class="icon-2"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
              </div>
              <div class="titles_pen">
                <div class="title_pen"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
              </div>
              <div class="body-pen">
                <div class="mask"></div>
                <div v-if="windowWidth > 640" class="img-cont">
                    <div class="img-pen"></div>
                  </div>
                <div v-if="windowWidth > 640" class="img-cont">
                    <div class="img-pen"></div>
                  </div>
                <div class="img-count-w" v-if="windowWidth < 640">
                  <div class="img-cont">
                    <div class="img-pen"></div>
                  </div>
                  <div class="img-cont">
                    <div class="img-pen"></div>
                  </div>
                </div>


                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>

                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div v-if="windowWidth >= 768" class="content-pen">

                  <!--                  <div class="img-cont">-->
                  <!--                    <div class="img-pen img-pen_left"></div>-->

                  <!--                  </div>-->
                  <!--                  <div class="img-cont">-->
                  <!--                    <div class="img-pen"></div>-->
                  <!--                  </div>-->

                  <div class="brands-pen brands-pen1">
                    <div class="img-pen-brand"></div>
                  </div>

                  <div class="brands-pen">
                    <div class="img-pen-brand"></div>
                  </div>

                </div>

              </div>
              <div class="icons icons-768 icons-768-2" v-if="windowWidth < 640">
                <div class="icon-3 icon-3-768 icon-3-768-2"></div>
                <div class="mask"></div>
                <div class="icon-3 icon-3-768 icon-3-768-2"  style="width: 60%"></div>
              </div>
              <div class="icons icons-768" v-if="windowWidth <= 768">
                <div class="icon-3 icon-3-768"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="icon-3 icon-3-768"></div>


              </div>


              <div class="icons">
                <div class="icon-3"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="icon-3"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="icon-3"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
              </div>
              <div class="body-pen2">
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="img-cont">
                  <div class="img-pen"></div>
                </div>
                <div class="img-cont">
                  <div class="img-pen"></div>
                </div>
                <div class="img-cont">
                  <div class="img-pen"></div>
                </div>
                <div class="img-cont">
                  <div class="img-pen"></div>
                </div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>

                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
                <div class="mask"></div>
              </div>
            </div>
          </article>
        </section>
      </div>
    </div>
    <div v-else>
      <div class="container">
        <Breadcrumbs
            :category="{title:product.category, to:product.category_slug}"
            :brand="{title:product.brand, to:`?query=${product.category_slug}&menu%5Bbrand%5D=${product.brand}`}"
            :name="{title: product.product_name, to: $route.params.slug}" />
        <div class="title_wrapp">
          <h1 class="title">{{ product.product_name }}</h1>
        </div>
      </div>
      <div class="line"></div>
      <div class="container">
        <section class="product-section">
          <div class="product_body">
            <div class="images_body">
              <!--              <div class="main_img">-->
              <!--                <nuxt-img :src="config.public.baseUrl+product.image" loading="lazy" alt="Main Image" />-->
              <!--              </div>-->
              <!--              {{product}}-->
              <div class="thumb-images">
                <Swiper class="swiper-wrapp"
                        @swiper="setThumbsSwiper"
                        :modules="[SwiperAutoplay, SwiperEffectFade, SwiperLazy, SwiperFreeMode, SwiperKeyboard, SwiperNavigation, SwiperThumbs]"
                        :space-between="10"
                        :lazy="true"
                        :keyboard="{
                          enabled: true,
                        }"
                        :effect="'fade'">


                  <SwiperSlide v-for="slide in product.images" :key="slide">
                    <div class="img-slide-wrap">
                      <nuxt-img class="swiper-lazy thumb-img img-slide" :src="config.public.baseUrl+slide.path" loading="lazy"/>
                    </div>
                  </SwiperSlide>
                  <!--                  <div class="swiper-button-prev"></div>-->
                  <!--                  <div class="swiper-button-next"></div>-->

                </Swiper>

                <Swiper class="swiper-wrapp-thumb"
                        :modules="[SwiperAutoplay, SwiperEffectFade, SwiperLazy, SwiperFreeMode, SwiperKeyboard, SwiperNavigation, SwiperThumbs]"
                        :slides-per-view="4"
                        :space-between="10"
                        :watch-slides-progress="true"
                        :free-mode="true"
                        :thumbs="{ swiper: thumbsSwiper }"
                        :keyboard="{
                          enabled: true,
                        }"
                        :navigation="{
                          nextEl: '.swiper-button-next',
                          prevEl: '.swiper-button-prev',
                        }"
                        :effect="'fade'">

                  <SwiperSlide v-for="slide in product.images" :key="slide">
                    <div class="img-slide-wrap thumb-img-wrapp">
                      <nuxt-img class="swiper-lazy thumb-img" :src="config.public.baseUrl+slide.path" loading="lazy"/>
                    </div>
                  </SwiperSlide>

                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>

                </Swiper>
              </div>
            </div>
            <div class="data_body">
              <div class="body_top">
                <div class="brand_image">
                  <nuxt-img :src="config.public.baseUrl+product.brand_image" loading="lazy" alt="Brand Image" />
                </div>
                <div class="tags_images">
                  <div class="tag_item" v-for="tag_img in product.tags">
                    <nuxt-img :src="config.public.baseUrl+tag_img[0]" loading="lazy" alt="Tag Image" />
                    <div class="tag__item_title">
                      <h3 class="title_img">{{ tag_img[1] }}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="line"></div>
              <div class="body_bottom">
                <div class="data_info">
                  <div class="data_icons">
                    <div class="data_icons-wrapp">
                      <IconsHeartIcon @click="addFavoriteProduct(product)" :pressed="pressedFavorite" />
                      <span class="title_heart">В избранное</span>
                    </div>
                    <div class="data_icons-wrapp">
                      <IconsCompareIcon @click="addCompareProduct(product)" :pressed="pressedCompare" />
                      <span class="title_compare">В сравнение</span>
                    </div>
                  </div>
                  <div class="data_options" v-if="product.option">
                    <div class="option_item" v-for="(option, pl) in product.option">
                      <h2 class="option_title">{{ option.name }}:</h2>
                      <div class="option_wrap" v-if="product.published === true">
                        <div v-for="(value, key) in option.values"
                             v-if="key !== 'colors'"
                             @mouseenter="changeCurrent(value, pl)"
                             @mouseleave="changeCurrent(current_options[pl], pl)"
                             :class="{'option_value-current': current_options[pl] ? current_options.indexOf(value) !== -1 : setOptionsValues().indexOf(value) !== -1,
                               'option_value': key !== 'colors'}">
                          <nuxt-link class="option_link" v-if="isPublished(value, pl)" :to="`${product.product_slug + '-' + arrToSrt(selected_option)}`">
                            <div v-if="key !== 'colors'">
                              <div v-if="option.values['colors']" style="display: flex;">
                                <div class="color" :style="{background: option.values['colors'][key]}"></div>
                                <div class="option_text">{{ value }}</div>
                              </div>
                              <div v-else>{{ value }}</div>
                            </div>
                            <div v-else style="display: none"></div>
                          </nuxt-link>
                          <div v-else class="option_value_none" aria-disabled="true" >
                            <div v-if="key !== 'colors'">
                              <div v-if="option.values['colors']" style="display: flex;">
                                <div class="color" :style="{background: option.values['colors'][key]}"></div><div class="option_text">{{ value }}</div>
                              </div>
                              <div v-else>{{ value }}</div>
                            </div>
                            <div v-else style="display: none"></div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="data_properties_small" v-if="product.properties">
                    <!--                    {{product.properties}}-->
                  </div>
                </div>
                <div v-if="windowWidth > 768 || windowWidth <= 640" class="data_subinfo">
                  <div class="add-basket_wrap subinfo_block">
                    <div class="basket_body">
                      <div class="stock_status">
                        <InStock v-if="product.units_in_stock >= 20" />
                        <NotMuchLeftInStock v-if="product.units_in_stock < 20" />
                        <NotInStock v-if="product.units_in_stock === 0" />
                      </div>
                      <div class="product_prices">
                        <h2 class="price">{{ priceFormat(product.price) }}&nbsp;₽</h2>
                        <h2 class="old_price" v-if="product.old_price">{{ priceFormat(product.old_price) }}&nbsp;₽</h2>
                      </div>
                      <div class="line del"></div>
                      <div class="add_basket-body">
                        <div class="quantity-wrap">
                          <div v-if="!pressedBasket" class="remove" @click="reduceQuantity">–</div>
                          <div v-else class="remove disabled" >–</div>
                          <div v-if="!pressedBasket" class="quantity">{{ quantity }}</div>
                          <div v-else class="quantity disabled">{{ quantity }}</div>
                          <div v-if="!pressedBasket" class="add" @click="increaseQuantity">+</div>
                          <div v-else class="add disabled" >+</div>
                        </div>
                        <div class="btn-wrap">
                          <div v-if="!pressedBasket">
                            <Button v-if="windowWidth > 640" @click="addProductToBasket(product)" :pressed="pressedBasket" :width_btn="10.625" :src_btn="src">В корзину</Button>
                            <Button v-if="windowWidth <= 640" @click="addProductToBasket(product)" :pressed="pressedBasket" :width_btn="5.625" :src_btn="src"></Button>
                          </div>
                          <div v-else>
                            <Button v-if="windowWidth > 640" :pressed="pressedBasket" :disabled_btn="1" :width_btn="10.625" :src_btn="src">В корзину</Button>
                            <Button v-if="windowWidth <= 640" :pressed="pressedBasket" :disabled_btn="1" :width_btn="5.625" :src_btn="src"></Button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="delivery subinfo_block">
                    <h2 class="del_title">Способы получения</h2>
                    <div class="line del"></div>
                    <p class="del_text">
                      <span>Самовывоз</span> из магазинов Телефон.Рум Сегодня и позже, бесплатно
                    </p>
                    <p class="del_text">
                      <span>Доставка</span> после онлайн-оплаты Сегодня или позже, бесплатно
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </section>
        <div v-if="windowWidth <= 768 && windowWidth > 640" class="data_subinfo">
          <div class="add-basket_wrap subinfo_block">
            <div class="basket_body">
              <div class="stock_status">
                <InStock v-if="product.units_in_stock >= 20" />
                <NotMuchLeftInStock v-if="product.units_in_stock < 20" />
                <NotInStock v-if="product.units_in_stock === 0" />
              </div>
              <div class="product_prices">
                <h2 class="price">{{ priceFormat(product.price) }}&nbsp;₽</h2>
                <h2 class="old_price" v-if="product.old_price">{{ priceFormat(product.old_price) }}&nbsp;₽</h2>
              </div>
              <div class="line del"></div>
              <div class="add_basket-body">
                <div class="quantity-wrap">
                  <div class="remove" @click="reduceQuantity">–</div>
                  <div class="quantity">{{ quantity }}</div>
                  <div class="add" @click="increaseQuantity">+</div>
                </div>
                <div class="btn-wrap">
                  <Button @click="addProductToBasket(product)" :pressed="pressedBasket" :width_btn="10.625" :src_btn="src">В корзину</Button>
                </div>
              </div>
            </div>
          </div>
          <div class="delivery subinfo_block">
            <h2 class="del_title">Способы получения</h2>
            <div class="line del"></div>
            <p class="del_text">
              <span>Самовывоз</span> из магазинов Телефон.Рум Сегодня и позже, бесплатно
            </p>
            <p class="del_text">
              <span>Доставка</span> после онлайн-оплаты Сегодня или позже, бесплатно
            </p>
          </div>
        </div>

      </div>
      <div class="product_content">
        <div class="container">
          <header class="content_header">
            <h2 class="content_title"  @click="description_page=true;properties_page=false;comments_page=false" :class="{'active': description_page}">Описание</h2>
            <h2 class="content_title" @click="description_page=false;properties_page=true;comments_page=false" :class="{'active': properties_page}">Характеристики</h2>
            <h2 class="content_title" @click="description_page=false;properties_page=false;comments_page=true" :class="{'active': comments_page}">Отзывы</h2>
          </header>
<!--          <component :is="properties_page ? PropertiesPage : ''" />-->
<!--          <component :is="comments_page ? CommentsPage : ''" />-->
          <div v-if="properties_page">
            <PropertiesPage :properties="product.properties" />
          </div>
          <div v-else-if="comments_page">
            <CommentsPage :rating="product.rating" />
          </div>
          <div v-else-if="description_page">
            <h2 class="current_title title tag_title">Описание</h2>
            <div class="content_text">
              <div class="text" :class="{'open': show}">{{ product.description }}</div>
              <h3 class="open_full_text" @click="showText" :class="{'show': !show}">Читать полностью</h3>
              <h3 class="close_full_text" @click="showText" :class="{'show': show}">Скрыть</h3>
            </div>
            <div class="line"></div>
            <div class="properties-section">
              <div class="left_block">
                <h2 class="title tag_title property_title">Характеристики</h2>
                <ButtonRedOutline :route_btn="`${product.slug}`" v-if="windowWidth >= 640" @click="description_page=false;properties_page=true;comments_page=false">Все характеристики</ButtonRedOutline>
              </div>
              <div class="right_block">
                <div class="properties" ref="properties" v-for="(property, name, idx) in product.properties" >
                  <div class="property-wrapp" v-if="idx<=7" @click="openProperty(properties[idx])">
                    <h3 class="property_name">{{ name }}</h3>
                    <div class="block-arrow">
                      <svg id="arrow" class="arrow" width="2rem" height="0.875rem" viewBox="0 0 32 14" fill="none">
                        <path d="M1.5 12.5L16 1.5L30.5 12.5" stroke="#858FA4" stroke-width="2"/>
                      </svg>
                    </div>
                  </div>
                  <div v-if="idx<=6" class="line property_line"></div>
                  <div id="property" class="properties_content">
                    <div class="property" v-for="(value, key) in property">
                      <div class="property_body">
                        <h3 class="property_subname">{{ key }}</h3>
                        <h3 class="property_value">{{ value }}</h3>
                      </div>
                      <div class="line property_line sub"></div>
                    </div>
                  </div>
                </div>
                <ButtonRedOutline class="prop-btn-sm" :route_btn="`${product.slug}`" v-if="windowWidth < 640" @click="description_page=false;properties_page=true;comments_page=false">Все характеристики</ButtonRedOutline>
              </div>
            </div>
            <div class="line"></div>
            <div class="section-review">
              <div class="review-title title tag_title">Отзывы</div>
              <div class="review-body">
                <div class="review_total">
                  <div class="total_content">
                    <div class="review_left">
                      <div class="total-rating">
                        <h2 class="rating_medium">{{ product.rating }}</h2>
                        <div class="rating_body main-rating" v-if="windowWidth >= 1280">
                          <ClientOnly>
                            <star-rating :star-size="12"
                                         :rating="product.rating"
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
                                         :rating="product.rating"
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
                                         :rating="product.rating"
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
                  <h2 class="first_review">Будьте первым! Поделитесь своим мнением об этом товаре</h2>
                  <Button @click="description_page=false;properties_page=false;comments_page=true" :route_btn="''" :width_btn="12">Оставить отзыв</Button>
                </div>
              </div>
              <ButtonRedOutline :route_btn="`${product.slug}`" @click="description_page=false;properties_page=false;comments_page=true">Все отзывы</ButtonRedOutline>
            </div>
          </div>
          <div class="line"></div>
        </div>
        <div class="viewed">
          <div class="container">
            <h2 class="title viewed_title">Вы смотрели</h2>
          </div>
          <div class="container-fluid">
            <ViewedProducts />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import {useFavoriteProductStore} from "../../../stores/FavoriteProductStore";
import {useCompareProductStore} from "../../../stores/CompareProductStore";
import {useBasketProductsStore} from "../../../stores/BasketProductsStore";
import {useUserStore} from "../../../stores/UserStore";
import CommentsPage from "../../../components/CommentsPage";
import {computed, ref, onMounted} from "vue";

const pressedFavorite = computed(() => useFavoriteProductStore().checkProduct(product.value))
const pressedCompare = computed(() => useCompareProductStore().checkProduct(product.value));
const pressedBasket = computed(() => useBasketProductsStore().checkProduct(product.value));

const description_page = ref(true);
const properties_page = ref(false);
const comments_page = ref(false);

const user = computed(() => useUserStore().getUser().value);
const pos = 1;

const config = useRuntimeConfig();

const properties = ref(null);
const countShowProperty = ref(5);

const openProperty = (property) => {
  const arrow = property.querySelector("#arrow");
  arrow.classList.toggle("showProperty");
  const propertyBody = property.querySelector("#property");
  propertyBody.classList.toggle("property_active");
};

const thumbsSwiper = ref(null);
const setThumbsSwiper = (swiper) => {
  thumbsSwiper.value = swiper;
};

const route = useRoute();
const slug = ref(route.params.slug);

const url = config.public.apiBaseUrl + "products/"+`${slug.value}`;
const { pending, data: product } = useFetch(url);

const selected_option = ref([]);
const current_options = ref([]);

const setOptionsValues = () => {
  for (const option in product.value.options) {
    current_options.value.push(product.value.options[option]);
    selected_option.value.push(product.value.options[option]);
  }
  return current_options.value;
}

const changeCurrent = (value, pl) => {
  selected_option.value[pl] = value;
}
const quantity = ref(1);
const increaseQuantity = () =>{
  quantity.value++;
}

const reduceQuantity = () =>{
  if (quantity.value >= 2){
    quantity.value--;
  }
}

const isPublished = (value, pl) => {
  if(pl > 0){
    let curr = current_options.value.slice(0);
    curr[pl] = value;
    return product.value.variants_published[curr.join(' ')] === true;
  }
  else{
    return true;
  }
}

const show = ref(false);

const showText = () => {
  show.value = !show.value;
};

const src = ref('img/basket.svg');

const urlBasket = computed(() => config.public.apiBaseUrl + `baskets/${useUserStore().getUser().value.id}`);
const urlFavorite = computed(() => config.public.apiBaseUrl + `favorites/${useUserStore().getUser().value.id}`);
const urlCompare = computed(() => config.public.apiBaseUrl + `compares/${useUserStore().getUser().value.id}`);

const addFavoriteProduct = (product) => {
  if  (user.value){
    if (pressedFavorite.value === false) {
      favoriteCreateFormRequest(product.id).then((res) => {
        useFavoriteProductStore().pushProduct(product);
        useFavoriteProductStore().needUpdate = true;
        console.log(res)
        pressedFavorite.value = true;
      }).catch((err) => {
        console.error('Contact form could not be send', err)
      });
    }
    else{
      favoriteDeleteFormRequest(product.id).then((res) => {
        console.log(res);
        useFavoriteProductStore().removeProduct(product);
        pressedFavorite.value = false;
        emit('deleteUserProduct');
      }).catch((err) => {
        console.error('Contact form could not be send', err);
      });
    }
  }
  else{
    if (pressedFavorite.value === false) {
      useFavoriteProductStore().pushProduct(product);
      pressedFavorite.value = true;
    }
    else{
      useFavoriteProductStore().removeProduct(product);
      pressedFavorite.value = false;
    }
  }
};

const addCompareProduct = (product) => {
  if  (user.value){
    if (pressedCompare.value === false) {
      console.log(product)
      compareCreateFormRequest(product.id, product.category_id).then((res) => {
        console.log(res)
        useCompareProductStore().pushProduct(product);
        useCompareProductStore().needUpdate = true;
        pressedCompare.value = true;
      }).catch((err) => {
        console.error('Contact form could not be send', err)
      });
    }
    else{
      compareDeleteFormRequest(product.id, product.category_id).then((res) => {
        console.log(res);
        useCompareProductStore().removeProduct(product);
        pressedCompare.value = false;
        // emit('deleteUserProduct');
      }).catch((err) => {
        console.error('Contact form could not be send', err);
      });
    }
  }
  else{
    if (pressedCompare.value === false) {
      useCompareProductStore().pushProduct(product);
      pressedCompare.value = true;
    }
    else{
      useCompareProductStore().removeProduct(product);
      pressedCompare.value = false;
    }
  }

};

const addProductToBasket = (product) => {
  if  (user.value){
    if (pressedBasket.value === false) {
      basketCreateFormRequest(product.id).then((res) => {
        useBasketProductsStore().pushProduct(product);
        useBasketProductsStore().needUpdate = true;
        console.log(res)
        pressedBasket.value = true;
      }).catch((err) => {
        console.error('Contact form could not be send', err)
      });
    }
  }
  else{
    if (pressedBasket.value === false) {
      useBasketProductsStore().pushProduct(product);
      pressedBasket.value = true;
    }
  }
};

const favoriteCreateFormRequest = async (product_id) => {
  return await $fetch(urlFavorite.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      product_id: product_id,
    },
  });
}

const favoriteDeleteFormRequest = async (product_id) => {
  return await $fetch(urlFavorite.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'DELETE',
    params: {
      product_id: product_id,
    },
  });
}

const compareCreateFormRequest = async (product_id, category_id) => {
  return await $fetch(urlCompare.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      category_id: category_id,
      product_id: product_id,
    },
  });
}

const compareDeleteFormRequest = async (product_id, category_id) => {
  return await $fetch(urlFavorite.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'DELETE',
    params: {
      product_id: product_id,
      category_id: category_id,
    },
  });
}

const basketCreateFormRequest = async (product_id) => {
  return await $fetch(urlBasket.value , {
    headers: {
      'Authorization': `Bearer ${useUserStore().getToken().value}`,
      "Accept": "application/json",
      'Content-Type': 'application/json',
    },
    method: 'POST',
    params: {
      product_id: product_id,
    },
  });
}

const arrToSrt = (arr) => {
  let str = '';
  for (const arrKey in arr) {
    if (parseInt(arrKey) !== arr.length - 1){
      str += toSlug(arr[arrKey]) + '-';
    }
    else{
      str += toSlug(arr[arrKey]);
    }
  }
  return str;
}
const toSlug = (str) => {
  let ru = {
    'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd',
    'е': 'e', 'ё': 'e', 'ж': 'j', 'з': 'z', 'и': 'i',
    'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
    'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
    'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh',
    'щ': 'shch', 'ы': 'y', 'э': 'e', 'ю': 'yu', 'я': 'ya',
    'ъ': '', 'ь': '', 'й': 'y', '': '-'
  };
  let newString = [];

  return [...str].map(l => {
    let latL = ru[l.toLocaleLowerCase()];
    if (latL === undefined) {
      if (l === ' '){
        latL = '-';
      }
      else{
        latL = l.toLocaleLowerCase();
      }
    }

    return latL;
  }).join('');
}
const priceFormat = (value) => {
  let res;
  value = String(value);
  (value.indexOf(',') != -1) ? res = new Intl.NumberFormat('ru-RU').format(value.replace(',', '.')).replace('.', ',') : res = new Intl.NumberFormat('ru-RU').format(value).replace(',', '.');
  return res;
};

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

.swiper-wrapp{
  width: 42rem;
  height: 42rem;
}
.thumb-images{
  max-width: 37.5rem;
}
.swiper-button-prev{
  left: 30%;
}
.swiper-button-next{
  right: 20%;
}
.swiper-button-next:after,
.swiper-button-prev:after{
  font-size: 2rem;
}
.swiper-wrapp-thumb{
  margin-top: 3.125rem;
  height: 5rem;
}
.slide-thumb{
  width: 5rem;
}
.thumb-img{
  width: 100%;
  height: 100%;
}
.thumb-img-wrapp{
  width: 5rem;
  height: 5rem;
  margin: 0 18rem;
}
.title{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 2.375rem;
  line-height: 140%;
  color: #1A1A25;
}
.product-section{
  overflow: hidden;
  margin-top: 1.5rem;
  margin-bottom: 3.5rem;
}
.product_body{
  display: flex;
}
.images_body{
  display: flex;
  flex: 50%;
  /*width: 37.5rem;*/
  margin-right: 2.25rem;
}
.data_body{
  flex: 50%;
}
.body_top{
  display: flex;
  /*height: 6.25rem;*/
  align-items: center;
  width: 100%;
  /*margin-bottom: 1.5rem;*/
}
.data_icons-wrapp{
  display: inline-block;
}
.brand_image{
  max-height: 100%;
  flex: 32% 0 1;
}
.tags_images{
  max-height: 100%;
  margin: 1rem 0;
  flex: 68% 0 1;
  width: 100%;
  display: flex;
  justify-content: end;
  align-self: end;
}
.tag_item{
  margin-right: 1.25rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.tag_item:last-child{
  margin-right: 0;
}
.tag__item_title{
  margin-top: 8px;
  width: 100%;
  display: flex;
  justify-content: center;
  padding: 0;
}
.title_img{
  font-family: 'Inter', sans-serif;
  font-weight: 900;
  font-size: .6875rem;
  line-height: .8125rem;
  display: flex;
  align-items: flex-end;
  text-transform: uppercase;
  color: #1A1A25;
}
.body_bottom{
  margin: 1.875rem 0;
  width: 100%;
  display: flex;
}
.data_info{
  flex: 57% 0 1;
  margin-right: 1.5rem;
}
.data_subinfo{
  flex: 43% 0 1;
}
.title_heart,
.title_compare{
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  color: #384255;
  padding-left: .75rem;
  vertical-align: text-bottom;
}
.title_heart{
  padding-right: .875rem;
}
.data_options{
  margin: 1.875rem 0;
}
.option_title{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 1rem;
  line-height: 150%;
  color: #1A1A25;
  margin-bottom: .5rem;
}
.option_value{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: .875rem;
  line-height: 140%;
  color: #384255;
  background-color: #FFFFFF;
  padding: 8px;
  border: 2px solid rgba(144, 156, 181, 0.4);
  border-radius: 4px;
  margin-right: .75rem;
  margin-top: .75rem;
  transition: all .3s ease;
  cursor: pointer;
}
.option_value_none{
  opacity: .5;
  cursor: default;
}
.option_value:hover{
  transition: all .3s ease;
  border: 2px solid rgba(144, 156, 181, 1);
}
.option_value-current{
  transition: .3s easy .3s;
  border: 2px solid rgba(144, 156, 181, 1);
}
.option_value:last-child{
  margin-right: 0;
}
.option_wrap{
  display: flex;
  margin-bottom: 1.25rem;
  flex-wrap: wrap;
}
.color{
  width: 1.25rem;
  height: 1.25rem;
  border: 1px solid #909CB5;
  border-radius: 50%;
  display: inline-block;
  margin-right: 6px;
}
.option_text{
  display: inline-block;
  height: 100%;
  line-height: 100%;
  margin: auto 0;
}
.option_link{
  color: #384255;
}
.subinfo_block{
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 1.875rem 1.25rem;
  width: auto;
  background: #F7F7F7;
  height: max-content;
  border-radius: 6px;
  margin-bottom: 1.875rem;
}
/*.subinfo_block:last-child{*/
/*  margin-bottom: 0;*/
/*}*/
.stock_status,
.product_prices,
.del,
.add_basket-body,
.del_title {
  margin-bottom: .75rem;
  /*height: auto;*/
  display: flex;
  align-items: baseline;
}
.add_basket-body{
  margin-top: 1.25rem;
  align-items: center;
}

.price{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 1.875rem;
  line-height: 2.25rem  ;
  color: #1A1A25;
  display: inline-block;
  padding-right: .625rem;
}
.old_price{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 1.125rem;
  line-height: 135.94%;
  text-decoration-line: line-through;
  color: #858FA4;
  display: inline-block;
}
.quantity-wrap{
  display: flex;
  height: 2rem;
  margin-right: 1.875rem;
}

.remove,
.add{
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 1rem;
  line-height: 140%;
  width: 2rem;
  text-transform: lowercase;
  color: #384255;
  /*padding: 2px 10px 4px;*/
  border: 1px solid #909CB5;
  border-radius: 50px;
  cursor: pointer;
  display: flex;
  /*justify-content: center;*/
  /*flex-direction: column;*/
  align-items: center;
  justify-content: center;
  transition: all .3s ease;
}
.add:hover,
.remove:hover {
  background-color: #FFFFFF;
  transition: all .3s ease;
}
/*.add{*/
/*  !*padding: 2px 11px 4px 9px;*!*/
/*}*/
.quantity{
  display: flex;
  align-items: center;
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 1.125rem;
  line-height: 135.94%;
  color: #858FA4;
  padding: 0 .75rem;
}
.del_title{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 1rem;
  line-height: 1.1875rem;
  color: #1A1A25;
}
.del_text{
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 1rem;
  line-height: 140%;
  color: #1A1A25;
  margin-bottom: .75rem;
}
.del_text span{
  font-weight: 600;
  color: #384255;
}
.del_text:last-child{
  margin-bottom: 0;
}
.product_content{
  /*margin-top: 4rem;*/
  width: 100%;
  /*display: flex;*/
  background: #F7F7F7;
  border-radius: 25px 25px 0 0;
}
.content_title{
  font-weight: 800;
  font-size: 1.375rem;
  line-height: 110%;
  cursor: pointer;
  color: #909CB5;
  display: inline-block;
  transition: all .5s ease;
  margin-right: 2rem;
  margin-top: 4.5rem;
  margin-bottom: 5rem;
}
.content_title:last-child{
  margin-right: 0;
}
.content_title:hover{
  color: #BD0F2C;
  transition: all .5s ease;
}
.content_title.active{
  color: #BD0F2C;
  transition: all .3s ease;
}
.current_title{
  margin-bottom: 2.5rem;
}
.content_text{
  margin-bottom: 2.5rem;
}
.text{
  font-weight: 400;
  font-size: 1.125rem;
  line-height: 140%;
  white-space: break-spaces;
  color: #384255;
  width: 90%;
  height: 12.5rem;
  overflow: hidden;
}
.open_full_text,
.close_full_text {
  font-weight: 700;
  display: none;
  font-size: 1.125rem;
  line-height: 140%;
  color: #4B7EE8;
  margin-top: .9375rem;
  transition: all .3s ease;
  cursor: pointer;
}
.open_full_text:hover,
.close_full_text:hover {
  color: #234a9d;
  transition: all .3s ease;
}

.open{
  display: block;
  height: auto;
}
.show{
  display: block;
}
.properties-section{
  margin-top: 5rem;
  margin-bottom: 3.75rem;
  display: flex;
}
.property_title{
  margin-bottom: 2.5rem;
}
.left_block{
  flex: 40% 0 1;
  /*display: flex;*/
}
.right_block{
  flex: 60% 0 1;
}
.property_line{
  opacity: .8;
  width: 96.6%;
  text-align: center;
  margin: 0 auto;
}
.property_name{
  font-weight: 800;
  font-size: 1.25rem;
  line-height: 120%;
  color: #384255;
}
.property-wrapp{
  display: flex;
  justify-content: space-between;
  padding: 1rem;
  cursor: pointer;
  transition: all .3s ease;
  opacity: .8;
}
.property-wrapp:hover{
  opacity: 1;
  transition: all .8s ease;
}
.arrow{
  transition: all .3s ease;
}
.showProperty{
  opacity: 1;
  transition: all .3s ease;
  transform: rotate(180deg);
}
.properties_content{
  transition: all 5s ease .3s;
  margin-bottom: 1rem;
  display: none;
  /*position: relative;*/
  /*top: -43px;*/
}
.property_active{
  transition: all 5s ease .3s;
  display: block;
  /*top: 0;*/
}
.property_body{
  display: flex;
  justify-content: space-between;
  padding: 0.5rem 1rem;
  transition: all .8s ease .3s;
}
.sub{
  opacity: .6;
}
.property_subname{
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  color: #1A1A25;
  opacity: 0.7;
}
.property_value{
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  margin-right: 40%;
  color: #1A1A25;
  text-align: start;
}
.section-review{
  padding: 3.75rem 0;
}
.review-title{
  margin-bottom: 1.875rem;
}
.review-body{
  display: flex;
  align-content: baseline;
  margin-bottom: 3rem;
}
.review_total{
  width: 28.125rem;
  height: 12.5rem;
  background-color: #FFFFFF;
  border-radius: 10px;
  padding: 1.875rem 3.4375rem 4.375rem 1.875rem;
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
  font-size: 1.1rem;
  display: inline-block;
  padding-bottom: .625rem;
}
.write_review{
  max-width: 22rem;
  align-self: center;
  margin-left: 2rem;
}

.viewed{
  padding: 7.5rem 0 15rem 0;
}
.viewed_title{
  padding-bottom: 1.875rem;
}

/*pending*/
.img-count-w{
  display: flex;
  /*border-right: 31rem solid white;*/
}
.article {
  width: 100%;
}
.icon-1{
  width: 1.25rem;
  height: .625rem;
  border-radius: .625rem;
  box-shadow: .3125rem .625rem .3125rem .9375rem white, .625rem -.625rem .3125rem white, -.625rem .625rem .3125rem white, -.625rem -.625rem .3125rem white;
}
.icon-2{
  width: 6.25rem;
  height: .625rem;
  border-radius: .625rem;
  box-shadow: .3125rem .625rem .3125rem .9375rem white, .625rem -.625rem .3125rem white, -.625rem .625rem .3125rem white, -.625rem -.625rem .3125rem white;
}
.icon-3{
  width: 25rem;
  height: 7.5rem;
  /*border-radius: 10px;*/
  border-bottom: 3.125rem solid white;
  border-top: 3.125rem solid white;
  /*box-shadow: 5px 10px 5px 0 white, 10px -10px 0 white, -10px 10px 0 white, -10px -10px 0 white;*/
}
.titles_pen{
  display: flex;
  border-top: 1.5625rem solid white;
  border-bottom: 2.8125rem solid white;
}
.title_pen{
  width: 46.875rem;
  height: 1.875rem;
  border-radius: .625rem;
  box-shadow: .625rem .625rem .3125rem white, .625rem -.625rem .3125rem white, -.625rem .625rem .3125rem white, -.625rem -.625rem .3125rem white;
}
.menu-w{
  display: flex;
  border-bottom: 3.75rem solid white;
}
.btn-menu{
  width: 12.5rem;
  height: 1.875rem;
  border-radius: .625rem;
  box-shadow: .625rem .625rem .3125rem white, .625rem -.625rem .3125rem white, -.625rem .625rem .3125rem white, -.625rem -.625rem .3125rem white;
}
.img-pen{
  width: 23.75rem;
  height: 100vh;
  background: transparent;
  border-bottom: solid 6.25rem white;
}
.brands-pen,
.content-pen{
  height: 15vh;
}
.brands-pen1{
  border-right: solid 3.125rem white;
}
.brands-pen,
.brands-pen{
  border-bottom: solid 3.125rem white;
}
.img-pen-brand{
  width: 17.5rem;
  border-radius: 10px;
  box-shadow: 10px 10px 5px white, 10px -10px 5px white, -10px 10px 5px white, -10px -10px 5px white;
}
.img-pen_left{
  border-radius: 10px;
  box-shadow: 10px 10px 5px white, 10px -10px 5px white, -10px 10px 5px white, -10px -10px 5px white;
}
.title_pen{
  width: 56.25rem;
}
.article{
  padding: 0;
  padding-top: 1.875rem;
}
.img-pen{
  height: 80vh;
}
.body-pen,
.body-pen2{
  border-bottom: solid 3.125rem white;
}
.body-pen2{
  display: flex;
  border-radius: 20px;
  box-shadow: 10px 10px 5px white, 10px -10px 5px white, -10px 10px 5px white, -10px -10px 5px white;
}
.img-cont{
  border-top: 0;
}

.disabled{
  opacity: 0.5;
}
@media (max-width: 940px) {
  .img-pen{
    width: 20.5rem;
  }
  .brands-pen1 {
    border-right: solid 1.5rem white;
  }
  .icon-3{
    width: 20rem;
  }
}

@media (max-width: 900px) {
  .swiper-wrapp{
    width: 37rem;
    height: 37rem;
  }
  .thumb-img-wrapp{
    margin: 0 16rem;
  }
  .swiper-button-next{
    margin-right: 10%;
  }
  .images_body{
    margin-right: 0;
  }
  .data_icons-wrapp{
    display: block;
    margin-bottom: 8px;
  }
  .data_icons-wrapp:last-child{
    margin-bottom: 0;
  }
  .compare-svg-wrap{
    margin-left: -5px;
  }
}

@media (max-width: 850px) {
  .swiper-wrapp{
    width: 35rem;
    height: 35rem;
  }
  .thumb-img-wrapp{
    margin: 0 15rem;
  }
  .swiper-button-next{
    margin-right: 15%;
  }
  .images_body{
    margin-right: 0;
  }
  .img-pen{
    width: 20rem;
  }
  .img-pen-brand{
    width: 16.5rem;
  }
}

@media (max-width: 820px) {
  .swiper-wrapp{
    width: 34rem;
    height: 34rem;
  }
  .thumb-img-wrapp{
    margin: 0 auto;
  }
  .swiper-button-next{
    margin-right: 10%;
  }
  .images_body{
    margin-right: 0;
  }
  .data_icons-wrapp{
    display: inline-block;
    margin-bottom: 0;
  }
  .data_icons-wrapp:last-child{
    margin-bottom: 0;
  }
  .compare-svg-wrap{
    margin-left: 0;
  }
  .body_bottom{
    flex-direction: column;
  }
  .brand_image{
    flex: 40% 0 1;
  }
  .tags_images{
    flex: 60% 0 1;
  }
  .img-pen{
    width: 18rem;
  }
  .img-pen-brand{
    width: 14.5rem;
  }
}

@media (max-width: 768px) {
  .body_top{
    flex-direction: column;
    align-items: start;
  }
  .brand_image{
    width: 14rem;
    margin-bottom: 1rem;
  }
  .tags_images{
    justify-content: space-between;
  }
  .product-section{
    margin-bottom: 1.5rem;
  }
  .data_subinfo{
    margin-bottom: 3.5rem;
    display: flex;
  }
  .add-basket_wrap{
    margin-right: 1rem;
  }
  .brands-pen {
    border-bottom: solid 2.125rem white;
  }

  .swiper-wrapp{
    width: 33rem;
    height: 33rem;
  }
  .thumb-images{
    max-width: 35rem;
  }
  .icon-3-768{
    width: 48%;
    height: 12rem;
    border-top: 0;
    border-bottom: 0;
    border-radius: 10px;
    box-shadow: 10px 10px 5px white, 10px -10px 5px white, -10px 10px 5px white, -10px -10px 5px white;
  }
  .img-pen{
    width: 25rem;
  }
  .img-pen-brand{
    width: 10rem;
  }
  .title_pen{
    width: 41.25rem;
  }
  .content_title{
    margin-top: 3.5rem;
    margin-bottom: 3rem;
  }
  .title{
    font-size: 2rem;
  }
  .body-pen{
    border-left: solid 4rem white;
    border-right: solid 4rem white;
    border-bottom: none;
  }
  .icon-3{
    /*width: 15rem;*/
  }
}
@media (max-width: 740px) {
  .swiper-wrapp{
    width: 31rem;
    height: 31rem;
  }
  .thumb-images{
    max-width: 31.8rem;
  }
}
@media (max-width: 700px) {
  .brand_image{
    width: 13rem;
  }
  .swiper-wrapp{
    width: 31rem;
    height: 31rem;
  }
  .thumb-images{
    max-width: 31rem;
  }
  .data_icons-wrapp{
    display: block;
    margin-bottom: 8px;
  }
  .data_icons-wrapp:last-child{
    margin-bottom: 0;
  }
  .compare-svg-wrap{
    margin-left: -5px;
  }
  .compare-svg{
    margin-left: 3px;
  }
  .img-pen{
    /*width: 15rem;*/
  }
  .img-pen-brand{
    width: 11rem;
  }
  .title_pen{
    width: 41rem;
  }

}
@media (max-width: 660px) {
  .review_total{
    width: 80%;
  }
}
@media (max-width: 640px) {
  .review_total{
    width: 90%;
  }
  .product-section,
  .product_body{
    flex-direction: column;
  }
  .images_body{
    justify-content: center;
  }
  .body_top{
    flex-direction: row;
    align-items: end;
  }
  .tags_images{
    justify-content: space-evenly;
  }
  .data_icons-wrapp{
    display: inline-block;
    margin-bottom: 0;
  }
  .data_icons-wrapp:last-child{
    margin-bottom: 0;
  }
  .compare-svg-wrap{
    margin-left: 0;
  }
  .body_top{
    margin-top: 2.5rem;
  }
  .data_subinfo{
    margin-bottom: 0;
  }
  .swiper-wrapp-thumb {
    margin-top: 1.875rem;
  }
  .properties-section{
    flex-direction: column;
  }
  .prop-btn-sm{
    margin-top: 2.5rem;
  }
  .property-wrapp,
  .property_body{
    padding-left: 0;
  }
  .property_line{
    width: 100%;
  }
  .body-pen{
    flex-direction: column;
    border-bottom: 0;
  }
  .img-pen{
    /*width: 23.75rem;*/
  }
  .img-pen-brand{
    width: 20rem;
  }
  /*.img-count-w{*/
  /*  border-right: 5rem solid white;*/
  /*  border-left: 5rem solid white;*/
  /*}*/
  .brands-pen{
    border-bottom: solid .5rem white;
  }
  .icons-768-2{
    border-bottom: 2rem solid white;
  }
  .title_pen{
    height: 1.125rem;
  }
  .icon-3-768-2{
    width: 37%;
    height: 8rem;
  }
  .swiper-wrapp{
    width: 30rem;
    height: 30rem;
  }
  .brand_image{
    margin-right: 1rem;
  }
}
@media (max-width: 610px) {
  .review-body{
    flex-direction: column;
  }
  .review_total{
    width: 80%;
    margin-bottom: 1.875rem;
  }
  .write_review{
    max-width: 70%;
    margin-left: 0;
    align-self: flex-start;
  }
}

@media (max-width: 530px) {
  .review-body{
    flex-direction: column;
  }
  .review_right{
    justify-content: end;
    display: flex;
  }
  .body-pen{
    border-left: solid 2rem white;
    border-right: solid 2rem white;
  }
  .img-count-w{
    border-right: 0;
    border-left: 0;
  }
  .img-pen{
    border-bottom: solid 4.25rem white;
  }
  .brand_image{
    flex: 50% 0 1;
    margin-right: 1rem;
  }
}
@media (max-width: 460px) {
  .data_subinfo{
    flex-direction: column;
  }
  .add-basket_wrap{
    margin-right: 0;
  }
  .basket_body{
    margin: 0 auto;
  }
  .review_total{
    width: 100%;
    margin-bottom: 1.875rem;
  }
  .write_review{
    max-width: 90%;
  }
  .body-pen{
    border-left: solid 0rem white;
    border-right: solid 0rem white;
  }
}
@media (max-width: 400px) {
  .content_title{
    margin-right: 1rem;
  }
}

@media (max-width: 385px) {
  .data_subinfo{
    display: block;
  }
  .tags_images{
    justify-content: start;
  }
  .brand_image{
    margin-right: 0;
  }
  .body_top{
    flex-direction: column;
    align-items: flex-start;
  }
  .swiper-wrapp{
    width: 25.5rem;
    height: 25.5rem;
  }
}
@media (max-width: 350px) {
  .review_right{
    flex: 60% 0 1;
  }
  .review_left{
    flex: 40% 0 1;
  }
}
@media (max-width: 370px) {
  .content_title:first-child{
    margin-bottom: 0;
  }
  .content_title:last-child{
    margin-top: 0;
  }
}
</style>