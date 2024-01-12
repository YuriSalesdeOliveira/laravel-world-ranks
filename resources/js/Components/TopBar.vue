<template>
    <header class="c-top-bar">
        <h1 class="c-top-bar__title">{{ title }}</h1>
        <Search />
    </header>
</template>

<script setup>

import Search from './Search.vue';

defineProps({
    title: String
})

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