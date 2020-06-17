<template>
    <div class="container">
        <div v-bind:key="unit.id" v-for="unit in units">
            <Unit v-bind:unit="unit" />
        </div>
    </div>
</template>


<script>
import Unit from './Unit.vue'

export default {
  name: 'Units',
  components: {
      Unit
  },
  props: ["units"]
}
</script>
