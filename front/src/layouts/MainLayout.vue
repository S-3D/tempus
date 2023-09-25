<script setup>

</script>


<template>
  <q-layout view="hHh Lpr fFf">
    <q-header class="bg-white">
      <q-toolbar>
        <q-toolbar-title>
          {{ $q.config.fish }}
        </q-toolbar-title>

        <div>Quasar v{{ $q.version }}</div>
      </q-toolbar>
    </q-header>


    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

