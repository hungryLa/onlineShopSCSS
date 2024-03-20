import { defineStore } from 'pinia'
import {ref} from "vue";

export const useHeaderStore= defineStore('header', () => {
    const headerRef = ref<any>(null)

    function updateHeaderRef(value: any){
        headerRef.value = value
    }

    return { headerRef, updateHeaderRef }
})
