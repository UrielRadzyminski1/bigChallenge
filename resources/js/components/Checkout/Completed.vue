<template>
  <div>
    {{this.cart}}
  </div>
</template>
<script>
export default {
  props:[
    'cart',
    'orderId'
  ]
}
</script>