<template>
    <div class=""> 
        <h4>{{this.meal.name}}</h4>
        <p>{{this.meal.description}}{{tryout}}</p>
        <div
          class="
          flex
          flex-col
          items-center">
            <p class="mx-2">PRECIO {{tryout}}</p>
            <div class="flex w-20 justify-between">
                <div>
                    <button @click="incAmount()">+1</button>
                </div>
                
                <p class="mx-2">{{currentAmount}}</p>
                <div class="w-3">
                    <button v-if="currentAmount>1" @click="decAmount()">-1</button>
                </div>
            </div>

            <button @click="addToCart()">Add to cart</button>
        </div>
    </div>
</template>
<script>
export default {
    props:[
        'meal'
    ],
    data() {
        return {
            currentAmount: 1,
        }
    },
    methods:{
        incAmount(){
            this.currentAmount +=1;
        },
        decAmount(){
            this.currentAmount -=1;
        },
        addToCart(){
            this.$store.commit('addItem', {
                'id':this.meal.id,
                'name':this.meal.name,
                'amount':this.currentAmount,
                'price':this.meal.price
            });
            alert("Item added :)")
        }
    },
    computed: {
        tryout () {
        return this.meal.price;
        }
    }
}

</script>