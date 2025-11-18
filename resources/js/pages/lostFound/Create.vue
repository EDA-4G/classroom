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

import {
    Field,
    FieldContent,
    FieldDescription,
    FieldGroup,
    FieldLabel,
    FieldSet,
    FieldTitle,
} from '@/components/ui/field'
import {
    RadioGroup,
    RadioGroupItem,
} from '@/components/ui/radio-group'

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
                        <BreadcrumbLink :href="dashboard().url">
                            Sala
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
                <!-- Stepper -->
                <div data-stepper="" class="w-full">
                    <!-- Stepper Nav -->
                    <ul class="relative flex flex-row gap-x-2">
                        <li class="group flex flex-1 shrink basis-0 items-center gap-x-2"
                            data-stepper-nav-item='{ "index": 1 }'>
                            <span class="min-h-7.5 min-w-7.5 inline-flex items-center align-middle text-sm">
                                <span
                                    class="stepper-active:text-bg-primary stepper-active:shadow-sm shadow-base-300/20 stepper-success:text-bg-primary stepper-success:shadow-sm stepper-completed:text-bg-success text-bg-soft-neutral flex size-7.5 shrink-0 items-center justify-center rounded-full font-medium">
                                    <span class="stepper-success:hidden stepper-completed:hidden">1</span>
                                    <span
                                        class="icon-[tabler--check] stepper-success:block hidden size-4 shrink-0"></span>
                                </span>
                                <span class="text-base-content ms-2 max-sm:hidden">Step</span>
                            </span>
                            <div
                                class="stepper-success:bg-primary stepper-completed:bg-success bg-neutral/20 h-px w-full flex-1 group-last:hidden">
                            </div>
                        </li>
                        <li class="group flex flex-1 shrink basis-0 items-center gap-x-2"
                            data-stepper-nav-item='{ "index": 2 }'>
                            <span class="min-h-7.5 min-w-7.5 inline-flex items-center align-middle text-sm">
                                <span
                                    class="stepper-active:text-bg-primary stepper-active:shadow-sm shadow-base-300/20 stepper-success:text-bg-primary stepper-success:shadow-sm stepper-completed:text-bg-success stepper-error:text-bg-error text-bg-soft-neutral flex size-7.5 shrink-0 items-center justify-center rounded-full font-medium">
                                    <span class="stepper-success:hidden stepper-completed:hidden">2</span>
                                    <span
                                        class="icon-[tabler--check] stepper-success:block hidden size-4 shrink-0"></span>
                                </span>
                                <span class="text-base-content ms-2 max-sm:hidden">Step</span>
                            </span>
                            <div
                                class="stepper-success:bg-primary stepper-completed:bg-success bg-neutral/20 h-px w-full flex-1 group-last:hidden">
                            </div>
                        </li>
                        <li class="group flex flex-1 shrink basis-0 items-center gap-x-2"
                            data-stepper-nav-item='{ "index": 3 }'>
                            <span class="min-h-7.5 min-w-7.5 inline-flex items-center align-middle text-sm">
                                <span
                                    class="stepper-active:text-bg-primary stepper-active:shadow-sm shadow-base-300/20 stepper-success:text-bg-primary stepper-success:shadow-sm stepper-completed:text-bg-success stepper-error:text-bg-error text-bg-soft-neutral flex size-7.5 shrink-0 items-center justify-center rounded-full font-medium">
                                    <span class="stepper-success:hidden stepper-completed:hidden">3</span>
                                    <span
                                        class="icon-[tabler--check] stepper-success:block hidden size-4 shrink-0"></span>
                                </span>
                                <span class="text-base-content ms-2 max-sm:hidden">Step</span>
                            </span>
                            <div
                                class="stepper-success:bg-primary stepper-completed:bg-success bg-neutral/20 h-px w-full flex-1 group-last:hidden">
                            </div>
                        </li>
                        <!-- End Item -->
                    </ul>
                    <!-- End Stepper Nav -->

                    <!-- Stepper Content -->
                    <div class="mt-5 sm:mt-8">
                        <!-- First Content -->
                        <div data-stepper-content-item='{ "index": 1 }'>
                            <div
                                class="border-base-content/40 bg-base-200/50 flex h-48 items-center justify-center rounded-xl border border-dashed p-4">
                                <h3 class="text-base-content/50 text-2xl">First content</h3>
                            </div>
                        </div>
                        <!-- End First Content -->
                        <!-- Second Content -->
                        <div data-stepper-content-item='{ "index": 2 }' style="display: none;">
                            <div
                                class="border-base-content/40 bg-base-200/50 flex h-48 items-center justify-center rounded-xl border border-dashed p-4">
                                <h3 class="text-base-content/50 text-2xl">Second content</h3>
                            </div>
                        </div>
                        <!-- End Second Content -->
                        <!-- Third Content -->
                        <div data-stepper-content-item='{ "index": 3 }' style="display: none;">
                            <div
                                class="border-base-content/40 bg-base-200/50 flex h-48 items-center justify-center rounded-xl border border-dashed p-4">
                                <h3 class="text-base-content/50 text-2xl">Third content</h3>
                            </div>
                        </div>
                        <!-- End Third Content -->
                        <!-- Final Content -->
                        <div data-stepper-content-item='{ "isFinal": true }' style="display: none;">
                            <div
                                class="border-base-content/40 bg-base-200/50 flex h-48 items-center justify-center rounded-xl border border-dashed p-4">
                                <h3 class="text-base-content/50 text-2xl">Final content</h3>
                            </div>
                        </div>
                        <!-- End Final Content -->
                        <!-- Button Group -->
                        <div class="mt-5 flex items-center justify-between gap-x-2">
                            <button type="button" class="btn btn-primary" data-stepper-back-btn="">
                                <span class="icon-[tabler--chevron-left] text-primary-content rtl:rotate-180"></span>
                                Back
                            </button>
                            <button type="button" class="btn btn-primary" data-stepper-next-btn="">
                                Next
                                <span class="icon-[tabler--chevron-right] text-primary-content rtl:rotate-180"></span>
                            </button>
                            <button type="button" class="btn btn-primary" data-stepper-finish-btn=""
                                style="display: none;"> Finish </button>
                            <button type="reset" class="btn btn-primary" data-stepper-reset-btn=""
                                style="display: none;"> Reset </button>
                        </div>
                        <!-- End Button Group -->
                    </div>
                    <!-- End Stepper Content -->
                </div>
                <!-- End Stepper -->
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
