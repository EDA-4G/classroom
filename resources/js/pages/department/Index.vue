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
import { InputGroup, InputGroupAddon, InputGroupInput } from "@/components/ui/input-group";
import { Search, ChevronsUpDownIcon, Layers, CheckIcon, BrickWall } from "lucide-vue-next"
import { ref } from "vue"
import { Combobox, ComboboxAnchor, ComboboxEmpty, ComboboxGroup, ComboboxInput, ComboboxItem, ComboboxList, ComboboxTrigger } from "@/components/ui/combobox"
import classrooms from '@/routes/classrooms';
import { ToggleGroup, ToggleGroupItem } from '@/components/ui/toggle-group'
import Pagination from '@/components/aux/Pagination.vue';
import { AccessStateEnum, ClassroomStatus, IClassroom, IPopoverItem, TypeOfRoomEnum, UsageStateEnum } from '@/interfaces';

const props = defineProps({
    dps: {
        type: Object,
        required: true
    }
})

import { cn } from '@/lib/utils';
import {
    Command,
    CommandEmpty,
    CommandGroup,
    CommandInput,
    CommandItem,
    CommandList,
} from '@/components/ui/command'
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover'
const frameworks = [
    { value: "0", label: "0" },
    { value: "1", label: "1" },
    { value: "2", label: "2" },
    { value: "3", label: "3" },
    { value: "4", label: "4" },
    { value: "5", label: "5" },
    { value: "6", label: "6" },
]


// let deps_list: IPopoverItem[] = props.dps.map((dep: IClassroom) => ({
//     label: dep.description,
//     value: dep.id
// }))

const type_of_rooms = [
    { name: 'classroom', Text: 'Sala de Aula' },
    { name: 'laboratory', Text: 'Laboratório' },
    { name: 'secretary', Text: 'Secretaria' },
    { name: 'library', Text: 'Biblioteca' },
    { name: 'wc', Text: 'WC' },
    { name: 'all', Text: 'Todos' }
]


const open = ref(false)
const dep_value = ref('0')

const opin = ref(false)
const type_r_value = ref('all')

interface Filter {
    id: number;
    name: string
}

