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
} from "@/components/ui/breadcrumb"
import { Button } from '@/components/ui/button';
import { Layers, ChevronLeft, ChevronRight } from 'lucide-vue-next';
import { InputGroup, InputGroupAddon, InputGroupInput } from "@/components/ui/input-group";
import { Search } from "lucide-vue-next"
import { ref } from "vue"
import { Combobox, ComboboxAnchor, ComboboxEmpty, ComboboxGroup, ComboboxInput, ComboboxItem, ComboboxList, ComboboxTrigger } from "@/components/ui/combobox"
import classrooms from '@/routes/classrooms';
import { ToggleGroup, ToggleGroupItem } from '@/components/ui/toggle-group'
import Pagination from '@/components/aux/Pagination.vue';
import { ClassroomStatus, TypeOfRoomEnum } from '@/interfaces';

defineProps({
    dps: {
        type: Object,
        required: true
    }
})

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
    { id: 2, name: 'Em Aulas' },
    { id: 3, name: 'Abertas' },
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
                        <BreadcrumbPage>Departamentos</BreadcrumbPage>
                    </BreadcrumbItem1>
                </BreadcrumbList>
            </Breadcrumb>


            <InputGroup>
                <InputGroupInput id="#" placeholder="Departamento, sala, disciplina..." class="text-sm" />
                <InputGroupAddon>
                    <Search />
                </InputGroupAddon>
                <InputGroupAddon align="inline-end">
                    12 resultados
                </InputGroupAddon>
            </InputGroup>
            <section v-for="dp in dps.data" :key="dp.id">
                <div class="py-4">
                    <p class="text-2xl font-bold">{{ dp.description }}</p>
                    <p class="text-sm text-gray-400">Encontrados <span class="font-semibold">{{ dp.classrooms.length
                            }}</span>
                        salas e <span class="font-semibold">{{ dp.classrooms.length }}</span> wc's</p>
                </div>
                <section>
                    <div class="flex justify-between gap-2 pb-2">
                        <Combobox v-model="value" by="label" class="order-3">
                            <ComboboxAnchor as-child class="max-w-23 hover:bg-[#1fad7e] hover:border-[#1fad7e]">
                                <ComboboxTrigger as-child>
                                    <Button
                                        class="flex max-h-6 items-center font-semibold order-2 gap-2 text-sm bg-[#0e976a] text-white border border-[#0e976a] px-2 cursor-pointer rounded-lg">
                                        <Layers width="16" />
                                        <p>Nível</p>
                                        <p>0</p>
                                    </Button>
                                </ComboboxTrigger>
                            </ComboboxAnchor>

                            <ComboboxList class="max-w-23">
                                <div class="relative w-full max-w-sm items-center">
                                    <ComboboxInput
                                        class="pl-9 focus-visible:ring-0 border-0 border-b rounded-none h-10" />
                                    <span class="absolute start-0 inset-y-0 flex items-center justify-center px-3">
                                        <Search class="size-4 text-muted-foreground" />
                                    </span>
                                </div>

                                <ComboboxEmpty class="italic">
                                    Nenhum <br>nível encontrado.
                                </ComboboxEmpty>

                                <ComboboxGroup>
                                    <ComboboxItem v-for="framework in frameworks" :key="framework.value"
                                        :value="framework">
                                        {{ framework.label }}
                                    </ComboboxItem>
                                </ComboboxGroup>
                            </ComboboxList>
                        </Combobox>


                        <section>
                            <ToggleGroup type="single" :model-value="filter" @update:model-value="handleToggleGroup"
                                class="grid grid-cols-3 gap-2 md:grid-cols-4 lg:grid-cols-4">
                                <ToggleGroupItem v-for="filter in filters" :key="filter.id" :value="filter.name"
                                    @click="me(filter.name)"
                                    class="data-[state=on]:bg-[#04724D] data-[state=on]:text-white data-[state=on]:border-[#04724D] px-3 py-3 max-h-6 text-xs hover:bg-[#048B5F] hover:text-white transition-none border border-gray-700 hover:border-[#048B5F] text-gray-700 cursor-pointer rounded-full">
                                    {{ filter.name }}
                                </ToggleGroupItem>
                            </ToggleGroup>
                        </section>

                    </div>
                </section>

                <section class="py-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                    <Link v-for="room in dp.classrooms" :key="room.id" :href="classrooms.index().url"
                        :class="room.status !== ClassroomStatus.None && room.status !== null ? 'cursor-pointer' : ''"
                        class="group relative h-46 h-46 cursor-not-allowed overflow-hidden rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl">

                    <img v-if="room.cover" :src="'/storage/'.concat(room.cover)" :alt="room.description"
                        :class="room.status !== ClassroomStatus.None && room.status !== null ? '' : 'grayscale'"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    <img v-else src="https://placehold.co/600x400?text=S/I" alt="sem imagem"
                        :class="room.status !== ClassroomStatus.None && room.status !== null ? '' : 'grayscale'"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />


                    <div :class="dps.is_active ? 'bg-black/30' : ''" class="absolute inset-0 bg-gray-800/60"></div>

                    <section class="absolute top-2 left-2 flex items-center gap-2">
                        <!-- absolute top-2 left-2  -->
                        <!-- Aberto -->
                        <div v-if="room.status === ClassroomStatus.Unlock"
                            class="flex items-center justify-center w-7 h-7 rounded-full bg-emerald-600/90 shadow-sm border border-white/20 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7a4 4 0 1 1 8 0v4" />
                                <rect x="4" y="11" width="16" height="10" rx="2" ry="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>

                        <!-- Fechado -->
                        <div v-if="room.status === ClassroomStatus.None || room.status === null"
                            class="flex items-center justify-center w-7 h-7 rounded-full bg-red-800/95 shadow-md border border-white/20 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 10V8a6 6 0 1 1 12 0v2M5 10h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2z" />
                            </svg>
                        </div>

                        <!-- Manutencao -->
                        <div v-if="room.status === ClassroomStatus.Maintenance"
                            class="flex items-center justify-center w-7 h-7 rounded-full bg-[#1E85C9] shadow-md border border-white/20 backdrop-blur-sm">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 text-white/90"
                                fill="currentColor" stroke="currentColor">
                                <path
                                    d="M102.8 57.3C108.2 51.9 116.6 51.1 123 55.3L241.9 134.5C250.8 140.4 256.1 150.4 256.1 161.1L256.1 210.7L346.9 301.5C380.2 286.5 420.8 292.6 448.1 320L574.2 446.1C592.9 464.8 592.9 495.2 574.2 514L514.1 574.1C495.4 592.8 465 592.8 446.2 574.1L320.1 448C292.7 420.6 286.6 380.1 301.6 346.8L210.8 256L161.2 256C150.5 256 140.5 250.7 134.6 241.8L55.4 122.9C51.2 116.6 52 108.1 57.4 102.7L102.8 57.3zM247.8 360.8C241.5 397.7 250.1 436.7 274 468L179.1 563C151 591.1 105.4 591.1 77.3 563C49.2 534.9 49.2 489.3 77.3 461.2L212.7 325.7L247.9 360.8zM416.1 64C436.2 64 455.5 67.7 473.2 74.5C483.2 78.3 485 91 477.5 98.6L420.8 155.3C417.8 158.3 416.1 162.4 416.1 166.6L416.1 208C416.1 216.8 423.3 224 432.1 224L473.5 224C477.7 224 481.8 222.3 484.8 219.3L541.5 162.6C549.1 155.1 561.8 156.9 565.6 166.9C572.4 184.6 576.1 203.9 576.1 224C576.1 267.2 558.9 306.3 531.1 335.1L482 286C448.9 253 403.5 240.3 360.9 247.6L304.1 190.8L304.1 161.1L303.9 156.1C303.1 143.7 299.5 131.8 293.4 121.2C322.8 86.2 366.8 64 416.1 63.9z" />
                            </svg>
                        </div>

                        <!-- Lavar o chão -->
                        <div v-if="room.status === ClassroomStatus.To_wash"
                            class="flex items-center justify-center w-7 h-7 rounded-full bg-[#C9871E] shadow-md border border-white/20 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-4 h-4 text-white/90"
                                fill="currentColor" stroke="currentColor">
                                <path
                                    d="M474.6 188.1C495.3 203.7 520.6 218.8 548.8 222.6C561.9 224.4 574 215.1 575.8 202C577.6 188.9 568.3 176.8 555.2 175C539.3 172.9 522 163.7 503.5 149.8C465.1 120.8 413 120.8 374.5 149.8C350.5 167.9 333.8 176.1 320 176.1C306.2 176.1 289.5 167.9 265.5 149.8C227.1 120.8 175 120.8 136.5 149.8C118 163.7 100.7 172.9 84.8 175C71.7 176.8 62.4 188.8 64.2 202C66 215.2 78 224.4 91.2 222.6C119.4 218.8 144.8 203.7 165.4 188.1C186.7 172 215.3 172 236.6 188.1C260.8 206.4 288.9 224 320 224C351.1 224 379.1 206.3 403.4 188.1C424.7 172 453.3 172 474.6 188.1zM474.6 332.1C495.3 347.7 520.6 362.8 548.8 366.6C561.9 368.4 574 359.1 575.8 346C577.6 332.9 568.3 320.8 555.2 319C539.3 316.9 522 307.7 503.5 293.8C465.1 264.8 413 264.8 374.5 293.8C350.5 311.9 333.8 320.1 320 320.1C306.2 320.1 289.5 311.9 265.5 293.8C227.1 264.8 175 264.8 136.5 293.8C118 307.7 100.7 316.9 84.8 319C71.7 320.7 62.4 332.8 64.2 346C66 359.2 78 368.4 91.2 366.6C119.4 362.8 144.8 347.7 165.4 332.1C186.7 316 215.3 316 236.6 332.1C260.8 350.4 288.9 368 320 368C351.1 368 379.1 350.3 403.4 332.1C424.7 316 453.3 316 474.6 332.1zM403.4 476.1C424.7 460 453.3 460 474.6 476.1C495.3 491.7 520.6 506.8 548.8 510.6C561.9 512.4 574 503.1 575.8 490C577.6 476.9 568.3 464.8 555.2 463C539.3 460.9 522 451.7 503.5 437.8C465.1 408.8 413 408.8 374.5 437.8C350.5 455.9 333.8 464.1 320 464.1C306.2 464.1 289.5 455.9 265.5 437.8C227.1 408.8 175 408.8 136.5 437.8C118 451.7 100.7 460.9 84.8 463C71.7 464.8 62.4 476.8 64.2 490C66 503.2 78 512.4 91.2 510.6C119.4 506.8 144.8 491.7 165.4 476.1C186.7 460 215.3 460 236.6 476.1C260.8 494.4 288.9 512 320 512C351.1 512 379.1 494.3 403.4 476.1z" />
                            </svg>
                        </div>

                        <!-- Camadas:Número do andares -->
                        <div
                            class="flex items-center gap-1.5 px-2 py-1 rounded-full bg-emerald-600/90 shadow-sm border border-white/20 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3L2 9l10 6 10-6-10-6z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2 15l10 6 10-6" />
                            </svg>
                            <span class="text-sm font-semibold text-white/90 leading-none">{{ room.level }}</span>
                        </div>
                    </section>

                    <section>
                        <div v-if="room.status === ClassroomStatus.In_class"
                            class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-2.5 w-2">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                            </span>
                            <span>Em Aula</span>
                        </div>
                        <div v-if="room.status === ClassroomStatus.Test"
                            class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-2.5 w-2">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                            </span>
                            <span>Teste</span>
                        </div>
                        <div v-if="room.status === ClassroomStatus.Exam"
                            class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-2.5 w-2">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                            </span>
                            <span>Exame</span>
                        </div>
                        <div v-if="room.status === ClassroomStatus.In_room"
                            class="absolute top-2 right-2 flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-2.5 w-2">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                            </span>
                            <span>Na Sala</span>
                        </div>
                    </section>

                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                        <span v-if="room.is_washroom" class="text-2xl font-bold drop-shadow-md transition-colors">
                            {{ room.description }}
                        </span>
                        <span v-else class="text-2xl font-bold drop-shadow-md transition-colors">
                            {{ room.description }}
                        </span>
                        <span v-if="room.type === TypeOfRoomEnum.Classroom">Sala de Aula</span>
                        <span v-else-if="room.type === TypeOfRoomEnum.Laboratory">Laboratório</span>
                        <span v-else-if="room.type === TypeOfRoomEnum.Secretary">Secretaria</span>
                        <span v-else-if="room.type === TypeOfRoomEnum.Library">Biblioteca</span>
                        <span v-else-if="room.type === TypeOfRoomEnum.MaleToilet">Masculino</span>
                        <span v-else>Feminino</span>

                    </div>type(aulas, wc_masculino wc_femnino,secretaria,bibioteca)
                    </Link>


                </section>
            </section>

            <Pagination :list="dps" />
        </div>
    </AppLayout>
</template>