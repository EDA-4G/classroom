<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, router, useForm, Link } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import {
    Breadcrumb,
    BreadcrumbItem as BreadcrumbItem1,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb"
import { Button } from '@/components/ui/button'
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from '@/components/ui/card'

import { Label } from '@/components/ui/label'
import { Plus, Search, Save, RefreshCcw } from "lucide-vue-next"
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
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
    AlertDialogTrigger,
} from '@/components/ui/alert-dialog'
import { CheckIcon, ChevronsUpDownIcon } from 'lucide-vue-next'
import { cn } from '@/lib/utils';
import { ToggleGroup, ToggleGroupItem } from '@/components/ui/toggle-group'
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
import advertisements from '@/routes/advertisements';
import { toast } from 'vue-sonner';
import { ref } from 'vue';
import Pagination from '@/components/aux/Pagination.vue';
import { IAdvertisement, IClassroom, IDepartment, IPopoverItem } from '@/interfaces';



const props = defineProps({
    rooms: {
        type: Object,
        required: true
    },
    deps: {
        type: Object,
        required: true
    }
})

import admin_departments from '@/routes/admin_departments';
import admin_classrooms from '@/routes/admin_classrooms';

let deps_list: IPopoverItem[] = props.deps.map((dep: IClassroom) => ({
    label: dep.description,
    value: dep.id
}))


const levels = 22;
const open = ref(false)
const dp_id = ref('')

const form = useForm({
    description: '',
    image: '',
    level: '1',
    status: '',
    is_active: false,
    department: deps_list.length > 0 ? deps_list[0].value : 'nada'
})

const submit = () => {
    form.department = dp_id.value;
    form.post(admin_classrooms.store().url, {
        preserveScroll: true,
        onSuccess: () => toast.success('Sala de aulas salva com sucesso'),
        onError: () => toast.error('Ocorreu um erro ao tentar salvar sala de aulas')
    });
    form.reset();
};

const description = ref('');
const search = () => {
    const options = {
        query: {
            description: description.value,
        },
    };
    router.get(admin_departments.index.get(options).url)
};


const e_form = useForm({
    id: 0,
    description: '',
    image: '',
    level: '1',
    status: '',
    is_active: false,
    department: deps_list.length > 0 ? deps_list[0].value : 'nada'
})

const get_classroom_to_edit = (item: IClassroom) => {
    e_form.id = item.id;
    e_form.description = item.description;
    e_form.image = item.image;
    e_form.level = item.level;
    e_form.status = item.status;
    e_form.is_active = Boolean(item.is_active);
    e_form.department = deps_list.length > 0 ? deps_list[0].value : ''
}

const e_submit = () => {
    const department: IDepartment = {
        id: e_form.id,
        description: e_form.description,
        is_active: e_form.is_active,
        created_at: new Date()
    }
    e_form.put(admin_departments.update(department).url, {
        preserveScroll: true,
        onSuccess: () => toast.success('Departamento editado com sucesso'),
        onError: () => toast.error('Ocorreu um erro ao tentar editar departamento')
    });
};

const delete_classroom = (department: IDepartment) => {
    router.delete(admin_departments.destroy(department).url, {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => toast.success('Departamento excluído com sucesso.'),
        onError: () => toast.error('Ocorreu um erro ao tentar excluir departamento.')
    })
}



const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
</script>

