<template>
    <div>
        <h1>Stripe Checkout</h1>
        <Nav />
        <div>
            
            <button @click="createCheckoutSession">Pay $20</button>
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
    async createCheckoutSession() {
        const stripe = Stripe(this.stripeKey);
        console.log("apiUrl",stripe)

      try {
        // Call the backend to create a Stripe Checkout session
        const response = await axios.post('/create-checkout-session');

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
