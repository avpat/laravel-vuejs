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
            <Units v-bind:units="units" />
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

export default {
  name: 'App',
  components: {
      Units
  },
  data() {
      return {
    "units": [
        {
            "id": 1,
            "address": "432 Daija Corner\nEleanoreland, SC 72220-1618",
            "postcode": "75769-5903",
            "name": "Ashtyn Yundt",
            "status": "available",
            "charges": []
        },
        {
            "id": 2,
            "address": "37445 Thompson Coves\nSavanahstad, DE 32389-1091",
            "postcode": "84692",
            "name": "Germaine Kirlin",
            "status": "available",
            "charges": []
        },
        {
            "id": 3,
            "address": "176 Addie River Suite 667\nPort Juanita, NH 61148",
            "postcode": "94473",
            "name": "Garland Hyatt III",
            "status": "available",
            "charges": []
        },

        {
            "id": 11,
            "address": "40184 Hoppe Stream Suite 233\nWest Isabellaport, HI 35720-6935",
            "postcode": "11468",
            "name": "Baylee Blick DVM",
            "status": "available",
            "charges": [
                {
                    "id": 1,
                    "start": "2020-07-04 11:33:18",
                    "end": "2020-06-15 21:57:14"
                }
            ]
        },
        {
            "id": 12,
            "address": "51146 Bernard Causeway Suite 125\nBernhardshire, AK 62178-1370",
            "postcode": "65671",
            "name": "Vesta Herman",
            "status": "charging",
            "charges": [
                {
                    "id": 2,
                    "start": "2020-07-09 15:48:46",
                    "end": "2020-07-04 09:35:58"
                }
            ]
        },
        {
            "id": 13,
            "address": "95009 Ebba Prairie\nBarrowsstad, MO 75559",
            "postcode": "10495-4118",
            "name": "Vincenza Pollich Jr.",
            "status": "charging",
            "charges": [
                {
                    "id": 3,
                    "start": "2020-06-30 15:06:16",
                    "end": "2020-06-24 07:13:27"
                }
            ]
        },
        {
            "id": 14,
            "address": "983 Grady Track Apt. 469\nLelahfort, OR 26071",
            "postcode": "10559",
            "name": "Aditya Friesen",
            "status": "charging",
            "charges": [
                {
                    "id": 4,
                    "start": "2020-07-04 09:58:38",
                    "end": "2020-06-29 22:02:14"
                }
            ]
        },
        {
            "id": 15,
            "address": "5849 Sadie Roads\nThielshire, WA 06373-3508",
            "postcode": "01710",
            "name": "Lila Satterfield V",
            "status": "available",
            "charges": [
                {
                    "id": 5,
                    "start": "2020-06-27 21:10:43",
                    "end": "2020-06-22 23:53:13"
                }
            ]
        },
        {
            "id": 16,
            "address": "1846 Tara Neck\nSouth Corytown, MS 78359-9747",
            "postcode": "76037",
            "name": "Keegan Larson",
            "status": "available",
            "charges": [
                {
                    "id": 6,
                    "start": "2020-06-23 02:06:51",
                    "end": "2020-06-16 18:02:02"
                }
            ]
        },
        {
            "id": 17,
            "address": "8131 Maud Avenue Suite 639\nNorth Domingo, PA 78387-6333",
            "postcode": "44650",
            "name": "Kenny Lynch",
            "status": "charging",
            "charges": [
                {
                    "id": 7,
                    "start": "2020-07-12 14:51:52",
                    "end": "2020-07-02 16:10:59"
                }
            ]
        },
        {
            "id": 18,
            "address": "5038 Merle Canyon Apt. 693\nSpinkaton, DC 36405",
            "postcode": "40089-0001",
            "name": "Ms. Mylene Ortiz DVM",
            "status": "charging",
            "charges": [
                {
                    "id": 8,
                    "start": "2020-07-03 10:45:24",
                    "end": "2020-06-19 16:32:37"
                }
            ]
        },
        {
            "id": 19,
            "address": "6863 Rogers Avenue Suite 973\nLauraville, AZ 99401",
            "postcode": "71073",
            "name": "Dr. Aryanna Bartell",
            "status": "available",
            "charges": [
                {
                    "id": 9,
                    "start": "2020-06-20 03:35:56",
                    "end": "2020-06-15 23:29:32"
                }
            ]
        },
        {
            "id": 20,
            "address": "24624 Agustin Overpass Apt. 371\nWardville, NC 07373",
            "postcode": "62230",
            "name": "Dr. Mohamed Ernser",
            "status": "charging",
            "charges": [
                {
                    "id": 10,
                    "start": "2020-07-13 05:24:34",
                    "end": "2020-07-02 13:24:42"
                }
            ]
        }
    ]
}
      // console.log(process.env.VUE_APP_DEV_API)
  }

}
</script>

<style>
@import "~bulma/css/bulma.css";
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}



</style>