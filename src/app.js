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
import store from './store/index'

// 引入rem
import './libs/rem.js'


// mock模拟数据
const Mock = require('mockjs')
const data = Mock.mock({
  // 属性 list 的值是一个数组，其中含有 1 到 10 个元素
  'list|5-10': [{
     // 属性 id 是一个自增数，起始值为 1，每次增 1
    'id|+1': 1,
    'imgUrl|1': '../../assets/images/kfc.png',
    'adImgUrl|1': '../.../assets/images/pinpai.png',
    'isadImg|0-1': 0,
    'title|1': ['肯德基宅急送（聚丰店）', '上海麦当劳祁连山路餐厅', '必胜客宅急送（锦秋店）', '碗上叫鸡'],
    'score|1': ['3.5', '4.9', '4.7', '4.0', '2.7'],
    'sellNum|1': ['1123', '300', '989', '786', '898'],
    'qisongfei|1': ['0', '5', '20', '50'],
    'peisongfei|1': ['0', '4', '5', '0-9'],
    'renjun|1': ['50', '118', '200', '20'],
    'activelist|1-10': [{
      'youhui|+1': ['减', '特', '新', '领', '折'],
      'title|+1': ['满35减5，满49减8', '荔枝樱桃5.8元', '新用户下单立减20元', '进店领20元代金券', '白果园鲜果8折']
    }]
  }]
})
// 输出结果
// console.log(JSON.stringify(data, null, 4))
// 初始化根实例
new Vue({
  router,
  store,
  data: {
    list: data
  },
  render: h => h(App)
}).$mount('#app')

