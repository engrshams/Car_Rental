<script setup>
import { ref } from 'vue';
import CarCard from '../../Components/CarCard.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  cars: Array,
});

</script>

<template>
  
  <!-- Car Card Section -->
  <div class="container mx-auto px-4 py-2">
    <h3 class="text-2xl font-bold mb-2 text-center text-blue-700">Featured Cars</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">

      <CarCard v-for="(car, index) in cars" :key="index" :car="car"/>

    </div>
  </div>
</template>

<style></style>
