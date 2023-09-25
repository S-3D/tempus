<script setup>

const props = defineProps({
  listeActivites: Array,
  handler1: Function,
  onDragStart: Function,
  onDragEnter: Function,
  onDragLeave: Function,
  onDragOver: Function,
  onDrop: Function,
})

</script>

<template>
  <div v-mutation="props.handler1" @dragenter="props.onDragEnter" @dragleave="props.onDragLeave"
    @dragover="props.onDragOver" @drop="props.onDrop" class="droptarget q-gutter-md">

    <q-chip draggable="true" @dragstart="props.onDragStart" v-for="(activite, index) in props.listeActivites" :id="index"
      square color="secondary" text-color="white" icon="event"> {{ activite }} </q-chip>



  </div>
</template>



<style scoped lang="scss">
.droptarget {
  height: 100%;
  width: 100%;
  min-width: 200px;
}

.drag-enter {
  outline-style: dashed;
}

.box {
  width: 100px;
  height: 100px;
  float: left;
  cursor: pointer;
}

.drop-target {
  height: 200px;
  width: 100px;
  min-width: 100px;
  background-color: gainsboro;
}

.navy {
  background-color: navy
}

.red {
  background-color: firebrick
}

.green {
  background-color: darkgreen
}

.orange {
  background-color: orange
}
</style>
