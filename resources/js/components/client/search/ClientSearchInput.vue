<script setup lang="ts">

import SearchSuggestion from "./SearchSuggestion.vue";
import {onMounted, defineExpose, ref} from "vue";
const isFocused = ref(false)

const isDisabled = ref(false)
const props = defineProps([
    'searchRef'
])
const searchRef = ref(props.searchRef)

onMounted( ()=>{


    searchRef.value = props.searchRef
})

function focus(){
    isFocused.value = true
}

function unfocus(){
    isFocused.value = false
}

type Props = {
    width: number
}

</script>

<template>
    <div class="search_input" >
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class=" left-[18px] top-[12px] text-foregrounds-subdued" data-testid="icon-search" style="width:20px;height:20px" stroke="none"><path d="M20 20L16.05 16.05M18 11C18 14.866 14.866 18 11 18C7.13401 18 4 14.866 4 11C4 7.13401 7.13401 4 11 4C14.866 4 18 7.13401 18 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path></svg>
        <input type="text" class="header__nav__input" :class="{'header__nav__input_focus':!isFocused}" :ref="searchRef" @focus="focus" @focusout="unfocus"/>
        <SearchSuggestion :isFocused="isFocused" />
    </div>
</template>

<style scoped lang="scss">
    .search_input{
        @apply max-w-[500] bg-[#f2f4f5] w-[500px] flex text-muted-foreground items-center relative rounded-xl;

        svg {
            @apply absolute;
        }
        input{
            @apply outline-0 h-[44px] w-full border-t border-x rounded-t-lg focus-visible:ring-primary pl-[48px] ;
        }
    }

    .header__nav__input_focus{
        @apply rounded-lg border-b rounded-b-lg
    }
</style>
