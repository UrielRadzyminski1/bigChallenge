<template>
    <div id="Holas" class="flex flex-col flex-grow pt-10 pb-24">
       <!--  <nav>
            <router-link to="/">Home</router-link>
            <router-link to="/categories">Categories</router-link>
            <router-link to="/cart">Cart</router-link>
            <br>
            <p>Current price: {{this.$store.getters.totalPrice}}</p>
        </nav> -->
        
        
        <router-view></router-view>
      </div>
    </div>
</template>