<script setup>
import { computed, onMounted } from 'vue';
import { Link, router, usePage  } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const toast = useToast();

import Layout from '../Shared/Layout.vue';
import TableComponent from '../../Components/TableComponent.vue';

const props = defineProps({
    cars: Array,
});

const columns = [
    { key: 'image',           label: 'Image',searchable: false,              slot: 'image-slot' },
    { key: 'name',            label: 'Name', searchable: true,  sortable: true },
    { key: 'brand',           label: 'Brand',searchable: true, sortable: true },
    { key: 'car_type',        label: 'Type', searchable: true, sortable: true },
    { key: 'daily_rent_price',label: 'Daily Rent',searchable: true, sortable: true },
    { key: 'availability', label: 'Available?', searchable: false, sortable: true, slot: 'availability-slot' },
    { key: 'actions',         label: 'Actions',   searchable: false,          slot: 'actions-slot' },
];

const deleteCar = (id) => {
    if (confirm('Are you sure you want to delete this car?')) {
        router.delete(`/admin/cars/${id}`, {
            onSuccess: () => {
                toast.success('Car deleted successfully');
            },
            onError: () => {
                toast.error('Failed to delete car');
            },
        });
    }
}

</script>

<template>
    <Layout>
        <main class="ml-64 p-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-2xl font-bold">Cars</h2>
                <Link href="/admin/cars/create" class="bg-blue-500 text-white px-4 py-1 rounded-md">Add Car</Link>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <TableComponent :data="cars" :columns="columns" :page-size="5">
                    <!-- Image Slot -->
                    <template #image-slot="{ row }">
                        <img :src="row.image" alt="Car Image" class="w-10 h-10 rounded-full" />
                    </template>
                    <!-- Availability Slot -->
                    <template #availability-slot="{ row }">
                        <span class="px-2 py-1 rounded-full text-white text-sm font-medium" :class="row.availability == 1 ? 'bg-green-500' : 'bg-red-500'">
                            {{ row.availability == 1 ? 'Yes' : 'No' }}
                        </span>
                    </template>
                    <!-- Actions Slot -->
                    <template #actions-slot="{ row }">
                        <div class="space-x-2">
                            <Link :href="`/admin/cars/${row.id}/edit`" class="bg-yellow-500 text-white px-2 py-1 rounded-md">Edit</Link>
                            <button @click="deleteCar(row.id)" class="bg-red-500 text-white px-2 py-1 rounded-md">Delete</button>
                        </div>
                    </template>
                </TableComponent>                
            </div>
        </main>
    </Layout>
</template>

<style></style>