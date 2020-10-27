<template>
  <div class="
    flex
    flex-col
    justify-center
    items-center
    flex-grow">
    <h1>Welcome!</h1>
    <router-link 
    class="
      mt-10
      py-1
      px-4
      border-4
      border-solid
      border-black
      rounded-xl
      hover:bg-red-200
      " 
    :to="'/categories'">
      <h2>Press here to order</h2>
    </router-link>
  </div>
</template>

<script>
export default {
  
}
</script>