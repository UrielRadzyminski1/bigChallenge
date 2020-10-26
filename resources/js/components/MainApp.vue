<template>
    <div id="Holas" class="h-full">
        <router-link to="/">Home</router-link>
        <router-link to="/categories">Categories</router-link>
        <router-link to="/cart">Cart</router-link>
        <p>Current price: {{this.$store.getters.totalPrice}}</p>
        <router-view></router-view>
    </div>
</template>