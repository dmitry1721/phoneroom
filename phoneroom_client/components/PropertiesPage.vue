<template>
  <div>
    <div class="properties-section">
      <div class="left_block">
        <h2 class="title property_title">Характеристики</h2>
      </div>
      <div class="right_block">
        <div class="properties" v-for="(property, name) in props.properties" >
          <div class="property-wrapp">
            <h3 class="property_name">{{ name }}</h3>
<!--            <div class="block-arrow">-->
<!--              <svg id="arrow" class="arrow" width="32" height="14" viewBox="0 0 32 14" fill="none">-->
<!--                <path d="M1.5 12.5L16 1.5L30.5 12.5" stroke="#858FA4" stroke-width="2"/>-->
<!--              </svg>-->
<!--            </div>-->
          </div>
          <div class="line property_line"></div>
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
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  properties: Object,
})
</script>

<style scoped>
.properties-section{
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
}
.properties_content{
  transition: all 5s ease .3s;
  margin-bottom: 1rem;
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
.title{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 2.375rem;
  line-height: 140%;
  color: #1A1A25;
}
@media (max-width: 640px) {
  .properties-section{
    flex-direction: column;
  }
  .property-wrapp,
  .property_body{
    padding-left: 0;
  }
  .property_line{
    width: 100%;
  }
}
</style>