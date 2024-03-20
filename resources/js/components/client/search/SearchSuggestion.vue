<script setup lang="ts">

import {searchVariables} from "@/components/client/search/variables";
type Props = {isFocused: boolean}

withDefaults(defineProps<Props>(),{
    isFocused: false
})

</script>

<template>
    <div class="search_input__suggestion" :class="{hidden:!isFocused}">
        <span class="search_input__suggestion__title">Предложения</span>
        <ul class="search_input__suggestion__list">
            <a href="/fgff" v-for="item in searchVariables">
                <div class="search_input__suggestion__list__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class=" left-[18px] top-[12px] text-foregrounds-subdued" data-testid="icon-search" style="width:20px;height:20px" stroke="none"><path d="M20 20L16.05 16.05M18 11C18 14.866 14.866 18 11 18C7.13401 18 4 14.866 4 11C4 7.13401 7.13401 4 11 4C14.866 4 18 7.13401 18 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path></svg>
                </div>
                <li  key="{{item.id}}">{{item.text}}</li>
            </a>
        </ul>
    </div>

</template>

<style scoped lang="scss">
    .search_input__suggestion{
        @apply absolute top-[100%] border-x border-b rounded-b-lg w-full px-2 pb-2 bg-white;

        &-focused{

        }

        &__title{
            @apply text-xs mb-1
        }

        &__list{

            &__icon{
                @apply border rounded-lg p-1.5 mr-2
            }

            a{
                @apply flex flex-row py-1 px-1 w-full items-center hover:bg-[#f2f4f5] hover:rounded-lg
            }

            li{
            }
        }
    }
</style>
