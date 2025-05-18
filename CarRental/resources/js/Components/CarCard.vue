<script setup>
import { Link, router } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const toast = useToast();


const props = defineProps({
    car: Object
});


</script>

<template>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <!-- <img :src="`/storage/${car.image}`" alt="Car" class="w-full h-48 object-cover" /> -->
        <img :src="car.image" alt="Car" class="w-full h-48 object-cover" />
        <div class="px-4 py-1 text-center bg-gradient-to-r from-purple-200 via-pink-300 to-red-300 rounded-lg shadow-lg">
            <h3 class="text-purple-900 text-base font-semibold">
                {{ car.name }}
            </h3>
            <p class="text-yellow-800 font-bold text-base mt-0">
                Brand: {{ car.brand }}
            </p>
            <span class="bg-green-600 text-white px-3 py-0.25 rounded-full text-xs mt-1 inline-block">
                Daily Rent: ৳{{ car.daily_rent_price }}
            </span>
            <div class="flex justify-center mt-1.5">
                <Link :href="`/car/${car.id}`" class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-1 rounded-md transition">
                Book Now
                </Link>
            </div>
        </div>
    </div>
</template>

<style></style>
