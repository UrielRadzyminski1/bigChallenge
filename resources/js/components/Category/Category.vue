<template>
  <div>

      <div class="
        my-4" v-for="meal in meals" 
        v-bind:key="meal.id">
              <category-item 
                :meal="meal"
                >
              </category-item>
      </div>

  </div>
</template>

<script>
import {mapState} from "vuex";
import CategoryItem from './CategoryItem.vue'
export default {
  components:{
    'category-item':CategoryItem,
  },
  data() {
    return {
      meals:[],
    }
  },
  computed:{
    ...mapState({
      tText: 'testingText'
    })
  },

  mounted(){
    let route = '/api/categories/' + this.$route.params.id;

    axios.get(route).then( (response) => {
        this.meals=response.data.data;
    });
  },
  methods: {
    increment () {
      this.currentAmount +=1;
    }
  },
}
</script>