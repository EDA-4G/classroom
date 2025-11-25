<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
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

import { Button } from '@/components/ui/button';
import { Waypoints, Layers, ChevronLeft, ChevronRight, GraduationCap, Send } from 'lucide-vue-next';

import { InputGroup, InputGroupAddon, InputGroupButton, InputGroupInput, InputGroupText, InputGroupTextarea } from "@/components/ui/input-group";

import { Check, ChevronsUpDown, Search } from "lucide-vue-next"
import { ref } from "vue"
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
import { date_long_format } from '@/formatter';
import Pagination from '@/components/aux/Pagination.vue';
import { Calendar } from '@/components/ui/calendar'

import { DateFormatter, getLocalTimeZone, today } from '@internationalized/date'
import { CalendarIcon } from 'lucide-vue-next'
// import { ref } from 'vue'
// import { Button } from '@/components/ui/button'
// import { Calendar } from '@/components/ui/calendar'
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover'
import { cn } from '@/lib/utils'
import { IClassroom, IPopoverItem } from '@/interfaces';
const date = ref<Date>()
const defaultPlaceholder = today(getLocalTimeZone())

// const date = ref(null)

import { CheckIcon, ChevronsUpDownIcon } from 'lucide-vue-next'
import {
    Command,
    CommandEmpty,
    CommandGroup,
    CommandInput,
    CommandItem,
    CommandList,
} from '@/components/ui/command'
import posts from '@/routes/posts';

const props = defineProps({
    postss: {
        type: Object,
        required: true
    },
    deps: {
        type: Object,
        required: true
    }
})

const open = ref(false)
const dp_id = ref('')

let deps_list: IPopoverItem[] = props.deps.map((dep: IClassroom) => ({
    label: dep.description,
    value: dep.id
}))

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
    name: string;
    key: string;
}

const filters: Filter[] = [
    { id: 1, name: 'Todos', key: 'all' },
    { id: 2, name: 'Pago', key: 'paid' },
    { id: 3, name: 'Gratuito', key: 'free' }
]

const me = (item: string) => {
    // alert(item);
}

const filter = ref(filters ? filters.at(0)?.key : '')
const handleToggleGroup = (value: any) => {
    if (value) filter.value = value
}

const value = ref<typeof frameworks[0]>()


