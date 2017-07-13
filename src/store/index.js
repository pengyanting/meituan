import Vue from 'vue'
import Vuex from 'vuex'
import * as types from '../store/type'

Vue.use(Vuex)
const state = {
  loginType: false,
  selectType: '外卖',
  address: '',
  position: {},
  added: [],
  all: []
}
const getters = {
  cartProducts(state) {
    return state.added.map(({ id, quantity }) => {
      const product = state.all.find(p => p.item_id === id)
      if (product !== undefined) {
        return {
          title: product.name,
          price: product.specfoods[0].price,
          id: product.item_id,
          quantity
        }
      }else{
        
      }
    })
  },
  quantity(state) {
    return state.added.map(({ id, quantity }) => {
      const product = state.all.find(p => p.item_id === id)
      const obj = {}
      obj[product.item_id] = quantity
      return obj
    })
  }
}
const actions = {
  [types.LOGIN_TYPE]({ commit }, loginType) {
    if (loginType) {
      commit([types.LOGIN_TYPE].toString(), true)
    } else {
      commit([types.LOGIN_TYPE].toString(), false)
    }
  },
  [types.SELECT_TYPE]({ commit }, selectType) {
    commit([types.SELECT_TYPE].toString(), selectType)
  },
  [types.ADDRESS]({ commit }, address) {
    commit([types.ADDRESS].toString(), address)
  },
  [types.POSITION]({ commit }, position) {
    commit([types.POSITION].toString(), position)
  },
  addToCart({ commit }, product) {
    commit(types.ADD_TO_CART, {
      id: product.obj.item_id
    })
  },
  [types.GET_ALL_FOODS]({ commit }, allFoods) {
    commit(types.GET_ALL_FOODS, allFoods)
  }
}
const mutations = {
  [types.LOGIN_TYPE](state, loginType) {
    state.loginType = loginType
  },
  [types.SELECT_TYPE](state, selectType) {
    state.selectType = selectType
  },
  [types.ADDRESS](state, address) {
    state.address = address
  },
  [types.POSITION](state, position) {
    state.position = position
  },
  [types.ADD_TO_CART](state, { id }) {
    const record = state.added.find(p => p.id === id)
    if (!record) {
      state.added.push({
        id,
        quantity: 1
      })
    } else {
      record.quantity++
    }
  },
  [types.GET_ALL_FOODS](state, allFoods) {
    state.all = allFoods
  }
}
export default new Vuex.Store({
  state,
  actions,
  mutations,
  getters
})