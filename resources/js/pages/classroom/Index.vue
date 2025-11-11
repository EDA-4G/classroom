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

import { BadgeCheckIcon, ChevronRightIcon, Info, BookmarkIcon } from "lucide-vue-next"
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
    alert('toggle me!')
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

            <section>
                <p class="text-lg font-semibold">Estruturas de Dados e Algoritmos</p>
                <p class="text-sm text-gray-400">Engenharia Informatica Pos-Laboral, 2 Ano</p>
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
