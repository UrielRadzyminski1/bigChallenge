<template>
  <div>

      <div class="
        my-4" v-for="meal in meals" 
        v-bind:key="meal.id">
        <h4>{{meal.name}}</h4>
        <p>{{meal.description}}</p>
        <div
            class="selectAmount">
              <button>+1</button>
              <span>{{}}</span>
              <button>-1</button>
        </div>
      </div>

  </div>
</template>

<script>
export default {

  data() {
    return {
      meals : [

      ],
      amount: {

      }
    }
  },
  mounted(){
    let route = '/api/categories/' + this.$route.params.id;

    axios.get(route).then( (response) => {
        this.meals=response.data.data;
    });
  }
}
</script>