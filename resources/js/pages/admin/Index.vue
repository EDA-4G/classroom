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
                    <TabsList class="flex justify-start flex-wrap border">
                        <TabsTrigger value="account" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20">
                                <path
                                    d="M128 128C92.7 128 64 156.7 64 192L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 192C576 156.7 547.3 128 512 128L128 128zM480 248L480 392C480 405.3 469.3 416 456 416C448.9 416 442.5 412.9 438.1 408C427.9 413.1 416.3 416 404 416C362 416 328 382 328 340C328 298 362 264 404 264C413.9 264 423.3 265.9 432 269.3L432 248C432 234.7 442.7 224 456 224C469.3 224 480 234.7 480 248zM432 340C432 324.5 419.5 312 404 312C388.5 312 376 324.5 376 340C376 355.5 388.5 368 404 368C419.5 368 432 355.5 432 340zM224 272C215.2 272 208 279.2 208 288L208 320L256 320L256 288C256 279.2 248.8 272 240 272L224 272zM256 368L208 368L208 392C208 405.3 197.3 416 184 416C170.7 416 160 405.3 160 392L160 288C160 252.7 188.7 224 224 224L240 224C275.3 224 304 252.7 304 288L304 392C304 405.3 293.3 416 280 416C266.7 416 256 405.3 256 392L256 368z" />
                            </svg>
                            Anúncios
                        </TabsTrigger>
                        <TabsTrigger value="password" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20">
                                <path
                                    d="M192 144C222.9 144 248 118.9 248 88C248 57.1 222.9 32 192 32C161.1 32 136 57.1 136 88C136 118.9 161.1 144 192 144zM176 576L176 416C176 407.2 183.2 400 192 400C200.8 400 208 407.2 208 416L208 576C208 593.7 222.3 608 240 608C257.7 608 272 593.7 272 576L272 240L400 240C417.7 240 432 225.7 432 208C432 190.3 417.7 176 400 176L384 176L384 128L576 128L576 320L384 320L384 288L320 288L320 336C320 362.5 341.5 384 368 384L592 384C618.5 384 640 362.5 640 336L640 112C640 85.5 618.5 64 592 64L368 64C341.5 64 320 85.5 320 112L320 176L197.3 176C151.7 176 108.8 197.6 81.7 234.2L14.3 324.9C3.8 339.1 6.7 359.1 20.9 369.7C35.1 380.3 55.1 377.3 65.7 363.1L112 300.7L112 576C112 593.7 126.3 608 144 608C161.7 608 176 593.7 176 576z" />
                            </svg>
                            Salas de Aulas
                        </TabsTrigger>
                        <TabsTrigger value="a" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20">
                                <path
                                    d="M128 512L512 512C547.3 512 576 483.3 576 448L576 208C576 172.7 547.3 144 512 144L362.7 144C355.8 144 349 141.8 343.5 137.6L305.1 108.8C294 100.5 280.5 96 266.7 96L128 96C92.7 96 64 124.7 64 160L64 448C64 483.3 92.7 512 128 512z" />
                            </svg>
                            Repositorio Instituicional
                        </TabsTrigger>
                        <TabsTrigger value="b" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20">
                                <path
                                    d="M320 48C337.7 48 352 62.3 352 80L352 98.3C450.1 112.3 527.7 189.9 541.7 288L560 288C577.7 288 592 302.3 592 320C592 337.7 577.7 352 560 352L541.7 352C527.7 450.1 450.1 527.7 352 541.7L352 560C352 577.7 337.7 592 320 592C302.3 592 288 577.7 288 560L288 541.7C189.9 527.7 112.3 450.1 98.3 352L80 352C62.3 352 48 337.7 48 320C48 302.3 62.3 288 80 288L98.3 288C112.3 189.9 189.9 112.3 288 98.3L288 80C288 62.3 302.3 48 320 48zM160 320C160 408.4 231.6 480 320 480C408.4 480 480 408.4 480 320C480 231.6 408.4 160 320 160C231.6 160 160 231.6 160 320zM320 224C373 224 416 267 416 320C416 373 373 416 320 416C267 416 224 373 224 320C224 267 267 224 320 224z" />
                            </svg>
                            Achados e Perdidos
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
