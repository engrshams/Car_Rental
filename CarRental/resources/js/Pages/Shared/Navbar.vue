<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { ref, computed } from 'vue';

const userDropDown = ref(false);
const authUser = computed(() => usePage().props.auth.user);
</script>

<template>
  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-purple-600 via-pink-600 to-red-600 shadow-lg">
    <div class="container mx-auto px-4 flex justify-between items-center py-1">
      <!-- Logo -->
      <div class="flex items-center space-x-4">
        <span class="text-white text-xl font-extrabold tracking-wide">
          Car Rental
        </span>
        <span class="hidden sm:block text-pink-100 font-semibold italic">
          Rent the Best Cars with Affordable Prices
        </span>
      </div>

      <!-- Right Side Menu -->
      <div class="flex items-center space-x-8">
        <!-- Main Menu -->
        <div class="flex space-x-6">
          <Link href="/" class="text-pink-200 hover:text-white font-semibold transition duration-300">Home</Link>
          <Link href="/about" class="text-pink-200 hover:text-white font-semibold transition duration-300">About</Link>
          <Link href="/rentals" class="text-pink-200 hover:text-white font-semibold transition duration-300">Rentals
          </Link>
          <Link href="/contact" class="text-pink-200 hover:text-white font-semibold transition duration-300">Contact
          </Link>
        </div>

        <!-- Auth Area -->
        <div class="relative">
          <div v-if="!authUser" class="flex items-center space-x-6">
            <Link href="/login" class="text-white hover:text-yellow-300 font-semibold transition duration-300">Login
            </Link>
            <Link href="/signup" class="text-white hover:text-yellow-300 font-semibold transition duration-300">Signup
            </Link>
          </div>

          <div v-else>
            <button @click="userDropDown = !userDropDown" id="user-dropdown-btn"
              class="flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 rounded">
              <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=User&backgroundColor=b6b6b6&mouth=serious"
                alt="User Avatar" class="h-8 w-8 rounded-full border-2 border-yellow-400 shadow-md" />
              <span class="text-white font-semibold">{{ authUser.customer?.cus_name ?? 'User' }}</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="user-dropdown" :class="{ 'hidden': !userDropDown }"
              class="z-20 absolute right-0 mt-1 w-38 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
              <ul class="py-2">
                <li>
                  <Link href="/customer/dashboard"
                    class="block px-4 py-1 text-gray-800 hover:bg-yellow-100 hover:text-yellow-700 font-semibold">
                  Dashboard
                  </Link>
                </li>
                <li>
                  <Link href="/logout"
                    class="block px-4 py-1 text-red-600 hover:bg-red-100 hover:text-red-800 font-semibold">
                  Logout
                  </Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
