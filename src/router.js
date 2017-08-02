import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './pages/App.vue'
import Home from './pages/Index.vue'
import Login from './pages/login/Login.vue'
import PwLogin from './pages/login/PwLogin.vue'

// 我的
import My from './pages/my/myMain.vue'
import AccountSafe from './pages/my/accountSafe.vue'
import UpdateUserName from './pages/my/updateUserName.vue'
import BindMobile from './pages/my/bindMobile.vue'
import MyWallet from './pages/my/wallet/myWallet.vue'
import Balance from './pages/my/wallet/balance.vue'
import BalanceProblem from './pages/my/wallet/balanceProblem'
import TradeList from './pages/my/wallet/tradeList.vue'
import Preferential from './pages/my/preferential/preferential.vue'
import Gift from './pages/my/preferential/gift.vue'
import Cash from './pages/my/preferential/cash.vue'
import HistoryGift from './pages/my/preferential/historyGift.vue'
import GiftExplain from './pages/my/preferential/giftExplain.vue'
import AddressList from './pages/my/address/addressList.vue'
import AddAdderss from './pages/my/address/addAddress.vue'
import ConfirmAddress from './pages/my/address/confirmAddress.vue'
import SearchAddress from './pages/my/address/searchAddress.vue'
import Collection from './pages/my/collection/collection.vue'
import Setting from './pages/my/setting/setting.vue'
import UpdatePwd from './pages/my/safe/updatePwd.vue'
// 外卖
import ListDetail from './pages/waimai/listDetail.vue'
import ShopDetail from './pages/waimai/shopDetail.vue'
// 发现
import Find from './pages/find/findMain.vue'

// 订单
import Order from './pages/order/orderMain.vue'


Vue.use(VueRouter)
const routes = [{
  path: '/', // 顶级路由
  component: App,
  meta: {
    noAuto: true
  },
  children: [
    {
      // 二级路由
      path: '',
      redirect: '/home'
    }, {
      path: '/home',
      component: Home
    }, {
      name: '我的',
      path: '/my',
      component: My
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
  component: PwLogin,
  meta: {
    noAuto: true
  }
}, {
  name: '账户与安全',
  path: '/my/accountSafe',
  component: AccountSafe
}, {
  name: '我的钱包',
  path: '/my/wallet/myWallet',
  component: MyWallet
}, {
  name: '用户名',
  path: '/my/accountSafe/updateUserName',
  component: UpdateUserName
}, {
  name: '绑定手机',
  path: '/my/accountSafe/bindMobile',
  component: BindMobile
}, {
  name: '修改密码',
  path: '/my/accountSafe/updatePwd',
  component: UpdatePwd
}, {
  name: '商家详情',
  path: '/waimai/listDetail',
  component: ListDetail
}, {
  name: '钱包余额',
  path: '/my/wallet/balance',
  component: Balance
}, {
  name: '余额问题',
  path: '/my/wallet/balanceProblem',
  component: BalanceProblem
}, {
  name: '交易明细列表',
  path: '/my/wallet/tradeList',
  component: TradeList
}, {
  name: '我的优惠',
  path: '/my/preferential',
  component: Preferential,
  children: [{
    name: '红包',
    path: 'gift',
    component: Gift
  }, {
    name: '代金券',
    path: 'cash',
    component: Cash
  }]
}, {
  name: '历史红包',
  path: '/my/preferential/historyGift',
  component: HistoryGift
}, {
  name: '红包说明',
  path: '/my/preferential/giftExplain',
  component: GiftExplain
}, {
  name: '收货地址',
  path: '/my/address/addressList',
  component: AddressList
}, {
  name: '新增地址',
  path: '/my/address/addAddress',
  component: AddAdderss
}, {
  name: '确认收货地址',
  path: '/my/address/confirmAddress',
  component: ConfirmAddress
}, {
  name: '定位搜索',
  path: '/my/address/searchAddress',
  component: SearchAddress
}, {
  name: '我的收藏',
  path: '/my/collection/collection',
  component: Collection
}, {
  name: '商家详情',
  path: '/waimai/shopDetail',
  component: ShopDetail
}, {
  name: '设置',
  path: '/my/setting',
  component: Setting
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