<template>
  <div>

      <div class="px-8">
        <div class="
        my-4" v-for="meal in meals" 
        v-bind:key="meal.id">
              <category-item 
                :meal="meal"
                >
              </category-item>
        </div>
      </div>
      <tocart-footer></tocart-footer>

  </div>
</template>

<script>
import {mapState} from "vuex";
import CategoryItem from './CategoryItem.vue'
import TocartFooter from '../Auxiliary/TocartFooter.vue'
export default {
  components:{
    'category-item':CategoryItem,
    'tocart-footer':TocartFooter
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