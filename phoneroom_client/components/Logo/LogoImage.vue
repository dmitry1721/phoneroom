<template>
  <div class="logo-image-svg">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66 66" fill="none">
      <circle cx="33" cy="33" r="31.5" fill="#1A1A25" stroke="#E31235" stroke-width="3"/>
      <line y1="-1.5" x2="34.7678" y2="-1.5" transform="matrix(0.905241 -0.424897 0.454467 0.890763 14.1162 33.6226)" stroke="#E31235" stroke-width="3"/>
      <line y1="-1.5" x2="35.6292" y2="-1.5" transform="matrix(0.883355 0.468706 -0.499608 0.866251 14.1162 33.6226)" stroke="#E31235" stroke-width="3"/>
      <path d="M23.4911 33.9437C23.4911 38.3778 19.7435 41.9724 15.1205 41.9724C10.4976 41.9724 6.75 38.3778 6.75 33.9437C6.75 29.5096 10.4976 25.915 15.1205 25.915C19.7435 25.915 23.4911 29.5096 23.4911 33.9437Z" fill="#E31235"/>
      <ellipse cx="45.2543" cy="46.7896" rx="8.37054" ry="8.02866" fill="#E31235"/>
      <ellipse cx="45.2543" cy="18.5287" rx="8.37054" ry="8.02866" fill="#E31235"/>
    </svg>
  </div>
</template>

<script>
export default {
  name: "LogoImage"
}
</script>

<style scoped>
.logo-image-svg{
  width: 4.125rem;
  height: 4.125rem;
}

@media (max-width: 400px) {
  .logo-image-svg{
    width: 4rem;
    height: 4rem;
  }
}

@media (max-width: 400px) {
  .logo-image-svg{
    width: 3.875rem;
    height: 3.875rem;
  }
}
</style>