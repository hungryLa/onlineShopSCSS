<script lang="ts" setup>

import ClientHeader from "../components/client/ClientHeader.vue";
import ClientFooter from "@/components/client/ClientFooter.vue";


</script>

<template>
    <client-header/>
    <main>
        <RouterView />
    </main>
    <client-footer/>
</template>

<style lang="scss" scoped>
    main{
        @apply flex-1
    }
</style>
