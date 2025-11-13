<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
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
import { Waypoints, Layers, ChevronLeft, ChevronRight } from 'lucide-vue-next';

import { InputGroup, InputGroupAddon, InputGroupButton, InputGroupInput, InputGroupText, InputGroupTextarea } from "@/components/ui/input-group";

import { Check, ChevronsUpDown, Search } from "lucide-vue-next"
import { ref } from "vue"

import { Combobox, ComboboxAnchor, ComboboxEmpty, ComboboxGroup, ComboboxInput, ComboboxItem, ComboboxItemIndicator, ComboboxList, ComboboxTrigger } from "@/components/ui/combobox"
import classrooms from '@/routes/classrooms';
import { ToggleGroup, ToggleGroupItem } from '@/components/ui/toggle-group'

const frameworks = [
    { value: "1", label: "1" },
    { value: "2", label: "2" },
    { value: "3", label: "3" },
    { value: "4", label: "4" },
    { value: "5", label: "5" },
    { value: "6", label: "6" },


]

interface Filter {
    id: number;
    name: string
}

const filters: Filter[] = [
    { id: 1, name: 'Todas' },
    { id: 2, name: 'Laboral' },
    { id: 3, name: 'Pós-Laboral' },
    { id: 4, name: 'Fechadas' }
]

const me = (item: string) => {
    // alert(item);
}

const filter = ref(filters ? filters.at(0)?.name : '')
const handleToggleGroup = (value: any) => {
    if (value) filter.value = value
}

const value = ref<typeof frameworks[0]>()


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
        <div class="flex h-full flex-1 px-6 flex-col gap-4  rounded-xl p-4 md:px-6 lg:px-4">

            <Breadcrumb>
                <BreadcrumbList>
                    <BreadcrumbItem1>
                        <BreadcrumbLink :href="dashboard().url">
                            Início
                        </BreadcrumbLink>
                    </BreadcrumbItem1>
                    <BreadcrumbSeparator />

                    <BreadcrumbItem1>
                        <BreadcrumbPage>Perdidos e Achados</BreadcrumbPage>
                    </BreadcrumbItem1>
                </BreadcrumbList>
            </Breadcrumb>


            <InputGroup>
                <InputGroupInput id="#" placeholder="Descrição, departamento, sala, turno, data..." class="text-sm" />
                <InputGroupAddon>
                    <Search />
                </InputGroupAddon>
                <InputGroupAddon align="inline-end">
                    12 resultados
                </InputGroupAddon>
            </InputGroup>

            <section>
                <div class="py-4">
                </div>
                <section>
                    <div class="flex justify-between gap-2 pb-2">

                        <section>
                            <ToggleGroup type="single" :model-value="filter" @update:model-value="handleToggleGroup"
                                class="grid grid-cols-3 gap-2 md:grid-cols-4 lg:grid-cols-4">
                                <ToggleGroupItem v-for="filter in filters" :key="filter.id" :value="filter.name"
                                    @click="me(filter.name)"
                                    class="data-[state=on]:bg-[#04724D] data-[state=on]:text-white data-[state=on]:border-[#04724D] px-3 py-3 max-h-6 text-xs hover:bg-[#048B5F] hover:text-white transition-none border border-gray-700 hover:border-[#048B5F] text-gray-700 cursor-pointer rounded-full">
                                    {{ filter.name }}
                                </ToggleGroupItem>
                            </ToggleGroup>
                        </section>

                    </div>
                </section>

                <div class="py-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">

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

                </div>
            </section>


            <section class="flex items-center justify-between py-4">
                <div class="text-sm text-slate-500 grid md:grid-cols-2 md:gap-1 lg:grid-cols-2 lg:gap-1">
                    <p>Mostrando</p>
                    <p><b>1-4</b> de 45</p>
                </div>
                <div class="flex space-x-1">
                    <button
                        class="ease min-h-10 min-w-10 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
                        <ChevronLeft width="16" />
                    </button>
                    <button
                        class="ease min-h-10 min-w-10 rounded border border-[#038043] bg-[#038043] px-3 py-1 text-sm font-normal text-white transition duration-200 hover:border-[#1fad68] hover:bg-[#1fad68]">
                        1
                    </button>
                    <button
                        class="ease min-h-10 min-w-10 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
                        2
                    </button>
                    <button
                        class="ease min-h-10 min-w-10 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
                        3
                    </button>
                    <button
                        class="ease min-h-10 min-w-10 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
                        <ChevronRight width="16" />
                    </button>
                </div>
            </section>

        </div>
    </AppLayout>
</template>
