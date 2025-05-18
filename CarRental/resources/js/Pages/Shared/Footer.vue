<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <!-- Footer Section -->
  <footer class="bg-gray-800 text-white py-2 mt-2">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <h4 class="text-sm font-semibold">Contact Us</h4>
          <p class="text-sm">Email: support@shamsstore.com</p>
          <p class="text-sm">Phone: +123 456 7890</p>
        </div>
        <div>
          <h4 class="text-sm font-semibold">Social Media</h4>
          <div class="flex space-x-4 text-sm">
            <a href="#" class="hover:text-blue-500">Facebook</a>
            <a href="#" class="hover:text-blue-500">Twitter</a>
            <a href="#" class="hover:text-blue-500">Instagram</a>
          </div>
        </div>
        <div>
          <h4 class="text-sm font-semibold">Legal</h4>
          <a href="#" class="block hover:text-blue-500 text-sm">Terms & Conditions</a>
          <a href="#" class="block hover:text-blue-500 text-sm">Privacy Policy</a>
        </div>
      </div>
    </div>
  </footer>
</template>

<style></style>
