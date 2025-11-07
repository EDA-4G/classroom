<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@/components/ui/accordion'
import { Input } from '@/components/ui/input';


import {
    Breadcrumb,
    BreadcrumbEllipsis,
    BreadcrumbItem as BreadcrumbItem1,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb"
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu"
import { Spinner } from '@/components/ui/spinner';
import { Loader } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';

// import InputG

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
</script>

<template>

    <Head title="Departamentos" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 px-4 flex-col gap-4  rounded-xl p-4">

            <!-- <template> -->
            <Breadcrumb>
                <BreadcrumbList>
                    <BreadcrumbItem1>
                        <BreadcrumbLink href="/">
                            Início
                        </BreadcrumbLink>
                    </BreadcrumbItem1>
                    <BreadcrumbSeparator />

                    <BreadcrumbItem1>
                        <BreadcrumbLink href="/docs/components/accordion.html">
                            Components
                        </BreadcrumbLink>
                    </BreadcrumbItem1>
                    <BreadcrumbSeparator />
                    <BreadcrumbItem1>
                        <BreadcrumbPage>Breadcrumb</BreadcrumbPage>
                    </BreadcrumbItem1>
                </BreadcrumbList>
            </Breadcrumb>

            <h1>Departamentos</h1>

            <div class="grid grid-cols-5 gap-2">
                <Input placeholder="Departamentos" />
                <Input placeholder="Estado" />
                <Input placeholder="Procurar..." class="col-span-3" />
            </div>

            <section>

                <div class="py-4 grid grid-cols-2 lg:grid-cols-4 gap-2">
                    <button
                        class="group relative h-48 cursor-pointer overflow-hidden rounded-2xl shadow-lg transition-shadow duration-300 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                        aria-label="Sala Aberta - Dep. Mecânica e Produção">
                        <!-- Imagem da sala -->
                        <img src="https://picsum.photos/300/400?random=8" alt="Sala Aberta"
                            class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-100 transition-transform duration-500 group-hover:scale-105 brightness-105" />

                        <!-- Overlay leve porém suficiente para contraste -->
                        <div class="absolute inset-0 bg-black/40 rounded-2xl"></div>

                        <!-- Badge apenas ícone (desbloqueio) -->
                        <div
                            class="absolute top-2 left-2 flex items-center justify-center w-7.5 h-7.5 rounded-full bg-emerald-600/90 shadow-md border border-white/20 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <!-- Ícone de desbloqueio -->
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7a4 4 0 1 1 8 0v4" />
                                <rect x="4" y="11" width="16" height="10" rx="2" ry="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>



                        <!-- Conteúdo da sala -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                            <span class="text-2xl font-bold drop-shadow-lg">
                                Sala 105
                            </span>
                            <span class="text-sm font-medium drop-shadow-md">
                                Dep. Mecânica e Produção
                            </span>
                        </div>

                        <!-- Feedback visual de foco -->
                        <div
                            class="absolute inset-0 pointer-events-none rounded-3xl ring-2 ring-transparent group-focus:ring-emerald-400 transition-all duration-200">
                        </div>
                    </button>
                    <button
                        class="group relative h-48 cursor-pointer overflow-hidden rounded-2xl shadow-lg transition-shadow duration-300 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                        aria-label="Sala Aberta - Dep. Mecânica e Produção">
                        <!-- Imagem da sala -->
                        <img src="https://picsum.photos/300/400?random=9" alt="Sala Aberta"
                            class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-100 transition-transform duration-500 group-hover:scale-105 brightness-105" />

                        <!-- Overlay leve porém suficiente para contraste -->
                        <div class="absolute inset-0 bg-black/40 rounded-2xl"></div>

                        <!-- Badge apenas ícone (desbloqueio) -->
                        <div
                            class="absolute top-2 left-2 flex items-center justify-center w-7.5 h-7.5 rounded-full bg-emerald-600/90 shadow-md border border-white/20 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <!-- Ícone de desbloqueio -->
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7a4 4 0 1 1 8 0v4" />
                                <rect x="4" y="11" width="16" height="10" rx="2" ry="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>



                        <!-- Conteúdo da sala -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                            <span class="text-2xl font-bold drop-shadow-lg">
                                Sala 105
                            </span>
                            <span class="text-sm font-medium drop-shadow-md">
                                Dep. Mecânica e Produção
                            </span>
                        </div>

                        <!-- Feedback visual de foco -->
                        <div
                            class="absolute inset-0 pointer-events-none rounded-3xl ring-2 ring-transparent group-focus:ring-emerald-400 transition-all duration-200">
                        </div>
                    </button>
                    <button
                        class="group relative h-48 cursor-not-allowed overflow-hidden rounded-2xl shadow-lg transition-shadow duration-300"
                        aria-label="Sala Fechada - Dep. Mecânica e Produção">
                        <!-- Imagem da sala em grayscale e baixa opacidade -->
                        <img src="https://picsum.photos/300/400?random=10" alt="Sala Fechada"
                            class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-20 grayscale transition-transform duration-500 group-hover:scale-105" />

                        <!-- Overlay escuro em tons de cinza -->
                        <div class="absolute inset-0 bg-gray-800/60 rounded-2xl"></div>

                        <!-- Badge apenas ícone (vermelho) -->
                        <div
                            class="absolute top-2 left-2 flex items-center justify-center w-8 h-8 rounded-full bg-red-800/95 shadow-md border border-white/20 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <!-- Ícone minimalista -->
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 10V8a6 6 0 1 1 12 0v2M5 10h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2z" />
                            </svg>
                        </div>

                        <!-- Conteúdo da sala -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                            <span class="text-2xl font-bold text-gray-200 drop-shadow-md">
                                Sala 105
                            </span>
                            <span class="text-sm font-medium text-gray-300 drop-shadow-sm">
                                Dep. Mecânica e Produção
                            </span>
                        </div>
                    </button>

                    <button
                        class="group relative h-46 cursor-pointer overflow-hidden rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl">
                        <img src="https://picsum.photos/300/400?random=11" alt="Sala"
                            class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                        <!-- <div class="absolute inset-0 bg-black/40 transition-colors duration-300"></div> -->


                        <div class="absolute inset-0 bg-black/40"></div>

                        <div v-if="true"
                            class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-2.5 w-2.5">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                            </span>
                            <span>Em Aula</span>
                        </div>

                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                            <span class="text-2xl font-bold drop-shadow-md transition-colors">
                                Sala 209
                            </span>
                            <span class="text-sm font-medium text-white drop-shadow-md">
                                Dep. Engenharia Electrotécnica
                            </span>
                        </div>
                    </button>

                </div>
            </section>

            <section class="grid grid-cols-2 lg:grid-cols-4 gap-2">

                <button
                    class="group relative h-48 cursor-not-allowed overflow-hidden rounded-2xl shadow-lg transition-shadow duration-300"
                    aria-label="Sala Fechada - Dep. Mecânica e Produção">
                    <!-- Imagem da sala em grayscale e baixa opacidade -->
                    <img src="https://picsum.photos/300/400?random=12" alt="Sala Fechada"
                        class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-20 grayscale transition-transform duration-500 group-hover:scale-105" />

                    <!-- Overlay escuro em tons de cinza -->
                    <div class="absolute inset-0 bg-gray-800/60 rounded-2xl"></div>

                    <!-- Badge apenas ícone (vermelho) -->
                    <div
                        class="absolute top-2 left-2 flex items-center justify-center w-8 h-8 rounded-full bg-red-800/95 shadow-md border border-white/20 backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <!-- Ícone minimalista -->
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 10V8a6 6 0 1 1 12 0v2M5 10h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2z" />
                        </svg>
                    </div>

                    <!-- Conteúdo da sala -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                        <span class="text-2xl font-bold text-gray-200 drop-shadow-md">
                            Sala 105
                        </span>
                        <span class="text-sm font-medium text-gray-300 drop-shadow-sm">
                            Dep. Mecânica e Produção
                        </span>
                    </div>
                </button>








                <button
                    class="group relative h-48 cursor-pointer overflow-hidden rounded-2xl shadow-lg transition-shadow duration-300 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                    aria-label="Sala Aberta - Dep. Mecânica e Produção">
                    <!-- Imagem da sala -->
                    <img src="https://picsum.photos/300/400?random=13" alt="Sala Aberta"
                        class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-100 transition-transform duration-500 group-hover:scale-105 brightness-105" />

                    <!-- Overlay leve porém suficiente para contraste -->
                    <div class="absolute inset-0 bg-black/40 rounded-2xl"></div>

                    <!-- Badge apenas ícone (desbloqueio) -->
                    <div
                        class="absolute top-2 left-2 flex items-center justify-center w-7.5 h-7.5 rounded-full bg-emerald-600/90 shadow-md border border-white/20 backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <!-- Ícone de desbloqueio -->
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7a4 4 0 1 1 8 0v4" />
                            <rect x="4" y="11" width="16" height="10" rx="2" ry="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>



                    <!-- Conteúdo da sala -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                        <span class="text-2xl font-bold drop-shadow-lg">
                            Sala 105
                        </span>
                        <span class="text-sm font-medium drop-shadow-md">
                            Dep. Mecânica e Produção
                        </span>
                    </div>

                    <!-- Feedback visual de foco -->
                    <div
                        class="absolute inset-0 pointer-events-none rounded-3xl ring-2 ring-transparent group-focus:ring-emerald-400 transition-all duration-200">
                    </div>
                </button>



            </section>

            <section class="flex items-center justify-between pt-4">
                <div class="text-sm text-slate-500">
                    Mostrando <b>1-4</b> de 45
                </div>
                <div class="flex space-x-1">
                    <button
                        class="ease min-h-9 min-w-9 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
                        Prev
                    </button>
                    <button
                        class="ease min-h-9 min-w-9 rounded border border-slate-800 bg-slate-800 px-3 py-1 text-sm font-normal text-white transition duration-200 hover:border-slate-600 hover:bg-slate-600">
                        1
                    </button>
                    <button
                        class="ease min-h-9 min-w-9 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
                        2
                    </button>
                    <button
                        class="ease min-h-9 min-w-9 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
                        3
                    </button>
                    <button
                        class="ease min-h-9 min-w-9 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
                        Next
                    </button>
                </div>
            </section>

        </div>
    </AppLayout>
</template>
