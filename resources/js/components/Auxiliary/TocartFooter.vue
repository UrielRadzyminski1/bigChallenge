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
        <router-link to="/Cart">Cart - ${{this.$store.getters.totalPrice}}</router-link>
    </div>
</template>
<script>
export default {
    
}
</script>