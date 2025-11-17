<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Search, ChevronLeft, ChevronRight } from "lucide-vue-next"

import {
    Breadcrumb,
    BreadcrumbItem as BreadcrumbItem1,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb";

import { InputGroup, InputGroupAddon, InputGroupInput } from "@/components/ui/input-group";

import { ChevronRightIcon, BellRing } from "lucide-vue-next"
import {
    Item,
    ItemActions,
    ItemContent,
    ItemDescription,
    ItemMedia,
    ItemTitle,
} from "@/components/ui/item"
import Xlsx from '@/components/aux/extension/Xlsx.vue';

const music = [
    {
        title: "Midnight City Lights",
        artist: "Neon Dreams",
        album: "Electric Nights",
        duration: "3:45",
    },
    {
        title: "Coffee Shop Conversations",
        artist: "The Morning Brew",
        album: "Urban Stories",
        duration: "4:05",
    },
    {
        title: "Digital Rain",
        artist: "Cyber Symphony",
        album: "Binary Beats",
        duration: "3:30",
    },
    {
        title: "Digital Rain",
        artist: "Cyber Symphony",
        album: "Binary Beats",
        duration: "3:30",
    },
    {
        title: "Digital Rain",
        artist: "Cyber Symphony",
        album: "Binary Beats",
        duration: "3:30",
    },
]


import { Input } from "@/components/ui/input"
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
import classrooms from '@/routes/classrooms';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
</script>

<template>

    <Head title="Repositório" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4  rounded-xl p-4 px-6 lg:px-4">
            <Breadcrumb>
                <BreadcrumbList>
                    <BreadcrumbItem1>
                        <BreadcrumbLink :href="dashboard().url">
                            Início
                        </BreadcrumbLink>
                    </BreadcrumbItem1>
                    <BreadcrumbSeparator />

                    <BreadcrumbItem1>
                        <BreadcrumbLink :href="classrooms.index().url">
                            Sala
                        </BreadcrumbLink>
                    </BreadcrumbItem1>
                    <BreadcrumbSeparator />

                    <BreadcrumbItem1>
                        <BreadcrumbPage>Repositório</BreadcrumbPage>
                    </BreadcrumbItem1>
                </BreadcrumbList>
            </Breadcrumb>


            <InputGroup>
                <InputGroupInput id="#" placeholder="Documento..." class="text-sm" />
                <InputGroupAddon>
                    <Search />
                </InputGroupAddon>
                <InputGroupAddon align="inline-end">
                    12 resultados
                </InputGroupAddon>
            </InputGroup>

            <section>
                <div class="py-2">
                    <p class="text-md font-bold">Recentes</p>
                </div>
                <div class="">
                    <ItemGroup class="grid lg:grid-cols-2 gap-4">
                        <Item v-for="song in music" :key="song.title" variant="outline" as-child role="listitem">
                            <a href="#" download>
                                <ItemMedia variant="image">
                                    <Xlsx />
                                </ItemMedia>
                                <ItemContent>
                                    <ItemTitle class="line-clamp-1">
                                        {{ song.title }}.extension
                                    </ItemTitle>
                                    <ItemDescription class="text-xs">Sun 22 Feb 2025, 12:45</ItemDescription>
                                </ItemContent>
                            </a>
                        </Item>
                    </ItemGroup>
                </div>
            </section>
            <section>
                <div class="py-2">
                    <p class="text-md font-bold">Todos documentos</p>
                </div>
                <div class="">
                    <ItemGroup class="grid lg:grid-cols-2 gap-4">
                        <Item v-for="song in music" :key="song.title" variant="outline" as-child role="listitem">
                            <a href="#" download>
                                <ItemMedia variant="image">
                                    <Xlsx />
                                </ItemMedia>
                                <ItemContent>
                                    <ItemTitle class="line-clamp-1">
                                        {{ song.title }}.extension
                                    </ItemTitle>
                                    <ItemDescription class="text-xs"> 22 Feb 2025, 12:45</ItemDescription>
                                </ItemContent>
                            </a>
                        </Item>
                    </ItemGroup>
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
