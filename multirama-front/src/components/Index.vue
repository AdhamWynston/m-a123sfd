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
      <router-view />
    </q-layout>
</template>

<script>

</script>
