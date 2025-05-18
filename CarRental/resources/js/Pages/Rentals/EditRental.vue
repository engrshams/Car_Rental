<script setup>
import { ref, computed, onMounted} from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Layout from '../Shared/Layout.vue';
import { useToast } from 'vue-toastification';

const toast = useToast();
const flash = computed(() => usePage().props.flash);

const props = defineProps({
    rental: Object,
    cars: Array,
    customers: Array,
});

// const form = useForm({
//     car_id: '',    start_date: '',    end_date: '', total_cost: '',status:''  });

const form = useForm({
    customer_id: props.rental.customer_id,
    car_id: props.rental.car_id,
    start_date: props.rental.start_date ? props.rental.start_date.slice(0, 10) : '',
    end_date: props.rental.end_date ? props.rental.end_date.slice(0, 10) : '',
    total_cost: props.rental.total_cost,
    status: props.rental.status,
});

const submitForm = () => {
    form.put(`/admin/rentals/${props.rental.id}`, {
        onSuccess: () => {
            flash.value.success && toast.success(flash.value.success);
            flash.value.error && toast.error(flash.value.error);
        },
    });
}

</script>
<template>
    <Layout>
        <div class="flex">
            <main class="ml-64 p-8 w-full">
                <h2 class="text-2xl font-bold mb-6">Update Rental</h2>
                <form class="bg-white shadow-md rounded-lg p-6" @submit.prevent="submitForm">
                    <!-- Read-only customer label and hidden ID -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Customer</label>
                        <div class="p-2 border rounded-md bg-gray-100 text-gray-800">
                            {{ props.rental.customer.cus_name }}
                        </div>
                        <!-- Hidden input to still send the customer_id -->
                        <input type="hidden" v-model="form.customer_id" />
                    </div>

                    <!-- Car Dropdown -->
                    <div class="mb-4">
                        <label for="car" class="block text-gray-700 font-bold mb-2">Car</label>
                        <select id="car" v-model="form.car_id" class="w-full p-2 border rounded-md" required>
                            <option value="">Select Car</option>
                            <option v-for="car in cars" :key="car.id" :value="car.id">
                                {{ car.name }} - {{ car.brand }}
                            </option>
                        </select>
                    </div>

                    <!-- Dates -->
                    <div class="flex gap-4">
                        <div class="w-1/2 mb-4">
                            <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date</label>
                            <input type="date" id="start_date" v-model="form.start_date" class="w-full p-2 border rounded-md" required />
                        </div>
                        <div class="w-1/2 mb-4">
                            <label for="end_date" class="block text-gray-700 font-bold mb-2">End Date</label>
                            <input type="date" id="end_date" v-model="form.end_date" class="w-full p-2 border rounded-md" required />
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <!-- Cost -->
                        <div class="w-1/2 mb-4">
                            <label for="total_cost" class="block text-gray-700 font-bold mb-2">Total Cost</label>
                            <input type="number" id="total_cost" v-model="form.total_cost" class="w-full p-2 border rounded-md" required />
                        </div>

                        <!-- Status -->
                        <div class="w-1/2 mb-4">
                            <label for="status" class="block text-gray-700 font-bold mb-2">Rental Status</label>
                            <select id="status" v-model="form.status" class="w-full p-2 border rounded-md" required>
                                <option value="Booked">Booked</option>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Rental</button>
                </form>
            </main>
        </div>
    </Layout>
</template>


<style></style>