<script setup>
import Layout from '../Shared/CusLayout.vue';
import HomeFilter from './HomeFilter.vue';
import Slider from './Slider.vue';

const props = defineProps({
  sliders : Array,
  cars: Array,
})

</script>

<template>

  <Layout>
    <Slider :sliders="sliders"/>
    <HomeFilter :cars="cars" />
  </Layout>

</template>

<style></style>
