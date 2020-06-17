import Vue from 'vue'
import App from './App.vue'
import axios from 'axios'

Vue.prototype.$http = axios
Vue.config.productionTip = false


new Vue({
  render: h => h(App)
}).$mount('#app')

Vue.filter('truncate', function (text, length, suffix) {
    if (text.length > length) {
        return text.substring(0, length) + suffix;
    } else {
        return text;
    }
});