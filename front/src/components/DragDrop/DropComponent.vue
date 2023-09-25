<script setup>
const props = defineProps({
  handler2: Function,
  onDragStart: Function,
  onDragEnter: Function,
  onDragLeave: Function,
  onDragOver: Function,
  onDrop: Function
})
</script>

<template>
  <div v-mutation="props.handler2" @dragenter="props.onDragEnter" @dragleave="props.onDragLeave"
    @dragover="props.onDragOver" @drop="props.onDrop" class="drop-target rounded-borders" />
</template>


<style scoped lang="scss">
.drop-target {
  height: 400px;
  width: 200px;
  min-width: 200px;
  background-color: gainsboro;
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
