<script setup>
import { Link, usePage } from '@inertiajs/vue3'

const authUser = usePage().props.auth.user
</script>

<template>
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-white h-screen fixed">
    <div class="p-4">
        <h3 class="text-xl font-bold mb-6">
            {{ authUser?.role === 'admin' ? 'Admin Panel' : (authUser.customer?.cus_name ?? 'User') }}
        </h3>

      <ul class="mt-4 space-y-2">

        <!-- Admin Panel -->
        <template v-if="authUser?.role === 'admin'">
          <li><Link href="/admin/dashboard" class="hover:bg-gray-700 p-2 block rounded">Dashboard</Link></li>
          <li><Link href="/admin/cars" class="hover:bg-gray-700 p-2 block rounded">Cars</Link></li>
          <li><Link href="/admin/rentals" class="hover:bg-gray-700 p-2 block rounded">Rentals</Link></li>
          <li><Link href="/admin/sliders" class="hover:bg-gray-700 p-2 block rounded">Sliders</Link></li>
          <li><Link href="/customers" class="hover:bg-gray-700 p-2 block rounded">Customers</Link></li>
          <li><Link href="/users" class="hover:bg-gray-700 p-2 block rounded">Users</Link></li>
        </template>

        <!-- Customer Panel -->
        <template v-else>
          <li><Link href="/customer/dashboard" class="hover:bg-gray-700 p-2 block rounded">Dashboard</Link></li>
          <li><Link href="/customer/rentals" class="hover:bg-gray-700 p-2 block rounded">Rentals</Link></li>
          <li><Link href="/customer/rental-history" class="hover:bg-gray-700 p-2 block rounded">Rental History</Link></li>
          <li><Link href="/" class="hover:bg-gray-700 p-2 block rounded">Bookings</Link></li>
        </template>

        <!-- Common to All -->
        <li><Link href="/logout" class="hover:bg-gray-700 p-2 block rounded">Log Out</Link></li>

      </ul>
    </div>
  </aside>
</template>
