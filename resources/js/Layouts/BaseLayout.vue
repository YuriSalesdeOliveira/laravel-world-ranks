<template>
    <HeaderLayout />
    <div class="l-container">
        <main class="l-main">
            teste
        </main>
    </div>
</template>
<script setup>

import HeaderLayout from './HeaderLayout.vue';

</script>
<style>
.l-container {
    position: relative;
    width: 100vw;

    .l-main {
        position: absolute;
        width: 90%;
        top: var(--vertical-offset);
        left: 50%;
        translate: -50%;
        padding: 1.5rem 0;
        border: .1rem solid var(--color-primary-dark);
        border-radius: .6rem;
        background-color: var(--color-background);
    }
}
</style>