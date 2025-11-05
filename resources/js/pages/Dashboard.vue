<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ChevronLeft, ChevronRight, FolderOpen, Building2, MoveRight } from 'lucide-vue-next';
import emblaCarouselVue from 'embla-carousel-vue'
import Autoplay from 'embla-carousel-autoplay'

const [emblaRef, emblaApi] = emblaCarouselVue({ loop: true }, [Autoplay({ delay: 8000 })])
function scrollNext() {
    emblaApi.value?.scrollNext()
}

function scrollPrev() {
    emblaApi.value?.scrollPrev()
}







import { ref, onMounted, onUnmounted } from 'vue'
const slides = [
    'https://picsum.photos/id/1015/800/400',
    'https://picsum.photos/id/1016/800/400',
    'https://picsum.photos/id/1018/800/400',
]



const selectedIndex = ref(0)
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
                        <div class="embla__slide flex-[0_0_100%] min-w-0 w-full h-100">
                            <img src="/storage/hero/colors.jpg" class="w-full h-full object-cover rounded-xl"
                                loading="lazy" decoding="async" />
                        </div>
                        <div class="embla__slide flex-[0_0_100%] min-w-0 w-full h-100">
                            <img src="/storage/hero/ocean.jpg" class="w-full h-full object-cover  rounded-xl"
                                loading="lazy" decoding="async" />
                        </div>
                        <div class="embla__slide flex-[0_0_100%] min-w-0 w-full h-100">
                            <img src="/storage/hero/arindam.jpg" class="w-full h-full object-cover  rounded-xl"
                                loading="lazy" decoding="async" />
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
                                ? 'border-[#038043] bg-[#038043] scale-110 shadow-sm'
                                : 'border-gray-400 bg-transparent hover:border-[#1fad68] hover:scale-105'">
                        </button>
                    </div>
                </section>

                <div class="grid lg:grid-cols-2 gap-2">
                    <button @click="dashboard().url"
                        class="flex bg-[#038043] hover:bg-[#1fad68] gap-1 place-items-center justify-center text-white font-semibold text-md border cursor-pointer rounded-lg px-2 py-3">
                        <Building2 width="18" />
                        Departamentos
                    </button>
                    <button @click="dashboard().url"
                        class="flex gap-1 place-items-center justify-center text-md text-[#038043] hover:text-[#1fad68] font-semibold border border-[#038043] cursor-pointer rounded-lg px-2 py-3">
                        <FolderOpen width="18" />
                        Repositório Instituicional
                    </button>
                </div>

                <section class="py-10">
                    <div class="pb-2">
                        <p class="font-bold text-xl">Salas de aulas</p>
                        <div class="flex justify-between">
                            <p class="text-gray-400 text-sm">Mais acessadas</p>
                            <a class="flex gap-2 text-gray-400 text-sm cursor-pointer hover:text-gray-500">Veja mais
                                &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="embla__slide min-w-0  h-full grid grid-cols-2 lg:grid-cols-4 gap-2">

                        <button
                            class="relative h-46 rounded-2xl overflow-hidden shadow-md group cursor-pointer transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=2" alt="Sala"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300">
                            </div>

                            <div v-if="true"
                                class="absolute top-2 right-2 flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-semibold px-3 py-1 rounded-full  ring-1 ring-white/40 animate-[pulse_2s_infinite]">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full rounded-full bg-green-200 opacity-75 animate-ping"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 208
                                </span>
                                <span class="text-sm font-semibold text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>


                        <button
                            class="relative h-46 rounded-2xl overflow-hidden shadow-md group cursor-pointer transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=3" alt="Sala"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300">
                            </div>

                            <div v-if="false"
                                class="absolute top-2 right-2 flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-semibold px-3 py-1 rounded-full  ring-1 ring-white/40 animate-[pulse_2s_infinite]">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full rounded-full bg-green-200 opacity-75 animate-ping"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 209
                                </span>
                                <span class="text-sm font-medium text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>


                        <button
                            class="relative h-46 rounded-2xl overflow-hidden shadow-md group cursor-pointer transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=7" alt="Sala"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300">
                            </div>

                            <div v-if="false"
                                class="absolute top-2 right-2 flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-semibold px-3 py-1 rounded-full  ring-1 ring-white/40 animate-[pulse_2s_infinite]">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full rounded-full bg-green-200 opacity-75 animate-ping"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 202
                                </span>
                                <span class="text-sm font-medium text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>

                        <button
                            class="relative h-46 rounded-2xl overflow-hidden shadow-md group cursor-pointer transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=6" alt="Sala"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300">
                            </div>

                            <div v-if="true"
                                class="absolute top-2 right-2 flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-semibold px-3 py-1 rounded-full  ring-1 ring-white/40 animate-[pulse_2s_infinite]">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full rounded-full bg-green-200 opacity-75 animate-ping"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 205
                                </span>
                                <span class="text-sm font-medium text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>

                    </div>

                    <div class="pt-6 pb-2">
                        <p class="text-gray-400 text-sm">Fixadas</p>
                    </div>

                    <div class="embla__slide min-w-0  h-full grid grid-cols-2 lg:grid-cols-4 gap-2">

                        <button
                            class="relative h-46 rounded-2xl overflow-hidden shadow-md group cursor-pointer transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=1" alt="Sala"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300">
                            </div>

                            <div v-if="false"
                                class="absolute top-2 right-2 flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-semibold px-3 py-1 rounded-full  ring-1 ring-white/40 animate-[pulse_2s_infinite]">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full rounded-full bg-green-200 opacity-75 animate-ping"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 208
                                </span>
                                <span class="text-sm font-semibold text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>

                        <button
                            class="relative h-46 rounded-2xl overflow-hidden shadow-md group cursor-pointer transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=9" alt="Sala"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300">
                            </div>

                            <div v-if="true"
                                class="absolute top-2 right-2 flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-semibold px-3 py-1 rounded-full  ring-1 ring-white/40 animate-[pulse_2s_infinite]">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full rounded-full bg-green-200 opacity-75 animate-ping"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 208
                                </span>
                                <span class="text-sm font-semibold text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>
                    </div>

                </section>

                <section>
                    <div class="pb-2">
                        <p class="font-bold text-xl">Publicações</p>
                        <div class="flex justify-between">
                            <p class="text-gray-400 text-sm">Repositório instituicional</p>
                            <a class="flex gap-2 text-gray-400 text-sm cursor-pointer hover:text-gray-500">Veja mais
                                &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="embla__slide min-w-0  h-full grid grid-cols-2 lg:grid-cols-4 gap-2">
                        <div>
                            <img src="/storage/regulamento.jpg" class="border border-[#038043] rounded-xl" />
                        </div>
                        <div>
                            <img src="/storage/relatario-final-de-auto-avaliaaao-cpa-periodo-2012.jpg"
                                class="border border-gray-400 rounded-xl" />
                        </div>
                        <div>
                            <img src="/storage/regulamento.jpg" class="border border-[#038043] rounded-xl" />
                        </div>
                        <div>
                            <img src="/storage/relatario-final-de-auto-avaliaaao-cpa-periodo-2012.jpg"
                                class="border border-[#038043] rounded-xl" />
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
