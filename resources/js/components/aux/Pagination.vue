<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import { ChevronLeft, ChevronRight } from 'lucide-vue-next';

const props = defineProps({
    list: {
        type: Object,
        required: true
    }
});

const newLinks = computed(() => {
    const length: number = props.list.links.length;
    return props.list.links.slice(1, length == 0 ? 0 : length - 1);
})
</script>
<template>
    <div class="flex justify-between items-center pt-4">
        <div class="text-sm text-green-900 grid md:grid-cols-2 md:gap-1 lg:grid-cols-2 lg:gap-1">
            <p>Mostrando</p>
            <p><b>{{ list.from }}-{{ list.to }}</b> de {{ list.total }}</p>
        </div>
        <div class="flex space-x-1">
            <Link :href="list.prev_page_url ?? ''" :disabled="!list.prev_page_url"
                :class="!list.prev_page_url ? 'opacity-50 pointer-events-none' : ''"
                class="flex items-center ease min-h-10 min-w-10 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
            <ChevronLeft width="16" />
            </Link>
            <Link v-for="(page, index) in newLinks" :key="index" :href="page.url ?? ''"
                :class="page.active ? 'text-white border-[#038043] bg-[#038043] ' : 'text-green-500 bg-white border-slate-200 hover:bg-slate-50 hover:border-slate-400'"
                class="flex justify-center items-center ease min-h-10 min-w-10 rounded border px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-[#1fad68] hover:bg-[#1fad68]">
            {{ page.label }}</Link>
            <Link :href="list.next_page_url ?? ''" :disabled="!list.next_page_url"
                :class="!list.next_page_url ? 'opacity-50 pointer-events-none' : ''"
                class="flex items-center ease min-h-10 min-w-10 rounded border border-slate-200 bg-white px-3 py-1 text-sm font-normal text-slate-500 transition duration-200 hover:border-slate-400 hover:bg-slate-50">
            <ChevronRight width="16" />
            </Link>
        </div>
    </div>
</template>