<template>
    <header class="c-top-bar">
        <h1 class="c-top-bar__title">{{ title }}</h1>
        <form @submit.prevent="form.get(route('home.index'), { preserveScroll: true, preserveState: true })">
            <Search v-model="form.search" />
        </form>
    </header>
</template>

<script setup>

import { useForm } from '@inertiajs/vue3';
import Search from './Search.vue';

defineProps({
    title: String
});

const form = useForm({
    search: null
});

</script>

<style lang="css" scoped>
.c-top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 6rem;

    .c-top-bar__title {
        user-select: none;
        font-size: 1.6rem;
        color: var(--color-primary);
    }
}
</style>