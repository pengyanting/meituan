import { ax } from './baseData.js'

export const login = (data, fun) => {
  ax('users/login', 'post', data).then(res => { fun(res) }).catch(err => console.log(err))
}

export const getUser = (data, fun) => {
  ax('users/getUser', 'post', data).then(res => { fun(res) }).catch(err => console.log(err))
}

export const updateName = (data, fun) => {
  ax('users/updateName', 'post', data).then(res => { fun(res) }).catch(err => console.log(err))
}