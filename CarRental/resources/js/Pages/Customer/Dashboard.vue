<script setup>
import Layout from '../Shared/Layout.vue'
const props = defineProps({totalCars: Number, availableCarsCount: Number, totalRentals: Number});
</script>
<template>
    <Layout>
        <main class="ml-64 p-8">
            <h2 class="text-2xl font-bold mb-6">Customer Dashboard</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">Total Cars</h3>
                    <p class="text-3xl text-blue-500">{{ totalCars }}</p>
                </div>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">Total Available Cars</h3>
                    <p class="text-3xl text-green-500">{{ availableCarsCount }}</p>
                </div>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">Total Number of Rentals</h3>
                    <p class="text-3xl text-green-500">{{ totalRentals }}</p>
                </div>
            </div>
        </main>
    </Layout>
</template>
<style></style>