<template>

    <Head title="Publicação" />

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
                        <BreadcrumbPage>Administrador</BreadcrumbPage>
                    </BreadcrumbItem1>
                </BreadcrumbList>
            </Breadcrumb>

            <div class="flex w-full flex-col gap-0">
                <div role="tablist"
                    class="mb-2 p-1 bg-[#f5f5f5] flex flex-wrap text-muted-foreground border rounded-lg">
                    <Link :href="advertisements.index().url" role="tab"
                        class="px-3 py-2 text-sm font-medium hover:bg-gray-100 cursor-pointer rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20" fill="currentColor"
                        stroke="currentColor">
                        <path
                            d="M128 128C92.7 128 64 156.7 64 192L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 192C576 156.7 547.3 128 512 128L128 128zM480 248L480 392C480 405.3 469.3 416 456 416C448.9 416 442.5 412.9 438.1 408C427.9 413.1 416.3 416 404 416C362 416 328 382 328 340C328 298 362 264 404 264C413.9 264 423.3 265.9 432 269.3L432 248C432 234.7 442.7 224 456 224C469.3 224 480 234.7 480 248zM432 340C432 324.5 419.5 312 404 312C388.5 312 376 324.5 376 340C376 355.5 388.5 368 404 368C419.5 368 432 355.5 432 340zM224 272C215.2 272 208 279.2 208 288L208 320L256 320L256 288C256 279.2 248.8 272 240 272L224 272zM256 368L208 368L208 392C208 405.3 197.3 416 184 416C170.7 416 160 405.3 160 392L160 288C160 252.7 188.7 224 224 224L240 224C275.3 224 304 252.7 304 288L304 392C304 405.3 293.3 416 280 416C266.7 416 256 405.3 256 392L256 368z" />
                    </svg>
                    Anúncios
                    </Link>

                    <Link :href="admin_departments.index().url" role="tab"
                        class="px-3 py-2 text-sm font-medium hover:bg-gray-100 cursor-pointer rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20" fill="currentColor"
                        stroke="currentColor">
                        <path
                            d="M192 64C156.7 64 128 92.7 128 128L128 512C128 547.3 156.7 576 192 576L448 576C483.3 576 512 547.3 512 512L512 128C512 92.7 483.3 64 448 64L192 64zM304 416L336 416C353.7 416 368 430.3 368 448L368 528L272 528L272 448C272 430.3 286.3 416 304 416zM224 176C224 167.2 231.2 160 240 160L272 160C280.8 160 288 167.2 288 176L288 208C288 216.8 280.8 224 272 224L240 224C231.2 224 224 216.8 224 208L224 176zM368 160L400 160C408.8 160 416 167.2 416 176L416 208C416 216.8 408.8 224 400 224L368 224C359.2 224 352 216.8 352 208L352 176C352 167.2 359.2 160 368 160zM224 304C224 295.2 231.2 288 240 288L272 288C280.8 288 288 295.2 288 304L288 336C288 344.8 280.8 352 272 352L240 352C231.2 352 224 344.8 224 336L224 304zM368 288L400 288C408.8 288 416 295.2 416 304L416 336C416 344.8 408.8 352 400 352L368 352C359.2 352 352 344.8 352 336L352 304C352 295.2 359.2 288 368 288z" />
                    </svg>
                    Departamentos
                    </Link>

                    <Link :href="admin_classrooms.index().url" role="tab"
                        class="px-3 py-2 text-[#008236] text-sm font-medium bg-white shadow-xs cursor-pointer rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20" fill="currentColor"
                        stroke="currentColor">
                        <path
                            d="M192 144C222.9 144 248 118.9 248 88C248 57.1 222.9 32 192 32C161.1 32 136 57.1 136 88C136 118.9 161.1 144 192 144zM176 576L176 416C176 407.2 183.2 400 192 400C200.8 400 208 407.2 208 416L208 576C208 593.7 222.3 608 240 608C257.7 608 272 593.7 272 576L272 240L400 240C417.7 240 432 225.7 432 208C432 190.3 417.7 176 400 176L384 176L384 128L576 128L576 320L384 320L384 288L320 288L320 336C320 362.5 341.5 384 368 384L592 384C618.5 384 640 362.5 640 336L640 112C640 85.5 618.5 64 592 64L368 64C341.5 64 320 85.5 320 112L320 176L197.3 176C151.7 176 108.8 197.6 81.7 234.2L14.3 324.9C3.8 339.1 6.7 359.1 20.9 369.7C35.1 380.3 55.1 377.3 65.7 363.1L112 300.7L112 576C112 593.7 126.3 608 144 608C161.7 608 176 593.7 176 576z" />
                    </svg>
                    Salas de Aulas
                    </Link>
                    <Link href="" role="tab"
                        class="px-3 py-2 text-sm font-medium hover:bg-gray-100 cursor-pointer rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20" fill="currentColor"
                        stroke="currentColor">
                        <path
                            d="M128 512L512 512C547.3 512 576 483.3 576 448L576 208C576 172.7 547.3 144 512 144L362.7 144C355.8 144 349 141.8 343.5 137.6L305.1 108.8C294 100.5 280.5 96 266.7 96L128 96C92.7 96 64 124.7 64 160L64 448C64 483.3 92.7 512 128 512z" />
                    </svg>
                    Repositório Instituicional
                    </Link>
                    <Link href="" role="tab"
                        class="px-3 py-2 text-sm font-medium hover:bg-gray-100 cursor-pointer rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20" fill="currentColor"
                        stroke="currentColor">
                        <path
                            d="M320 48C337.7 48 352 62.3 352 80L352 98.3C450.1 112.3 527.7 189.9 541.7 288L560 288C577.7 288 592 302.3 592 320C592 337.7 577.7 352 560 352L541.7 352C527.7 450.1 450.1 527.7 352 541.7L352 560C352 577.7 337.7 592 320 592C302.3 592 288 577.7 288 560L288 541.7C189.9 527.7 112.3 450.1 98.3 352L80 352C62.3 352 48 337.7 48 320C48 302.3 62.3 288 80 288L98.3 288C112.3 189.9 189.9 112.3 288 98.3L288 80C288 62.3 302.3 48 320 48zM160 320C160 408.4 231.6 480 320 480C408.4 480 480 408.4 480 320C480 231.6 408.4 160 320 160C231.6 160 160 231.6 160 320zM320 224C373 224 416 267 416 320C416 373 373 416 320 416C267 416 224 373 224 320C224 267 267 224 320 224z" />
                    </svg>
                    Perdidos e Achados
                    </Link>
                </div>


                <section>
                    <Card>
                        <CardHeader>
                            <CardTitle>Salas de Aulas</CardTitle>
                            <CardDescription>
                                Veja toda informação das salas de aulas.
                            </CardDescription>
                        </CardHeader>
                        <CardContent class="">
                            <section>
                                <div
                                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">
                                    <div class="w-full flex flex-wrap lg:flex-nowrap gap-2 md:w-1/2">
                                        <div class="w-full items-center">
                                            <label for="simple-search" class="sr-only">Buscar...</label>
                                            <div class="relative w-full">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <input type="text" id="simple-search" v-model="description"
                                                    @keyup.enter="search"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Descrição" required>
                                            </div>
                                        </div>
                                        <button @click="search"
                                            class="flex items-center gap-1 justify-center select-none w-full lg:w-fit cursor-pointer rounded-lg border border-gray-300 lg:border-gray-300 py-1.5 px-4 text-center align-middle font-sans text-sm text-[#008236] lg:text-gray-900 hover:text-green-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <Search width="16" />
                                            Buscar
                                        </button>
                                    </div>
                                    <div
                                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                        <form id="classroom" @submit.prevent="submit" class="m-0"
                                            enctype="multipart/form-data"></form>
                                        <Sheet>
                                            <SheetTrigger as-child>

                                                <button type="button"
                                                    class="flex items-center justify-center gap-1 cursor-pointer text-white bg-green-700 hover:border-[#1fad68] hover:bg-[#1fad68] focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                    <Plus width="16" />
                                                    Adicionar
                                                </button>

                                            </SheetTrigger>
                                            <SheetContent>
                                                <SheetHeader>
                                                    <SheetTitle class="text-lg">Salas de Aulas</SheetTitle>
                                                    <SheetDescription>
                                                        Cadastre o sala aqui. Clique em <span
                                                            class="font-semibold">Salvar</span> quando terminar.
                                                    </SheetDescription>
                                                </SheetHeader>
                                                <section class="grid gap-4 px-4">
                                                    <div class="grid gap-2">
                                                        <Label for="description">Descrição</Label>
                                                        <Input id="description" v-model="form.description"
                                                            name="description" placeholder="Ex: 202, DEEL" />
                                                        <InputError :message="form.errors.description" />
                                                    </div>
                                                    <div class="grid gap-2">
                                                        <Label for="email">Imagem</Label>
                                                        <Input id="email" type="file" name="room"
                                                            @input="form.image = $event.target.files[0]" />
                                                        <InputError :message="form.errors.image" />
                                                    </div>
                                                    <div class="grid gap-2">
                                                        <Label for="dp">Departamento</Label>
                                                        <Popover id="dp" v-model:open="open">
                                                            <PopoverTrigger as-child>
                                                                <Button variant="outline" role="combobox"
                                                                    :aria-expanded="open"
                                                                    class="w-full font-normal justify-between cursor-pointer">
                                                                    {{
                                                                        dp_id.toString()
                                                                            ? deps_list.find((item: IPopoverItem) => item.value
                                                                                === dp_id)?.label
                                                                            : 'Selecionar departamento...'
                                                                    }}
                                                                    <ChevronsUpDownIcon
                                                                        class="ml-2 h-4 w-4 shrink-0 opacity-50" />
                                                                </Button>
                                                            </PopoverTrigger>
                                                            <PopoverContent class="p-0">
                                                                <Command class="w-full">
                                                                    <CommandInput
                                                                        placeholder="Buscar departamento..." />
                                                                    <CommandList>
                                                                        <CommandEmpty class="italic">Departamento não
                                                                            encontrado.
                                                                        </CommandEmpty>
                                                                        <CommandGroup>
                                                                            <CommandItem class="cursor-pointer"
                                                                                v-for="framework in deps_list"
                                                                                :key="framework.value"
                                                                                :value="framework.value" @select="() => {
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
                                                        <InputError :message="form.errors.image" />
                                                    </div>
                                                    <div class="grid gap-2">
                                                        <Label for="email">Nível</Label>
                                                        <ToggleGroup v-model="form.level" type="single"
                                                            default-value="1" class="flex-wrap">
                                                            <ToggleGroupItem v-for="level in levels" :key="level"
                                                                :value="level.toString()"
                                                                class="data-[state=on]:bg-[#04724D] data-[state=on]:text-white data-[state=on]:border-[#04724D] hover:bg-[#EBFAF2] hover:text-black min-h-7 border border-green-700 rounded-full cursor-pointer">
                                                                {{ level }}
                                                            </ToggleGroupItem>

                                                        </ToggleGroup>
                                                    </div>
                                                    <div class="inline-flex gap-2 mt-4">
                                                        <div class="relative inline-block w-11 h-5">
                                                            <input id="switch-component-desc" v-model="form.is_active"
                                                                type="checkbox"
                                                                class="peer appearance-none w-11 h-5 bg-slate-100 rounded-full checked:bg-[#024625] cursor-pointer transition-colors duration-300" />
                                                            <label for="switch-component-desc"
                                                                class="absolute top-0 left-0 w-5 h-5 bg-white rounded-full border border-slate-300 shadow-sm transition-transform duration-300 peer-checked:translate-x-6 peer-checked:border-slate-800 cursor-pointer">
                                                            </label>
                                                        </div>

                                                        <label for="switch-component-desc"
                                                            class="text-green-900 text-sm cursor-pointer">
                                                            <div>
                                                                <p class="font-medium">
                                                                    Activar Sala
                                                                </p>
                                                                <p class="text-slate-500">
                                                                    Permitir que esteja disponível para o acesso.
                                                                </p>
                                                            </div>
                                                        </label>
                                                    </div>

                                                </section>
                                                <SheetFooter>
                                                    <button type="submit" form="classroom"
                                                        class="flex gap-2 items-center justify-center p-2 text-sm rounded-md border font-semibold border-[#038043] bg-[#038043] text-white hover:bg-[#1fad68] hover:border-[#1fad68] cursor-pointer">
                                                        <Save width="16" />
                                                        Salvar
                                                    </button>
                                                    <SheetClose as-child>
                                                        <button
                                                            class="p-2 text-sm rounded-md border border-[#038043]  text-[#038043] hover:text-[#1fad68] cursor-pointer">Cancelar</button>
                                                    </SheetClose>
                                                </SheetFooter>
                                            </SheetContent>
                                        </Sheet>

                                    </div>
                                </div>

                                <div class="overflow-auto">
                                    <table class="w-full mt-4 text-left table-auto min-w-max">
                                        <thead>
                                            <tr>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                        Descrição
                                                    </p>
                                                </th>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                        Situação
                                                    </p>
                                                </th>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                        Data Registo
                                                    </p>
                                                </th>
                                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                                    </p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="room in rooms.data">
                                                <td class="p-4 border-b border-blue-gray-50">
                                                    <div class="flex items-center gap-3">
                                                        <img v-if="room.image" :src="'/storage/'.concat(room.image)"
                                                            :alt="room.image"
                                                            class="relative inline-block h-10 w-10 !rounded-md object-cover border object-center" />
                                                        <img v-else src="https://picsum.photos/200/300"
                                                            :alt="room.image"
                                                            class="relative inline-block h-10 w-10 !rounded-md object-cover border object-center" />
                                                        <p
                                                            class="block font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                                            {{ room.description }}
                                                        </p>
                                                    </div>
                                                </td>

                                                <td class="p-4 border-b border-blue-gray-50">
                                                    <div class="w-max">
                                                        <div v-if="room.is_active"
                                                            class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 rounded-md select-none whitespace-nowrap bg-green-500/20">
                                                            Activo
                                                        </div>
                                                        <div v-else
                                                            class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-[#b91c1c] bg-[#FEEBE7] rounded-md select-none whitespace-nowrap">
                                                            Inactivo
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-4 border-b border-blue-gray-50">
                                                    <p
                                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                                        {{ new Date(room.created_at).toDateString() }}
                                                    </p>
                                                </td>
                                                <td class="text-right p-4 border-b border-blue-gray-50">
                                                    <form id="e_classroom" @submit.prevent="e_submit" class="m-0">
                                                    </form>
                                                    <Sheet>
                                                        <SheetTrigger as-child>

                                                            <button @click="get_classroom_to_edit(room)"
                                                                class="h-10 max-h-[30px] w-10 max-w-[30px] cursor-pointer select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-[#008236] transition-all hover:bg-[#EDF8F2] active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                type="button">
                                                                <span class="flex justify-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor"
                                                                        class="w-4 h-4">
                                                                        <path
                                                                            d="M12.8995 6.85453L17.1421 11.0972L7.24264 20.9967H3V16.754L12.8995 6.85453ZM14.3137 5.44032L16.435 3.319C16.8256 2.92848 17.4587 2.92848 17.8492 3.319L20.6777 6.14743C21.0682 6.53795 21.0682 7.17112 20.6777 7.56164L18.5563 9.68296L14.3137 5.44032Z">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                            </button>

                                                        </SheetTrigger>
                                                        <SheetContent>
                                                            <SheetHeader>
                                                                <SheetTitle class="text-lg">Sala de Aulas</SheetTitle>
                                                                <SheetDescription>
                                                                    Edite a sala aqui. Clique em
                                                                    <span class="font-semibold">Editar</span> quando
                                                                    terminar.
                                                                </SheetDescription>
                                                            </SheetHeader>
                                                            <section class="grid gap-4 px-4">
                                                                <div class="grid gap-2">
                                                                    <Label for="description">Descrição</Label>
                                                                    <Input id="description" v-model="e_form.description"
                                                                        name="description"
                                                                        placeholder="Ex: 202, DEEL" />
                                                                    <InputError :message="e_form.errors.description" />
                                                                </div>
                                                                <div class="grid gap-2">
                                                                    <Label for="email">Imagem</Label>
                                                                    <Input id="email" type="file" name="room"
                                                                        @input="e_form.image = $event.target.files[0]" />
                                                                    <InputError :message="e_form.errors.image" />
                                                                </div>
                                                                <div class="grid gap-2">
                                                                    <Label for="dp">Departamento</Label>
                                                                    <Popover id="dp" v-model:open="open">
                                                                        <PopoverTrigger as-child>
                                                                            <Button variant="outline" role="combobox"
                                                                                :aria-expanded="open"
                                                                                class="w-full font-normal justify-between cursor-pointer">
                                                                                {{
                                                                                    dp_id.toString()
                                                                                        ? deps_list.find((item: IPopoverItem) =>
                                                                                            item.value
                                                                                            === dp_id)?.label
                                                                                        : 'Selecionar departamento...'
                                                                                }}
                                                                                <ChevronsUpDownIcon
                                                                                    class="ml-2 h-4 w-4 shrink-0 opacity-50" />
                                                                            </Button>
                                                                        </PopoverTrigger>
                                                                        <PopoverContent class="p-0">
                                                                            <Command class="w-full">
                                                                                <CommandInput
                                                                                    placeholder="Buscar departamento..." />
                                                                                <CommandList>
                                                                                    <CommandEmpty class="italic">
                                                                                        Departamento não
                                                                                        encontrado.
                                                                                    </CommandEmpty>
                                                                                    <CommandGroup>
                                                                                        <CommandItem
                                                                                            class="cursor-pointer"
                                                                                            v-for="framework in deps_list"
                                                                                            :key="framework.value"
                                                                                            :value="framework.value"
                                                                                            @select="() => {
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
                                                                    <InputError :message="e_form.errors.image" />
                                                                </div>
                                                                <div class="grid gap-2">
                                                                    <Label for="email">Nível</Label>
                                                                    <ToggleGroup v-model="e_form.level" type="single"
                                                                        default-value="1" class="flex-wrap">
                                                                        <ToggleGroupItem v-for="level in levels"
                                                                            :key="level" :value="level.toString()"
                                                                            class="data-[state=on]:bg-[#04724D] data-[state=on]:text-white data-[state=on]:border-[#04724D] hover:bg-[#EBFAF2] hover:text-black min-h-7 border border-green-700 rounded-full cursor-pointer">
                                                                            {{ level }}
                                                                        </ToggleGroupItem>

                                                                    </ToggleGroup>
                                                                </div>
                                                                <div class="inline-flex gap-2 mt-4">
                                                                    <div class="relative inline-block w-11 h-5">
                                                                        <input id="switch-component-desc"
                                                                            v-model="e_form.is_active" type="checkbox"
                                                                            class="peer appearance-none w-11 h-5 bg-slate-100 rounded-full checked:bg-[#024625] cursor-pointer transition-colors duration-300" />
                                                                        <label for="switch-component-desc"
                                                                            class="absolute top-0 left-0 w-5 h-5 bg-white rounded-full border border-slate-300 shadow-sm transition-transform duration-300 peer-checked:translate-x-6 peer-checked:border-slate-800 cursor-pointer">
                                                                        </label>
                                                                    </div>

                                                                    <label for="switch-component-desc"
                                                                        class="text-green-900 text-sm cursor-pointer">
                                                                        <div>
                                                                            <p class="font-medium">
                                                                                Activar Sala
                                                                            </p>
                                                                            <p class="text-slate-500">
                                                                                Permitir que esteja disponível para o
                                                                                acesso.
                                                                            </p>
                                                                        </div>
                                                                    </label>
                                                                </div>

                                                            </section>
                                                            <SheetFooter>
                                                                <SheetClose as-child>
                                                                    <button type="submit" form="e_classroom"
                                                                        class="flex gap-2 items-center justify-center p-2 text-sm rounded-md border font-semibold border-[#038043] bg-[#038043] text-white hover:bg-[#1fad68] hover:border-[#1fad68] cursor-pointer">
                                                                        <RefreshCcw width="16" />
                                                                        Editar
                                                                    </button>
                                                                </SheetClose>
                                                                <SheetClose as-child>
                                                                    <button type="submit"
                                                                        class="p-2 text-sm rounded-md border border-[#038043]  text-[#038043] hover:text-[#1fad68] cursor-pointer">Cancelar</button>
                                                                </SheetClose>
                                                            </SheetFooter>
                                                        </SheetContent>
                                                    </Sheet>

                                                    <AlertDialog>
                                                        <AlertDialogTrigger
                                                            class="relative cursor-pointer rounded-lg text-center align-middle font-sans text-xs font-medium text-gray-900 uppercase transition-all select-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">

                                                            <button
                                                                class="h-10 max-h-[30px] w-10 max-w-[30px] cursor-pointer select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-[#B32E2E] transition-all hover:bg-[#FAEBEB] active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                type="button">
                                                                <span class="flex justify-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor"
                                                                        class="w-4 h-4">
                                                                        <path
                                                                            d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM9 11V17H11V11H9ZM13 11V17H15V11H13ZM9 4V6H15V4H9Z">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                            </button>

                                                        </AlertDialogTrigger>

                                                        <AlertDialogContent class="rounded-2xl max-w-sm">
                                                            <AlertDialogHeader>
                                                                <AlertDialogTitle class="text-center text-xl">
                                                                    Excluír Sala
                                                                </AlertDialogTitle>
                                                                <AlertDialogDescription class="text-center">
                                                                    Confirma a exclusão permanente da sala<br>
                                                                    <span class="text-[#EC3636]">{{
                                                                        room.description }}
                                                                    </span>?
                                                                </AlertDialogDescription>
                                                            </AlertDialogHeader>
                                                            <AlertDialogFooter class="grid grid-cols-2 gap-2 ">
                                                                <AlertDialogCancel class="my-0 px-3 cursor-pointer">
                                                                    Cancelar
                                                                </AlertDialogCancel>
                                                                <AlertDialogAction
                                                                    class="px-3 cursor-pointer bg-[#EC3636] hover:bg-[#F16A6A]"
                                                                    @click="delete_classroom(room)">
                                                                    Sim, Excluir
                                                                </AlertDialogAction>
                                                            </AlertDialogFooter>
                                                        </AlertDialogContent>
                                                    </AlertDialog>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </section>
                            <Pagination :list="rooms" />
                        </CardContent>
                    </Card>
                </section>

            </div>
        </div>
    </AppLayout>
</template>
