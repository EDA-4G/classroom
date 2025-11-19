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
import {
    Tabs,
    TabsContent,
    TabsList,
    TabsTrigger,
} from '@/components/ui/tabs'

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
                <Tabs default-value="account">
                    <TabsList class="flex justify-start flex-wrap">
                        <TabsTrigger value="account">
                            Anúncios
                        </TabsTrigger>
                        <TabsTrigger value="password">
                            Salas/Departamentos
                        </TabsTrigger>
                        <TabsTrigger value="a">
                            Repositorio Instituicional
                        </TabsTrigger>
                        <TabsTrigger value="b">
                            Achados e perdidos/ Remover
                        </TabsTrigger>
                        <TabsTrigger value="c">
                            Informa
                        </TabsTrigger>
                    </TabsList>

                    <TabsContent value="account">
                        <Card>
                            <CardHeader>
                                <CardTitle>Account</CardTitle>
                                <CardDescription>
                                    Make changes to your account here. Click save when you're
                                    done.
                                </CardDescription>
                            </CardHeader>
                            <CardContent class="grid gap-6">
                                <div class="grid gap-3">
                                    <Label for="tabs-demo-name">Name</Label>
                                    <Input id="tabs-demo-name" default-value="Pedro Duarte" />
                                </div>
                                <div class="grid gap-3">
                                    <Label for="tabs-demo-username">Username</Label>
                                    <Input id="tabs-demo-username" default-value="@peduarte" />
                                </div>
                            </CardContent>
                            <CardFooter>
                                <Button>Save changes</Button>
                            </CardFooter>
                        </Card>
                    </TabsContent>

                    <TabsContent value="password">
                        <Card>
                            <CardHeader>
                                <CardTitle>Password</CardTitle>
                                <CardDescription>
                                    Change your password here. After saving, you'll be logged
                                    out.
                                </CardDescription>
                            </CardHeader>
                            <CardContent class="grid gap-6">
                                <div class="grid gap-3">
                                    <Label for="tabs-demo-current">Current password</Label>
                                    <Input id="tabs-demo-current" type="password" />
                                </div>
                                <div class="grid gap-3">
                                    <Label for="tabs-demo-new">New password</Label>
                                    <Input id="tabs-demo-new" type="password" />
                                </div>
                            </CardContent>
                            <CardFooter>
                                <Button>Save password</Button>
                            </CardFooter>
                        </Card>
                    </TabsContent>
                </Tabs>
            </div>

        </div>
    </AppLayout>
</template>
