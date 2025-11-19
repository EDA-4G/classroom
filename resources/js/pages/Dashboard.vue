<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import Autoplay from 'embla-carousel-autoplay';
import emblaCarouselVue from 'embla-carousel-vue';
import {
    Building2,
    ChevronLeft,
    ChevronRight,
    FolderOpen,
    Locate,
    User2,
    MoveUp
} from 'lucide-vue-next';
import departments from '@/routes/departments';
import repositories from '@/routes/repositories';
import losses from '@/routes/losses';
import managers from '@/routes/managers';

const [emblaRef, emblaApi] = emblaCarouselVue({ loop: true }, [
    Autoplay({ delay: 8000 }),
]);
function scrollNext() {
    emblaApi.value?.scrollNext();
}

function scrollPrev() {
    emblaApi.value?.scrollPrev();
}

import { onMounted, onUnmounted, ref } from 'vue';
const slides = [
    'https://picsum.photos/id/1015/800/400',
    'https://picsum.photos/id/1016/800/400',
    'https://picsum.photos/id/1018/800/400',
];

const selectedIndex = ref(0);
function scrollTo(index: number) {
    emblaApi.value?.scrollTo(index);
}

function updateSelected() {
    if (!emblaApi.value) return;
    selectedIndex.value = emblaApi.value.selectedScrollSnap();
}

onMounted(() => {
    emblaApi.value?.on('select', updateSelected);
    updateSelected();
});

