<template>
  <q-layout
    ref="layout"
    view="lHh Lpr fff"
    :class="{'bg-grey-4': true}"
    :left-class="{'bg-grey-3': true}" >
    <q-toolbar slot="header" class="glossy">
      <q-toolbar-title>
        Multirama
        <div slot="subtitle">Sistema administrativo</div>
      </q-toolbar-title>
    </q-toolbar>
    <div class="layout-view layout-padding">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 offset-md-4">
          <q-card color="light">
            <q-card-title class="text-dark" align="center">
              <h5>Autenticação</h5>
            </q-card-title>
            <q-card-main>
              <q-field icon="mail">
                <q-input v-model="user.username" type="email" float-label="E-mail" />
              </q-field>
              <q-field icon="vpn_key">
                <q-input @keyup.enter="submit()" v-model="user.password" type="password" float-label="Password" />
              </q-field>
              <q-card-separator />
              <br>
              <q-btn color="primary" class="full-width" @click="submit()">Entrar</q-btn>
            </q-card-main>
          </q-card>
        </div>
      </div>
    </div>
  </q-layout>
</template>

<script>
  import { Toast } from 'quasar'
  export default {
    data () {
      return {
        user: {
          username: '',
          password: ''
        }
      }
    },
    methods: {
      submit () {
        let data = {
          grant_type: 'password',
          username: this.user.username,
          password: this.user.password,
          client_id: '2',
          client_secret: 'I8Z8O2LISYpH7WTmfeU1r1qcXnqsh5XVll3ZrfzS'
        }
        this.$http.post('oauth/token', data)
          .then(response => {
            this.$auth.setToken(response.body.access_token, response.body.expires_in + Date.now())
            this.$router.push('/home')
          })
          .catch(() => {
            Toast.create.negative('AAAVerifique suas credenciais!')
          })
      }
    },
    components: {
      Toast
    }
  }
</script>
<style scoped="">
  .container {
    padding: 20px;
  }
</style>
