<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import {
    Breadcrumb,
    BreadcrumbItem as BreadcrumbItem1,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Label } from "@/components/ui/label"
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

import classrooms from '@/routes/classrooms';



import { Button } from '@/components/ui/button'
import { CheckIcon, ChevronsUpDownIcon, CloudUpload } from 'lucide-vue-next'
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
import { ref } from 'vue';
import { IDepartment, IPopoverItem } from '@/interfaces';
import posts from '@/routes/posts';
import { toast } from 'vue-sonner';


const props = defineProps({
    deps: {
        type: Object,
        required: true
    }
})

let deps_list: IPopoverItem[] = props.deps.map((dep: IDepartment) => ({
    label: dep.description,
    value: dep.id
}))

const open = ref(false)
const department = ref('')

const users = ['student', 'teacher', 'employee']
const usero = ref(users.at(0))


const page = usePage();
const form = useForm({
    title: '',
    image: '',
    type: '',
    color: '',
    can_pay: false,
    is_active: false,
    user: page.props.auth.user.id,
    department: '0'
})

const submit = () => {
    form.department = department.value;
    alert(form.department);
    form.post(posts.store().url, {
        preserveScroll: true,
        onSuccess: () => toast.success('Sua postagem foi publicada'),
        onError: () => toast.error('Ocorreu um erro ao enviar a postagem.')
    });
    form.reset();
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
                        <BreadcrumbLink :href="classrooms.index().url">
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

                <div class="">
                    <p class="text-lg font-semibold">Publicação</p>
                </div>

                <form id="post" @submit.prevent="submit" class="grid gap-4">
                    <div class="grid gap-2">
                        <Label for="title">Título</Label>
                        <Input id="title" v-model="form.title" type="text" name="title" autocomplete="title"
                            placeholder="Informe um titúlo descritivo e claro" />
                        <InputError message="Título é obrigatório" />
                    </div>

                    <section class="grid lg:grid-cols-3 gap-2">
                        <div class="grid gap-2">
                            <Label for="email">Imagem</Label>
                            <Input id="email" type="file" name="image" @input="form.image = $event.target.files[0]"
                                accept="image/*" class="cursor-pointer" />
                            <InputError message="Imagem é obrigatório" />
                        </div>
                        <div class="grid gap-2">
                            <Label for="type">Tipo do bem</Label>
                            <Input id="type" v-model="form.type" type="text" name="type" autocomplete="type"
                                placeholder="Ex: Caderno" />
                            <InputError message="Tipo é obrigatório" />
                        </div>
                        <div class="grid gap-2">
                            <Label for="color">Cor dominante</Label>
                            <Input id="color" v-model="form.color" type="text" name="color" autocomplete="color"
                                placeholder="Ex: Preto" />
                            <InputError message="" />
                        </div>
                    </section>

                    <div>
                        <FieldGroup>
                            <FieldSet>
                                <RadioGroup :default-value="usero" class="grid lg:grid-cols-3">
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
                            <Label for="id">Código</Label>
                            <Input id="id" type="number" name="id" placeholder="Informe o código instituicional" />
                            <InputError message="" />
                        </div>
                        <div class="grid gap-2">
                            <Label for="email">Email Instituicional</Label>
                            <Input id="email" type="text" name="email" placeholder="Ex: nome.apelido@uem.ac.mz" />
                            <InputError message="" />
                        </div>
                    </section>

                    <div class="grid gap-2">
                        <Label for="dp">Onde encontrou o pertence</Label>
                        <Popover id="dp" v-model:open="open">
                            <PopoverTrigger as-child>
                                <Button variant="outline" role="combobox" :aria-expanded="open"
                                    class="w-full font-normal justify-between cursor-pointer">
                                    {{
                                        department
                                            ? deps_list.find((item: IPopoverItem) =>
                                                item.value
                                                === department)?.label
                                            : 'Selecionar departamento...'
                                    }}
                                    <ChevronsUpDownIcon class="ml-2 h-4 w-4 shrink-0 opacity-50" />
                                </Button>
                            </PopoverTrigger>
                            <PopoverContent class="p-0">
                                <Command class="w-full">
                                    <CommandInput placeholder="Buscar departamento..." />
                                    <CommandList>
                                        <CommandEmpty class="italic">
                                            Departamento não
                                            encontrado.
                                        </CommandEmpty>
                                        <CommandGroup>
                                            <CommandItem class="cursor-pointer" v-for="framework in deps_list"
                                                :key="framework.value" :value="framework.value" @select="() => {
                                                    department = department === framework.value ? '' : framework.value
                                                    open = false
                                                }">
                                                <CheckIcon :class="cn(
                                                    'mr-2 h-4 w-4',
                                                    department === framework.value ? 'opacity-100' : 'opacity-0',
                                                )" />
                                                {{ framework.label }}
                                            </CommandItem>
                                        </CommandGroup>
                                    </CommandList>
                                </Command>
                            </PopoverContent>
                        </Popover>
                        <InputError message="e_form.errors.image" />
                    </div>

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
                                    Solicitar Pagamento
                                </p>
                                <p class="text-slate-500">
                                    Receber pagamento para entrega do bem.
                                </p>
                            </div>
                        </label>
                    </div>

                    <section class="grid lg:grid-cols-3 gap-2">
                        <div class="grid items-center gap-2">
                            <Label for="phone" class="text-right">
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
                                <Input id="phone" type="number" name="phone"
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
                </form>

                <div class="py-4 flex flex-col gap-2 lg:flex-row lg:justify-end">
                    <button type="submit" form="post"
                        class="flex gap-1 items-center justify-center p-2 text-sm px-4 font-medium rounded-md border border-[#038043] bg-[#038043] text-white hover:bg-[#1fad68] hover:border-[#1fad68] cursor-pointer">
                        <CloudUpload width="14" />
                        Publicar
                    </button>
                    <button
                        class="p-2 text-sm rounded-md border border-[#038043]  text-[#038043] hover:text-[#1fad68] cursor-pointer">Cancelar</button>
                </div>
            </section>


        </div>
    </AppLayout>
</template>
