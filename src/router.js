import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './pages/Index.vue'
import Login from './pages/login/Login.vue'
import PwLogin from './pages/login/PwLogin.vue'

// 我的
import My from './pages/my/myMain.vue'
import AccountSafe from './pages/my/accountSafe.vue'

// 外卖
import ListDetail from './pages/waimai/listDetail'
Vue.use(VueRouter)
const routes = [{
  path: '',
  component: Index
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
  name: '我的',
  path: '/my/accountSafe',
  component: AccountSafe
}, {
  name: '商家详情',
  path: '/waimai/listDetail',
  component: ListDetail
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