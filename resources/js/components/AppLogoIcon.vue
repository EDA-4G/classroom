<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <svg class="svg-item" viewBox="0 0 100 100" fill="currentColor" stroke="currentColor">
        <use xlink:href="/storage/logo.svg" />
    </svg>
</template>
