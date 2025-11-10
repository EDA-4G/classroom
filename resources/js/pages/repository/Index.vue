<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Search } from "lucide-vue-next"

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
        <div class="flex h-full flex-1 flex-col gap-4  rounded-xl p-2 px-6 lg:px-4">
            <Breadcrumb>
                <BreadcrumbList>
                    <BreadcrumbItem1>
                        <BreadcrumbLink href="/">
                            Início
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
                <Sheet>
                    <SheetTrigger as-child>

                        <Item variant="outline" size="sm" as-child class="text-[#0f5734] border-[#0F5734]">
                            <a href="#">
                                <ItemMedia>
                                    <BellRing class="size-5" />
                                </ItemMedia>
                                <ItemContent>
                                    <ItemTitle>Receba notificação das publicações no email.</ItemTitle>
                                </ItemContent>
                                <ItemActions>
                                    <ChevronRightIcon class="size-4" />
                                </ItemActions>
                            </a>
                        </Item>

                    </SheetTrigger>
                    <SheetContent>
                        <SheetHeader>
                            <SheetTitle class="text-lg">Inscrição</SheetTitle>
                            <SheetDescription>
                                Faça as alterações da sua inscrição aqui e clique em <span class="font-semibold">Salvar
                                    Alterações</span> quando terminar.
                            </SheetDescription>
                        </SheetHeader>
                        <div class="grid gap-4 p-4">
                            <div class="grid items-center gap-4">
                                <Label for="name" class="text-right">
                                    Estudante
                                </Label>
                                <Input id="student-email" placeholder="Ex: nome.apelido@uem.ac.mz" class="col-span-3" />
                            </div>
                            <div class="grid items-center gap-4">
                                <Label for="name" class="text-right">
                                    Email
                                </Label>
                                <Input id="personal-email" placeholder="Ex: eda.grupo4@gmail.com" class="col-span-3" />
                            </div>
                            <div class="inline-flex gap-2">
                                <div class="relative inline-block w-11 h-5">
                                    <input id="switch-component-desc" type="checkbox"
                                        class="peer appearance-none w-11 h-5 bg-slate-100 rounded-full checked:bg-[#024625] cursor-pointer transition-colors duration-300" />
                                    <label for="switch-component-desc"
                                        class="absolute top-0 left-0 w-5 h-5 bg-white rounded-full border border-slate-300 shadow-sm transition-transform duration-300 peer-checked:translate-x-6 peer-checked:border-slate-800 cursor-pointer">
                                    </label>
                                </div>

                                <label for="switch-component-desc" class="text-slate-600 text-sm cursor-pointer">
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
                                    class="p-2 text-sm rounded-md border border-[#038043] bg-[#038043] text-white hover:bg-[#1fad68] cursor-pointer">Salvar
                                    Alterações</button>
                            </SheetClose>
                            <SheetClose as-child>
                                <button type="submit"
                                    class="p-2 text-sm rounded-md border border-[#038043]  text-[#038043] hover:text-[#1fad68] cursor-pointer">Cancelar</button>
                            </SheetClose>
                        </SheetFooter>
                    </SheetContent>
                </Sheet>
            </section>

            <section>
                <div class="py-2">
                    <p class="text-sm">Recentes</p>
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
                    <p class="text-sm">Todos documentos</p>
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
