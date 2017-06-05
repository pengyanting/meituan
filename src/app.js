// import 'babel-polyfill'
import Vue from 'vue'
import router from './router'

import App from './pages/App.vue'

// 引入mintUi
import Mint from 'mint-ui'
import 'mint-ui/lib/style.css'
Vue.use(Mint)

// 引入表单验证插件
import Vuerify from 'vuerify'
import VuerifyDirective from 'v-vuerify-next' // Vue2.0
Vue.use(Vuerify/* 添加自定义规则 */)
Vue.use(VuerifyDirective)

// 引入状态管理
import store from './store/store'
// 初始化根实例
new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')

