import { reactive, ref } from "vue";

export default function useStripe() {
    const elements = ref(null);
    const clientSecret = ref(null);
    const paymentElement = ref(null);
    const stripe = ref(null);

    const getClientSecret = async () => {
        stripe.value = Stripe("pk_test_51L3kquLRVvzp6xt9ZjgnjfXvICN6Em2h49nZTWlpsPcBqdt44p4GUwftrcRbaIZnnhId8GPcP3LM3xEWxyiaid3q00MQB1gotU");

        let secret = await axios.post('/paymentIntent', {
            headers: { "Content-Type": "application/json" }
        })
        .then((r) => r.data.clientSecret);

        clientSecret.value = secret;
    }

    const loadStripeElements = async () => {
        elements.value = stripe.value.elements({clientSecret: clientSecret.value});
  
        paymentElement.value = elements.value.create("payment");
        paymentElement.value.mount("#payment-element");
    }

    return {
        elements,
        clientSecret,
        stripe,
        paymentElement,
        getClientSecret,
        loadStripeElements
    }
}