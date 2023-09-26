<script setup>
import { ref } from 'vue'
import { date } from 'quasar'
import WeekDisplay from 'src/components/WeekDisplay.vue'

const weekNum = date.getWeekOfYear(new Date()) // `week` is 1
const slide = ref(weekNum)
const daysOfWeek = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi']
</script>

<template>
  <q-carousel v-model="slide" vertical transition-prev="slide-down" transition-next="slide-up" swipeable animated
    control-color="white" arrows style="height:80vh; width:40vw" class="bg-purple text-white shadow-1 rounded-borders">

    <q-carousel-slide v-for="n in weekNum" :name=n class="flex row">
      <div class=" col-4 self-center flex justify-center">
        <q-icon name="date_range" size="6rem" />
        <div class="text-h3">S {{ n }}</div>
      </div>

      <di class=' q-mt-xl col-8 flex column justify-evenly '>
        <div v-for="day in daysOfWeek" :key="day" class="">
          <span class="text-h6">{{ day }} </span>
          <slot />
        </div>
      </di>


    </q-carousel-slide>

  </q-carousel>
</template>
