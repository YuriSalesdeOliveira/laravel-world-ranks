<template>
    <label
        for="c-search__input"
        class="c-search">

        <button class="c-search__button">
            <img
                :src="searchIcon"
                alt=""
                class="c-search__icon"
            >
        </button>

        <input
            type="text"
            name="search"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            id="c-search__input"
            class="c-search__input"
            placeholder="Search by Name, Continent, Subcontinent"
        >

    </label>
</template>

<script setup>

import searchIcon from '../assets/images/icons/search.svg'

defineProps({
    modelValue: String
});

defineEmits([
    'update:modelValue'
]);

</script>

<style lang="css" scoped>
.c-search {
    width: 32rem;
    height: 4rem;
    display: grid;
    grid-template-columns: 4rem 1fr;
    border-radius: .6rem;
    background-color: var(--color-primary-dark);
    overflow: hidden;

    .c-search__button {
        cursor: pointer;
        background-color: transparent;

        .c-search__icon {
            width: 2.2rem;
        }
    }

    .c-search__input {
        font-size: 1.4rem;
        color: var(--color-primary);
        background-color: transparent;

        &::placeholder {
            color: var(--color-primary);
        }
    }
}
</style>