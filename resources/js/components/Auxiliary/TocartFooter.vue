<template>
    <div class="
        w-full
        h-16
        sm:h-24
        fixed 
        bottom-0
        bg-red-500
        flex
        justify-between
        items-center
        px-16
        sm:px-24
        text-white
        font-bold
        tracking-wider">
        <router-link to="/categories">Categories</router-link>
        <router-link to="/Cart" class="flex items-center">
            <img class="w-6 h-6 mr-4" src="https://www.flaticon.com/svg/static/icons/svg/1170/1170678.svg" alt="cart"> 
            <span>${{this.$store.getters.totalPrice}}</span>
        </router-link>
    </div>
</template>
<script>
export default {
    
}
</script>