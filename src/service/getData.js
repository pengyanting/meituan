import { ax } from './baseData.js'

export const login = (data, fun) => {
  ax('users/login', 'post', data).then(res => {
    fun(res)
  })
}

export const getUser = (data,fun) =>{
  ax('users/getUser', 'post', data).then(res => {
    fun(res)
  })
}