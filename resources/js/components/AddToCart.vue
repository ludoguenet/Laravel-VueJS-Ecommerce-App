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
    const props = defineProps(['productId']);
    const emit = defineEmits(['refreshCartCount']);
    const emitter = require('tiny-emitter/instance');
    const { inject } = require('vue');
    const toast = inject('toast');

    const addToCart = async () => {
        await axios.get('/sanctum/csrf-cookie');
        let response = await axios.post('/api/cart', {
            productId: props.productId
        });

        toast.success('Produit ajouté au panier!');
        emitter.emit('refreshCartCount', response.data.count);
    }
</script>