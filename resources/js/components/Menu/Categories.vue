<template>
  <div>
    <div class="
      grid 
      grid-cols-1 
      sm:grid-cols-2
      lg:grid-cols-3
      xl:grid-cols-4">
      <div class="
        flex
        flex-col
        items-center
        my-4
        text-center" v-for="category in categories" 
        v-bind:key="category.id">
          <router-link :to="'/categories/'+category.id">
            <img 
              class="
                rounded-2xl
                border-solid
                border-8
                border-red-600
                hover:border-red-800"
              :src="'/storage/'+category.image" 
              :alt="category.name + ' image'" 
              width="200" height="200" />
              <h3>{{category.name}}</h3>
          </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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