<template>
  <svg class="delete-icon" width="1.3125rem" height="1.025rem" viewBox="0 0 12 13" fill="none">
    <path class="delete-icon_path" :class="{'active':props.pressed}" d="M11.5944 2.86363L7.95845 6.49995L11.5944 10.1361C12.1352 10.6771 12.1352 11.5535 11.5944 12.0946C11.3242 12.3648 10.9699 12.5 10.6158 12.5C10.2611 12.5 9.90676 12.365 9.63674 12.0946L6.00002 8.458L2.36357 12.0945C2.09338 12.3647 1.73907 12.5 1.38465 12.5C1.03033 12.5 0.676257 12.365 0.405827 12.0945C-0.135 11.5537 -0.135 10.6773 0.405827 10.1361L4.04165 6.49991L0.40562 2.86363C-0.135207 2.32281 -0.135207 1.4462 0.40562 0.905371C0.946343 0.364958 1.82243 0.364958 2.36336 0.905371L5.99998 4.54168L9.63633 0.905371C10.1774 0.364958 11.0536 0.364958 11.5942 0.905371C12.1352 1.4462 12.1352 2.32281 11.5944 2.86363Z" fill="#858FA4"/>
  </svg>
</template>

<script setup>
const props = defineProps({
  pressed: Boolean
});
</script>

<style scoped>
.delete-icon{
  cursor: pointer;
}
.delete-icon_path{
  transition: all .3s ease;
}
.delete-icon:hover .delete-icon_path{
  fill: #BD0F2C;
  transition: all .3s ease;
}
.active{
  fill: #BD0F2C;
  transition: all .3s ease;
}
</style>