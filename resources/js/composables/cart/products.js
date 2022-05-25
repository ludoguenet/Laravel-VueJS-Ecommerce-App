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

    const decreaseQuantity = async (index) => {
        await axios.put('/api/cart/decrease/' + products.value[index].id);
    }
    
    const increaseQuantity = async (index) => {
        await axios.put('/api/cart/increase/' + products.value[index].id);
    }

    const deleteProduct = async (index) => {
        await axios.delete('/api/cart/' + products.value[index].id);
    }

    return {
        addProduct,
        cartCount,
        getProducts,
        deleteProduct,
        increaseQuantity,
        decreaseQuantity,
        products
    }
}