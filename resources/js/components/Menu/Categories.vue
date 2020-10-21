<template>
  <div>
    <div class="
      flex" v-for="category in categories" v-bind:key="category.id">

        <h1>{{category.name}}</h1>
        <img :src="'/storage/'+category.image" :alt="category.name" width="100" height="100" />
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