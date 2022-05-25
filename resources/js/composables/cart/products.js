import { ref } from "vue";

export default function useCart() {
    const cartCount = ref(0);
    const products = ref([]);

    const addProduct = async (productId) => {
        let response = await axios.post('/api/cart', {
            productId: productId
        });

        cartCount.value = response.data.cartCount;
    }

    const getProducts = async () => {
        let cartContent = await axios.get('/api/cart');
        products.value = cartContent.data.cartContent;
        cartCount.value = cartContent.data.cartCount;
    }

    return {
        addProduct,
        cartCount,
        getProducts,
        products
    }
}