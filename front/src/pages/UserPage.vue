<script setup>
import { api } from 'src/boot/axios';
import { ref, reactive, onBeforeMount } from 'vue'
const user = reactive({
  username: '',
  role: ''
})
const options = ['user', 'manager', 'admin']
const onSubmit = () => {
  api.post('/users', user)

}
const columns = [
  { name: 'id', label: 'id', field: 'id', sortable: true },
  { name: 'username', label: 'username', field: 'username', sortable: true },
  { name: 'role', label: 'role', field: 'role', sortable: true },
]
const rows = ref()
const fetchData = async () => {
  const res = await api.get('/users');
  rows.value = res.data['hydra:member']
}
onBeforeMount(() => {
  fetchData()
})
</script>

<template>
  <q-page class="q-pa-md flex column flex-center">
    <div class="q-pa-lg bordered" style="width: 500px;">
      <q-form @submit="onSubmit" @reset="onReset" class="q-gutter-md">
        <q-input filled v-model="user.username" label="Your name *" hint="Name and surname" lazy-rules
          :rules="[val => val && val.length > 0 || 'Please type something']" />
        <q-select filled :options="options" label="Role" v-model="user.role" />
        <q-btn type="Submit"> Submit</q-btn>
      </q-form>
    </div>
    <div>
      <q-table :rows="rows" :columns="columns" row-key="name" />

    </div>
  </q-page>
</template>
