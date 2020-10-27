<template>
    <div 
    class="flex 
    flex-col 
    shadow-md
    divide-y-2 divide-red-200"> 
        <div class="
        flex 
        justify-between 
        bg-red-600 
        font-bold 
        text-white
        capitalize 
        p-2">
            <h4>{{this.meal.name}}</h4>
            <h4>$ {{mealPrice}}</h4>
        </div>
        

        <p class="p-4">{{this.meal.description}}</p>

        <div
          class="
          flex
          justify-evenly
          py-4">
            
            <div class="
            flex 
            justify-between
            rounded
            shadow
            font-semibold">
                <p class="cartButton"
                @click="incAmount()">
                    +1
                </p>
                
                <p class="
                py-2
                pr-4
                pl-3">{{currentAmount}}</p>

                <p class="cartButton"
                @click="decAmount()">
                    -1
                </p>
            </div>
            <p class="addToCartButton"
            @click="addToCart()">Add to cart ${{totalPrice}}
            </p>     
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
            if (this.currentAmount>1) {
                this.currentAmount -=1;
            }
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
        mealPrice () {
        return this.meal.price;
        },
        totalPrice () {
        return this.meal.price*this.currentAmount;
        }

    }
}

</script>