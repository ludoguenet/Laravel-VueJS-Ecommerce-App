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
 
    const addToCart = async () => {
        let response = await axios.post('/cart', {
            productId: props.productId
        });
        
        emitter.emit('refreshCartCount', response.data.count);
    }
</script>