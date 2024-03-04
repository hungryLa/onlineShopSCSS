<script lang="ts" setup>
import {onMounted, onUnmounted, ref} from "vue";
import {useWindowScroll} from "@vueuse/core";
import {useHeaderStore} from "@/store/headerStore";

const searchRef = ref<any>(null)
const bodyRef = ref<any>(document.body)
const {y} = useWindowScroll()

const { headerRef } = useHeaderStore()

const handleScroll = () => {
    const {top} = searchRef.value.getBoundingClientRect()
    // console.log(top)
    console.log(headerRef)
    // if(top == searchRef.value.offsetHeight){
    //     headerRef.value.classList.remove('header-hidden')
    // }
}

// console.log(y.value, bodyRef.value)

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})
</script>

<template>
    <section class="running_slider">
        <div class="running_slider__inner">
            <div class="running_slider__search">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                     class=" left-[18px] top-[12px] text-foregrounds-subdued" data-testid="icon-search"
                     style="width:20px;height:20px" stroke="none">
                    <path
                        d="M20 20L16.05 16.05M18 11C18 14.866 14.866 18 11 18C7.13401 18 4 14.866 4 11C4 7.13401 7.13401 4 11 4C14.866 4 18 7.13401 18 11Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                </svg>
                <input type="text" class="running_slider__search__input" ref="searchRef"/>
                <div></div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="container">
            <div class="news__inner">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam est id impedit incidunt ipsa
                    laudantium nobis porro, quam quisquam quo quos reprehenderit tempora voluptate! Ab accusantium amet,
                    cum debitis dolores eligendi enim incidunt iusto laborum molestiae, possimus quibusdam repellendus,
                    sed soluta tempore voluptate voluptatibus. Doloribus excepturi explicabo laborum nesciunt quas
                    sapiente? Asperiores at blanditiis consectetur cumque, doloribus eaque eum fugiat impedit iste
                    itaque iusto magni molestias natus nesciunt nulla, omnis quae quam qui quisquam quod quos reiciendis
                    sapiente sunt suscipit temporibus veritatis voluptate voluptatibus! Excepturi harum ipsam iste
                    molestias nulla, numquam placeat quis repudiandae suscipit temporibus. Alias amet minus sed!</p>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam est id impedit incidunt ipsa
                    laudantium nobis porro, quam quisquam quo quos reprehenderit tempora voluptate! Ab accusantium amet,
                    cum debitis dolores eligendi enim incidunt iusto laborum molestiae, possimus quibusdam repellendus,
                    sed soluta tempore voluptate voluptatibus. Doloribus excepturi explicabo laborum nesciunt quas
                    sapiente? Asperiores at blanditiis consectetur cumque, doloribus eaque eum fugiat impedit iste
                    itaque iusto magni molestias natus nesciunt nulla, omnis quae quam qui quisquam quod quos reiciendis
                    sapiente sunt suscipit temporibus veritatis voluptate voluptatibus! Excepturi harum ipsam iste
                    molestias nulla, numquam placeat quis repudiandae suscipit temporibus. Alias amet minus sed!</p>
                <br>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam est id impedit incidunt ipsa
                    laudantium nobis porro, quam quisquam quo quos reprehenderit tempora voluptate! Ab accusantium amet,
                    cum debitis dolores eligendi enim incidunt iusto laborum molestiae, possimus quibusdam repellendus,
                    sed soluta tempore voluptate voluptatibus. Doloribus excepturi explicabo laborum nesciunt quas
                    sapiente? Asperiores at blanditiis consectetur cumque, doloribus eaque eum fugiat impedit iste
                    itaque iusto magni molestias natus nesciunt nulla, omnis quae quam qui quisquam quod quos reiciendis
                    sapiente sunt suscipit temporibus veritatis voluptate voluptatibus! Excepturi harum ipsam iste
                    molestias nulla, numquam placeat quis repudiandae suscipit temporibus. Alias amet minus sed!</p>
                <br>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam est id impedit incidunt ipsa
                    laudantium nobis porro, quam quisquam quo quos reprehenderit tempora voluptate! Ab accusantium amet,
                    cum debitis dolores eligendi enim incidunt iusto laborum molestiae, possimus quibusdam repellendus,
                    sed soluta tempore voluptate voluptatibus. Doloribus excepturi explicabo laborum nesciunt quas
                    sapiente? Asperiores at blanditiis consectetur cumque, doloribus eaque eum fugiat impedit iste
                    itaque iusto magni molestias natus nesciunt nulla, omnis quae quam qui quisquam quod quos reiciendis
                    sapiente sunt suscipit temporibus veritatis voluptate voluptatibus! Excepturi harum ipsam iste
                    molestias nulla, numquam placeat quis repudiandae suscipit temporibus. Alias amet minus sed!</p>
                <br>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam est id impedit incidunt ipsa
                    laudantium nobis porro, quam quisquam quo quos reprehenderit tempora voluptate! Ab accusantium amet,
                    cum debitis dolores eligendi enim incidunt iusto laborum molestiae, possimus quibusdam repellendus,
                    sed soluta tempore voluptate voluptatibus. Doloribus excepturi explicabo laborum nesciunt quas
                    sapiente? Asperiores at blanditiis consectetur cumque, doloribus eaque eum fugiat impedit iste
                    itaque iusto magni molestias natus nesciunt nulla, omnis quae quam qui quisquam quod quos reiciendis
                    sapiente sunt suscipit temporibus veritatis voluptate voluptatibus! Excepturi harum ipsam iste
                    molestias nulla, numquam placeat quis repudiandae suscipit temporibus. Alias amet minus sed!</p>
                <br>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam est id impedit incidunt ipsa
                    laudantium nobis porro, quam quisquam quo quos reprehenderit tempora voluptate! Ab accusantium amet,
                    cum debitis dolores eligendi enim incidunt iusto laborum molestiae, possimus quibusdam repellendus,
                    sed soluta tempore voluptate voluptatibus. Doloribus excepturi explicabo laborum nesciunt quas
                    sapiente? Asperiores at blanditiis consectetur cumque, doloribus eaque eum fugiat impedit iste
                    itaque iusto magni molestias natus nesciunt nulla, omnis quae quam qui quisquam quod quos reiciendis
                    sapiente sunt suscipit temporibus veritatis voluptate voluptatibus! Excepturi harum ipsam iste
                    molestias nulla, numquam placeat quis repudiandae suscipit temporibus. Alias amet minus sed!</p>
                <br>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam est id impedit incidunt ipsa
                    laudantium nobis porro, quam quisquam quo quos reprehenderit tempora voluptate! Ab accusantium amet,
                    cum debitis dolores eligendi enim incidunt iusto laborum molestiae, possimus quibusdam repellendus,
                    sed soluta tempore voluptate voluptatibus. Doloribus excepturi explicabo laborum nesciunt quas
                    sapiente? Asperiores at blanditiis consectetur cumque, doloribus eaque eum fugiat impedit iste
                    itaque iusto magni molestias natus nesciunt nulla, omnis quae quam qui quisquam quod quos reiciendis
                    sapiente sunt suscipit temporibus veritatis voluptate voluptatibus! Excepturi harum ipsam iste
                    molestias nulla, numquam placeat quis repudiandae suscipit temporibus. Alias amet minus sed!</p>
                <br>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam est id impedit incidunt ipsa
                    laudantium nobis porro, quam quisquam quo quos reprehenderit tempora voluptate! Ab accusantium amet,
                    cum debitis dolores eligendi enim incidunt iusto laborum molestiae, possimus quibusdam repellendus,
                    sed soluta tempore voluptate voluptatibus. Doloribus excepturi explicabo laborum nesciunt quas
                    sapiente? Asperiores at blanditiis consectetur cumque, doloribus eaque eum fugiat impedit iste
                    itaque iusto magni molestias natus nesciunt nulla, omnis quae quam qui quisquam quod quos reiciendis
                    sapiente sunt suscipit temporibus veritatis voluptate voluptatibus! Excepturi harum ipsam iste
                    molestias nulla, numquam placeat quis repudiandae suscipit temporibus. Alias amet minus sed!</p>
                <br>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam est id impedit incidunt ipsa
                    laudantium nobis porro, quam quisquam quo quos reprehenderit tempora voluptate! Ab accusantium amet,
                    cum debitis dolores eligendi enim incidunt iusto laborum molestiae, possimus quibusdam repellendus,
                    sed soluta tempore voluptate voluptatibus. Doloribus excepturi explicabo laborum nesciunt quas
                    sapiente? Asperiores at blanditiis consectetur cumque, doloribus eaque eum fugiat impedit iste
                    itaque iusto magni molestias natus nesciunt nulla, omnis quae quam qui quisquam quod quos reiciendis
                    sapiente sunt suscipit temporibus veritatis voluptate voluptatibus! Excepturi harum ipsam iste
                    molestias nulla, numquam placeat quis repudiandae suscipit temporibus. Alias amet minus sed!</p>
                <br>
            </div>
        </div>
    </section>


</template>

<style lang="scss" scoped>
.running_slider {
    @apply h-[624px];

    &__inner {
        @apply h-full flex items-center;
    }

    &__search {
        background-color: #f2f4f5;
        @apply max-w-[500] w-[500px] flex text-muted-foreground rounded-lg items-center relative;

        svg {
            @apply absolute;
        }

        input {
            @apply outline-0 h-[44px] w-full border rounded-lg focus-visible:ring-primary pl-[48px] ;
        }
    }
}

</style>
