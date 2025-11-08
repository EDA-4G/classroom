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

import { BadgeCheckIcon, ChevronRightIcon } from "lucide-vue-next"
import { Button } from "@/components/ui/button"
import {
    Item,
    ItemActions,
    ItemContent,
    ItemDescription,
    ItemMedia,
    ItemTitle,
} from "@/components/ui/item"

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
]

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
        <div class="flex h-full flex-1 flex-col gap-4  rounded-xl p-2 px-4">
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
                <InputGroupInput id="#" placeholder="Departamento, sala..." />
                <InputGroupAddon>
                    <Search />
                </InputGroupAddon>
                <InputGroupAddon align="inline-end">
                    12 resultados
                </InputGroupAddon>
            </InputGroup>

            <section>
                <div class="grid gap-2">
                    <Item variant="outline">
                        <ItemContent>
                            <ItemTitle>Basic Item</ItemTitle>
                            <ItemDescription>
                                A simple item with title and description.
                            </ItemDescription>
                        </ItemContent>
                        <ItemActions>
                            <Button variant="outline" size="sm">
                                Action
                            </Button>
                            <Button variant="outline" size="sm">
                                Action
                            </Button>
                        </ItemActions>
                    </Item>
                    <Item variant="outline" size="sm" as-child>
                        <a href="#">
                            <ItemMedia>
                                <BadgeCheckIcon class="size-5" />
                            </ItemMedia>
                            <ItemContent>
                                <ItemTitle>Your profile has been verified.</ItemTitle>
                            </ItemContent>
                            <ItemActions>
                                <ChevronRightIcon class="size-4" />
                            </ItemActions>
                        </a>
                    </Item>
                </div>

            </section>

            <section>
                <div class="">
                    <ItemGroup class="grid gap-4">
                        <Item v-for="song in music" :key="song.title" variant="outline" as-child role="listitem">
                            <a href="#">
                                <ItemMedia variant="image">
                                    <img :src="`https://avatar.vercel.sh/${song.title}`" :alt="song.title" width="32"
                                        height="32" class="object-cover grayscale">
                                </ItemMedia>
                                <ItemContent>
                                    <ItemTitle class="line-clamp-1">
                                        {{ song.title }} - <span class="text-muted-foreground">{{ song.album }}</span>
                                    </ItemTitle>
                                    <!-- {{ song.artist }} -->
                                    <ItemDescription> 22 Feb 2025, 12:45</ItemDescription>
                                </ItemContent>
                                <ItemContent class="flex-none text-center">
                                    <ItemDescription>{{ song.duration }}</ItemDescription>
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
