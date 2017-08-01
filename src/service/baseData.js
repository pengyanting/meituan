import axios from 'axios'
import qs from 'querystring'
export const ax = (url, method, data) => {
  url = 'http://127.0.0.1:3000/' + url
  method = method.toUpperCase()
  if (method === 'GET') {
    return axios.get(url, { params: data })
  } else if (method === 'POST') {
    return axios.post(url, qs.stringify(data))
  }
}
