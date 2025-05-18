<script setup>
import { ref, watch } from 'vue';
import CarCard from '../../Components/CarCard.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  cars: Array,
  filterOptions: Object,
  filters: Object,
});

// Reactive filter values initialized from props.filters
const selectedCarType = ref(props.filters.car_type || '');
const selectedBrand = ref(props.filters.brand || '');
const maxPrice = ref(props.filters.max_price || '');

// Watch filters and send request when changed
watch([selectedCarType, selectedBrand, maxPrice], () => {
  // Send GET request with current filters
  router.get('/rentals', {
    car_type: selectedCarType.value || undefined,
    brand: selectedBrand.value || undefined,
    max_price: maxPrice.value || undefined,
  }, {
    preserveState: true,
    preserveScroll: true,
  });
});
</script>

<template>
  <div class="container mx-auto px-4 py-2">
    <h3 class="text-2xl text-blue-500 font-extrabold mb-1 text-center text-gradient-to-r from-purple-600 via-pink-600 to-red-600">
      Available Cars for Rental
    </h3>

    <!-- Filters -->
    <div class="mb-2 flex gap-4 justify-center flex-wrap">
      <!-- car_type Filter -->
      <select 
        v-model="selectedCarType" 
        class="border-2 border-purple-600 rounded px-4 py-1 flex-1 min-w-[150px] text-purple-700 font-semibold
              hover:bg-purple-100 focus:outline-none focus:ring-2 focus:ring-purple-400 transition"
      >
        <option value="">All Types</option>
        <option v-for="car_type in filterOptions.car_type" :key="car_type" :value="car_type">
          {{ car_type }}
        </option>
      </select>

      <!-- Brand Filter -->
      <select 
        v-model="selectedBrand" 
        class="border-2 border-pink-600 rounded px-4 py-1 flex-1 min-w-[150px] text-pink-700 font-semibold
              hover:bg-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
      >
        <option value="">All Brands</option>
        <option v-for="brand in filterOptions.brands" :key="brand" :value="brand">
          {{ brand }}
        </option>
      </select>

      <!-- Max Price Filter -->
      <input
        v-model="maxPrice"
        type="number"
        min="0"
        placeholder="Max Daily Rent Price"
        class="border-2 border-red-600 rounded px-4 py-1 flex-1 min-w-[150px] text-red-700 font-semibold
              hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-400 transition"
      />
    </div>




    <!-- Car Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
      <CarCard v-for="(car, index) in cars" :key="index" :car="car"/>
    </div>
  </div>
</template>
