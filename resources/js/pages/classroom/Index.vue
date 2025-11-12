<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

import {
    Breadcrumb,
    BreadcrumbItem as BreadcrumbItem1,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb";

import { BadgeCheckIcon, ChevronRightIcon, Info, BookmarkIcon, User, Pen, Radio, Album, Folder } from "lucide-vue-next"
import { Button } from "@/components/ui/button"
import {
    Item,
    ItemActions,
    ItemContent,
    ItemDescription,
    ItemMedia,
    ItemTitle,
} from "@/components/ui/item"

import departments from '@/routes/departments';
import { ToggleGroup, ToggleGroupItem } from '@/components/ui/toggle-group'

const toggleMe = () => {
    // alert('toggle me!')
}


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
</script>

<template>

    <Head title="Sala de Aulas" />

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
                        <BreadcrumbLink :href="departments.index().url">
                            Departamentos
                        </BreadcrumbLink>
                    </BreadcrumbItem1>
                    <BreadcrumbSeparator />

                    <BreadcrumbItem1>
                        <BreadcrumbPage>Sala</BreadcrumbPage>
                    </BreadcrumbItem1>
                </BreadcrumbList>
            </Breadcrumb>

            <section class="grid lg:grid-cols-2 gap-4">
                <section>
                    <p class="text-xl font-semibold">Estruturas de Dados e Algorítmos</p>
                    <p class="text-sm text-gray-400">Engenharia Informática Pós-Laboral, 2º Ano</p>
                </section>

                <section class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                    <div
                        class="flex flex-wrap items-center justify-start sm:grid-cols-2 md:justify-start lg:justify-end col-span-2 font-medium gap-1 cursor-text">
                        <p class="max-h-9 border rounded-md p-2 text-sm flex items-center gap-1">
                            <Album class="size-4" />
                        <p>Sala 202</p>
                        </p>
                        <p class="max-h-9 border rounded-md p-2 text-sm flex items-center gap-1">
                            <Radio class="size-4" />
                            00:00:00
                        </p>
                        <p class="max-h-9 border rounded-md p-2 text-sm flex items-center gap-1">
                            <User class="size-4" />
                            20
                        </p>
                        <button class="max-h-9 border rounded-md p-2 text-sm flex items-center gap-1">
                            <Folder class="size-4" />
                            Repositório
                        </button>
                    </div>
                    <!-- <div class="flex items-center bg-red-500">
                        <p class="max-h-9 border rounded-md p-2 text-sm">
                            Repositorio
                        </p>
                    </div> -->
                    <!-- <button class="border rounded-md">Repositorio</button> -->

                    <ToggleGroup type="multiple" class="flex justify-end col-start-3 items-start lg:items-center">
                        <!-- <button class="border rounded-md h-full max-h-9 px-2">Repositorio</button> -->
                        <ToggleGroupItem @click="toggleMe" value="b"
                            class="border cursor-pointer data-[state=on]:bg-transparent data-[state=on]:border-[#0e976a] data-[state=on]:*:[svg]:fill-[#0e976a] data-[state=on]:*:[svg]:stroke-[#0e976a]">
                            <Pen />
                            Assinar
                        </ToggleGroupItem>
                        <ToggleGroupItem value="c"
                            class="border cursor-pointer data-[state=on]:bg-transparent data-[state=on]:border-[#0e976a] data-[state=on]:*:[svg]:fill-[#0e976a] data-[state=on]:*:[svg]:stroke-[#0e976a]">
                            <BookmarkIcon />
                            Fixar
                        </ToggleGroupItem>
                    </ToggleGroup>
                </section>
            </section>

            <!-- grid-cols-2 lg:grid-cols-4 -->
            <section class="h-110 p-0 grid gap-1 rounded-xl lg:h-140">
                <section class="relative h-full bg-[#1E3D33] grid place-items-center border border-black rounded-xl">
                    <div class="relative flex h-20 w-20">
                        <span :class="true ? 'animate-ping' : ''"
                            class="absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span
                            class="relative inline-flex rounded-full h-20 w-20 bg-red-500 justify-center items-center">
                            <User class="text-white" />
                        </span>
                    </div>
                    <section class="absolute w-40 h-full right-0 rounded-xl lg:w-60">
                        <div class="w-full h-full flex flex-col gap-4 p-4 rounded-xl">
                            <section
                                class="relative grid h-40 place-items-center bg-[#274F42] border border-[#366D5C] rounded-xl">
                                <div class="relative flex h-10 w-10">
                                    <span
                                        class="absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span
                                        class="relative inline-flex rounded-full h-10 w-10 bg-red-500 justify-center items-center">
                                        <User class="text-white" />
                                    </span>
                                </div>
                                <p
                                    class="absolute left-2 bottom-2 w-fit px-2 py-1 bg-black text-white text-[0.65rem] rounded-lg">
                                    António Matsinhe</p>
                            </section>
                           


                        </div>
                    </section>
                    <p class="absolute left-2 bottom-2 w-fit px-2 py-1.5 bg-black text-white text-xs rounded-lg">
                        António Matsinhe (Docente)</p>
                </section>

            </section>

            <section class="grid lg:grid-cols-2 gap-4">
                <section class="grid place-items-center border border-gray-500 h-100 rounded-lg">
                    00:00:00
                </section>
                <section>
                    <div class="grid gap-2">
                        <Item variant="outline" size="sm" as-child>
                            <a href="#">
                                <ItemMedia>
                                    <!-- <BadgeCheckIcon class="size-5" /> -->
                                    <Info class="size-5" />
                                </ItemMedia>
                                <ItemContent>
                                    <ItemTitle>Director/a do departamento</ItemTitle>
                                </ItemContent>
                                <ItemActions>
                                    <ChevronRightIcon class="size-4" />
                                </ItemActions>
                            </a>
                        </Item>
                        <Item variant="outline" size="sm" as-child>
                            <a href="#">
                                <ItemMedia>
                                    <BadgeCheckIcon class="size-5" />
                                    <!-- <Info class="size-5"/> -->
                                </ItemMedia>
                                <ItemContent>
                                    <ItemTitle>Director/a do curso</ItemTitle>
                                </ItemContent>
                                <ItemActions>
                                    <ChevronRightIcon class="size-4" />
                                </ItemActions>
                            </a>
                        </Item>
                    </div>

                    <section>
                        <ToggleGroup type="single">
                            <ToggleGroupItem @click="toggleMe" value="a" class="hover:bg-red-500">
                                A
                            </ToggleGroupItem>
                            <ToggleGroupItem value="b">
                                B
                            </ToggleGroupItem>
                            <ToggleGroupItem value="c"
                                class="data-[state=on]:bg-transparent data-[state=on]:*:[svg]:fill-blue-500 data-[state=on]:*:[svg]:stroke-blue-500">
                                <BookmarkIcon />
                            </ToggleGroupItem>
                        </ToggleGroup>
                    </section>


                    B
                    Directora do departamento
                    Directora do curso
                    Nome do docente
                    Disciplina em aula
                    Fixar Sala
                    Mostrar hora de inicio/ fim
                    Mostrar duracao da aula
                    Repositorio da Sala(Publicar trabalhos)
                    Estudantes acompanhando a Aula
                    Gerar lista de presenca e estudante marcar presenca
                    Publicar algum achado na sala

                    Testes 1/2, exames, recorrencia
                    Links Importantes whatsapp
                    <button>Voltar</button>

                    <div>
                        Aulas programadas
                    </div>
                    <div>
                        Ficheiros(Aula, Exercicios)
                    </div>
                    <div>
                        <audio controls preload="auto">
                            <source src="audio-file.mp3" type="audio/mpeg" />

                            <!-- fallback for browsers that don't support mp3 -->
                            <source src="audio-file.ogg" type="audio/ogg" />

                            <!-- fallback for browsers that don't support audio element -->
                            <a href="audio-file.mp3">download audio</a>
                        </audio>
                    </div>
                    <div>
                        <video controls width="640" height="480" poster="initial-image.png" autoplay muted>
                            <source src="video-file.mp4" type="video/mp4" />

                            <!-- fallback for browsers that don't support mp4 -->
                            <source src="video-file.webm" type="video/webm" />

                            <!-- specifying subtitle files -->
                            <track src="subtitles_en.vtt" kind="subtitles" srclang="en" label="English" />
                            <track src="subtitles_no.vtt" kind="subtitles" srclang="no" label="Norwegian" />

                            <!-- fallback for browsers that don't support video element -->
                            <a href="video-file.mp4">download video</a>
                        </video>
                    </div>
                </section>
            </section>

        </div>
    </AppLayout>
</template>
