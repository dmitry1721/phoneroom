<template>
  <div class="wrapper">
    <header class="header">
      <component :is="windowWidth > 768 ? HeaderTop : 'div'" />
      <HeaderMain />
    </header>
    <main class="main">
      <div class="error">
        <section class="error-section">
          <div class="error-body">
            <h1 class="title_404">404</h1>
            <h2 class="subtext_404">Страница не найдена :(</h2>
            <h3 class="explain_404">Неправильно набран адрес или такая страница больше не существует</h3>
            <div class="error-btn">
              <Button :route_btn="'/'" :width_btn="14">Вернуться на главную</Button>
            </div>
          </div>
        </section>
      </div>
    </main>
    <footer class="footer">
      <div class="container">
        <Footer />
      </div>
    </footer>
  </div>
</template>
<script setup>
import {onMounted, resolveComponent} from "vue";
const HeaderTop = resolveComponent('HeaderTop');

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
.error{
  display: flex;
  width: 100%;
  justify-content: center;
}
.error-body{
  padding: 5.5rem 3.5rem;
}
.error-section{
  width: 50rem;
  height: 30rem;
  text-align: center;
  margin: 6.25rem 0 11.25rem 0;
  box-shadow: 0 0 30px rgba(133, 143, 164, 0.5);
  border-radius: 6px;
}
.title_404{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 3.75rem;
  line-height: 110%;
  text-align: center;
  color: #1A1A25;
  padding-bottom: 1.875rem;
}
.subtext_404{
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  font-size: 1.875rem;
  line-height: 110%;
  text-align: center;
  color: #1A1A25;
  padding-bottom: 1.875rem;
}
.explain_404{
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 1rem;
  line-height: 150%;
  text-align: center;
  color: #384255;
  margin-bottom: 1.875rem;
}
.error-btn{
  display: flex;
  justify-content: center;
}
</style>