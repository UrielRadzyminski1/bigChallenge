<template>
  <div>
    {{this.props.cart}}
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