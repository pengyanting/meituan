import Vue from 'vue'
import Vuex from 'vuex'
import * as types from '../store/type'
Vue.use(Vuex)
const state = {
  loginType: false,
  selectType: '外卖'
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
  }
}
const mutations = {
  [types.LOGIN_TYPE](state, loginType) {
    state.loginType = loginType
  },
  [types.SELECT_TYPE](state, selectType) {
    state.selectType = selectType
  }
}
export default new Vuex.Store({
  state, 
  actions, 
  mutations })