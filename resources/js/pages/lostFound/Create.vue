<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
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
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu"
import { Spinner } from '@/components/ui/spinner';
import { Loader } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import { Waypoints, Layers, ChevronLeft, ChevronRight, GraduationCap } from 'lucide-vue-next';

import { InputGroup, InputGroupAddon, InputGroupButton, InputGroupInput, InputGroupText, InputGroupTextarea } from "@/components/ui/input-group";

import { Check, ChevronsUpDown, Search } from "lucide-vue-next"
import { ref } from "vue"

import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
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
    { id: 2, name: 'Laboral' },
    { id: 3, name: 'Pós-Laboral' }
]

const me = (item: string) => {
    // alert(item);
}

const filter = ref(filters ? filters.at(0)?.name : '')
const handleToggleGroup = (value: any) => {
    if (value) filter.value = value
}

const value = ref<typeof frameworks[0]>()




// import { Button } from '@/components/ui/button'
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog'
// import { Input } from '@/components/ui/input'
// import { Label } from '@/components/ui/label'



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
                        <BreadcrumbLink :href="dashboard().url">
                            Sala
                        </BreadcrumbLink>
                    </BreadcrumbItem1>
                    <BreadcrumbSeparator />

                    <BreadcrumbItem1>
                        <BreadcrumbPage>Perdidos e Achados</BreadcrumbPage>
                    </BreadcrumbItem1>
                </BreadcrumbList>
            </Breadcrumb>

            <section class="grid gap-4">

                <!-- <Dialog>
                    <form>
                        <DialogTrigger as-child>
                            <Button variant="outline">
                                Open Dialog
                            </Button>
                        </DialogTrigger>
                        <DialogContent class="sm:max-w-[425px]">
                            <DialogHeader>
                                <DialogTitle>Edit profile</DialogTitle>
                                <DialogDescription>
                                    Make changes to your profile here. Click save when you're
                                    done.
                                </DialogDescription>
                            </DialogHeader>
                            <div class="grid gap-4">
                                <div class="grid gap-3">
                                    <Label for="name-1">Name</Label>
                                    <Input id="name-1" name="name" default-value="Pedro Duarte" />
                                </div>
                                <div class="grid gap-3">
                                    <Label for="username-1">Username</Label>
                                    <Input id="username-1" name="username" default-value="@peduarte" />
                                </div>
                            </div>
                            <DialogFooter>
                                <DialogClose as-child>
                                    <Button variant="outline">
                                        Cancel
                                    </Button>
                                </DialogClose>
                                <Button type="submit">
                                    Save changes
                                </Button>
                            </DialogFooter>
                        </DialogContent>
                    </form>
                </Dialog> -->


                <div class="">
                    <p class="text-lg font-semibold">Postagem</p>
                </div>
                <div class="grid gap-2">
                    <Label for="email">Titulo</Label>
                    <Input id="email" type="text" name="email" required autofocus :tabindex="1" autocomplete="email"
                        placeholder="email@example.com" />
                    <InputError message="" />
                </div>
                <div class="grid gap-2">
                    <Label for="email">Imagem</Label>
                    <Input id="email" type="file" name="email" required autofocus :tabindex="1" autocomplete="email"
                        placeholder="email@example.com" />
                    <InputError message="" />
                </div>

                <div>
                    <FieldGroup>
                        <FieldSet>
                            <RadioGroup default-value="student" class="grid lg:grid-cols-3">
                                <FieldLabel for="student-e1"
                                    class="cursor-pointer has-[[data-state=checked]]:bg-[#EAFAF5] has-[[data-state=checked]]:border-[#1F8261] dark:has-[[data-state=checked]]:bg-primary/10">
                                    <Field orientation="horizontal">
                                        <FieldContent class="gap-0">
                                            <FieldTitle>Estudante</FieldTitle>
                                            <FieldDescription>
                                                Cobrança limite MZN <span class="font-semibold">50,00</span>
                                                meticais.
                                            </FieldDescription>
                                        </FieldContent>
                                        <RadioGroupItem id="student-e1" value="student" class="text-[#1F8261]" />
                                    </Field>
                                </FieldLabel>
                                <FieldLabel for="teacher-e2"
                                    class="cursor-pointer has-[[data-state=checked]]:bg-[#EAFAF5] has-[[data-state=checked]]:border-[#1F8261] dark:has-[[data-state=checked]]:bg-primary/10">
                                    <Field orientation="horizontal">
                                        <FieldContent class="gap-0">
                                            <FieldTitle>Docente</FieldTitle>
                                            <FieldDescription>
                                                Cobrança limite MZN <span class="font-semibold">10,00</span>
                                                meticais.
                                            </FieldDescription>
                                        </FieldContent>
                                        <RadioGroupItem id="teacher-e2" value="teacher" class="text-[#1F8261]" />
                                    </Field>
                                </FieldLabel>
                                <FieldLabel for="employee-e3"
                                    class="cursor-pointer has-[[data-state=checked]]:bg-[#EAFAF5] has-[[data-state=checked]]:border-[#1F8261] dark:has-[[data-state=checked]]:bg-primary/10">
                                    <Field orientation="horizontal">
                                        <FieldContent class="gap-0">
                                            <FieldTitle>Funcionário</FieldTitle>
                                            <FieldDescription>
                                                Cobrança limite MZN <span class="font-semibold">20,00</span>
                                                meticais.
                                            </FieldDescription>
                                        </FieldContent>
                                        <RadioGroupItem id="employee-e3" value="employee" class="text-[#1F8261]" />
                                    </Field>
                                </FieldLabel>
                            </RadioGroup>
                        </FieldSet>
                    </FieldGroup>
                </div>

                <section class="grid lg:grid-cols-3 gap-2">
                    <div class="grid gap-2">
                        <Label for="email">Código</Label>
                        <Input id="email" type="text" name="email" required autofocus :tabindex="1" autocomplete="email"
                            placeholder="email@example.com" />
                        <InputError message="" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="email">Email Instituicional</Label>
                        <Input id="email" type="text" name="email" required autofocus :tabindex="1" autocomplete="email"
                            placeholder="email@example.com" />
                        <InputError message="" />
                    </div>
                </section>

                <div class="grid gap-2">
                    <Label for="email">Onde encontrou o pertence</Label>
                    <!-- <Input id="email" type="text" name="email" required autofocus :tabindex="1" autocomplete="email"
                        placeholder="email@example.com" /> -->
                    <Select>
                        <SelectTrigger class="w-auto">
                            <SelectValue placeholder="Selecionar o departamento" />
                        </SelectTrigger>
                        <SelectContent>
                            <!-- <SelectGroup> -->
                            <SelectItem value="apple">
                                Cadeiras Gerais
                            </SelectItem>
                            <SelectItem value="banana">
                                Eng. Quimica
                            </SelectItem>
                            <!-- </SelectGroup> -->
                        </SelectContent>
                    </Select>

                    <InputError message="" />
                </div>
                <!-- <div class="grid gap-2">
                    <Label for="email">Quem esta a publicar Docente, estudante, funcionario</Label>
                    <Input id="email" type="text" name="email" required autofocus :tabindex="1" autocomplete="email"
                        placeholder="email@example.com" />
                    <InputError message="" />
                </div> -->
                <!-- <div class="grid gap-2">
                    <Label for="email">Pagar/ Gratis</Label> Mpesa
                    <Input id="email" type="text" name="email" required autofocus :tabindex="1" autocomplete="email"
                        placeholder="email@example.com" />
                    <InputError message="" />
                </div> -->

                <div class="inline-flex gap-2">
                    <div class="relative inline-block w-11 h-5">
                        <input id="switch-component-desc" type="checkbox"
                            class="peer appearance-none w-11 h-5 bg-slate-100 rounded-full checked:bg-[#024625] cursor-pointer transition-colors duration-300" />
                        <label for="switch-component-desc"
                            class="absolute top-0 left-0 w-5 h-5 bg-white rounded-full border border-slate-300 shadow-sm transition-transform duration-300 peer-checked:translate-x-6 peer-checked:border-slate-800 cursor-pointer">
                        </label>
                    </div>

                    <label for="switch-component-desc" class="text-green-900 text-sm cursor-pointer">
                        <div>
                            <p class="font-medium">
                                Aceitar pagamento
                            </p>
                            <p class="text-slate-500">
                                <!-- Poderá habilitar e desabilitar o estado da sua inscrição. -->
                                Forma de agradecimento.
                            </p>
                        </div>
                    </label>
                </div>

                <section class="grid lg:grid-cols-3 gap-2">
                    <div class="grid items-center gap-2">
                        <Label for="name" class="text-right">
                            Conta M-Pesa
                        </Label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-4 h-4 text-slate-600">
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <Input id="contactNumber" type="number"
                                class="w-full bg-transparent placeholder:text-gray-400 text-slate-700 text-sm border border-slate-200 rounded-md pr-3 pl-10 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                placeholder="Ex: 84/85 xxx xxxx" min="1"
                                title="Número de conta M-Pesa deve ser válido: 84/85 xxx xxxx" />
                        </div>
                        <InputError message="" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="amount">Valor</Label>
                        <Input id="amount" type="number" name="amount" min="1" placeholder="Informe o valor" />
                        <InputError message="" />
                    </div>
                </section>

                <div class="py-1 flex flex-col gap-2 lg:flex-row lg:justify-end">
                    <button type="submit"
                        class="p-2 text-sm px-4 font-medium rounded-md border border-[#038043] bg-[#038043] text-white hover:bg-[#1fad68] hover:border-[#1fad68] cursor-pointer">
                        Publicar
                    </button>
                    <button
                        class="p-2 text-sm rounded-md border border-[#038043]  text-[#038043] hover:text-[#1fad68] cursor-pointer">Cancelar</button>
                </div>
            </section>


        </div>
    </AppLayout>
</template>