const filters: Filter[] = [
    { id: 1, name: 'Todas' },
    { id: 3, name: 'Abertas' },
    { id: 4, name: 'Fechadas' },
    { id: 5, name: 'Reservadas' }
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
        <div class="flex flex-col h-full flex-1 px-6 flex-col gap-4  rounded-xl p-4 md:px-6 lg:px-4">

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
                <div class="pb-4">
                    <p class="text-2xl font-bold">{{ dp.description }}</p>
                    <p class="text-sm text-gray-400">Encontrados <span class="font-semibold">{{ dp.classrooms.length
                            }}</span>
                        salas e <span class="font-semibold">{{ dp.classrooms.length }}</span> wc's</p>
                </div>
                <section>
                    <div class="flex justify-between gap-2 pb-2">

                        <div class="flex flex-wrap justify-end gap-2 order-3">
                            <Popover id="state" v-model:open="opin">
                                <PopoverTrigger as-child>
                                    <Button variant="outline" role="combobox" :aria-expanded="opin"
                                        class="h-7.5 max-w-50 border border-[#A1B2AD] font-normal justify-between cursor-pointer rounded-xl">
                                        <BrickWall width="16" />
                                        {{
                                            type_r_value.toString()
                                                ? type_of_rooms.find((item: any) => item.name
                                                    === type_r_value)?.Text
                                                : 'Tipo de sala ..'
                                        }}
                                        <ChevronsUpDownIcon class="h-4 w-4 shrink-0 opacity-50" />
                                    </Button>
                                </PopoverTrigger>
                                <PopoverContent as-child class="p-0 max-w-50">
                                    <Command>
                                        <CommandInput placeholder="Buscar ..." />
                                        <CommandList>
                                            <CommandEmpty class="italic">
                                                Nenhum <br>tipo encontrado.
                                            </CommandEmpty>
                                            <CommandGroup>
                                                <CommandItem class="cursor-pointer" v-for="framework in type_of_rooms"
                                                    :key="framework.name" :value="framework.name" @select="() => {
                                                        type_r_value = type_r_value === framework.name ? '' : framework.name
                                                        opin = false
                                                    }">
                                                    <CheckIcon :class="cn(
                                                        'mr-2 h-4 w-4',
                                                        type_r_value === framework.name ? 'opacity-100' : 'opacity-0',
                                                    )" />
                                                    {{ framework.Text }}
                                                </CommandItem>
                                            </CommandGroup>
                                        </CommandList>
                                    </Command>
                                </PopoverContent>
                            </Popover>

                            <Popover id="dp" v-model:open="open">
                                <PopoverTrigger as-child>
                                    <Button variant="outline" role="combobox" :aria-expanded="open"
                                        class="h-7.5  border border-[#A1B2AD] font-normal justify-between cursor-pointer rounded-xl">
                                        <Layers width="16" />
                                        <p>Nível</p>
                                        {{
                                            dep_value.toString()
                                                ? frameworks.find((item: IPopoverItem) => item.value
                                                    === dep_value)?.label
                                                : '0'
                                        }}
                                        <ChevronsUpDownIcon class="h-4 w-4 shrink-0 opacity-50" />
                                    </Button>
                                </PopoverTrigger>
                                <PopoverContent as-child class="p-0 max-w-30">
                                    <Command>
                                        <CommandInput placeholder="Buscar ..." />
                                        <CommandList>
                                            <CommandEmpty class="italic">
                                                Nenhum <br>nível encontrado.
                                            </CommandEmpty>
                                            <CommandGroup>
                                                <CommandItem class="cursor-pointer" v-for="framework in frameworks"
                                                    :key="framework.value" :value="framework.value" @select="() => {
                                                        dep_value = dep_value === framework.value ? '' : framework.value
                                                        open = false
                                                    }">
                                                    <CheckIcon :class="cn(
                                                        'mr-2 h-4 w-4',
                                                        dep_value === framework.value ? 'opacity-100' : 'opacity-0',
                                                    )" />
                                                    {{ framework.label }}
                                                </CommandItem>
                                            </CommandGroup>
                                        </CommandList>
                                    </Command>
                                </PopoverContent>
                            </Popover>

                        </div>


                        <section>
                            <ToggleGroup type="single" :model-value="filter" @update:model-value="handleToggleGroup"
                                class="flex gap-2 flex-wrap justify-start">
                                <ToggleGroupItem v-for="filter in filters" :key="filter.id" :value="filter.name"
                                    @click="me(filter.name)"
                                    class="w-fit data-[state=on]:bg-[#04724D] data-[state=on]:text-white data-[state=on]:border-[#04724D] px-2.5 py-3.5 max-h-6.5 text-sm hover:bg-[#048B5F] hover:text-white transition-none border border-gray-400 hover:border-[#048B5F] text-gray-700 cursor-pointer rounded-full">
                                    {{ filter.name }}
                                </ToggleGroupItem>
                            </ToggleGroup>
                        </section>

                    </div>
                </section>

                <section class="py-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                    <Link v-for="room in dp.classrooms" :key="room.id"
                        :href="room.access_state === AccessStateEnum.Unlock ? classrooms.index().url : $page.url"
                        :class="room.access_state === AccessStateEnum.Lock ? 'cursor-not-allowed' : 'cursor-pointer'"
                        class="group relative h-46 h-46 overflow-hidden rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl">

                    <img v-if="room.cover" :src="'/storage/'.concat(room.cover)" :alt="room.description"
                        :class="room.access_state === AccessStateEnum.Lock ? 'grayscale' : 'group-hover:scale-105'"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500" />
                    <img v-else src="https://placehold.co/600x400?text=S/I" alt="sem imagem"
                        :class="room.access_state === AccessStateEnum.Lock ? 'grayscale' : 'group-hover:scale-105'"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500" />


                    <div :class="room.access_state === AccessStateEnum.Lock ? 'bg-gray-500 opacity-70 ' : 'bg-gray-700 opacity-60'"
                        class="absolute inset-0"></div>

                    <section class="absolute top-2 left-2 flex items-center gap-2">

                        <!-- Aberto -->
                        <div v-if="room.access_state === AccessStateEnum.Unlock && room.usage_state === UsageStateEnum.None"
                            class="flex items-center justify-center w-7 h-7 rounded-full bg-emerald-600/90 shadow-sm border border-white/20 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7a4 4 0 1 1 8 0v4" />
                                <rect x="4" y="11" width="16" height="10" rx="2" ry="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>

                        <!-- Fechado -->
                        <div v-if="room.access_state === AccessStateEnum.Lock"
                            class="flex items-center justify-center w-7 h-7 rounded-full bg-red-800/95 shadow-md border border-white/20 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/90" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 10V8a6 6 0 1 1 12 0v2M5 10h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2z" />
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

                    <section class="absolute top-2 right-2">
                        <div v-if="room.usage_state === UsageStateEnum.In_class"
                            class="flex animate-[pulse_2s_infinite] items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-2 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-2.5 w-2.5">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-200 opacity-75"></span>
                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                            </span>
                            <span>Em Aula</span>
                        </div>

                        <div v-else-if="room.usage_state === UsageStateEnum.Test"
                            class="flex animate-[pulse_2s_infinite] items-center gap-1 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-2 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor"
                                    stroke="currentColor">
                                    <path
                                        d="M472.8 64C445.4 64 419.2 74.9 399.8 94.2L382.1 112L369 98.9C340.9 70.8 295.3 70.8 267.2 98.9L167 199C157.6 208.4 157.6 223.6 167 232.9C176.4 242.2 191.6 242.3 200.9 232.9L301.1 132.9C310.5 123.5 325.7 123.5 335 132.9L348.1 145.9L248 246.1L393.9 392L545.8 240.2C565.2 220.8 576 194.6 576 167.2C576 110.2 529.8 64 472.8 64zM166.4 327.7C116.5 377.6 83.1 441.7 70.9 511.2L64.4 547.8C63 555.6 65.5 563.4 71 569C76.5 574.6 84.4 577 92.1 575.7L128.8 569.2C198.3 556.9 262.4 523.6 312.3 473.7L360 425.9L214.1 280L166.4 327.7z" />
                                </svg>
                            </span>
                            <span>Avaliação</span>
                        </div>

                        <div v-else-if="room.usage_state === UsageStateEnum.Exam"
                            class="flex animate-[pulse_2s_infinite] items-center gap-1 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-2 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor"
                                    stroke="currentColor">
                                    <path
                                        d="M539.3 64.1C549.2 63.3 558.9 67.1 565.9 74.1C572.9 81.1 576.7 90.8 575.9 100.7C571.9 150 558.5 226.9 529.6 300.4C527.8 304.9 524.1 308.3 519.4 309.7L438.5 334C434.6 335.2 432 338.7 432 342.8C432 347.9 436.1 352 441.2 352L479.8 352C491.8 352 499.5 364.8 493.3 375.1C489.3 381.8 485 388.3 480.6 394.7C478.6 397.6 475.6 399.7 472.2 400.8L374.5 430C370.6 431.2 368 434.7 368 438.8C368 443.9 372.1 448 377.2 448L393.2 448C407.8 448 414.2 465.4 402 473.4C334 518.4 264.3 516.7 219.6 504.7C206.9 501.3 195.6 494.8 185.2 486.8L112 560C103.2 568.8 88.8 568.8 80 560C71.2 551.2 71.2 536.8 80 528L160 448L160.5 448.5C161.2 447.2 162.1 446 163.2 444.9L320 288C328.8 279.2 328.8 264.8 320 256C311.2 247.2 296.8 247.2 288 256L153.7 390.2C144.8 399.1 129.7 394.6 128.7 382C124.4 328.8 138 258.9 201.3 195.6C292.4 104.5 455.5 70.9 539.2 64.1z" />
                                </svg>
                            </span>
                            <span>Exame</span>
                        </div>

                        <div v-else-if="room.usage_state === UsageStateEnum.To_wash"
                            class="flex animate-[pulse_2s_infinite] items-center gap-1 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-2 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor"
                                    stroke="currentColor">
                                    <path
                                        d="M474.6 188.1C495.3 203.7 520.6 218.8 548.8 222.6C561.9 224.4 574 215.1 575.8 202C577.6 188.9 568.3 176.8 555.2 175C539.3 172.9 522 163.7 503.5 149.8C465.1 120.8 413 120.8 374.5 149.8C350.5 167.9 333.8 176.1 320 176.1C306.2 176.1 289.5 167.9 265.5 149.8C227.1 120.8 175 120.8 136.5 149.8C118 163.7 100.7 172.9 84.8 175C71.7 176.8 62.4 188.8 64.2 202C66 215.2 78 224.4 91.2 222.6C119.4 218.8 144.8 203.7 165.4 188.1C186.7 172 215.3 172 236.6 188.1C260.8 206.4 288.9 224 320 224C351.1 224 379.1 206.3 403.4 188.1C424.7 172 453.3 172 474.6 188.1zM474.6 332.1C495.3 347.7 520.6 362.8 548.8 366.6C561.9 368.4 574 359.1 575.8 346C577.6 332.9 568.3 320.8 555.2 319C539.3 316.9 522 307.7 503.5 293.8C465.1 264.8 413 264.8 374.5 293.8C350.5 311.9 333.8 320.1 320 320.1C306.2 320.1 289.5 311.9 265.5 293.8C227.1 264.8 175 264.8 136.5 293.8C118 307.7 100.7 316.9 84.8 319C71.7 320.7 62.4 332.8 64.2 346C66 359.2 78 368.4 91.2 366.6C119.4 362.8 144.8 347.7 165.4 332.1C186.7 316 215.3 316 236.6 332.1C260.8 350.4 288.9 368 320 368C351.1 368 379.1 350.3 403.4 332.1C424.7 316 453.3 316 474.6 332.1zM403.4 476.1C424.7 460 453.3 460 474.6 476.1C495.3 491.7 520.6 506.8 548.8 510.6C561.9 512.4 574 503.1 575.8 490C577.6 476.9 568.3 464.8 555.2 463C539.3 460.9 522 451.7 503.5 437.8C465.1 408.8 413 408.8 374.5 437.8C350.5 455.9 333.8 464.1 320 464.1C306.2 464.1 289.5 455.9 265.5 437.8C227.1 408.8 175 408.8 136.5 437.8C118 451.7 100.7 460.9 84.8 463C71.7 464.8 62.4 476.8 64.2 490C66 503.2 78 512.4 91.2 510.6C119.4 506.8 144.8 491.7 165.4 476.1C186.7 460 215.3 460 236.6 476.1C260.8 494.4 288.9 512 320 512C351.1 512 379.1 494.3 403.4 476.1z" />
                                </svg>
                            </span>
                            <span>Limpeza</span>
                        </div>

                        <div v-else-if="room.usage_state === UsageStateEnum.Maintenance"
                            class="flex animate-[pulse_2s_infinite] items-center gap-1 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-2 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor"
                                    stroke="currentColor">
                                    <path
                                        d="M102.8 57.3C108.2 51.9 116.6 51.1 123 55.3L241.9 134.5C250.8 140.4 256.1 150.4 256.1 161.1L256.1 210.7L346.9 301.5C380.2 286.5 420.8 292.6 448.1 320L574.2 446.1C592.9 464.8 592.9 495.2 574.2 514L514.1 574.1C495.4 592.8 465 592.8 446.2 574.1L320.1 448C292.7 420.6 286.6 380.1 301.6 346.8L210.8 256L161.2 256C150.5 256 140.5 250.7 134.6 241.8L55.4 122.9C51.2 116.6 52 108.1 57.4 102.7L102.8 57.3zM247.8 360.8C241.5 397.7 250.1 436.7 274 468L179.1 563C151 591.1 105.4 591.1 77.3 563C49.2 534.9 49.2 489.3 77.3 461.2L212.7 325.7L247.9 360.8zM416.1 64C436.2 64 455.5 67.7 473.2 74.5C483.2 78.3 485 91 477.5 98.6L420.8 155.3C417.8 158.3 416.1 162.4 416.1 166.6L416.1 208C416.1 216.8 423.3 224 432.1 224L473.5 224C477.7 224 481.8 222.3 484.8 219.3L541.5 162.6C549.1 155.1 561.8 156.9 565.6 166.9C572.4 184.6 576.1 203.9 576.1 224C576.1 267.2 558.9 306.3 531.1 335.1L482 286C448.9 253 403.5 240.3 360.9 247.6L304.1 190.8L304.1 161.1L303.9 156.1C303.1 143.7 299.5 131.8 293.4 121.2C322.8 86.2 366.8 64 416.1 63.9z" />
                                </svg>
                            </span>
                            <span>Inspecção</span>
                        </div>

                        <div v-else-if="room.usage_state === UsageStateEnum.Book"
                            class="flex animate-[pulse_2s_infinite] items-center gap-1 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-2 py-1 text-xs font-semibold text-white ring-1 ring-white/40">
                            <span class="relative flex h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor"
                                    stroke="currentColor">
                                    <path
                                        d="M320 128C302.3 128 288 142.3 288 160C288 177.7 302.3 192 320 192C337.7 192 352 177.7 352 160C352 142.3 337.7 128 320 128zM224 160C224 107 267 64 320 64C373 64 416 107 416 160C416 201.8 389.3 237.4 352 250.5L352 508.4C414.9 494.1 462.2 438.7 463.9 371.9L447.8 386C437.8 394.7 422.7 393.7 413.9 383.7C405.1 373.7 406.2 358.6 416.2 349.8L480.2 293.8C489.2 285.9 502.8 285.9 511.8 293.8L575.8 349.8C585.8 358.5 586.8 373.7 578.1 383.7C569.4 393.7 554.2 394.7 544.2 386L528 371.9C525.9 485 433.6 576 320 576C206.4 576 114.1 485 112 371.9L95.8 386.1C85.8 394.8 70.7 393.8 61.9 383.8C53.1 373.8 54.2 358.7 64.2 349.9L128.2 293.9C137.2 286 150.8 286 159.8 293.9L223.8 349.9C233.8 358.6 234.8 373.8 226.1 383.8C217.4 393.8 202.2 394.8 192.2 386.1L176.1 372C177.9 438.8 225.2 494.2 288 508.5L288 250.6C250.7 237.4 224 201.9 224 160.1z" />
                                </svg>
                            </span>
                            <span>Reservado</span>
                        </div>

                    </section>

                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                        <span v-if="room.is_washroom" class="text-2xl font-bold drop-shadow-md transition-colors">
                            {{ room.description }}
                        </span>
                        <span v-else class="text-2xl font-bold drop-shadow-md transition-colors">
                            {{ room.description }}
                        </span>
                        <div>
                            <span v-if="room.type === TypeOfRoomEnum.Classroom">Sala de Aula</span>
                            <span v-else-if="room.type === TypeOfRoomEnum.Laboratory">Laboratório</span>
                            <span v-else-if="room.type === TypeOfRoomEnum.Secretary">Secretaria</span>
                            <span v-else-if="room.type === TypeOfRoomEnum.Library">Biblioteca</span>
                            <span v-else-if="room.type === TypeOfRoomEnum.MaleToilet">Masculino</span>
                            <span v-else>Feminino</span>
                        </div>

                    </div>
                    </Link>


                </section>
            </section>

            <Pagination :list="dps" />
        </div>
    </AppLayout>
</template>