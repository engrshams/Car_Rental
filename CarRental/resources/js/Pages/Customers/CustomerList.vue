<script setup>
import { computed, onMounted } from 'vue';
import { Link, router, usePage  } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const toast = useToast();

import Layout from '../Shared/Layout.vue';
import TableComponent from '../../Components/TableComponent.vue';

const props = defineProps({
    customers: Array,
});

const columns = [
    { key: 'cus_name', label: 'Customer Name', searchable: true, sortable: true },
    { key: 'cus_add', label: 'Address', searchable: true, sortable: true },
    { key: 'cus_city', label: 'City', searchable: true, sortable: true },
    { key: 'cus_phone', label: 'Phone', searchable: true, sortable: true },
    { key: 'email',    label: 'Email',    searchable: true,  sortable: true,   slot: 'customer-slot' },
    { key: 'actions', label: 'Actions', slot: 'actions-slot', searchable: false },
];

const deleteCustomer = (id) => {
    if (confirm('Are you sure you want to delete this customer?')) {
        router.delete(`/customers/${id}`, {
            onSuccess: () => {
                toast.success('Customer deleted successfully');
            },
            onError: () => {
                toast.error('Failed to delete customer');
            },
        });
    }
}

</script>

<template>
    <Layout>
        <main class="ml-64 p-8">

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <TableComponent :data="customers" :columns="columns" :page-size="5">
                    <template #customer-slot="{ row }">
                        <span>{{ row.user.email }}</span>
                    </template>
                    <template #actions-slot="{ row }">
                        <div class="space-x-2">
                            <Link :href="`/customers/${row.id}/edit`"
                                class="bg-yellow-500 text-white px-2 py-1 rounded-md">
                                Edit
                            </Link>
                            <button @click="deleteCustomer(row.id)" class="bg-red-500 text-white px-2 py-1 rounded-md">
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