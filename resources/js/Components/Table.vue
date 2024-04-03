<template>
    <table class="c-table">
        <slot></slot>
    </table>
</template>

<script setup>

</script>

<style lang="css">
.c-table {
    border-collapse: separate;
    border-spacing: 2rem;
    width: 100%;
    color: white;

    .c-table__row {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--color-primary);

        &:has(.c-table__header) {
            border-bottom: .1rem solid var(--color-primary-dark);
        }

        .c-table__header {
            padding: 2rem 0;
            text-align: left;
        }

        .c-table__data {
            vertical-align: middle;

            &:has(.c-table__image) {
                padding: .8rem .8rem .8rem 0;
            }

            .c-table__image {
                width: 100%;
                max-width: 8rem;
                object-fit: cover;
                border-radius: .6rem;
            }
        }
    }
}
</style>