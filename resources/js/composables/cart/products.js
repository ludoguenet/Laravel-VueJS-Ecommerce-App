import { ref } from "vue";

export default function useCart() {
    const cartCount = ref(null);
    const products = ref([]);

    const addProduct = async (productId) => {
        let response = await axios.post('/api/cart', {
            productId: productId
        });

        cartCount.value = response.data.count;
    }

    const getProducts = async () => {
        let cartContent = await axios.get('/api/cart');
        products.value = cartContent.data.cartContent;
    }

    return {
        addProduct,
        cartCount,
        getProducts,
        products
    }
}