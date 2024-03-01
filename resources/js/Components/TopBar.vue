<template>
    <header class="c-top-bar">
        <slot></slot>
    </header>
</template>

<script setup>

</script>

<style lang="css">
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