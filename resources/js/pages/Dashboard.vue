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

import { ChevronLeft, ChevronRight, FolderOpen } from 'lucide-vue-next';

import emblaCarouselVue from 'embla-carousel-vue'
import Autoplay from 'embla-carousel-autoplay'
import { ref } from 'vue';

const [emblaRef, emblaApi] = emblaCarouselVue({ loop: true }, [Autoplay({ delay: 8000 })])
function scrollNext() {
    emblaApi.value?.scrollNext()
}

function scrollPrev() {
    emblaApi.value?.scrollPrev()
}

const selectedIndex = ref(0)
// 🖼️ Slides
const slides = [
    'https://picsum.photos/id/1005/800/400',
    'https://picsum.photos/id/1015/800/400',
    'https://picsum.photos/id/1020/800/400',
    'https://picsum.photos/id/1024/800/400',
    'https://picsum.photos/id/1035/800/400',
    'https://picsum.photos/id/1045/800/400'
]

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
            <div class=" px-4 py-10 sm:px-6 lg:px-2 lg:py-6">

                <section class="embla overflow-hidden" ref="emblaRef">
                    <div class="embla__container flex">
                        <!-- bg-red-400 -->
                        <div class="embla__slide min-w-0  h-full rounded-xl grid grid-cols-2 lg:grid-cols-4 gap-2">
                            <!-- .1.. -->
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
                        </div>
                        <div class="embla__slide min-w-0 w-full h-[260px] bg-blue-400 rounded-xl">.2..</div>
                        <div class="embla__slide min-w-0 w-full h-[260px] bg-gray-400 rounded-xl">.3..</div>
                    </div>
                </section>

                <section class="flex justify-between py-4 mb-4">
                    <div class="flex gap-2">
                        <button @click="scrollPrev" class="embla__prev text-sm cursor-pointer border rounded-lg p-2">
                            <ChevronLeft width="16" />
                        </button>
                        <button @click="scrollNext" class="embla__next text-sm cursor-pointer border rounded-lg p-2">
                            <ChevronRight width="16" />
                        </button>
                    </div>
                    <button @click="dashboard().url" class="text-sm border cursor-pointer rounded-lg p-2">Repositório
                        Instituicional</button>
                </section>

                <!-- embla__container flex -->
                <section>
                    <div class="py-4">
                        <h2 class="font-bold text-lg">Departamentos</h2>
                    </div>
                    <!-- bg-red-400 -->
                    <div class="embla__slide min-w-0  h-full rounded-xl grid grid-cols-2 lg:grid-cols-4 gap-2">
                        <!-- .1.. -->
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
                    </div>
                </section>

                <section class="flex justify-between items-center pt-4">
                    <div class="text-sm text-slate-500">
                        Showing <b>1-5</b> of 45
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
    min-width: 0;
}
</style>
