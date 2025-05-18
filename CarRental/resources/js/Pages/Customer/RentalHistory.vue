<script setup>
import { computed, onMounted } from 'vue';
import dayjs from 'dayjs';
import { Link, router, usePage  } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const toast = useToast();

import Layout from '../Shared/Layout.vue';
import TableComponent from '../../Components/TableComponent.vue';

const props = defineProps({
    rentals: Array,
});

const columns = [    
    { key: 'car', label: 'Car Brand', searchable: true,  sortable: true,   slot: 'brand-slot' },
    { key: 'car', label: 'Car Name', searchable: true,  sortable: true,   slot: 'carName-slot' },    
    { key: 'start_date', label: 'Start Date', searchable: true, sortable: true, slot: 'startDate-slot' },
    { key: 'end_date', label: 'End Date', searchable: true, sortable: true, slot: 'endDate-slot' },
    { key: 'total_cost',    label: 'Total Cost',    searchable: false, sortable: true },
    { key: 'status', label: 'Rental Status', searchable: false, sortable: true, slot: 'status-slot' },        
];

</script>

<template>
    <Layout>
        <main class="ml-64 p-8">            

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <TableComponent :data="rentals" :columns="columns" :page-size="5">

                    <template #carName-slot="{ row }">
                        <span>{{ row.car.name }}</span>
                    </template>

                    <template #brand-slot="{ row }">
                        <span>{{ row.car.brand }}</span>
                    </template>

                    <!-- Format Start Date -->
                    <template #startDate-slot="{ row }">
                        <span>{{ dayjs(row.start_date).format('YYYY-MMM-DD') }}</span>
                    </template>

                    <!-- Format End Date -->
                    <template #endDate-slot="{ row }">
                        <span>{{ dayjs(row.end_date).format('YYYY-MMM-DD') }}</span>
                    </template>

                    <template #status-slot="{ row }">
                        <span
                            class="px-2 py-1 rounded-full text-white text-sm font-medium"
                            :class="{
                            'bg-yellow-500': row.status === 'Booked',
                            'bg-blue-500': row.status === 'Ongoing',
                            'bg-green-500': row.status === 'Completed',
                            'bg-red-500': row.status === 'Cancelled',
                            }"
                        >
                            {{ row.status }}
                        </span>
                    </template>
                    
                </TableComponent>
            </div>
        </main>
    </Layout>
</template>

<style></style>