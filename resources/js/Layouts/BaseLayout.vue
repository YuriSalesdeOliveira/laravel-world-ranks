<template>
    <HeaderLayout />
    <div class="u-container">
        <main class="l-main">
            <slot></slot>
        </main>
    </div>
</template>

<script setup>

import HeaderLayout from './HeaderLayout.vue';

</script>

<style lang="css" scoped>
.u-container {
    position: relative;
    width: 100%;

    .l-main {
        position: absolute;
        width: 130rem;
        top: var(--vertical-offset);
        left: 50%;
        translate: -50%;
        padding: 2rem 2.5rem;
        border: .1rem solid var(--color-primary-dark);
        border-radius: .6rem;
        background-color: var(--color-background);
    }
}
</style>