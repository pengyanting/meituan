import Vue from 'vue'
import Vuex from 'vuex'
import * as types from '../store/type'

Vue.use(Vuex)
const state = {
  loginType: false,
  selectType: '外卖',
  address: '',
  position: {}
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
  }
}
export default new Vuex.Store({
  state, 
  actions,
  mutations })