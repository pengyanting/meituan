import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './pages/Index.vue'
import Login from './pages/login/Login.vue'
import PwLogin from './pages/login/PwLogin.vue'

// 我的
import My from './pages/my/myMain.vue'
import AccountSafe from './pages/my/accountSafe.vue'
import UpdateUserName from './pages/my/updateUserName.vue'

// 外卖
import WaiMai from './pages/waimai/waimaiMain.vue'
import ListDetail from './pages/waimai/listDetail'

// 发现
import Find from './pages/find/findMain.vue'

// 订单
import Order from './pages/order/orderMain.vue'


Vue.use(VueRouter)
const routes = [{
  path: '',
  component: Index,
  children: [{
    name: '我的',
    path: '/my',
    component: My
  }, {
    name: '外卖',
    path: '/waimai',
    component: WaiMai,
    children: [{
      name: '商家详情',
      path: '/waimai/listDetail',
      component: ListDetail
    }]
  }, {
    name: '发现',
    path: '/find',
    component: Find
  }, {
    name: '订单',
    path: '/order',
    component: Order
  }]
}, {
  path: '/login',
  component: Login,
  meta: {
    noAuto: true
  }
}, {
  path: '/PwLogin',
  component: PwLogin
}, {
  name: '账户与安全',
  path: '/my/accountSafe',
  component: AccountSafe
}, {
  name: '用户名',
  path: '/my/accountSafe/updateUserName',
  component: UpdateUserName
}]

// 创建 router 实例，然后传 `routes` 配置
const router = new VueRouter({
  routes
})
// 需要身份验证,检查是否登录
router.beforeEach((to, from, next) => {
  if (to.path !== '/') {
    if (to.matched.some(record => record.meta.noAuto)) {
      if (to.path === '/login' && localStorage.phone) {
        next({
          path: '/'
        })
      } else {
        next()
      }
    } else {
      if (!localStorage.phone) {
        next({
          path: '/login',
          query: { redirect: to.fullPath }
        })
      } else {
        next() //  确保一定要调用 next()
      }
    }
  } else {
    next()
  }
})
export default router