<script setup lang="ts">
defineProps([
    "product"
])

</script>

<template>
    <a :href="`api/products/${product.id}`" class="slider_card">
        <img v-if="product" :src="product?.images[0]?.path" alt="{{product.title}}">
    </a>
</template>

<style scoped lang="scss">
    .slider_card{
        @apply border rounded-xl overflow-auto min-w-[100px] max-w-[200px] aspect-square;

        img{
            @apply object-cover h-full
        }
    }

    .slider_card:hover{
        @apply opacity-80 cursor-pointer;
    }

</style>
