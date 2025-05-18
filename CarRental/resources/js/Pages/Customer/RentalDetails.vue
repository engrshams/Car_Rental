<script setup>
import Layout from '../Shared/Layout.vue'
import dayjs from 'dayjs'

const props = defineProps({
  rental: Object
})
</script>

<template>
  <Layout>
    <main class="ml-64 px-8 py-4 bg-gradient-to-br from-white via-blue-50 to-blue-100 min-h-screen">
      <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-xl border border-blue-200">
        
        <!-- Title -->
        <h2 class="text-3xl font-bold text-blue-900 mb-6 border-b pb-2">Rental Details</h2>

        <!-- Rental Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
          <div>
            <p class="text-gray-600 mb-0"><span class="font-bold text-blue-700">Status:</span> {{ rental.status }}</p>
            <p class="text-gray-600 mb-0">
              <span class="font-bold text-blue-700">Duration:</span>
              {{ dayjs(rental.start_date).format('YYYY-MMM-DD') }} to {{ dayjs(rental.end_date).format('YYYY-MMM-DD') }}
            </p>
            <p class="text-gray-600 mb-0">
              <span class="font-bold text-blue-700">No of Days:</span>
              {{ dayjs(rental.end_date).diff(dayjs(rental.start_date), 'day') + 1 }}
            </p>
            <p class="text-gray-600 mb-0">
              <span class="font-bold text-blue-700">Total Cost:</span> ৳{{ rental.total_cost }}
            </p>
          </div>
        </div>

        <!-- Car Info -->
        <div class="bg-blue-50 px-4 py-1 rounded-lg mb-3">          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <h3 class="text-xl font-semibold text-blue-800 mb-2">Car Details</h3>
              <p><span class="font-semibold">Car Name:</span> {{ rental.car.name }}</p>
              <p><span class="font-semibold">Model:</span> {{ rental.car.model }}</p>
              <p><span class="font-semibold">Brand:</span> {{ rental.car.brand }}</p>
              <p><span class="font-semibold">Type:</span> {{ rental.car.car_type }}</p>
              <p><span class="font-semibold">Daily Rent:</span> ৳{{ rental.car.daily_rent_price }}</p>
            </div>
            <div class="flex justify-center items-center">
              <img :src="rental.car.image" alt="Car Image"
                class="w-full max-w-xs rounded-lg shadow-md border border-gray-300" />
            </div>
          </div>
        </div>

        <!-- Customer Info -->
        <div class="bg-green-50 px-4 py-1 rounded-lg">
          <h3 class="text-xl font-semibold text-green-800 mb-2">Customer Details</h3>
          <p><span class="font-semibold">Name:</span> {{ rental.customer.cus_name }}</p>
          <p><span class="font-semibold">Phone:</span> {{ rental.customer.cus_phone }}</p>
          <p><span class="font-semibold">Email:</span> {{ rental.customer.user.email }}</p>
        </div>

      </div>
    </main>
  </Layout>
</template>
