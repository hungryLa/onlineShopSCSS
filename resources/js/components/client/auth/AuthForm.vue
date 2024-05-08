<script setup lang="ts">

import { useForm } from 'vee-validate'
import {DialogContent, DialogHeader} from "@/components/ui/dialog";


import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/components/ui/form'
import {SButton} from "@/components/ui/button";
import {SInput} from "@/components/ui/input";
import {authSchema} from "@/lib/validators/auth";
import axios from "axios";


const form = useForm({
    validationSchema: authSchema,
})

const onSubmit = form.handleSubmit((values ) => {
    axios.post('/login',[values])
    console.log('Form submitted!', values)
})
</script>

<template>
    <DialogContent>
        <DialogHeader>{{$t("message.auth")}}</DialogHeader>
        <form @submit="onSubmit">
            <FormField v-slot="{ componentField }" name="email">
                <FormItem class="flex-item">
                    <FormLabel>Email</FormLabel>
                    <FormControl>
                        <SInput type="email" autocomplete="off" placeholder="Укажите вашу почту" v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="password">
                <FormItem class="flex-item">
                    <FormLabel>Пароль</FormLabel>
                    <FormControl>
                        <SInput type="password"  autocomplete="off" placeholder="Укажите пароль" v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <SButton type="submit">
                Submit
            </SButton>
        </form>
    </DialogContent>
</template>

<style scoped lang="scss">
    //.flex-item{
    //    @apply flex flex-col mb-2;
    //}
</style>
