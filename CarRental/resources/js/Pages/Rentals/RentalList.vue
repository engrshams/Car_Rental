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
    { key: 'customer',    label: 'Name',    searchable: true,  sortable: true,   slot: 'customer-slot' },    
    { key: 'car', label: 'Car Name', searchable: true,  sortable: true,   slot: 'carName-slot' },    
    { key: 'start_date', label: 'Start', searchable: true, sortable: true, slot: 'startDate-slot' },
    { key: 'end_date', label: 'End', searchable: true, sortable: true, slot: 'endDate-slot' },
    { key: 'total_cost',    label: 'Cost',    searchable: true, sortable: true },
    { key: 'status', label: 'Status', searchable: false, sortable: true, slot: 'status-slot' },    
    { key: 'actions',  label: 'Actions',  searchable: false,                   slot: 'actions-slot' },
];

const deleteRental = (id) => {
    if (confirm('Are you sure you want to delete this Rental?')) {
        router.delete(`/admin/rentals/${id}`, {
            onSuccess: () => {
                toast.success('Rental deleted successfully');
            },
            onError: () => {
                toast.error('Failed to delete Rental');
            },
        });
    }
}

</script>

<template>
    <Layout>
        <main class="ml-64 p-8">            

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <TableComponent :data="rentals" :columns="columns" :page-size="5">

                    <template #customer-slot="{ row }">
                        <span>{{ row.customer.cus_name }}</span>
                    </template>

                    <template #carName-slot="{ row }">
                        <span>{{ row.car.name }}</span>
                    </template>

                    <!-- Format Start Date -->
                    <template #startDate-slot="{ row }">
                        <span>{{ dayjs(row.start_date).format('YYYY-MM-DD') }}</span>
                    </template>

                    <!-- Format End Date -->
                    <template #endDate-slot="{ row }">
                        <span>{{ dayjs(row.end_date).format('YYYY-MM-DD') }}</span>
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

                    <template #actions-slot="{ row }">
                        <div class="space-x-2">
                            <Link :href="`/admin/rentals/${row.id}/edit`"
                                class="bg-yellow-500 text-white px-2 py-1 rounded-md">
                                Edit
                            </Link>
                            <Link :href="`/admin/rentals/${row.id}`"
                                class="bg-blue-500 text-white px-2 py-1 rounded-md">
                                View
                            </Link>
                            <button @click="deleteRental(row.id)" class="bg-red-500 text-white px-2 py-1 rounded-md">
                                Delete
                            </button>
                        </div>
                    </template>
                </TableComponent>
            </div>
        </main>
    </Layout>
</template>

<style></style>