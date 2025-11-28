<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

import {
    Breadcrumb,
    BreadcrumbItem as BreadcrumbItem1,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb";

import {
    ChevronRightIcon, Info, BookmarkIcon, User, Pen,
    Radio, Album, Folder, ShieldAlertIcon,
    FileDown, CloudUpload, MessageCircle, ChevronLeft, ChevronRight
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
import files from '@/routes/files';
import { ToggleGroup, ToggleGroupItem } from '@/components/ui/toggle-group';
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
import posts from '@/routes/posts';

function toggleMe() {
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
                            <Link :href="posts.create().url" class="border py-6 rounded-lg text-center text-sm">
                            <CloudUpload class="w-full size-5" />
                            Publicar Achado
                            </Link>
                            <Link :href="files.index().url" class="border py-6 rounded-lg text-center text-sm">
                            <Folder class="w-full size-5" />
                            Repositório
                            </Link>
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
                                Notificar
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

                                Inspecção
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <span class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24"
                                        fill="currentColor" stroke="currentColor">
                                        <path
                                            d="M474.6 188.1C495.3 203.7 520.6 218.8 548.8 222.6C561.9 224.4 574 215.1 575.8 202C577.6 188.9 568.3 176.8 555.2 175C539.3 172.9 522 163.7 503.5 149.8C465.1 120.8 413 120.8 374.5 149.8C350.5 167.9 333.8 176.1 320 176.1C306.2 176.1 289.5 167.9 265.5 149.8C227.1 120.8 175 120.8 136.5 149.8C118 163.7 100.7 172.9 84.8 175C71.7 176.8 62.4 188.8 64.2 202C66 215.2 78 224.4 91.2 222.6C119.4 218.8 144.8 203.7 165.4 188.1C186.7 172 215.3 172 236.6 188.1C260.8 206.4 288.9 224 320 224C351.1 224 379.1 206.3 403.4 188.1C424.7 172 453.3 172 474.6 188.1zM474.6 332.1C495.3 347.7 520.6 362.8 548.8 366.6C561.9 368.4 574 359.1 575.8 346C577.6 332.9 568.3 320.8 555.2 319C539.3 316.9 522 307.7 503.5 293.8C465.1 264.8 413 264.8 374.5 293.8C350.5 311.9 333.8 320.1 320 320.1C306.2 320.1 289.5 311.9 265.5 293.8C227.1 264.8 175 264.8 136.5 293.8C118 307.7 100.7 316.9 84.8 319C71.7 320.7 62.4 332.8 64.2 346C66 359.2 78 368.4 91.2 366.6C119.4 362.8 144.8 347.7 165.4 332.1C186.7 316 215.3 316 236.6 332.1C260.8 350.4 288.9 368 320 368C351.1 368 379.1 350.3 403.4 332.1C424.7 316 453.3 316 474.6 332.1zM403.4 476.1C424.7 460 453.3 460 474.6 476.1C495.3 491.7 520.6 506.8 548.8 510.6C561.9 512.4 574 503.1 575.8 490C577.6 476.9 568.3 464.8 555.2 463C539.3 460.9 522 451.7 503.5 437.8C465.1 408.8 413 408.8 374.5 437.8C350.5 455.9 333.8 464.1 320 464.1C306.2 464.1 289.5 455.9 265.5 437.8C227.1 408.8 175 408.8 136.5 437.8C118 451.7 100.7 460.9 84.8 463C71.7 464.8 62.4 476.8 64.2 490C66 503.2 78 512.4 91.2 510.6C119.4 506.8 144.8 491.7 165.4 476.1C186.7 460 215.3 460 236.6 476.1C260.8 494.4 288.9 512 320 512C351.1 512 379.1 494.3 403.4 476.1z" />
                                    </svg>
                                </span>

                                Lavar Chão
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
                            <button class="border py-6 rounded-lg text-sm">
                                <span class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24"
                                        fill="currentColor" stroke="currentColor">
                                        <path
                                            d="M472.8 64C445.4 64 419.2 74.9 399.8 94.2L382.1 112L369 98.9C340.9 70.8 295.3 70.8 267.2 98.9L167 199C157.6 208.4 157.6 223.6 167 232.9C176.4 242.2 191.6 242.3 200.9 232.9L301.1 132.9C310.5 123.5 325.7 123.5 335 132.9L348.1 145.9L248 246.1L393.9 392L545.8 240.2C565.2 220.8 576 194.6 576 167.2C576 110.2 529.8 64 472.8 64zM166.4 327.7C116.5 377.6 83.1 441.7 70.9 511.2L64.4 547.8C63 555.6 65.5 563.4 71 569C76.5 574.6 84.4 577 92.1 575.7L128.8 569.2C198.3 556.9 262.4 523.6 312.3 473.7L360 425.9L214.1 280L166.4 327.7z" />
                                    </svg>
                                </span>

                                Avaliação
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <span class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24"
                                        fill="currentColor" stroke="currentColor">
                                        <path
                                            d="M539.3 64.1C549.2 63.3 558.9 67.1 565.9 74.1C572.9 81.1 576.7 90.8 575.9 100.7C571.9 150 558.5 226.9 529.6 300.4C527.8 304.9 524.1 308.3 519.4 309.7L438.5 334C434.6 335.2 432 338.7 432 342.8C432 347.9 436.1 352 441.2 352L479.8 352C491.8 352 499.5 364.8 493.3 375.1C489.3 381.8 485 388.3 480.6 394.7C478.6 397.6 475.6 399.7 472.2 400.8L374.5 430C370.6 431.2 368 434.7 368 438.8C368 443.9 372.1 448 377.2 448L393.2 448C407.8 448 414.2 465.4 402 473.4C334 518.4 264.3 516.7 219.6 504.7C206.9 501.3 195.6 494.8 185.2 486.8L112 560C103.2 568.8 88.8 568.8 80 560C71.2 551.2 71.2 536.8 80 528L160 448L160.5 448.5C161.2 447.2 162.1 446 163.2 444.9L320 288C328.8 279.2 328.8 264.8 320 256C311.2 247.2 296.8 247.2 288 256L153.7 390.2C144.8 399.1 129.7 394.6 128.7 382C124.4 328.8 138 258.9 201.3 195.6C292.4 104.5 455.5 70.9 539.2 64.1z" />
                                    </svg>
                                </span>

                                Exame
                            </button>
                            <button class="border py-6 rounded-lg text-sm">
                                <span class="w-full flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24"
                                        fill="currentColor" stroke="currentColor">
                                        <path
                                            d="M320 128C302.3 128 288 142.3 288 160C288 177.7 302.3 192 320 192C337.7 192 352 177.7 352 160C352 142.3 337.7 128 320 128zM224 160C224 107 267 64 320 64C373 64 416 107 416 160C416 201.8 389.3 237.4 352 250.5L352 508.4C414.9 494.1 462.2 438.7 463.9 371.9L447.8 386C437.8 394.7 422.7 393.7 413.9 383.7C405.1 373.7 406.2 358.6 416.2 349.8L480.2 293.8C489.2 285.9 502.8 285.9 511.8 293.8L575.8 349.8C585.8 358.5 586.8 373.7 578.1 383.7C569.4 393.7 554.2 394.7 544.2 386L528 371.9C525.9 485 433.6 576 320 576C206.4 576 114.1 485 112 371.9L95.8 386.1C85.8 394.8 70.7 393.8 61.9 383.8C53.1 373.8 54.2 358.7 64.2 349.9L128.2 293.9C137.2 286 150.8 286 159.8 293.9L223.8 349.9C233.8 358.6 234.8 373.8 226.1 383.8C217.4 393.8 202.2 394.8 192.2 386.1L176.1 372C177.9 438.8 225.2 494.2 288 508.5L288 250.6C250.7 237.4 224 201.9 224 160.1z" />
                                    </svg>
                                </span>

                                Reservar
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



                            <Sheet>
                                <SheetTrigger as-child>

                                    <Item variant="outline" size="sm" as-child>
                                        <a class="cursor-pointer">
                                            <ItemMedia>
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

                                </SheetTrigger>
                                <SheetContent>
                                    <SheetHeader>
                                        <SheetTitle class="text-lg">Executivo</SheetTitle>
                                        <SheetDescription>
                                            Faculdade de Engenharia
                                        </SheetDescription>
                                    </SheetHeader>
                                    <div class="grid gap-4 px-4">
                                        <section>
                                            <div class="group flex flex-col items-center text-sm bg-white transition">
                                                <img class="w-40 rounded-full"
                                                    src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=200"
                                                    alt="userImage1">
                                                <h2 class="text-lg font-medium mt-2">
                                                    Donald Jackman</h2>
                                                <p class="text-gray-500">Director/a do Curso</p>
                                            </div>

                                            <div class="grid gap-2 mt-2">
                                                <div
                                                    class="flex w-full items-center justify-center gap-2 px-4 py-2 border border-gray-200 rounded-md">
                                                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.5 2.5c0-.825-.675-1.5-1.5-1.5H3c-.825 0-1.5.675-1.5 1.5m15 0v9c0 .825-.675 1.5-1.5 1.5H3c-.825 0-1.5-.675-1.5-1.5v-9m15 0L9 7.75 1.5 2.5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <p class="text-sm">maria.luiza@uem.ac.mz</p>
                                                </div>
                                                <div
                                                    class="flex w-full items-center justify-center gap-2  px-4 py-2 border border-gray-200 rounded-md">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.29 3.75a3.75 3.75 0 0 1 2.962 2.963M11.289.75a6.75 6.75 0 0 1 5.963 5.955m-.75 5.985v2.25a1.5 1.5 0 0 1-1.635 1.5 14.84 14.84 0 0 1-6.472-2.303 14.6 14.6 0 0 1-4.5-4.5 14.84 14.84 0 0 1-2.303-6.502A1.5 1.5 0 0 1 3.085 1.5h2.25a1.5 1.5 0 0 1 1.5 1.29 9.6 9.6 0 0 0 .525 2.108 1.5 1.5 0 0 1-.338 1.582l-.952.952a12 12 0 0 0 4.5 4.5l.952-.952a1.5 1.5 0 0 1 1.582-.338c.681.254 1.388.43 2.108.526a1.5 1.5 0 0 1 1.29 1.522"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <p class="text-sm">+258 84 567 7788</p>
                                                </div>
                                            </div>
                                        </section>


                                    </div>
                                    <SheetFooter>
                                        <SheetClose as-child>
                                            <button type="submit"
                                                class="p-2 text-sm font-medium rounded-md border border-[#D0E7DC]  text-[#038043] hover:bg-[#F5FFFA] cursor-pointer">Cancelar</button>
                                        </SheetClose>
                                    </SheetFooter>
                                </SheetContent>
                            </Sheet>



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

                                        <div>
                                            <Sheet>
                                                <SheetTrigger as-child>

                                                    <Button size="sm" variant="outline" class="hover:cursor-pointer">
                                                        Conteúdos
                                                    </Button>

                                                </SheetTrigger>
                                                <SheetContent>
                                                    <SheetHeader>
                                                        <SheetTitle class="text-lg">Conteúdos</SheetTitle>
                                                        <SheetDescription>
                                                            Tópicos a serem avaliados.
                                                        </SheetDescription>
                                                    </SheetHeader>
                                                    <div class="px-4">
                                                        <section class="grid gap-2">
                                                            <Item variant="outline" as-child>
                                                                <a>
                                                                    <ItemContent>
                                                                        <ItemTitle>External resource</ItemTitle>
                                                                    </ItemContent>
                                                                </a>
                                                            </Item>
                                                            <Item variant="outline" as-child>
                                                                <a>
                                                                    <ItemContent>
                                                                        <ItemTitle>External resource</ItemTitle>
                                                                    </ItemContent>
                                                                </a>
                                                            </Item>
                                                            <Item variant="outline" as-child>
                                                                <a>
                                                                    <ItemContent>
                                                                        <ItemTitle>External resource</ItemTitle>
                                                                    </ItemContent>
                                                                </a>
                                                            </Item>
                                                            <Item variant="outline" as-child>
                                                                <a>
                                                                    <ItemContent>
                                                                        <ItemTitle>External resource</ItemTitle>
                                                                    </ItemContent>
                                                                </a>
                                                            </Item>

                                                            <!-- <Item variant="outline" size="sm" asChild>
                                                                <a>
                                                                    <ItemMedia>
                                                                        <CircleCheck className="size-4" />
                                                                    </ItemMedia>
                                                                    <ItemContent>
                                                                        <ItemTitle>External resource
                                                                        </ItemTitle>
                                                                    </ItemContent>
                                                                </a>
                                                            </Item> -->
                                                        </section>
                                                    </div>
                                                    <SheetFooter>
                                                        <button type="submit"
                                                            class="p-2 text-sm rounded-md border border-[#038043] bg-[#038043] text-white hover:bg-[#1fad68] cursor-pointer">Exportar
                                                            PDF</button>
                                                        <SheetClose as-child>
                                                            <button type="submit"
                                                                class="p-2 text-sm rounded-md border border-[#038043]  text-[#038043] hover:text-[#1fad68] cursor-pointer">Cancelar</button>
                                                        </SheetClose>
                                                    </SheetFooter>
                                                </SheetContent>
                                            </Sheet>
                                        </div>

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
                        <section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-2">
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
                                            alt="Apple Watch Silver Aluminium"
                                            class="mb-6 h-40 w-full object-contain" />
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
                                            alt="Apple Watch Silver Aluminium"
                                            class="mb-6 h-40 w-full object-contain" />
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
