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

import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select'
import { ToggleGroup, ToggleGroupItem } from '@/components/ui/toggle-group'

import { Label } from "@/components/ui/label"
import {
    Sheet,
    SheetClose,
    SheetContent,
    SheetDescription,
    SheetFooter,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from "@/components/ui/sheet"

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
    { id: 3, name: 'Pós-Laboral' }
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
                <div class="py-2">
                </div>
                <section class="grid grid-cols-2 gap-2">
                    <div class="flex justify-between gap-2">

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
                    <div class="flex flex-col items-end lg:flex-row lg:justify-end gap-2">

                        <section class="relative flex items-center">
                            <select
                                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-[#A1B2AD] rounded-lg pl-3 pr-8 py-1 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-[#04724D] appearance-none cursor-pointer">
                                <option value="brazil" class="">Todos departamentos</option>
                                <option value="brazil">Brazil</option>
                                <option value="bucharest">Bucharest</option>
                                <option value="london">London</option>
                                <option value="washington">Washington</option>
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                                stroke="currentColor" class="h-4 w-4 ml-1 absolute top-2 right-2.5 text-slate-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                            </svg>
                        </section>

                        <section class="relative flex items-center">
                            <select
                                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-[#A1B2AD] rounded-lg pl-3 pr-8 py-1 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-[#04724D] appearance-none cursor-pointer">
                                <option value="brazil" class="">Todos cursos</option>
                                <option value="brazil" class="">Eng. Mecanica</option>
                                <option value="bucharest">Bucharest</option>
                                <option value="london">London</option>
                                <option value="washington">Washington</option>
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                                stroke="currentColor" class="h-4 w-4 ml-1 absolute top-2 right-2.5 text-slate-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                            </svg>
                        </section>

                    </div>
                </section>

                <div class="py-4">
                    <div class="pb-2">
                        <h2 class="font-semibold text-lg text-heading">Encontre o teu bem perdido.</h2>
                    </div>

                    <section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                        <div
                            class="bg-neutral-primary-soft block max-w-sm p-4 lg:p-6 border border-gray-200 hover:border-gray-300 rounded-base shadow-xs rounded-lg">
                            <a href="#" class="w-full">
                                <img class="rounded-base w-full h-30 lg:h-60 object-cover rounded-lg"
                                    src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="" width="120px" />
                            </a>
                            <a href="#">
                                <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">
                                    Streamlining
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
                                <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">
                                    Streamlining
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
                                <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">
                                    Streamlining
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
                                <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">
                                    Streamlining
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








                        <Sheet>
                            <SheetTrigger as-child>


                                <button
                                    class="bg-neutral-primary-soft text-left cursor-pointer block max-w-sm p-4 lg:p-6 border border-gray-200 hover:border-gray-300 rounded-base shadow-xs rounded-lg">
                                    <p href="#" class="w-full">
                                        <img class="rounded-base w-full h-30 lg:h-60 object-cover rounded-lg"
                                            src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            alt="" width="120px" />
                                    </p>
                                    <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">
                                        Streamlining
                                        your
                                        design process today.</h5>
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
                                </button>


                            </SheetTrigger>
                            <SheetContent>
                                <SheetHeader>
                                    <SheetTitle class="text-xl">Streamlining your design process today.</SheetTitle>
                                    <SheetDescription>
                                        Faça as alterações da sua inscrição aqui e clique em Salvar
                                        Alterações quando terminar.
                                    </SheetDescription>
                                </SheetHeader>
                                <div class="grid gap-4 p-4">
                                    <div class="grid items-center gap-4">
                                        <Label for="name" class="text-right">
                                            Estudante
                                        </Label>
                                        <Input id="student-email" placeholder="Ex: nome.apelido@uem.ac.mz"
                                            class="col-span-3" />
                                    </div>
                                    <div class="grid items-center gap-4">
                                        <Label for="name" class="text-right">
                                            Email
                                        </Label>
                                        <Input id="personal-email" placeholder="Ex: eda.grupo4@gmail.com"
                                            class="col-span-3" />
                                    </div>
                                    <div class="inline-flex gap-2">
                                        <div class="relative inline-block w-11 h-5">
                                            <input id="switch-component-desc" type="checkbox"
                                                class="peer appearance-none w-11 h-5 bg-slate-100 rounded-full checked:bg-[#024625] cursor-pointer transition-colors duration-300" />
                                            <label for="switch-component-desc"
                                                class="absolute top-0 left-0 w-5 h-5 bg-white rounded-full border border-slate-300 shadow-sm transition-transform duration-300 peer-checked:translate-x-6 peer-checked:border-slate-800 cursor-pointer">
                                            </label>
                                        </div>

                                        <label for="switch-component-desc"
                                            class="text-slate-600 text-sm cursor-pointer">
                                            <div>
                                                <p class="font-medium">
                                                    Habilitar a Inscrição
                                                </p>
                                                <p class="text-slate-500">
                                                    Poderá habilitar e desabilitar o estado da sua inscrição.
                                                </p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <SheetFooter>
                                    <SheetClose as-child>
                                        <button type="submit"
                                            class="p-2 text-sm rounded-md border border-[#038043] bg-[#038043] text-white hover:bg-[#1fad68] cursor-pointer">Recuperar</button>
                                    </SheetClose>
                                    <SheetClose as-child>
                                        <button type="submit"
                                            class="p-2 text-sm rounded-md border border-[#038043]  text-[#038043] hover:text-[#1fad68] cursor-pointer">Cancelar</button>
                                    </SheetClose>
                                </SheetFooter>
                            </SheetContent>
                        </Sheet>


                    </section>

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
