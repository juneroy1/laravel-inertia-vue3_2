<template>
    <div>
        <h1>Stripe Checkout</h1>
        <Nav />
        <div>
          <div class="bg-gray-100 flex items-center justify-center min-h-screen">
            <!-- card container -->
             <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 px-4">
                <!-- card 1 -->
                 <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition">
                    <h2 class="text-xl font-bold text-gray-800 ">Pay $200</h2>
                    <p class="text-gray-600 mt-2">Choose this option to pay 200 for the service.</p>
                    <button @click="createCheckoutSession(20000)" class="mt-4 w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600">
                      Pay $200
                    </button>
                 </div>

                 <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition">
                    <h2 class="text-xl font-bold text-gray-800 ">Pay $300</h2>
                    <p class="text-gray-600 mt-2">Choose this option to pay $300 for the service.</p>
                    <button @click="createCheckoutSession(30000)"  class="mt-4 w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600">
                      Pay $300
                    </button>
                 </div>
                 <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition">
                    <h2 class="text-xl font-bold text-gray-800 ">Pay $400</h2>
                    <p class="text-gray-600 mt-2">Choose this option to pay $400 for the service.</p>
                    <button @click="createCheckoutSession(40000)"  class="mt-4 w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600">
                      Pay $400
                    </button>
                 </div>
             </div>
          </div>

            
            <!-- <button @click="createCheckoutSession">Pay $20</button> -->
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Nav from '../shared/Nav.vue';
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios'; // Import Axios  

export default {
    name: "Home",
    components: { Link, Nav },
    props: {
        stripeKey: String 
    },
    data(){
        return {
            apiUrl: import.meta.env.VITE_STRIPE_KEY
        }
    },
    methods: {
    async createCheckoutSession(price) {
        const stripe = Stripe(this.stripeKey);
        console.log("apiUrl",stripe)

      try {
        // Call the backend to create a Stripe Checkout session
        const response = await axios.post('/create-checkout-session', {price: price });

        // Redirect to Stripe Checkout
        const result = await stripe.redirectToCheckout({ sessionId: response.data.id });

        if (result.error) {
          alert(result.error.message);
        }
      } catch (error) {
        console.error('Error creating checkout session:', error);
      }
    },
  },
};
</script>
