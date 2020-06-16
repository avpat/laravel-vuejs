<template>
    <div id="app">
        <section class="hero is-green is-small has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title has-text-white">
                        {{Units}}
                    </h1>
                </div>
            </div>
        </section>

        <nav class="box">
            <div class="columns is-mobile is-center">
                <div class="column is-center">
                    <img
                        src="@/assets/favorite.svg"
                        alt="favorite"
                        width="30"
                    />
                    <strong>Favorites</strong>
                </div>
                <div class="column is-center">
                    <img src="@/assets/unit.svg" alt="unit" width="30" />
                    <strong class="has-text-green">Units</strong>
                </div>
                <div class="column is-center">
                    <img src="@/assets/account.svg" alt="account" width="30" />
                    <strong>Account</strong>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>

export default {
  name: 'App',
  mounted() {
      console.log(process.env.VUE_APP_DEV_API)
  }

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

</style>