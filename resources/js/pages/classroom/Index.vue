<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link as Linka } from '@inertiajs/vue3';

import {
    Breadcrumb,
    BreadcrumbItem as BreadcrumbItem1,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb";

import {
    LayoutGrid, BadgeCheckIcon, ChevronRightIcon, Info, BookmarkIcon, User, Pen,
    Radio, Album, Folder, ShieldAlertIcon, ExternalLinkIcon, Link,
    FileDown, CloudUpload, Play, UserRound, Key, MessageCircle, ChevronLeft, ChevronRight
} from "lucide-vue-next"
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
            <section class="flex gap-2 justify-between">
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
                <span
                    class="px-2 py-1 border bg-[#274f42] border-[#274f42] text-white text-xs font-semibold rounded-full">P</span>
            </section>
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
                            <!-- <Folder class="size-4" />MessageCircleMore -->
                            <MessageCircle class="size-4" />
                            Notificação
                            <!-- Repositório -->
                        </button>
                    </div>


                    <ToggleGroup type="multiple" class="flex justify-end col-start-3 items-start lg:items-center">
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
                <!-- <section class="grid place-items-center border border-gray-500 h-100 rounded-lg">
                    00:00:00

                    Estudantes na Aula
                    Audios
                    Videos
                    Aulas Programadas 4 aulas
                </section> -->
                <section>
                    <section class="py-2">
                        <p class="text-md font-semibold">Estudantes (23)</p>
                    </section>
                    <section class="grid grid-cols-4 gap-2 h-fit">
                        <div class="">
                            <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=600"
                                alt="User Image" class="object-cover rounded-xl">
                            <h3 class="text-sm text-center font-medium text-slate-700 mt-2">António Matsinhe</h3>
                        </div>
                        <div class="">
                            <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=600"
                                alt="User Image" class=" object-cover rounded-xl">
                            <h3 class="text-sm text-center font-medium text-slate-700 mt-2">António Matsinhe</h3>
                        </div>
                        <div class="">
                            <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=600"
                                alt="User Image" class=" object-cover rounded-xl">
                            <h3 class="text-sm text-center font-medium text-slate-700 mt-2">António Matsinhe</h3>
                        </div>
                        <div class="">
                            <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=600"
                                alt="User Image" class=" object-cover rounded-xl">
                            <h3 class="text-sm text-center font-medium text-slate-700 mt-2">António Matsinhe</h3>
                        </div>
                        <div class="">
                            <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=600"
                                alt="User Image" class=" object-cover rounded-xl">
                            <h3 class="text-sm text-center font-medium text-slate-700 mt-2">António Matsinhe</h3>
                        </div>
                    </section>
                    <!-- <section class="pt-4">
                        <p class="text-md font-semibold">Links Importantes (23)</p>
                    </section> -->

                </section>
                <section>
                    <div class="py-4">
                        <p class="pb-2 text-md font-semibold">Acções</p>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="border py-6 rounded-lg text-sm">
                                <FileDown class="w-full size-5" />
                                Presenças
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <CloudUpload class="w-full size-5" />
                                Publicar Achado
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <Folder class="w-full size-5" />
                                Repositório
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <!-- <Play class="w-full size-5" /> -->
                                <span class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24"
                                        fill="currentColor" stroke="currentColor">
                                        <path
                                            d="M187.2 100.9C174.8 94.1 159.8 94.4 147.6 101.6C135.4 108.8 128 121.9 128 136L128 504C128 518.1 135.5 531.2 147.6 538.4C159.7 545.6 174.8 545.9 187.2 539.1L523.2 355.1C536 348.1 544 334.6 544 320C544 305.4 536 291.9 523.2 284.9L187.2 100.9z" />
                                    </svg>
                                </span>
                                Iniciar Aula
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <!-- <UserRound class="w-full size-5" /> -->
                                <span class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24"
                                        fill="currentColor" stroke="currentColor">
                                        <path
                                            d="M192 144C222.9 144 248 118.9 248 88C248 57.1 222.9 32 192 32C161.1 32 136 57.1 136 88C136 118.9 161.1 144 192 144zM176 576L176 416C176 407.2 183.2 400 192 400C200.8 400 208 407.2 208 416L208 576C208 593.7 222.3 608 240 608C257.7 608 272 593.7 272 576L272 240L400 240C417.7 240 432 225.7 432 208C432 190.3 417.7 176 400 176L384 176L384 128L576 128L576 320L384 320L384 288L320 288L320 336C320 362.5 341.5 384 368 384L592 384C618.5 384 640 362.5 640 336L640 112C640 85.5 618.5 64 592 64L368 64C341.5 64 320 85.5 320 112L320 176L197.3 176C151.7 176 108.8 197.6 81.7 234.2L14.3 324.9C3.8 339.1 6.7 359.1 20.9 369.7C35.1 380.3 55.1 377.3 65.7 363.1L112 300.7L112 576C112 593.7 126.3 608 144 608C161.7 608 176 593.7 176 576z" />
                                    </svg>
                                </span>
                                Na Sala
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <!-- <Album class="w-full size-5" /> -->
                                <span class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24"
                                        fill="currentColor" stroke="currentColor">
                                        <path
                                            d="M102.8 57.3C108.2 51.9 116.6 51.1 123 55.3L241.9 134.5C250.8 140.4 256.1 150.4 256.1 161.1L256.1 210.7L346.9 301.5C380.2 286.5 420.8 292.6 448.1 320L574.2 446.1C592.9 464.8 592.9 495.2 574.2 514L514.1 574.1C495.4 592.8 465 592.8 446.2 574.1L320.1 448C292.7 420.6 286.6 380.1 301.6 346.8L210.8 256L161.2 256C150.5 256 140.5 250.7 134.6 241.8L55.4 122.9C51.2 116.6 52 108.1 57.4 102.7L102.8 57.3zM247.8 360.8C241.5 397.7 250.1 436.7 274 468L179.1 563C151 591.1 105.4 591.1 77.3 563C49.2 534.9 49.2 489.3 77.3 461.2L212.7 325.7L247.9 360.8zM416.1 64C436.2 64 455.5 67.7 473.2 74.5C483.2 78.3 485 91 477.5 98.6L420.8 155.3C417.8 158.3 416.1 162.4 416.1 166.6L416.1 208C416.1 216.8 423.3 224 432.1 224L473.5 224C477.7 224 481.8 222.3 484.8 219.3L541.5 162.6C549.1 155.1 561.8 156.9 565.6 166.9C572.4 184.6 576.1 203.9 576.1 224C576.1 267.2 558.9 306.3 531.1 335.1L482 286C448.9 253 403.5 240.3 360.9 247.6L304.1 190.8L304.1 161.1L303.9 156.1C303.1 143.7 299.5 131.8 293.4 121.2C322.8 86.2 366.8 64 416.1 63.9z" />
                                    </svg>
                                </span>

                                Em Obras
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <span class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24"
                                        fill="currentColor" stroke="currentColor">
                                        <path
                                            d="M598.6 118.6C611.1 106.1 611.1 85.8 598.6 73.3C586.1 60.8 565.8 60.8 553.3 73.3L361.3 265.3L326.6 230.6C322.4 226.4 316.6 224 310.6 224C298.1 224 288 234.1 288 246.6L288 275.7L396.3 384L425.4 384C437.9 384 448 373.9 448 361.4C448 355.4 445.6 349.6 441.4 345.4L406.7 310.7L598.7 118.7zM373.1 417.4L254.6 298.9C211.9 295.2 169.4 310.6 138.8 341.2L130.8 349.2C108.5 371.5 96 401.7 96 433.2C96 440 103.1 444.4 109.2 441.4L160.3 415.9C165.3 413.4 169.8 420 165.7 423.8L39.3 537.4C34.7 541.6 32 547.6 32 553.9C32 566.1 41.9 576 54.1 576L227.4 576C266.2 576 303.3 560.6 330.8 533.2C361.4 502.6 376.7 460.1 373.1 417.4z" />
                                    </svg>
                                </span>

                                Limpeza
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <span class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24"
                                        fill="currentColor" stroke="currentColor">
                                        <path
                                            d="M400 416C497.2 416 576 337.2 576 240C576 142.8 497.2 64 400 64C302.8 64 224 142.8 224 240C224 258.7 226.9 276.8 232.3 293.7L71 455C66.5 459.5 64 465.6 64 472L64 552C64 565.3 74.7 576 88 576L168 576C181.3 576 192 565.3 192 552L192 512L232 512C245.3 512 256 501.3 256 488L256 448L296 448C302.4 448 308.5 445.5 313 441L346.3 407.7C363.2 413.1 381.3 416 400 416zM440 160C462.1 160 480 177.9 480 200C480 222.1 462.1 240 440 240C417.9 240 400 222.1 400 200C400 177.9 417.9 160 440 160z" />
                                    </svg>
                                </span>

                                Destrancar
                            </button>
                        </div>
                    </div>
                    <div class="py-4">
                        <p class="pb-2 text-md font-semibold">Executivo</p>
                        <div class="grid gap-2">
                            <Item variant="outline" size="sm" as-child>
                                <a href="#">
                                    <ItemMedia>
                                        <!-- <BadgeCheckIcon class="size-5" /> -->
                                        <Info class="size-5" />
                                    </ItemMedia>
                                    <ItemContent>
                                        <ItemTitle>Director/a da Faculdade</ItemTitle>
                                    </ItemContent>
                                    <ItemActions>
                                        <ChevronRightIcon class="size-4" />
                                    </ItemActions>
                                </a>
                            </Item>
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
                                        <!-- <BadgeCheckIcon class="size-5" /> -->
                                        <Info class="size-5" />
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
                    </div>

                    <div class="py-4">
                        <p class="pb-2 text-md font-semibold">Fixados</p>

                        <section class="grid gap-2">
                            <div class="flex w-full flex-col gap-6">
                                <Item variant="outline">
                                    <ItemMedia variant="icon">
                                        <ShieldAlertIcon />
                                    </ItemMedia>
                                    <ItemContent>
                                        <ItemTitle>Teste 1</ItemTitle>
                                        <ItemDescription>
                                            Monday, 23 April 2025
                                        </ItemDescription>
                                    </ItemContent>
                                    <ItemActions>
                                        <Button size="sm" variant="outline" class="hover:cursor-pointer">
                                            Conteúdos
                                        </Button>
                                    </ItemActions>
                                </Item>
                            </div>
                            <div class="flex w-full flex-col gap-6">
                                <Item variant="outline">
                                    <ItemMedia variant="icon">
                                        <ShieldAlertIcon />
                                    </ItemMedia>
                                    <ItemContent>
                                        <ItemTitle>Teste 2</ItemTitle>
                                        <ItemDescription>
                                            Monday, 23 April 2025
                                        </ItemDescription>
                                    </ItemContent>
                                    <ItemActions>
                                        <Button size="sm" variant="outline" class="hover:cursor-pointer">
                                            Conteúdos
                                        </Button>
                                    </ItemActions>
                                </Item>
                            </div>
                            <div class="flex w-full flex-col gap-6">
                                <Item variant="outline">
                                    <ItemMedia variant="icon">
                                        <ShieldAlertIcon />
                                    </ItemMedia>
                                    <ItemContent>
                                        <ItemTitle>Exame Normal</ItemTitle>
                                        <ItemDescription>
                                            Monday, 23 April 2025
                                        </ItemDescription>
                                    </ItemContent>
                                    <ItemActions>
                                        <Button size="sm" variant="outline" class="hover:cursor-pointer">
                                            Conteúdos
                                        </Button>
                                    </ItemActions>
                                </Item>
                            </div>
                            <div class="flex w-full flex-col gap-6">
                                <Item variant="outline">
                                    <ItemMedia variant="icon">
                                        <ShieldAlertIcon />
                                    </ItemMedia>
                                    <ItemContent>
                                        <ItemTitle>Exame de Recorrência</ItemTitle>
                                        <ItemDescription>
                                            Monday, 23 April 2025
                                        </ItemDescription>
                                    </ItemContent>
                                    <ItemActions>
                                        <Button size="sm" variant="outline" class="hover:cursor-pointer">
                                            Conteúdos
                                        </Button>
                                    </ItemActions>
                                </Item>
                            </div>

                        </section>

                        <!-- Fixados
                        Teste 1 Segunda, 12 outubro 2020
                        Teste 2 Segunda, 12 outubro 2020
                        Defesa Trabalho Segunda, 12 outubro 2020
                        Exame Normal Segunda, 12 outubro 2020
                        Recorrencia Segunda, 12 outubro 2020

                        Whatsap Grupo da cadeira -->
                    </div>

                    <section class="py-4">
                        <p class="pb-2 text-md font-semibold">Achados e Perdidos</p>
                        <section class="grid grid-cols-2 lg:grid-cols-3 gap-2">
                            <!-- Product Card 2 - Red -->
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
                                            alt="Apple Watch Silver Aluminium"
                                            class="mb-6 h-40 w-full object-contain" />
                                        <h3 class="text-sm font-medium text-gray-900 dark:text-foreground">Apple
                                            Watch Red Aluminium
                                        </h3>
                                    </a>

                                    <!-- Badges -->
                                    <div class="mt-3 flex justify-center gap-2">
                                        <span
                                            class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Watch</span>
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
                                            alt="Apple Watch Silver Aluminium"
                                            class="mb-6 h-40 w-full object-contain" />
                                        <h3 class="text-sm font-medium text-gray-900 dark:text-foreground">Apple
                                            Watch Red Aluminium
                                        </h3>
                                    </a>

                                    <!-- Badges -->
                                    <div class="mt-3 flex justify-center gap-2">
                                        <span
                                            class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Watch</span>
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
                                            alt="Apple Watch Silver Aluminium"
                                            class="mb-6 h-40 w-full object-contain" />
                                        <h3 class="text-sm font-medium text-gray-900 dark:text-foreground">Apple
                                            Watch Red Aluminium
                                        </h3>
                                    </a>

                                    <!-- Badges -->
                                    <div class="mt-3 flex justify-center gap-2">
                                        <span
                                            class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Watch</span>
                                        <span
                                            class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">Apple</span>
                                    </div>
                                </div>
                            </div>
                        </section>
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

                    <!-- <div>
                        Links isto para repositorio
                        Whatsap Grupo da cadeira
                        Albert Lui Fisica I (Livro)
                        Albert Lui Fisica I (Audio)
                        Albert Lui Fisica I (Video)
                    </div>

                    <div>
                        <p class="pb-2 text-md font-semibold">Perdidos e Achados</p>
                        Perdidos e Achados
                    </div> -->

                    <!-- 
                    B
                    Directora do departamento
                    Directora do curso
                    Nome do docente
                    Disciplina em aula
                    Fixar Sala -->


                    <!-- Mostrar hora de inicio/ fim
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
                    </div> -->

                </section>
            </section>

        </div>
    </AppLayout>
</template>
