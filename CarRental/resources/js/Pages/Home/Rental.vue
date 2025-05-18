<script setup>
import Layout from '../Shared/CusLayout.vue';
import RentalFilter from './RentalFilter.vue';

const props = defineProps({
  cars: Array,
  filterOptions: Object,
  filters: Object,
});
</script>

<template>
  <Layout>
    <RentalFilter
      :cars="cars"
      :filter-options="filterOptions"
      :filters="filters"
    />
  </Layout>
</template>

