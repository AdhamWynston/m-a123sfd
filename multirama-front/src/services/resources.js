import 'vue-resource'
import Vue from 'vue'

export class Passport {
  static accessToken (username, password) {
    return Vue.http.post('v1/oauth/token', {username, password})
  }
}
