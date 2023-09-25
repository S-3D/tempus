<script setup>
import { ref } from 'vue'
import { date } from 'quasar'
import WeekDisplay from 'src/components/WeekDisplay.vue'

const weekNum = date.getWeekOfYear(new Date()) // `week` is 1
const slide = ref(weekNum)
</script>

<template>
  <q-carousel v-model="slide" vertical transition-prev="slide-down" transition-next="slide-up" swipeable animated
    control-color="white" arrows style="height:80vh; width:40vw" class="bg-purple text-white shadow-1 rounded-borders">

    <q-carousel-slide v-for="n in weekNum" :name=n class="column no-wrap flex-center">
      <q-icon name="date_range" size="56px" />
      <div class="text-h3">S {{ n }}</div>
      <div class="q-mt-md text-center">
        <slot />
      </div>
    </q-carousel-slide>

  </q-carousel>
</template>
