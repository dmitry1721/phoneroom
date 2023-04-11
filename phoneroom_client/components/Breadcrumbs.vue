<template>
  <div class="breadcrumbs">
    <ol class="breadcrumb">
      <nuxt-link :to="'/'" class="item title_breadcrumb title_breadcrumb-home">
        <li class="item_li">
            Главная
        </li>
      </nuxt-link>
      <li v-for="(item, i) in crumbs.slice(0, crumbs.length-1)" :key="i" class="item">
        <nuxt-link :to="item.to" class="title_breadcrumb">
          {{ item.title }}
        </nuxt-link>
      </li>
    </ol>
  </div>
</template>

<script>
import startCase from 'lodash.startcase'
export default {
  name: "Breadcrumbs",
  props: {
    category: Object || null,
    brand: Object || null,
    name: Object || null,
  },
  computed: {
    crumbs (props) {
      const pathArray = this.$route.path.split('/')
      pathArray.shift()
      let links = [props.name]

      if (props.category !== undefined && props.brand !== undefined){
        console.log(props.category);
        links = [props.category, props.brand, props.name]
      }
      const breadcrumbs = links.reduce((breadcrumbArray, path, idx) => {
        breadcrumbArray.push({
          to: breadcrumbArray[idx - 1]
              ? breadcrumbArray[idx - 1].to + '' + path.to
              : '/catalog/' + path.to,
          title: startCase(path.title)
        })
        return breadcrumbArray
      }, [])
      return breadcrumbs
    }
  }
}
</script>

<style scoped>
.breadcrumbs{
  margin: 2.5rem 0;
}
.item{
  list-style: none;
  display: inline-block;
}
.item_li{
  display: inline-block;
}
.title_breadcrumb{
  color: rgba(56, 66, 85, 0.6);
  transition: .3s easy .5s;
}
.item::after{
  content: '»';
  padding: 0 7px;
  color: rgba(56, 66, 85, 0.6);
}
.item:last-child:after{
  content: none;
  padding: 0;
}
.title_breadcrumb:hover{
  color: rgba(56, 66, 85, 1);
  transition: .3s easy .5s;
}
.item:first-child:before{
  content: url('../img/home.svg');
  padding-right: 5px;
  vertical-align: middle;
}
@media (max-width: 768px) {
  li.item>.title_breadcrumb-home{
    display: none;
  }
  .item:first-child:before{
    padding-right: 0;
  }
}
</style>