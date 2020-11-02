<template>
    <div class="
        w-full
        h-16
        sm:h-24
        fixed
        text-lg 
        bottom-0
        bg-red-500
        flex
        justify-between
        items-center
        px-8
        sm:px-24
        text-white
        font-bold
        tracking-wider">
        <router-link  to="/categories">
            <i class="fas fa-shopping-basket text-lg mr-2"></i>
            <span>Categories</span> 
        </router-link>
        <router-link to="/Cart" class="flex items-center">
            <i class="fas fa-shopping-cart text-lg mx-2"></i>
            <span>${{this.$store.getters.totalPrice}}</span>
        </router-link>
    </div>
</template>
<script>
export default {
    
}
</script>