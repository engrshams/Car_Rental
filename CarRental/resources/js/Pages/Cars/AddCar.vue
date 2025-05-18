<script setup>
import {  ref, computed, reactive, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Layout from '../Shared/Layout.vue';
import { useToast } from 'vue-toastification';

const toast = useToast();
const flash = computed(() => usePage().props.flash);

const images = reactive({
    image: null,
});

const carTypeRef = ref(null);
const focusCarType = () => {  carTypeRef.value?.focus();  };

const carAvailableRef = ref(null);
const focusCarAvailable = () => {  carAvailableRef.value?.focus();  };

const form = useForm({
    name: '',
    brand: '',
    model: '',
    year: '',
    car_type: 'Sedan',
    image: null,
    daily_rent_price: '',
    availability: 1    
});

const handleImageChange = (event, field) => {
    const file = event.target.files[0];
    if (file) {
        form[field] = file;
        images[field] = URL.createObjectURL(file);
    }
}

const submitForm = () => {
    form.post('/admin/cars', {
        forceFormData: true, // 💥 IMPORTANT
        onSuccess: () => {
            flash.value.success && toast.success(flash.value.success);
            flash.value.error && toast.error(flash.value.error);
        },
    });
}

</script>
<template>
    <Layout>
        <div class="flex ">
            <!-- <main class="ml-64 p-8"> -->
            <main class="ml-64 p-8 w-full">
                <h2 class="text-2xl font-bold mb-6">Add Car</h2>
                <!-- <form class="bg-white shadow-md rounded-lg p-6" @submit.prevent="submitForm"> -->
                <form class="w-full max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6" @submit.prevent="submitForm">
                    <!-- Car Details -->  
                    <div class="flex gap-4">
                        <div class="w-1/2 mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Car Name</label>
                            <input type="text" id="name" class="w-full p-2 border rounded-md"
                                placeholder="Enter Car Name" v-model="form.name" required>
                        </div>
                        <div class="w-1/2 mb-4">
                            <label for="brand" class="block text-gray-700 font-bold mb-2">Car Brand</label>
                            <input type="text" id="brand" class="w-full p-2 border rounded-md"
                                placeholder="Enter Car brand" v-model="form.brand" required>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-1/4 mb-4">
                            <label for="model" class="block text-gray-700 font-bold mb-2">Car Model</label>
                            <input type="text" id="model" class="w-full p-2 border rounded-md"
                                placeholder="Enter Car model" v-model="form.model" required>
                        </div>
                        <div class="w-1/4 mb-4">
                            <label for="year" class="block text-gray-700 font-bold mb-2">Car Manufacturing Year</label>
                            <input type="text" id="year" class="w-full p-2 border rounded-md"
                                placeholder="Enter Car year" v-model="form.year" required @keydown.enter.prevent="focusCarType">
                        </div>
                        <div class="w-1/4 mb-4">
                            <label for="car_type" class="block text-gray-700 font-bold mb-2">Car Type</label>
                            <select id="car_type" ref="carTypeRef" class="w-full p-2 border rounded-md" v-model="form.car_type">
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
                        <div class="w-1/4 mb-4">
                            <label for="daily_rent_price" class="block text-gray-700 font-bold mb-2">Daily Rent Price</label>
                            <input type="number" step="0.01" id="daily_rent_price" class="w-full p-2 border rounded-md"
                                placeholder="Enter daily_rent_price" v-model="form.daily_rent_price" required @keydown.enter.prevent="focusCarAvailable">
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-1/2 mb-4">
                            <label for="availability" class="block text-gray-700 font-bold mb-2">Is Available?</label>
                            <select id="availability" ref="carAvailableRef" class="w-full p-2 border rounded-md" v-model="form.availability">
                                <option value="0">Not Available</option>
                                <option value="1">Available</option>
                            </select>
                        </div>                    
                        <div class="w-1/2 mb-4">
                            <label for="car-image" class="block text-gray-700 font-bold mb-2">Car Image</label>
                            <input type="file" id="car-image" class="w-full p-2 border rounded-md" @change="event => handleImageChange(event, 'image')" required>
                            <img :src="images.image" alt="Car Image" class="w-20 h-20 rounded-md">
                        </div>        
                    </div>                                                   

                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Car</button>
                </form>
            </main>
        </div>
    </Layout>
</template>

<style></style>