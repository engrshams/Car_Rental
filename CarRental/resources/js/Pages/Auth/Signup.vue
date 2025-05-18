<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  email: '',
  password: '',
  cus_name: '',
  cus_add: '',
  cus_state: '',
  cus_city: '',
  cus_postcode: '',
  cus_country: '',
  cus_phone: ''
})

const submit = () => {
  form.post('/signup', {
    onSuccess: () => {
      alert('Signup successful! Please login.')
    }
  })
}
</script>

<template>
  <div class="max-w-md mx-auto mt-8 bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-extrabold mb-4 text-white text-center">Sign Up</h2>

    <form @submit.prevent="submit" class="space-y-1"> <!-- reduce space-y-3 to space-y-1 -->
      <input 
        v-model="form.email" 
        type="email" 
        placeholder="Email" 
        class="w-full p-1.5 rounded-md border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
      />
      <input 
        v-model="form.password" 
        type="password" 
        placeholder="Password" 
        class="w-full p-1.5 rounded-md border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
      />

      <input 
        v-model="form.cus_name" 
        type="text" 
        placeholder="Full Name" 
        class="w-full p-1.5 rounded-md border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
      />
      <input 
        v-model="form.cus_phone" 
        type="text" 
        placeholder="Phone" 
        class="w-full p-1.5 rounded-md border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
      />
      <input 
        v-model="form.cus_add" 
        type="text" 
        placeholder="Address" 
        class="w-full p-1.5 rounded-md border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
      />
      <input 
        v-model="form.cus_city" 
        type="text" 
        placeholder="City" 
        class="w-full p-1.5 rounded-md border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
      />
      <input 
        v-model="form.cus_state" 
        type="text" 
        placeholder="State" 
        class="w-full p-1.5 rounded-md border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
      />
      <input 
        v-model="form.cus_postcode" 
        type="text" 
        placeholder="Postcode" 
        class="w-full p-1.5 rounded-md border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
      />
      <input 
        v-model="form.cus_country" 
        type="text" 
        placeholder="Country" 
        class="w-full p-1.5 rounded-md border border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400"
      />

      <button 
        type="submit" 
        class="w-full py-2 rounded-md bg-pink-600 hover:bg-pink-700 text-white font-semibold transition"
        :disabled="form.processing"
      >
        {{ form.processing ? 'Signing Up...' : 'Sign Up' }}
      </button>
    </form>
  </div>
</template>
