<script lang="ts" setup>
</script>

<template>
    <router-view></router-view>
</template>

<style>
    @import url(https://db.onlinewebfonts.com/c/c446362802681bacaacbad0f39bfc1a5?family=SuisseIntl-Medium);
    @tailwind base;
    @tailwind components;
    @tailwind utilities;

    @layer base {

        :root {
            --background: 0 0% 100%;
            --foreground: 240 10% 3.9%;

            --card: 0 0% 100%;
            --card-foreground: 240 10% 3.9%;

            --popover: 0 0% 100%;
            --popover-foreground: 240 10% 3.9%;

            --primary: 240 4.3% 4.5%;
            --primary-foreground: 0 0% 100%;

            --secondary: 200 13% 95.5%;
            --secondary-hover: 0 0% 89%;
            --secondary-foreground: 240 4.3% 4.5%;

            --outline: 0 0% 97.3%;
            --outline-hover: 200 13% 95.5%;
            --outline-foreground: 240 4.3% 4.5%;

            --muted: 240 4.8% 95.9%;
            --muted-foreground: 240 3.8% 46.1%;

            --accent: 250.8 82.1% 56.1%;
            --accent-hover: 250.8 71.8% 50%;
            --accent-foreground: 0 0% 100%;

            --destructive: 0 84.2% 60.2%;
            --destructive-foreground: 0 0% 98%;

            --border:240 5.9% 90%;
            --input:240 5.9% 90%;
            --ring:142.1 76.2% 36.3%;
            --radius: 0.5rem;
        }
        .dark {
            --background:20 14.3% 4.1%;
            --foreground:0 0% 95%;

            --card:24 9.8% 10%;
            --card-foreground:0 0% 95%;

            --popover:0 0% 9%;
            --popover-foreground:0 0% 95%;

            --primary:142.1 70.6% 45.3%;
            --primary-foreground:144.9 80.4% 10%;

            --secondary:240 3.7% 15.9%;
            --secondary-foreground:0 0% 98%;

            --muted:0 0% 15%;
            --muted-foreground:240 5% 64.9%;

            --accent:12 6.5% 15.1%;
            --accent-foreground:0 0% 98%;

            --destructive:0 62.8% 30.6%;
            --destructive-foreground:0 85.7% 97.3%;

            --border:240 3.7% 15.9%;
            --input:240 3.7% 15.9%;
            --ring:142.4 71.8% 29.2%;
        }
    }

    *:before, *:after, * {
        font-family: "Inter", sans-serif;
        font-optical-sizing: auto;
        font-style: normal;
        font-variation-settings:
            "slnt" 0;
    }

    body{
        overflow-x: hidden;
    }

    input,
    input:active,
    input:focus,
    a:focus{ outline: 0; outline-style:none; outline-width:0; }


    button::-moz-focus-inner,
    input[type="reset"]::-moz-focus-inner,
    input[type="button"]::-moz-focus-inner,
    input[type="submit"]::-moz-focus-inner,
    input[type="file"] > input[type="button"]::-moz-focus-inner,
    a
    { border: none; }
    #app{
        @apply flex flex-col min-h-screen;
    }
</style>
