<script setup>
import Footer from './Footer.vue';
import Navbar from './Navbar.vue';

</script>

<template>
  <div class="min-h-screen flex flex-col">

    <!-- Fixed Navbar -->
    <div class="fixed top-0 left-0 right-0 z-50">
      <Navbar />
    </div>

    <!-- Add top padding to main content to avoid overlapping with fixed navbar -->
    <main class="flex-grow pt-11"> <!-- Adjust pt-11 depending on Navbar height -->
      <slot />
    </main>

    <!-- Footer -->
    <Footer />
  </div>
</template>


<style></style>
