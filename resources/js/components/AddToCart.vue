<template>
    <div class="flex items-center justify-between py-4">
        <button
            class="focus:outline-none text-white rounded-md cursor-pointer text-xs font-semibold px-3 py-2 bg-indigo-700"
            v-on:click.prevent="addToCart"
        >
            Ajouter au panier
        </button>
    </div>
</template>

<script setup>
    import useCart from '../composables/cart/products.js';
    const { addProduct, cartCount } = useCart();
    const props = defineProps(['productId']);
    const emitter = require('tiny-emitter/instance');
    const { inject } = require('vue');
    const toast = inject('toast');

    const addToCart = async () => {
        await axios.get('/sanctum/csrf-cookie')
        await axios.get('/api/user')
            .then(async () => {
                await addProduct(props.productId);
                toast.success('Produit ajouté au panier!');
                emitter.emit('refreshCartCount', cartCount);
            })
            .catch(() => {
                toast.error('Connectez-vous pour ajouter un produit au panier');
                return;
            });
    }
</script>