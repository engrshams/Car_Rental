<script setup>
import { ref, onMounted } from 'vue';
import Layout from '../../Pages/Shared/CusLayout.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    car: Object,
    flash: Object,
    errors: Object,
});

// State variables
const startDate = ref('');
const endDate = ref('');
const today = new Date().toISOString().split('T')[0]; // YYYY-MM-DD format
const successMessage = ref('');
const errorMessage = ref('');

// Show flash messages on initial load
onMounted(() => {
    if (props.flash?.message) {
        successMessage.value = props.flash.message;
    } else if (props.flash?.error) {
        errorMessage.value = props.flash.error;
    } else if (props.errors?.message) {
        errorMessage.value = props.errors.message;
    }
});

// Booking handler
const handleBooking = () => {
    if (!startDate.value || !endDate.value) {
        errorMessage.value = 'Please select both start and end dates.';
        successMessage.value = '';
        return;
    }

    // Inertia.post(`/car/${props.car.id}/book`, {
    //     start_date: startDate.value,
    //     end_date: endDate.value,
    // }, {
    //     preserveScroll: true,
    //     onSuccess: (page) => {
    //         console.log('Page on success:', page)
    //         if (page.props.flash?.message) {
    //             successMessage.value = page.props.flash.message;
    //             errorMessage.value = '';
    //         }
    //     },
    //     onError: (errors) => {
    //         errorMessage.value = errors.message || 'An error occurred while booking.';
    //         successMessage.value = '';
    //     }
    // });

    Inertia.post(`/car/${props.car.id}/book`, {
        start_date: startDate.value,
        end_date: endDate.value,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            Inertia.visit(`/car/${props.car.id}`, {
                preserveState: false,
                onSuccess: (page) => {
                    console.log('Redirected Page Props:', page);
                    if (page.props.flash?.message) {
                        successMessage.value = page.props.flash.message;
                        errorMessage.value = '';
                    }
                }
            });
        },
        onError: (errors) => {
            errorMessage.value = errors.message || 'An error occurred while booking.';
            successMessage.value = '';
        }
    });

};
</script>

<template>
    <Layout>
        <div class="container mx-auto px-4 py-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Car Image -->
                <div>
                    <div class="w-full h-96 bg-gray-200 rounded-lg overflow-hidden mb-2 mt-6">
                        <img :src="car.image" alt="Car Image" class="w-full h-full object-cover" />
                    </div>
                </div>

                <!-- Car Info & Booking -->
                <div class="mt-6">
                    <h2 class="text-2xl font-bold mb-4">{{ car.name }}</h2>
                    <p class="text-gray-600">Brand: {{ car.brand }}</p>
                    <p class="text-red-500 font-bold text-xl mt-2">Model: {{ car.model }}</p>
                    <p class="text-gray-600">Year: {{ car.year }}</p>
                    <p class="text-gray-600">Type: {{ car.car_type }}</p>
                    <p class="text-red-500 font-bold text-xl mt-2">Daily Rent: ৳{{ car.daily_rent_price }}</p>
                    <p class="text-gray-600">Available: {{ car.availability == 1 ? 'Yes' : 'No' }}</p>

                    <!-- Booking Form -->
                    <div class="mt-6">
                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <label for="start_date" class="block mb-1 font-semibold">Start Date</label>
                                <input
                                    v-model="startDate"
                                    type="date"
                                    id="start_date"
                                    :min="today"
                                    class="border border-gray-300 px-3 py-2 rounded-md w-full"
                                />
                            </div>
                            <div class="w-1/2">
                                <label for="end_date" class="block mb-1 font-semibold">End Date</label>
                                <input
                                    v-model="endDate"
                                    type="date"
                                    id="end_date"
                                    :min="startDate || today"
                                    class="border border-gray-300 px-3 py-2 rounded-md w-full"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Book Now Button or Unavailable Message -->
                    <div class="flex items-center mt-6">
                        <button
                            v-if="car.availability == 1"
                            @click="handleBooking"
                            class="bg-blue-900 text-blue-200 px-4 py-2 rounded-md hover:bg-blue-800"
                        >
                            Book Now
                        </button>
                        <span v-else class="text-red-500 font-semibold">
                            This car is not available for booking.
                        </span>
                    </div>

                    <!-- Flash Messages -->
                    <div v-if="successMessage" class="text-green-500 font-semibold mt-6">
                        {{ successMessage }}
                    </div>
                    <div v-if="errorMessage" class="text-red-500 font-semibold mt-6">
                        {{ errorMessage }}
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
/* Optional additional styling */
</style>