//Search
const title = ref('');
const search = () => {
    const options = {
        query: {
            title: title.value,
            department: dp_id.value,
            type: filter.value
        },
    };
    router.get(posts.index.get(options).url)
};



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
        <div class="flex h-full flex-1 px-6 pb-8 flex-col gap-4  rounded-xl p-4 md:px-6 lg:px-4">

            <Breadcrumb>
                <BreadcrumbList>
                    <BreadcrumbItem1>
                        <BreadcrumbLink :href="dashboard().url">
                            Início
                        </BreadcrumbLink>
                    </BreadcrumbItem1>
                    <BreadcrumbSeparator />

                    <BreadcrumbItem1>
                        <BreadcrumbPage>Perdidos e Achados</BreadcrumbPage>
                    </BreadcrumbItem1>
                </BreadcrumbList>
            </Breadcrumb>

            <InputGroup>
                <InputGroupInput id="#" v-model="title" @keyup.enter="search" placeholder="Descrição, sala..."
                    class="text-sm" />
                <InputGroupAddon>
                    <Search />
                </InputGroupAddon>
                <InputGroupAddon align="inline-end">
                    12 resultados
                </InputGroupAddon>
            </InputGroup>

            <section>
                <div class="py-2">
                </div>
                <section class="grid grid-cols-2 gap-2">
                    <div class="flex justify-between gap-2">

                        <section>
                            <ToggleGroup type="single" :model-value="filter" @update:model-value="handleToggleGroup"
                                class="flex gap-2 flex-wrap justify-start">
                                <ToggleGroupItem v-for="filter in filters" :key="filter.id" :value="filter.key"
                                    @click="me(filter.name)"
                                    class="w-fit data-[state=on]:bg-[#04724D] data-[state=on]:text-white data-[state=on]:border-[#04724D] px-3 py-3.5 max-h-6.5 text-xs hover:bg-[#048B5F] hover:text-white transition-none border border-gray-700 hover:border-[#048B5F] text-gray-700 cursor-pointer rounded-full">
                                    {{ filter.name }}
                                </ToggleGroupItem>
                            </ToggleGroup>
                        </section>

                    </div>
                    <div class="flex flex-col items-end lg:flex-row lg:justify-end lg:items-center gap-2 lg:gap-4">

                        <div class="grid gap-2 order-2 lg:order-1">
                            <Popover id="dp" v-model:open="open">
                                <PopoverTrigger as-child>
                                    <Button variant="outline" role="combobox" :aria-expanded="open"
                                        class="w-full h-7.5 border border-[#A1B2AD] rounded-xl font-normal justify-between cursor-pointer">
                                        {{
                                            dp_id.toString()
                                                ? deps_list.find((item: IPopoverItem) =>
                                                    item.value
                                                    === dp_id)?.label
                                                : 'Buscar por depart...'
                                        }}
                                        <ChevronsUpDownIcon class="ml-2 h-4 w-4 shrink-0 opacity-50" />
                                    </Button>
                                </PopoverTrigger>
                                <PopoverContent class="p-0">
                                    <Command class="">
                                        <CommandInput placeholder="Buscar departamento..." />
                                        <CommandList>
                                            <CommandEmpty class="italic">
                                                Departamento não
                                                encontrado.
                                            </CommandEmpty>
                                            <CommandGroup>
                                                <CommandItem class="cursor-pointer" v-for="framework in deps_list"
                                                    :key="framework.value" :value="framework.value" @select="() => {
                                                        dp_id = dp_id === framework.value ? '' : framework.value
                                                        open = false
                                                    }">
                                                    <CheckIcon :class="cn(
                                                        'mr-2 h-4 w-4',
                                                        dp_id === framework.value ? 'opacity-100' : 'opacity-0',
                                                    )" />
                                                    {{ framework.label }}
                                                </CommandItem>
                                            </CommandGroup>
                                        </CommandList>
                                    </Command>
                                </PopoverContent>
                            </Popover>
                        </div>

                        <Link :href="posts.create().url"
                            class="order-1 lg:order-2 flex items-center justify-center border text-white text-sm px-2 pr-3 py-1.5 rounded-xl bg-[#31A03C] hover:bg-[#3CC349]">
                        <Send height="14" />
                        Publicar
                        </Link>

                    </div>
                </section>

                <div class="py-4">
                    <div class="pb-2">
                        <h2 class="font-semibold text-lg text-heading">Encontre o teu bem perdido.</h2>
                    </div>
                    <p>{{ postss.department }}</p>
                    <section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">

                        <Sheet v-for="post in postss.data">
                            <SheetTrigger as-child>


                                <button
                                    class="bg-neutral-primary-soft text-left cursor-pointer block max-w-sm p-4 lg:p-6 border border-gray-200 hover:border-gray-300 rounded-base shadow-xs rounded-lg">
                                    <p href="#" class="w-full">
                                        <img v-if="post.image" :src="'/storage/'.concat(post.image)"
                                            class="rounded-base w-full h-30 lg:h-60 object-cover rounded-lg"
                                            :alt="post.title" width="120px" />
                                    </p>
                                    <h5 class="mt-4 lg:mt-6 mb-1 text-md font-semibold tracking-tight text-heading">{{
                                        post.title }}</h5>
                                    <p class="text-xs">{{ date_long_format(post.created_at) }}</p>

                                    <div class="grid lg:grid-cols-2 items-center">
                                        <div>
                                            <p class="mt-4">— {{ post.user.name.split(' ').at(0) }}</p>
                                            <p class="text-sm font-medium text-green-700">
                                                {{ post.department.description }}</p>
                                        </div>

                                        <div class="h-fit mt-3 flex lg:justify-end gap-2">
                                            <span
                                                class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">{{
                                                    post.type }}</span>
                                            <span
                                                class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">{{
                                                    post.color }}</span>
                                        </div>
                                    </div>
                                </button>


                            </SheetTrigger>
                            <SheetContent>

                                <div class="grid gap-4 p-4">
                                    <img class="rounded-base w-full h-40 object-cover rounded-lg" v-if="post.image"
                                        :src="'/storage/'.concat(post.image)" :alt="post.title" width="120px" />
                                    <div>
                                        <h5 class="mb-1 text-lg font-semibold tracking-tight text-heading">{{ post.title
                                        }}</h5>
                                        <p class="text-xs">{{ date_long_format(post.created_at) }}</p>
                                    </div>

                                    <div class="grid grid-cols-2 items-center">
                                        <div>
                                            <p class="mt-0">— {{ post.user.name.split(' ').at(0) }}</p>
                                            <p class="text-sm font-medium text-green-700">{{ post.department.description
                                            }}</p>
                                        </div>

                                        <div class="h-fit mt-2 flex flex-wrap justify-end gap-1">
                                            <span
                                                class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">
                                                {{ post.type }}</span>
                                            <span
                                                class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600 dark:bg-background dark:border dark:border-border">
                                                {{ post.color }}</span>
                                        </div>
                                    </div>


                                    <div class="w-full pt-2 max-w-md">
                                        <FieldGroup>
                                            <FieldSet>

                                                <RadioGroup default-value="kubernetes">
                                                    <FieldLabel for="vm-z4k"
                                                        class="cursor-pointer has-[[data-state=checked]]:bg-[#EAFAF5] has-[[data-state=checked]]:border-[#1F8261] dark:has-[[data-state=checked]]:bg-primary/10">
                                                        <Field orientation="horizontal">
                                                            <FieldContent class="gap-0">
                                                                <FieldTitle>M-Pesa</FieldTitle>
                                                                <FieldDescription>
                                                                    Pagar MZN <span class="font-semibold">20,00</span>
                                                                    meticais pelo serviço.
                                                                </FieldDescription>
                                                            </FieldContent>
                                                            <RadioGroupItem id="vm-z4k" value="kubernetes"
                                                                class="text-[#1F8261]" />
                                                        </Field>
                                                    </FieldLabel>
                                                </RadioGroup>
                                            </FieldSet>
                                        </FieldGroup>
                                    </div>

                                    <div class="grid items-center gap-2 mt-2">
                                        <Label for="name" class="text-right">
                                            Conta M-Pesa
                                        </Label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-4 h-4 text-slate-600">
                                                    <path fill-rule="evenodd"
                                                        d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                            <Input id="contactNumber" type="number"
                                                class="w-full bg-transparent placeholder:text-gray-400 text-slate-700 text-sm border border-slate-200 rounded-md pr-3 pl-10 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                                placeholder="Ex: 84/85 xxx xxxx"
                                                title="Número de conta M-Pesa deve ser válido: 84/85 xxx xxxx" />
                                        </div>
                                    </div>

                                    <div>
                                        <Accordion type="single" collapsible default-value="item-1">
                                            <AccordionItem value="item-10">
                                                <AccordionTrigger class="hover:no-underline cursor-pointer">Informação
                                                    adicional</AccordionTrigger>
                                                <AccordionContent>
                                                    <section class="text-sm" v-show="true">
                                                        <div class="flex gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 640" width="20" fill="currentColor"
                                                                stroke="currentColor">
                                                                <path
                                                                    d="M240 192C240 147.8 275.8 112 320 112C364.2 112 400 147.8 400 192C400 236.2 364.2 272 320 272C275.8 272 240 236.2 240 192zM448 192C448 121.3 390.7 64 320 64C249.3 64 192 121.3 192 192C192 262.7 249.3 320 320 320C390.7 320 448 262.7 448 192zM144 544C144 473.3 201.3 416 272 416L368 416C438.7 416 496 473.3 496 544L496 552C496 565.3 506.7 576 520 576C533.3 576 544 565.3 544 552L544 544C544 446.8 465.2 368 368 368L272 368C174.8 368 96 446.8 96 544L96 552C96 565.3 106.7 576 120 576C133.3 576 144 565.3 144 552L144 544z" />
                                                            </svg>
                                                            <p>Maria Tamele</p>
                                                        </div>
                                                        <div class="flex gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 640" width="20" fill="currentColor"
                                                                stroke="currentColor">
                                                                <path
                                                                    d="M80 259.8L289.2 345.9C299 349.9 309.4 352 320 352C330.6 352 341 349.9 350.8 345.9L593.2 246.1C602.2 242.4 608 233.7 608 224C608 214.3 602.2 205.6 593.2 201.9L350.8 102.1C341 98.1 330.6 96 320 96C309.4 96 299 98.1 289.2 102.1L46.8 201.9C37.8 205.6 32 214.3 32 224L32 520C32 533.3 42.7 544 56 544C69.3 544 80 533.3 80 520L80 259.8zM128 331.5L128 448C128 501 214 544 320 544C426 544 512 501 512 448L512 331.4L369.1 390.3C353.5 396.7 336.9 400 320 400C303.1 400 286.5 396.7 270.9 390.3L128 331.4z" />
                                                            </svg>
                                                            Eng. Civil, 2&deg; Ano Pos-Laboral
                                                        </div>
                                                        <div class="flex gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 640" width="20" fill="currentColor"
                                                                stroke="currentColor">
                                                                <path
                                                                    d="M476.9 161.1C435 119.1 379.2 96 319.9 96C197.5 96 97.9 195.6 97.9 318C97.9 357.1 108.1 395.3 127.5 429L96 544L213.7 513.1C246.1 530.8 282.6 540.1 319.8 540.1L319.9 540.1C442.2 540.1 544 440.5 544 318.1C544 258.8 518.8 203.1 476.9 161.1zM319.9 502.7C286.7 502.7 254.2 493.8 225.9 477L219.2 473L149.4 491.3L168 423.2L163.6 416.2C145.1 386.8 135.4 352.9 135.4 318C135.4 216.3 218.2 133.5 320 133.5C369.3 133.5 415.6 152.7 450.4 187.6C485.2 222.5 506.6 268.8 506.5 318.1C506.5 419.9 421.6 502.7 319.9 502.7zM421.1 364.5C415.6 361.7 388.3 348.3 383.2 346.5C378.1 344.6 374.4 343.7 370.7 349.3C367 354.9 356.4 367.3 353.1 371.1C349.9 374.8 346.6 375.3 341.1 372.5C308.5 356.2 287.1 343.4 265.6 306.5C259.9 296.7 271.3 297.4 281.9 276.2C283.7 272.5 282.8 269.3 281.4 266.5C280 263.7 268.9 236.4 264.3 225.3C259.8 214.5 255.2 216 251.8 215.8C248.6 215.6 244.9 215.6 241.2 215.6C237.5 215.6 231.5 217 226.4 222.5C221.3 228.1 207 241.5 207 268.8C207 296.1 226.9 322.5 229.6 326.2C232.4 329.9 268.7 385.9 324.4 410C359.6 425.2 373.4 426.5 391 423.9C401.7 422.3 423.8 410.5 428.4 397.5C433 384.5 433 373.4 431.6 371.1C430.3 368.6 426.6 367.2 421.1 364.5z" />
                                                            </svg>
                                                            86 758 7448
                                                        </div>
                                                    </section>
                                                </AccordionContent>
                                            </AccordionItem>
                                        </Accordion>
                                    </div>


                                </div>
                                <SheetFooter>
                                    <button type="submit"
                                        class="p-2 text-sm rounded-md border border-[#038043] bg-[#038043] text-white hover:bg-[#1fad68] cursor-pointer">
                                        Pagar MZN <span class="font-semibold">20,00</span>
                                    </button>
                                    <SheetClose as-child>
                                        <button type="submit"
                                            class="p-2 text-sm rounded-md border border-[#038043]  text-[#038043] hover:text-[#1fad68] cursor-pointer">Cancelar</button>
                                    </SheetClose>
                                </SheetFooter>
                            </SheetContent>
                        </Sheet>

                    </section>

                </div>
            </section>

            <Pagination :list="postss" />
        </div>
    </AppLayout>
</template>