onUnmounted(() => {
    emblaApi.value?.off('select', updateSelected);
});

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
        <div id="top" class="flex h-full flex-1 flex-col gap-4 rounded-xl p-2">
            <div class="px-4 py-4 sm:px-4 lg:px-2 lg:py-4">
                <section class="embla overflow-hidden" ref="emblaRef">
                    <div class="embla__container flex gap-1">
                        <div class="embla__slide h-100 w-full min-w-0 flex-[0_0_100%]">
                            <img src="/storage/hero/colors.jpg" class="h-full w-full rounded-xl object-cover"
                                loading="lazy" decoding="async" />
                        </div>
                        <div class="embla__slide h-100 w-full min-w-0 flex-[0_0_100%]">
                            <img src="/storage/hero/ocean.jpg" class="h-full w-full rounded-xl object-cover"
                                loading="lazy" decoding="async" />
                        </div>
                        <div class="embla__slide h-100 w-full min-w-0 flex-[0_0_100%]">
                            <img src="/storage/hero/arindam.jpg" class="h-full w-full rounded-xl object-cover"
                                loading="lazy" decoding="async" />
                        </div>
                    </div>
                </section>

                <section class="mb-4 flex justify-between py-4">
                    <div class="flex gap-2">
                        <button @click="scrollPrev"
                            class="embla__prev cursor-pointer rounded-lg border px-2 py-1 text-sm">
                            <ChevronLeft width="16" />
                        </button>
                        <button @click="scrollNext"
                            class="embla__next cursor-pointer rounded-lg border px-2 py-1 text-sm">
                            <ChevronRight width="16" />
                        </button>
                    </div>

                    <div class="flex items-center justify-center space-x-3">
                        <button v-for="(_, index) in slides" :key="'dot-' + index" @click="scrollTo(index)"
                            class="h-3.5 w-3.5 cursor-pointer rounded-full border-2 transition-all duration-300 ease-in-out focus:outline-none"
                            :class="selectedIndex === index
                                ? 'scale-110 border-[#038043] bg-[#038043] shadow-sm'
                                : 'border-gray-400 bg-transparent hover:scale-105 hover:border-[#1fad68]'
                                "></button>
                    </div>
                </section>

                <section class="grid gap-2 lg:grid-cols-2">
                    <Link :href="departments.index().url"
                        class="text-md flex cursor-pointer place-items-center justify-center gap-1 rounded-lg border border-[#038043] bg-[#038043] px-2 py-3 font-semibold text-white hover:bg-[#1fad68]">
                    <Building2 width="18" />
                    Departamentos
                    </Link>
                    <Link :href="repositories.index().url"
                        class="text-md flex cursor-pointer place-items-center justify-center gap-1 rounded-lg border border-[#038043] px-2 py-3 font-semibold text-[#038043] hover:text-[#1fad68]">
                    <FolderOpen width="18" />
                    Repositório Instituicional
                    </Link>
                    <Link :href="losses.index().url"
                        class="text-md flex cursor-pointer place-items-center justify-center gap-1 rounded-lg border border-[#038043] px-2 py-3 font-semibold text-[#038043] hover:text-[#1fad68]">
                    <Locate width="18" />
                    Perdidos e Achados
                    </Link>
                    <Link :href="managers.index().url"
                        class="text-md flex cursor-pointer pslace-items-center justify-center gap-1 rounded-lg border border-[#038043] px-2 py-3 font-semibold text-[#038043] hover:text-[#1fad68]">
                    <User2 width="18" />
                    Administrador
                    </Link>
                </section>

                <section class="py-10">
                    <div class="pb-2">
                        <p class="text-xl font-bold">Salas de aulas</p>
                        <div class="flex justify-between">
                            <p class="text-sm text-gray-400">Mais acessadas</p>
                            <a class="flex cursor-pointer gap-2 text-sm text-gray-400 hover:text-gray-500">Veja mais
                                &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="embla__slide grid h-full min-w-0 grid-cols-2 gap-2 lg:grid-cols-4">
                        <button
                            class="group relative h-46 cursor-pointer overflow-hidden rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=2" alt="Sala"
                                class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300"></div>

                            <div v-if="true"
                                class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 208
                                </span>
                                <span class="text-sm font-semibold text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>

                        <button
                            class="group relative h-46 cursor-pointer overflow-hidden rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=3" alt="Sala"
                                class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300"></div>

                            <div v-if="false"
                                class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 209
                                </span>
                                <span class="text-sm font-medium text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>

                        <button
                            class="group relative h-46 cursor-pointer overflow-hidden rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=7" alt="Sala"
                                class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300"></div>

                            <div v-if="false"
                                class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 202
                                </span>
                                <span class="text-sm font-medium text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>

                        <button
                            class="group relative h-46 cursor-pointer overflow-hidden rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=6" alt="Sala"
                                class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300"></div>

                            <div v-if="true"
                                class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
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
                        <p class="text-sm text-gray-400">Fixadas</p>
                    </div>

                    <div class="embla__slide grid h-full min-w-0 grid-cols-2 gap-2 lg:grid-cols-4">
                        <button
                            class="group relative h-46 cursor-pointer overflow-hidden rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=1" alt="Sala"
                                class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300"></div>

                            <div v-if="false"
                                class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                                <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                    Sala 208
                                </span>
                                <span class="text-sm font-semibold text-white drop-shadow-md">
                                    Dep. Engenharia Electrotécnica
                                </span>
                            </div>
                        </button>

                        <button
                            class="group relative h-46 cursor-pointer overflow-hidden rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl">
                            <img src="https://picsum.photos/300/400?random=9" alt="Sala"
                                class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black/40 transition-colors duration-300"></div>

                            <div v-if="true"
                                class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                                </span>
                                <span>Em Aula</span>
                            </div>

                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
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
                        <p class="text-xl font-bold">Publicações</p>
                        <div class="flex justify-between">
                            <p class="text-sm text-gray-400">
                                Repositório instituicional
                            </p>
                            <a class="flex cursor-pointer gap-2 text-sm text-gray-400 hover:text-gray-500">Veja mais
                                &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="embla__slide grid h-full min-w-0 grid-cols-2 gap-2 lg:grid-cols-4">
                        <div>
                            <img src="/storage/regulamento.jpg" class="rounded-xl border border-[#038043]" />
                        </div>
                        <div>
                            <img src="/storage/relatario-final-de-auto-avaliaaao-cpa-periodo-2012.jpg"
                                class="rounded-xl border border-gray-400" />
                        </div>
                        <div>
                            <img src="/storage/regulamento.jpg" class="rounded-xl border border-[#038043]" />
                        </div>
                        <div>
                            <img src="/storage/relatario-final-de-auto-avaliaaao-cpa-periodo-2012.jpg"
                                class="rounded-xl border border-[#038043]" />
                        </div>
                    </div>
                </section>


                <section class="pt-6">
                    <div class="pb-2">
                        <p class="text-xl font-bold">Achados e Perdidos</p>
                        <div class="flex justify-between">
                            <p class="text-sm text-gray-400">
                                Encontre o teu item perdido
                            </p>
                            <a class="flex cursor-pointer gap-2 text-sm text-gray-400 hover:text-gray-500">Veja mais
                                &rarr;
                            </a>
                        </div>
                    </div>
                    <section class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-2">
                        <!-- Product Card 2 - Red -->
                        <div
                            class="relative rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300 dark:bg-background dark:border-border">
                            <!-- Sale Badge -->
                            <span
                                class="absolute top-4 left-4 rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-600 dark:bg-background dark:border dark:border-border">
                                <!-- SALE -->
                                Recuperado
                                <!-- RECUPERADO -->
                            </span>

                            <div class="text-center">
                                <!-- Product Image -->
                                <a href="#" class="block">
                                    <img src="https://cdn.flyonui.com/fy-assets/blocks/ecommerce/product-list/product-list-23.png"
                                        alt="Apple Watch Silver Aluminium" class="mb-6 h-40 w-full object-contain" />
                                    <h3 class="text-sm font-medium text-gray-900 dark:text-foreground">Apple
                                        Watch Red Aluminium
                                    </h3>
                                </a>

                                <!-- Badges -->
                                <div class="mt-3 flex justify-center gap-2">
                                    <span
                                        class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Relógio</span>
                                    <span
                                        class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Apple</span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300 dark:bg-background dark:border-border">
                            <!-- Sale Badge -->
                            <span
                                class="absolute top-4 left-4 rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-600 dark:bg-background dark:border dark:border-border">
                                <!-- SALE -->
                                Recuperado
                                <!-- RECUPERADO -->
                            </span>

                            <div class="text-center">
                                <!-- Product Image -->
                                <a href="#" class="block">
                                    <img src="https://cdn.flyonui.com/fy-assets/blocks/ecommerce/product-list/product-list-23.png"
                                        alt="Apple Watch Silver Aluminium" class="mb-6 h-40 w-full object-contain" />
                                    <h3 class="text-sm font-medium text-gray-900 dark:text-foreground">Apple
                                        Watch Red Aluminium
                                    </h3>
                                </a>

                                <!-- Badges -->
                                <div class="mt-3 flex justify-center gap-2">
                                    <span
                                        class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Relógio</span>
                                    <span
                                        class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Apple</span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300 dark:bg-background dark:border-border">
                            <!-- Sale Badge -->
                            <span
                                class="absolute top-4 left-4 rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-600 dark:bg-background dark:border dark:border-border">
                                <!-- SALE -->
                                Recuperado
                                <!-- RECUPERADO -->
                            </span>

                            <div class="text-center">
                                <!-- Product Image -->
                                <a href="#" class="block">
                                    <img src="https://cdn.flyonui.com/fy-assets/blocks/ecommerce/product-list/product-list-23.png"
                                        alt="Apple Watch Silver Aluminium" class="mb-6 h-40 w-full object-contain" />
                                    <h3 class="text-sm font-medium text-gray-900 dark:text-foreground">Apple
                                        Watch Red Aluminium
                                    </h3>
                                </a>

                                <!-- Badges -->
                                <div class="mt-3 flex justify-center gap-2">
                                    <span
                                        class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Relógio</span>
                                    <span
                                        class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Apple</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="relative rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition-shadow duration-300 dark:bg-background dark:border-border">
                            <!-- Sale Badge -->
                            <span
                                class="absolute top-4 left-4 rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-600 dark:bg-background dark:border dark:border-border">
                                <!-- SALE -->
                                Recuperado
                                <!-- RECUPERADO -->
                            </span>

                            <div class="text-center">
                                <!-- Product Image -->
                                <a href="#" class="block">
                                    <img src="https://cdn.flyonui.com/fy-assets/blocks/ecommerce/product-list/product-list-23.png"
                                        alt="Apple Watch Silver Aluminium" class="mb-6 h-40 w-full object-contain" />
                                    <h3 class="text-sm font-medium text-gray-900 dark:text-foreground">Apple
                                        Watch Red Aluminium
                                    </h3>
                                </a>

                                <!-- Badges -->
                                <div class="mt-3 flex justify-center gap-2">
                                    <span
                                        class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Relógio</span>
                                    <span
                                        class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Apple</span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="py-4 flex justify-end">
                        <Link href="#"
                            class="flex bg-[#038043] hover:bg-[#1fad68] text-white text-sm font-semibold items-center border px-2 py-1 cursor-pointer rounded-xl">
                        <MoveUp width="12" />
                        Topo
                        </Link>
                    </section>
                </section>

            </div>
        </div>
    </AppLayout>
</template>
