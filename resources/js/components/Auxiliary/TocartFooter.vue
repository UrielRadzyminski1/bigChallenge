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
        px-24">
        <p>Total: {{this.$store.getters.totalPrice}}</p>
        <router-link to="/Cart">Cart</router-link>
    </div>
</template>
<script>
export default {
    
}
</script>