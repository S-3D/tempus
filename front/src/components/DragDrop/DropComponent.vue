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
  height: 50px;
  width: 80%;
  margin: auto;
  min-width: 20px;
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
