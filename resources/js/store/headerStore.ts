import { defineStore } from 'pinia'
import {ref} from "vue";

export const useHeaderStore= defineStore('header', () => {
    const headerRef = ref<any>(null)

    function updateHeaderRef(value: any){
        // console.log(value)
        headerRef.value = value
        console.log('fff',headerRef.value)
    }

    return { headerRef, updateHeaderRef }
})
