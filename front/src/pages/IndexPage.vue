<script setup>
import { ref } from 'vue'
import ActivityPanel from 'src/components/ActivityPanel.vue '
import DatePanel from 'src/components/DatePanel.vue'
import DragComponent from 'src/components/DragDrop/DragComponent.vue'
import DropComponent from 'src/components/DragDrop/DropComponent.vue'

const splitter = ref(50)
const status1 = ref([])
const status2 = ref([])
const listeActivites = ['Tache 1', 'Tache 2', 'Tache 3 ']


function handler1(mutationRecords) {
  status1.value = []
  for (const index in mutationRecords) {
    const record = mutationRecords[index]
    const info = `type: ${record.type}, nodes added: ${record.addedNodes.length > 0 ? 'true' : 'false'}, nodes removed: ${record.removedNodes.length > 0 ? 'true' : 'false'}, oldValue: ${record.oldValue}`
    status1.value.push(info)
  }
}

function handler2(mutationRecords) {
  status2.value = []
  for (const index in mutationRecords) {
    const record = mutationRecords[index]
    const info = `type: ${record.type}, nodes added: ${record.addedNodes.length > 0 ? 'true' : 'false'}, nodes removed: ${record.removedNodes.length > 0 ? 'true' : 'false'}, oldValue: ${record.oldValue}`
    status2.value.push(info)
  }
}

function onDragStart(e) {
  e.dataTransfer.setData('text', e.target.id)
  e.dataTransfer.dropEffect = "copy";
}

function onDragEnter(e) {
  if (e.target.draggable !== true) {
    e.target.classList.add('drag-enter')
  }
}

function onDragLeave(e) {
  e.target.classList.remove('drag-enter')
}

function onDragOver(e) {
  e.preventDefault()
}

function onDrop(e) {
  e.preventDefault()

  // don't drop on other draggables
  if (e.target.draggable === true) {
    console.log('Drop on Another Draggable')
    return
  }

  const draggedId = e.dataTransfer.getData('text')
  const draggedEl = document.getElementById(draggedId)
  const clonedEl = draggedEl.cloneNode(true)
  // check if original parent node
  if (draggedEl.parentNode === e.target) {
    console.log('Original Parent Node')

    e.target.classList.remove('drag-enter')
    return
  }

  // make the exchange
  // draggedEl.parentNode.removeChild(draggedEl)
  e.target.appendChild(clonedEl)
  // e.target.classList.remove('drag-enter')
}
</script>


<template>
  <q-page class="flex flex-center">
    <q-splitter v-model="splitter" style="height: 80vh; width: 80vw;" before-class="left-panel" after-class="right-panel">

      <template v-slot:before>
        <DatePanel>
          <DropComponent :handler2="handler2" :onDragStart="onDragStart" :onDragEnter="onDragEnter"
            :onDragLeave="onDragLeave" :onDragOver="onDragOver" :onDrop="onDrop" />
        </DatePanel>
      </template>

      <template v-slot:after>
        <ActivityPanel>
          <DragComponent :listeActivites="listeActivites" :handler1="handler1" :onDragStart="onDragStart"
            :onDragEnter="onDragEnter" :onDragLeave="onDragLeave" :onDragOver="onDragOver" :onDrop="onDrop" />
        </ActivityPanel>
      </template>

    </q-splitter>


  </q-page>
</template>


<style>
.left-panel {
  width: 40vw;
  height: 80vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.right-panel {
  width: 40vw;
  height: 80vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
</style>
