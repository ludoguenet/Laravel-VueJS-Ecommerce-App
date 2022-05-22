import { ref } from "vue";

export default function useCart() {
    const cartCount = ref(null);

    const addProduct = async (productId) => {
        let response = await axios.post('/api/cart', {
            productId: productId
        });

        cartCount.value = response.data.count;
    }

    return {
        addProduct,
        cartCount
    }
}