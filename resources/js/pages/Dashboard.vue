<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@/components/ui/accordion'
import {
    Carousel,
    CarouselContent,
    CarouselItem,
    CarouselNext,
    CarouselPrevious,
} from '@/components/ui/carousel'

import { ChevronLeft, ChevronRight, FolderOpen, Search } from 'lucide-vue-next';

import emblaCarouselVue from 'embla-carousel-vue'
import Autoplay from 'embla-carousel-autoplay'
// import { ref } from 'vue';
// import Input from '@/components/ui/input/Input.vue';

const [emblaRef, emblaApi] = emblaCarouselVue({ loop: true }, [Autoplay({ delay: 8000 })])
function scrollNext() {
    emblaApi.value?.scrollNext()
}

function scrollPrev() {
    emblaApi.value?.scrollPrev()
}







import { ref, onMounted, onUnmounted } from 'vue'
// import emblaCarouselVue from 'embla-carousel-vue'
// import Autoplay from 'embla-carousel-autoplay'

const slides = [
    'https://picsum.photos/id/1015/800/400',
    'https://picsum.photos/id/1016/800/400',
    'https://picsum.photos/id/1018/800/400',
]

// const [emblaRef, emblaApi] = emblaCarouselVue(
//   { loop: true, align: 'center' },
//   [Autoplay({ delay: 8000 })]
// )

const selectedIndex = ref(0)

// function scrollNext() {
//   emblaApi.value?.scrollNext()
// }

// function scrollPrev() {
//   emblaApi.value?.scrollPrev()
// }

function scrollTo(index: number) {
    emblaApi.value?.scrollTo(index)
}

function updateSelected() {
    if (!emblaApi.value) return
    selectedIndex.value = emblaApi.value.selectedScrollSnap()
}

onMounted(() => {
    emblaApi.value?.on('select', updateSelected)
    updateSelected()
})

onUnmounted(() => {
    emblaApi.value?.off('select', updateSelected)
})




const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4  rounded-xl p-2">
            <div class=" px-4 py-4 sm:px-4 lg:px-2 lg:py-4">

                <section class="embla overflow-hidden" ref="emblaRef">
                    <div class="embla__container flex gap-1">
                        <!-- bg-red-400 -->
                        <!-- <div class="embla__slide min-w-0  h-full rounded-xl grid grid-cols-2 lg:grid-cols-4 gap-2">
                            <div class="bg-red-200 border border-gray-400 rounded-xl">
                                <img src="/storage/regulamento.jpg" class="w-full " />
                            </div>
                            <div class="bg-red-200 border border-gray-400 rounded-xl">
                                <img src="/storage/relatario-final-de-auto-avaliaaao-cpa-periodo-2012.jpg" />
                            </div>
                            <div class="bg-red-200 border border-gray-400 rounded-xl">
                                <img src="/storage/regulamento.jpg" />
                            </div>
                            <div class="bg-red-200 border border-gray-400 rounded-xl">
                                <img src="/storage/relatario-final-de-auto-avaliaaao-cpa-periodo-2012.jpg" />
                            </div>
                        </div> -->

                        <div class="embla__slide min-w-0 w-full h-100 bg-blue-400 rounded-xl">
                            <img src="/storage/hero/colors.jpg" class="w-full h-full object-cover  rounded-xl" />
                        </div>
                        <div class="embla__slide min-w-0 w-full h-100 bg-gray-400 rounded-xl">
                            <img src="/storage/hero/ocean.jpg" class="w-full h-full object-cover  rounded-xl" />
                        </div>
                        <div class="embla__slide min-w-0 w-full h-100 bg-gray-400 rounded-xl">
                            <img src="/storage/hero/arindam.jpg" class="w-full h-full object-cover  rounded-xl" />
                        </div>
                    </div>
                </section>

                <section class="flex justify-between py-4 mb-4">
                    <div class="flex gap-2">
                        <button @click="scrollPrev"
                            class="embla__prev text-sm cursor-pointer border rounded-lg px-2 py-1">
                            <ChevronLeft width="16" />
                        </button>
                        <button @click="scrollNext"
                            class="embla__next text-sm cursor-pointer border rounded-lg px-2 py-1">
                            <ChevronRight width="16" />
                        </button>
                    </div>

                    <div class="flex justify-center items-center space-x-3">
                        <button v-for="(_, index) in slides" :key="'dot-' + index" @click="scrollTo(index)"
                            class="w-3.5 h-3.5 cursor-pointer rounded-full border-2 transition-all duration-300 ease-in-out focus:outline-none"
                            :class="selectedIndex === index
                                ? 'border-blue-600 bg-blue-600 scale-110 shadow-sm'
                                : 'border-gray-400 bg-transparent hover:border-blue-400 hover:scale-105'">
                        </button>
                    </div>
                </section>

                <div class="flex gap-2">
                    <button @click="dashboard().url"
                        class="flex gap-1 place-items-center text-sm border cursor-pointer rounded-lg px-2 py-1">
                        <FolderOpen width="16" />
                        Departamentos
                    </button>
                    <button @click="dashboard().url"
                        class="flex gap-1 place-items-center text-sm border cursor-pointer rounded-lg px-2 py-1">
                        <FolderOpen width="16" />
                        Repositório Instituicional
                    </button>
                </div>

                <section>
                    <div class="pb-4">
                        <h2 class="font-bold text-lg">Departamentos</h2>
                    </div>

                    <div class="embla__slide min-w-0  h-full grid grid-cols-2 lg:grid-cols-4 gap-2">
                        <div>
                            <img src="/storage/regulamento.jpg" class="w-full border border-gray-400 rounded-xl" />
                        </div>
                        <div>
                            <img src="/storage/relatario-final-de-auto-avaliaaao-cpa-periodo-2012.jpg"
                                class="border border-gray-400 rounded-xl" />
                        </div>
                        <div>
                            <img src="/storage/regulamento.jpg" class="border border-gray-400 rounded-xl" />
                        </div>
                        <div>
                            <img src="/storage/relatario-final-de-auto-avaliaaao-cpa-periodo-2012.jpg"
                                class="border border-gray-400 rounded-xl" />
                        </div>
                    </div>
                </section>

                <section class="flex justify-between items-center pt-4">
                    <div class="text-sm text-slate-500">
                        Mostrando <b>1-4</b> de 45
                    </div>
                    <div class="flex space-x-1">
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            Prev
                        </button>
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-white bg-slate-800 border border-slate-800 rounded hover:bg-slate-600 hover:border-slate-600 transition duration-200 ease">
                            1
                        </button>
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            2
                        </button>
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            3
                        </button>
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            Next
                        </button>
                    </div>
                </section>

            </div>
        </div>
    </AppLayout>
</template>
<style scoped>
.embla__slide {
    flex: 0 0 100%;
}
</style>
