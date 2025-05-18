<script setup>
import Layout from '../Shared/CusLayout.vue'
</script>

<template>
  <Layout>
    <!-- About Hero -->
    <section class="bg-gray-50 py-4">
      <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center text-blue-700 mb-4">About Our Car Rental Service</h1>

        <p class="text-l text-gray-700 leading-relaxed mb-2 text-center max-w-3xl mx-auto">
          We are a leading car rental company offering convenient and affordable vehicle rental solutions across the country.
          Our mission is to make transportation easy, flexible, and cost-effective for all our customers.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-2 text-center">
          <div class="bg-white shadow p-6 rounded">
            <h3 class="text-l font-semibold text-blue-600">🚗 Wide Range of Vehicles</h3>
            <p class="mt-2 text-gray-600">Choose from economy to luxury cars, all well-maintained and ready to go.</p>
          </div>

          <div class="bg-white shadow p-6 rounded">
            <h3 class="text-l font-semibold text-blue-600">📱 Easy Online Booking</h3>
            <p class="mt-2 text-gray-600">Book your ride in just a few clicks with our simple and secure system.</p>
          </div>

          <div class="bg-white shadow p-6 rounded">
            <h3 class="text-l font-semibold text-blue-600">📞 24/7 Customer Support</h3>
            <p class="mt-2 text-gray-600">We're always here to help — anytime, anywhere.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Team Members -->
    <section class="bg-white py-2">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4 text-gray-800">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">
          <div class="bg-gray-100 p-6 rounded shadow">
            <img src="https://randomuser.me/api/portraits/men/11.jpg" class="mx-auto w-24 h-24 rounded-full mb-4" />
            <h3 class="text-lg font-semibold text-blue-700">Tanvir Rahman</h3>
            <p class="text-gray-600">CEO & Founder</p>
          </div>
          <div class="bg-gray-100 p-6 rounded shadow">
            <img src="https://randomuser.me/api/portraits/women/21.jpg" class="mx-auto w-24 h-24 rounded-full mb-4" />
            <h3 class="text-lg font-semibold text-blue-700">Fatima Sultana</h3>
            <p class="text-gray-600">Operations Manager</p>
          </div>
          <div class="bg-gray-100 p-6 rounded shadow">
            <img src="https://randomuser.me/api/portraits/men/31.jpg" class="mx-auto w-24 h-24 rounded-full mb-4" />
            <h3 class="text-lg font-semibold text-blue-700">Rafiul Islam</h3>
            <p class="text-gray-600">Lead Developer</p>
          </div>
          <div class="bg-gray-100 p-6 rounded shadow">
            <img src="https://randomuser.me/api/portraits/women/41.jpg" class="mx-auto w-24 h-24 rounded-full mb-4" />
            <h3 class="text-lg font-semibold text-blue-700">Nusrat Jahan</h3>
            <p class="text-gray-600">Customer Support</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Timeline -->
    <section class="bg-blue-50 py-4">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">Our Journey</h2>
        <div class="space-y-6 max-w-2xl mx-auto">
          <div class="border-l-4 border-blue-600 pl-4">
            <h4 class="font-semibold text-blue-700">2020 - Founded</h4>
            <p class="text-gray-600">We started our journey with 5 cars and a vision to simplify car rental in Bangladesh.</p>
          </div>
          <div class="border-l-4 border-blue-600 pl-4">
            <h4 class="font-semibold text-blue-700">2021 - Online Platform Launch</h4>
            <p class="text-gray-600">Launched a fully digital platform for hassle-free online booking.</p>
          </div>
          <div class="border-l-4 border-blue-600 pl-4">
            <h4 class="font-semibold text-blue-700">2023 - 10,000+ Rides Completed</h4>
            <p class="text-gray-600">Successfully served more than 10,000 customers with excellent ratings.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="bg-white py-4">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">What Our Customers Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-gray-100 p-6 rounded shadow">
            <p class="italic text-gray-700">"Great experience! Booking was easy and the car was in excellent condition."</p>
            <div class="mt-4 text-right font-semibold text-blue-700">— Ahmed Hossain</div>
          </div>
          <div class="bg-gray-100 p-6 rounded shadow">
            <p class="italic text-gray-700">"Best customer service I’ve ever had. Will definitely rent again!"</p>
            <div class="mt-4 text-right font-semibold text-blue-700">— Sarah Akter</div>
          </div>
          <div class="bg-gray-100 p-6 rounded shadow">
            <p class="italic text-gray-700">"Affordable, fast, and reliable. I recommend Car Rental to everyone."</p>
            <div class="mt-4 text-right font-semibold text-blue-700">— Mehedi Hasan</div>
          </div>
        </div>
      </div>
    </section>
  </Layout>
</template>

<style scoped></style>
