<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
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

        </div>
    </AppLayout>
</template>
