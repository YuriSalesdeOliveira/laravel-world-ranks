<template>
    <header class="l-header">

        <img
            :src="headerBackground"
            alt="metade do planeta terra"
            class="l-header__background"
        >

        <img
            :src="logo"
            alt="logo world ranks"
            class="l-header__logo"
        >

    </header>
</template>

<script setup>

import headerBackground from '../assets/images/header-background.jpg'
import logo from '../assets/images/logo.svg'

</script>

<style lang="css" scoped>
.l-header {
    position: relative;
    width: 100%;
    height: 38rem;

    .l-header__background {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .l-header__logo {
        position: absolute;
        top: calc(50% + (var(--vertical-offset) / 2));
        left: 50%;
        translate: -50%;
    }
}
</style>