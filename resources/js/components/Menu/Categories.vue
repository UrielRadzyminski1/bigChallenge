<template>
  <div>
    <div class="
      grid 
      grid-cols-1 
      sm:grid-cols-2
      lg:grid-cols-3
      xl:grid-cols-4">
          <router-link class="showCategoriesItem" v-for="category in categories" 
        v-bind:key="category.id" :to="'/categories/'+category.id">
            <img 
              class="
                rounded-2xl
                border-solid
                border-4
                border-red-600
                hover:border-red-800"
              :src="'/storage/'+category.image" 
              :alt="category.name + ' image'" 
              width="250" height="250" />
              <h3 class="
              categoryImage
              subpixel-antialiased 
              mt-4
              text-2xl 
              font-black
              uppercase
              tracking-widest
              text-red-900">{{category.name}}</h3>
          </router-link>
    </div>
    <tocart-footer></tocart-footer>
  </div>
</template>

<script>
import TocartFooter from '../Auxiliary/TocartFooter.vue'
export default {
  components:{
    'tocart-footer':TocartFooter
  },
  data() {
    return {
      categories : []
    }
  },
  mounted(){
    axios.get('api/categories').then( (response) => {
      this.categories = response.data.data;
    });
  }
}
</script>