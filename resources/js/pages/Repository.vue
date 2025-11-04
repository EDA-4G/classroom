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



// import Autoplay from 'embla-carousel-autoplay';
// import emblaCarouselVue from 'embla-carousel-vue'

// const [emblaRef] = emblaCarouselVue()


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
            <!-- Folder do menu onde os trabalhos serao disponibilizados -->
            <div class=" px-4 py-10 sm:px-6 lg:px-2 lg:py-6">
                <div class="embla overflow-hidden" ref="emblaRef">
                    <div class="embla__container flex">
                        <!-- bg-red-400 -->
                        <div class="embla__slide min-w-0  rounded-xl grid grid-cols-2 lg:grid-cols-4 gap-2">
                            <!-- .1.. -->
                            <div class="bg-red-200 border border-gray-400 rounded-xl">
                                <img src="/storage/regulamento.jpg" />
                            </div>
                            <div class="bg-red-200 border border-gray-400 rounded-xl">
                                <img src="/storage/edital.jpg" />
                            </div>
                            <div class="bg-red-200 rounded-xl">
                                C
                            </div>
                            <div class="bg-red-200 rounded-xl">
                                D
                            </div>
                        </div>
                        <div class="embla__slide min-w-0 w-full h-[260px] bg-blue-400 rounded-xl">.2..</div>
                        <div class="embla__slide min-w-0 w-full h-[260px] bg-gray-400 rounded-xl">.3..</div>
                    </div>
                </div>
                <div class="flex justify-between py-4 mb-4">
                    <div class="flex gap-2">
                        <button @click="scrollPrev" class="embla__prev text-sm border rounded-lg p-2">Prev</button>
                        <button @click="scrollNext" class="embla__next text-sm border rounded-lg p-2">Next</button>
                    </div>
                    <button class="text-sm border rounded-lg p-2">Repositório Instituicional</button>
                </div>
                <div class="embla__dots"></div>

                <!-- 📊 Slide counter -->
                <!-- <div class="embla__counter">
        {{ selectedIndex + 1 }} / {{ slides.length }}
      </div> -->
                <!-- <div class="mb-8">
                    <Carousel class="w-full" :plugins="[Autoplay()]">
                        <CarouselContent>
                            <CarouselItem>
                                <div class="h-full bg-red-400 rounded-xl">.1..</div>
                            </CarouselItem>
                            <CarouselItem>
                                <div class="h-[200px] bg-blue-400">.2..</div>
                            </CarouselItem>
                            <CarouselItem>
                                <div class="h-[200px] bg-gray-400">.3..</div>
                            </CarouselItem>
                        </CarouselContent>
                        <CarouselPrevious />
                        <CarouselNext />
                    </Carousel>
                </div> -->
                <!-- Imagem da faculdade de engenharia -->
                <!-- Accordion -->

                <h2 class="font-bold text-lg">Documentos</h2>
                <!-- <div class="hs-accordion-group divide-y divide-gray-200 dark:divide-neutral-700">
                    <Accordion type="single" collapsible>
                        <AccordionItem value="item-1">
                            <AccordionTrigger class="cursor-pointer">Cadeiras Gerais
                            </AccordionTrigger>
                            <AccordionContent>
                                Yes. It adheres to the WAI-ARIA design pattern.
                            </AccordionContent>
                        </AccordionItem>
                        <AccordionItem value="item-2">
                            <AccordionTrigger>Engenharia Química</AccordionTrigger>
                            <AccordionContent>
                                Yes. It adheres to the WAI-ARIA design pattern.
                            </AccordionContent>
                        </AccordionItem>
                        <AccordionItem value="item-3">
                            <AccordionTrigger>Engenharia Civil</AccordionTrigger>
                            <AccordionContent>
                                Yes. It adheres to the WAI-ARIA design pattern.
                            </AccordionContent>
                        </AccordionItem>
                        <AccordionItem value="item-4">
                            <AccordionTrigger class="no-underline">Engenharia Electrotécnia</AccordionTrigger>
                            <AccordionContent>
                                Yes. It adheres to the WAI-ARIA design pattern.
                            </AccordionContent>
                        </AccordionItem>
                        <AccordionItem value="item-5">
                            <AccordionTrigger class="no-underline">Engenharia Mecânica</AccordionTrigger>
                            <AccordionContent>
                                Yes. It adheres to the WAI-ARIA design pattern.
                            </AccordionContent>
                        </AccordionItem>
                        <AccordionItem value="item-6">
                            <AccordionTrigger class="no-underline">Engenharia Geologia e Minas</AccordionTrigger>
                            <AccordionContent>
                                Yes. It adheres to the WAI-ARIA design pattern.
                            </AccordionContent>
                        </AccordionItem>
                    </Accordion>
                </div> -->
                <div class="pt-4">
                    <table class="w-full text-left table-auto min-w-max">
                        <!-- <thead>
                            <tr>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Transaction
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Amount
                                    </p>
                                </th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <tr>
                                <td class="p-2 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="https://docs.material-tailwind.com/img/logos/logo-spotify.svg"
                                            alt="Spotify"
                                            class="relative inline-block h-12 w-12 !rounded-full border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                            Spotify
                                        </p>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        $2,500
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="https://docs.material-tailwind.com/img/logos/logo-spotify.svg"
                                            alt="Spotify"
                                            class="relative inline-block h-12 w-12 !rounded-full border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                            Spotify
                                        </p>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        $2,500
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="https://docs.material-tailwind.com/img/logos/logo-amazon.svg"
                                            alt="Amazon"
                                            class="relative inline-block h-12 w-12 !rounded-full  border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                            Amazon
                                        </p>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        $5,000
                                    </p>
                                </td>


                            </tr>
                            <tr>
                                <td class="p-2 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="https://docs.material-tailwind.com/img/logos/logo-amazon.svg"
                                            alt="Amazon"
                                            class="relative inline-block h-12 w-12 !rounded-full  border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                            Amazon
                                        </p>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        $5,000
                                    </p>
                                </td>


                            </tr>
                            <tr>
                                <td class="p-2 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="https://docs.material-tailwind.com/img/logos/logo-amazon.svg"
                                            alt="Amazon"
                                            class="relative inline-block h-12 w-12 !rounded-full  border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                            Amazon
                                        </p>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        $5,000
                                    </p>
                                </td>


                            </tr>
                            <tr>
                                <td class="p-2 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="https://docs.material-tailwind.com/img/logos/logo-amazon.svg"
                                            alt="Amazon"
                                            class="relative inline-block h-12 w-12 !rounded-full  border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                            Amazon
                                        </p>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        $5,000
                                    </p>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between items-center pt-4">
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
                </div>



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
