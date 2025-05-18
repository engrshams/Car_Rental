<script setup>
import Layout from '../Shared/CusLayout.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  subject: '',
  message: ''
})
</script>

<template>
  <Layout>
    <section class="py-4 bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 min-h-full flex items-center">
      <div class="container mx-auto px-4 max-w-lg bg-white rounded-lg shadow-lg p-1">
        <h1 class="text-3xl font-extrabold mb-1 text-center text-purple-700">Contact Us</h1>

        <form @submit.prevent="form.post('/contact')" class="space-y-0">
          <div>
            <label for="name" class="block text-purple-700 font-semibold mb-1">Name</label>
            <input
              v-model="form.name"
              type="text"
              id="name"
              class="w-full rounded border border-purple-300 px-3 py-1 focus:outline-none focus:ring-2 focus:ring-purple-400"
            />
            <span v-if="form.errors.name" class="text-red-600 text-sm mt-1 block">{{ form.errors.name }}</span>
          </div>

          <div>
            <label for="email" class="block text-purple-700 font-semibold mb-1">Email</label>
            <input
              v-model="form.email"
              type="email"
              id="email"
              class="w-full rounded border border-purple-300 px-3 py-1 focus:outline-none focus:ring-2 focus:ring-purple-400"
            />
            <span v-if="form.errors.email" class="text-red-600 text-sm mt-1 block">{{ form.errors.email }}</span>
          </div>

          <div>
            <label for="subject" class="block text-purple-700 font-semibold mb-1">Subject</label>
            <input
              v-model="form.subject"
              type="text"
              id="subject"
              class="w-full rounded border border-purple-300 px-3 py-1 focus:outline-none focus:ring-2 focus:ring-purple-400"
            />
            <span v-if="form.errors.subject" class="text-red-600 text-sm mt-1 block">{{ form.errors.subject }}</span>
          </div>

          <div>
            <label for="message" class="block text-purple-700 font-semibold mb-1">Message</label>
            <textarea
              v-model="form.message"
              id="message"
              rows="5"
              class="w-full rounded border border-purple-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 resize-none"
            ></textarea>
            <span v-if="form.errors.message" class="text-red-600 text-sm mt-1 block">{{ form.errors.message }}</span>
          </div>

          <div class="flex justify-center">
            <button
              :disabled="form.processing"
              class="bg-purple-700 hover:bg-purple-800 text-white font-bold py-2 px-8 rounded transition disabled:opacity-60"
            >
              {{ form.processing ? 'Sending...' : 'Send Message' }}
            </button>
          </div>

          <p v-if="$page.props.flash.success" class="mt-4 text-green-600 text-center font-semibold">
            {{ $page.props.flash.success }}
          </p>
        </form>
      </div>
    </section>
  </Layout>
</template>

<style scoped>
/* Optional: Reduce textarea vertical padding if needed */
textarea {
  line-height: 1.3;
}
</style>
