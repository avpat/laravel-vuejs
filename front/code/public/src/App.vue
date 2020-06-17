<template>
    <div id="app">

        <!-- Add header -->
        <section class="hero is-green is-small has-text-centered is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title has-text-white">Units</h1>
                </div>
            </div>
        </section>
        <!-- Fetch contents units -->
            <Units v-bind:units="units.data" />
        <!-- Add footer -->
        <nav class="level is-mobile">
        <div class="level-item has-text-centered">
            <div>
                <p class="heading"><img src="@/assets/fav-sign.svg" alt="favorites" width="30" /></p>
                <p class="title is-size-4-touch">Favorites</p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <p class="heading"><img src="@/assets/unit-sign.svg" alt="units" width="30" /></p>
                <p class="title is-size-4-touch">Units</p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <p class="heading"><img src="@/assets/account-sign.svg" alt="account" width="30" /></p>
                <p class="title is-size-4-touch">Account</p>
            </div>
        </div>
        </nav>     
    </div>
</template>

<script>
import Units from './components/Units.vue'
import axios from 'axios'
const baseURI = process.env.VUE_APP_DEV_API

export default {
  name: 'App',
  components: {
      Units
  },
  data() {
      return {
          units: []
      }
  },
  created() {
        axios.get(`${baseURI}/api/units`)
        .then(response => {
            this.units = response.data
          //  console.log(this.units.data)
        })
        .catch(e => {
            this.errors.push(e)
        })
      }

      // console.log(process.env.VUE_APP_DEV_API)
  

}
</script>

<style>
@import "~bulma/css/bulma.css";
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
}



</style>