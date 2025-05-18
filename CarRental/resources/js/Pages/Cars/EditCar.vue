<script setup>
    import { computed, onMounted, ref } from 'vue';
    import Layout from '../Shared/Layout.vue';
    import { useForm, usePage } from '@inertiajs/vue3';
    import { useToast } from 'vue-toastification';

    const toast = useToast();
    const flash = computed(() => usePage().props.flash);

    const props = defineProps({
        car: Object,
    });

    const carImage = ref(null);

    const form = useForm({
        name: '',
        brand: '',
        model: '',
        year: '',
        car_type: 'Sedan',
        image: null,  // Default to null
        daily_rent_price: '',
        availability: 1,
        '_method': 'PUT',  // Required for PUT update method
    });

    // Handle image change
    const handleImage = (event) => {
        const file = event.target.files[0];
        if (file) {
            form.image = file;
            carImage.value = URL.createObjectURL(file);
        } else {
            form.image = null;  // If no image is selected, keep it null
            carImage.value = props.car.image || null; // Retain the previous image if no new one is selected
        }
    };

    // Submit form with image or existing image
    const submitForm = () => {
        if (!form.image) {
            form.image = props.car.image;  // If no new image is selected, use the existing image
        }
        form.post(`/admin/cars/${props.car.id}`, {
            preserveScroll: true, // Preserve scroll position after form submission
            onSuccess: () => {
                if (flash.value.success) toast.success(flash.value.success);
                if (flash.value.error) toast.error(flash.value.error);
            },
            onError: () => {
                toast.error('Failed to update car. Please try again.');
            }
        });
    };

    // Pre-fill the form on mounted
    onMounted(() => {
        if (props.car) {
            form.name = props.car.name;
            form.brand = props.car.brand;
            form.model = props.car.model;
            form.year = props.car.year;
            form.car_type = props.car.car_type;
            form.daily_rent_price = props.car.daily_rent_price;
            form.availability = props.car.availability;
            carImage.value = props.car.image || null;
        }
    });
</script>

<template>
    <Layout>
        <main class="ml-64 p-8">
            <h2 class="text-2xl font-bold mb-6">Edit Car</h2>
            <form @submit.prevent="submitForm" class="bg-white shadow-md rounded-lg p-6">                
                <div class="flex gap-4">
                    <!-- Car Name -->
                    <div class="w-1/2 mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Car Name</label>
                        <input type="text" id="name" class="w-full p-2 border rounded-md"
                            placeholder="Enter Car Name" v-model="form.name" required>
                    </div>
                    <!-- Car Brand -->
                    <div class="w-1/2 mb-4">
                        <label for="brand" class="block text-gray-700 font-bold mb-2">Car Brand</label>
                        <input type="text" id="brand" class="w-full p-2 border rounded-md"
                            placeholder="Enter Car brand" v-model="form.brand" required>
                    </div>
                </div>

                <div class="flex gap-4">
                    <!-- Car Model -->
                    <div class="mb-4 w-1/4">
                        <label for="model" class="block text-gray-700 font-bold mb-2">Car Model</label>
                        <input type="text" id="model" class="w-full p-2 border rounded-md" placeholder="Enter Car model" required v-model="form.model">
                    </div>

                    <!-- Manufacturing Year -->
                    <div class="mb-4 w-1/4">
                        <label for="year" class="block text-gray-700 font-bold mb-2">Car Manufacturing Year</label>
                        <input type="number" id="year" class="w-full p-2 border rounded-md" placeholder="Enter Car Manufacturing Year" required v-model="form.year">
                    </div>

                    <!-- Car Type -->
                    <div class="mb-4 w-1/4">
                        <label for="car_type" class="block text-gray-700 font-bold mb-2">Car Type</label>
                        <select id="car_type" class="w-full p-2 border rounded-md" v-model="form.car_type">
                            <option value="Sedan">Sedan</option>
                            <option value="SUV">SUV</option>
                            <option value="Hatchback">Hatchback</option>
                            <option value="MPV">MPV</option>
                            <option value="Coupe">Coupe</option>
                            <option value="Convertible">Convertible</option>
                            <option value="Wagon">Wagon</option>
                            <option value="Pickup">Pickup</option>
                            <option value="Van">Van</option>
                            <option value="Crossover">Crossover</option>
                        </select>
                    </div>

                    <!-- Daily Rent Price -->
                    <div class="mb-4 w-1/4">
                        <label for="daily_rent_price" class="block text-gray-700 font-bold mb-2">Car Daily Rent Price</label>
                        <input type="number" id="daily_rent_price" class="w-full p-2 border rounded-md" placeholder="Enter Car Daily Rent Price" required v-model="form.daily_rent_price">
                    </div>
                </div>


                <div class="flex gap-4">
                    <!-- Availability -->
                    <div class="mb-4 w-1/2">
                        <label for="availability" class="block text-gray-700 font-bold mb-2">Is Available?</label>
                        <select id="availability" class="w-full p-2 border rounded-md" v-model="form.availability">
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>

                    <!-- Car Image -->
                    <div class="mb-4 w-1/2">
                        <label for="car-image" class="block text-gray-700 font-bold mb-2">Car Image</label>
                        <input type="file" id="car-image" class="w-full p-2 border rounded-md" @change="handleImage" accept="image/*">
                        <!-- Preview Image -->
                        <div v-if="carImage" class="mb-4">
                            <img :src="carImage" alt="Car Image Preview" class="w-25 object-cover rounded-full mb-2">
                        </div>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Car</button>
            </form>
        </main>
    </Layout>
</template>

<style scoped>
</style>
