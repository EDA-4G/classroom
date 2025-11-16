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
import { Waypoints, Layers, ChevronLeft, ChevronRight, GraduationCap } from 'lucide-vue-next';

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
                <section class="grid grid-cols-2 gap-2">
                    <div class="flex justify-between gap-2 pb-2">

                        <section>
                            <ToggleGroup type="single" :model-value="filter" @update:model-value="handleToggleGroup"
                                class="flex gap-2 flex-wrap justify-start">
                                <ToggleGroupItem v-for="filter in filters" :key="filter.id" :value="filter.name"
                                    @click="me(filter.name)"
                                    class="w-fit data-[state=on]:bg-[#04724D] data-[state=on]:text-white data-[state=on]:border-[#04724D] px-3 py-3 max-h-6 text-xs hover:bg-[#048B5F] hover:text-white transition-none border border-gray-700 hover:border-[#048B5F] text-gray-700 cursor-pointer rounded-full">
                                    {{ filter.name }}
                                </ToggleGroupItem>
                            </ToggleGroup>
                        </section>

                    </div>
                    <div class="flex lg:justify-end">


                    </div>
                </section>

                <div class="py-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">

                    <div
                        class="bg-neutral-primary-soft block max-w-sm p-4 lg:p-6 border border-gray-200 hover:border-gray-300 rounded-base shadow-xs rounded-lg">
                        <a href="#" class="w-full">
                            <img class="rounded-base w-full h-30 lg:h-60 object-cover rounded-lg"
                                src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" width="120px" />
                        </a>
                        <a href="#">
                            <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">Streamlining
                                your
                                design process today.</h5>
                        </a>
                        <p class="text-xs">22 Jun 2025</p>

                        <div class="grid lg:grid-cols-2 items-center">
                            <div>
                                <p class="mt-4">— Maria</p>
                                <p class="text-sm font-medium text-green-700">
                                    Eng. Química</p>
                            </div>

                            <div class="h-fit mt-3 flex lg:justify-end gap-2">
                                <span
                                    class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Relógio</span>
                                <span
                                    class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Apple</span>
                            </div>
                        </div>

                    </div>
                    <div
                        class="bg-neutral-primary-soft block max-w-sm p-4 lg:p-6 border border-gray-200 hover:border-gray-300 rounded-base shadow-xs rounded-lg">
                        <a href="#" class="w-full">
                            <img class="rounded-base w-full h-30 lg:h-60 object-cover rounded-lg"
                                src="https://images.unsplash.com/photo-1541807084-5c52b6b3adef?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" width="120px" />
                        </a>
                        <a href="#">
                            <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">Streamlining
                                your
                                design process today.</h5>
                        </a>
                        <p class="text-xs">22 Jun 2025</p>

                        <div class="grid lg:grid-cols-2 items-center">
                            <div>
                                <p class="mt-4">— Maria</p>
                                <p class="text-sm font-medium text-green-700">
                                    Eng. Química</p>
                            </div>

                            <div class="h-fit mt-3 flex lg:justify-end gap-2">
                                <span
                                    class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Relógio</span>
                                <span
                                    class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Apple</span>
                            </div>
                        </div>

                    </div>
                    <div
                        class="bg-neutral-primary-soft block max-w-sm p-4 lg:p-6 border border-gray-200 hover:border-gray-300 rounded-base shadow-xs rounded-lg">
                        <a href="#" class="w-full">
                            <img class="rounded-base w-full h-30 lg:h-60 object-cover rounded-lg"
                                src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" width="120px" />
                        </a>
                        <a href="#">
                            <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">Streamlining
                                your
                                design process today.</h5>
                        </a>
                        <p class="text-xs">22 Jun 2025</p>

                        <div class="grid lg:grid-cols-2 items-center">
                            <div>
                                <p class="mt-4">— Maria</p>
                                <p class="text-sm font-medium text-green-700">
                                    Eng. Química</p>
                            </div>

                            <div class="h-fit mt-3 flex lg:justify-end gap-2">
                                <span
                                    class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Relógio</span>
                                <span
                                    class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Apple</span>
                            </div>
                        </div>

                    </div>
                    <div
                        class="bg-neutral-primary-soft block max-w-sm p-4 lg:p-6 border border-gray-200 hover:border-gray-300 rounded-base shadow-xs rounded-lg">
                        <a href="#" class="w-full">
                            <img class="rounded-base w-full h-30 lg:h-60 object-cover rounded-lg"
                                src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" width="120px" />
                        </a>
                        <a href="#">
                            <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">Streamlining
                                your
                                design process today.</h5>
                        </a>
                        <p class="text-xs">22 Jun 2025</p>

                        <div class="grid lg:grid-cols-2 items-center">
                            <div>
                                <p class="mt-4">— Maria</p>
                                <p class="text-sm font-medium text-green-700">
                                    Eng. Química</p>
                            </div>

                            <div class="h-fit mt-3 flex lg:justify-end gap-2">
                                <span
                                    class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Relógio</span>
                                <span
                                    class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Apple</span>
                            </div>
                        </div>

                    </div>







                    <div
                        class="bg-neutral-primary-soft block max-w-sm p-4 lg:p-6 border border-gray-200 hover:border-gray-300 rounded-base shadow-xs rounded-lg">
                        <a href="#" class="w-full">
                            <img class="rounded-base w-full h-30 lg:h-60 object-cover rounded-lg"
                                src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" width="120px" />
                        </a>
                        <a href="#">
                            <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">Streamlining
                                your
                                design process today.</h5>
                        </a>
                        <p class="text-xs">22 Jun 2025</p>

                        <div class="grid lg:grid-cols-2 items-center">
                            <div>
                                <p class="mt-4">— Maria</p>
                                <p class="text-sm font-medium text-green-700">
                                    Eng. Química</p>
                            </div>

                            <div class="h-fit mt-3 flex lg:justify-end gap-2">
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
                <div class="text-sm text-slate-700 grid md:grid-cols-2 md:gap-1 lg:grid-cols-2 lg:gap-1">
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
