<template>
    <div class="container">
        <div class="charge">
            <h1>{{ charge }}</h1>
        </div>
    </div>
</template>


<script>
export default {
  name: 'Charge',
  props: {
    msg: String
  }
}
</script>