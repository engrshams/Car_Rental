<script setup>
import { defineProps, ref, computed, onMounted} from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Layout from '../Shared/Layout.vue';
import { useToast } from 'vue-toastification';

const toast = useToast();
const flash = computed(() => usePage().props.flash);

const props = defineProps({
    customer: Object,
});
const form = useForm({
    cus_name: '',    cus_add: '',    cus_city: '',    cus_state: '',    
    cus_postcode: '',    cus_country: '',    cus_phone: '',    user_id: ''  });

const submitForm = () => {
    form.put(`/customers/${props.customer.id}`, {
        onSuccess: () => {
            flash.value.success && toast.success(flash.value.success);
            flash.value.error && toast.error(flash.value.error);
        },
    });
}

onMounted(() => {
    if (props.customer) {
        form.cus_name = props.customer.cus_name;
        form.cus_add = props.customer.cus_add;
        form.cus_city = props.customer.cus_city;
        form.cus_state = props.customer.cus_state;
        form.cus_postcode = props.customer.cus_postcode;
        form.cus_country = props.customer.cus_country;
        form.cus_phone = props.customer.cus_phone;        
    }
});

</script>
<template>
    <Layout>
        <div class="flex ">
            <main class="ml-64 p-8 w-full">
                <h2 class="text-2xl font-bold mb-6">Update Customer</h2>
                <form class="bg-white shadow-md rounded-lg p-6" @submit.prevent="submitForm">
                    <div class="mb-4 w-1/2">
                        <label for="cus_name" class="block text-gray-700 font-bold mb-2">Customer Name</label>
                        <input type="text" id="cus_name" class="w-full p-2 border rounded-md"
                            placeholder="Customer Name" v-model="form.cus_name" required>
                    </div>
                    <div class="mb-4">
                        <label for="cus_add" class="block text-gray-700 font-bold mb-2">Customer Address</label>
                        <input type="text" id="cus_add" class="w-full p-2 border rounded-md"
                            placeholder="Enter Customer Address" v-model="form.cus_add">
                    </div>
                    <div class="flex gap-4">
                        <div class="mb-4 w-1/4">
                            <label for="cus_city" class="block text-gray-700 font-bold mb-2">Customer City</label>
                            <input type="text" id="cus_city" class="w-full p-2 border rounded-md"
                                placeholder="Enter Customer City" v-model="form.cus_city">
                        </div>
                        <div class="mb-4 w-1/4">
                            <label for="cus_state" class="block text-gray-700 font-bold mb-2">Customer State</label>
                            <input type="text" id="cus_state" class="w-full p-2 border rounded-md"
                                placeholder="Enter Customer State" v-model="form.cus_state">
                        </div>
                        <div class="mb-4 w-1/4">
                        <label for="cus_postcode" class="block text-gray-700 font-bold mb-2">Customer Post Code</label>
                            <input type="text" id="cus_postcode" class="w-full p-2 border rounded-md"
                                placeholder="Enter Customer Post Code" v-model="form.cus_postcode">
                        </div>
                    </div>     
                    <div class="flex gap-4">             
                        <div class="mb-4 w-1/2">
                            <label for="cus_country" class="block text-gray-700 font-bold mb-2">Customer Country</label>
                            <input type="text" id="cus_country" class="w-full p-2 border rounded-md"
                                placeholder="Enter Customer Country" v-model="form.cus_country">
                        </div>
                        <div class="mb-4 w-1/2">
                            <label for="cus_phone" class="block text-gray-700 font-bold mb-2">Customer Phone</label>
                            <input type="text" id="cus_phone" class="w-full p-2 border rounded-md"
                                placeholder="Enter Customer Phone" v-model="form.cus_phone">
                        </div>
                    </div>  
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update User</button>
                </form>
            </main>
        </div>
    </Layout>
</template>

<style></style>