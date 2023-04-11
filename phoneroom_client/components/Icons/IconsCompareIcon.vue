<template>
  <svg class="compare-svg" width="1.025rem" height="1.025rem" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect class="compare-svg_rect" :class="{'active':props.pressed}" y="7" width="2" height="10" rx="1" fill="#858FA4"/>
    <rect class="compare-svg_rect" :class="{'active':props.pressed}" x="5" width="2" height="17" rx="1" fill="#858FA4"/>
    <rect class="compare-svg_rect" :class="{'active':props.pressed}" x="10" y="7" width="2" height="10" rx="1" fill="#858FA4"/>
    <rect class="compare-svg_rect" :class="{'active':props.pressed}" x="15" y="4" width="2" height="13" rx="1" fill="#858FA4"/>
  </svg>
</template>

<script setup>

const props = defineProps({
  pressed: Boolean
});

</script>

<style scoped>
/*.compare-svg-wrap{*/
/*  width: 1.0625rem;*/
/*  height: 1.0625rem;*/
/*}*/
.compare-svg{
  margin-left: 8px;
  cursor: pointer;
}
.compare-svg_rect{
  transition: all .3s ease;
}
.compare-svg:hover .compare-svg_rect{
  fill: #BD0F2C;
  transition: all .3s ease;
}
.active{
  fill: #BD0F2C;
  transition: all .3s ease;
}
</style>