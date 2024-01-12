<template>
    <table class="c-table">
        <thead>
            <tr class="c-table__row">
                <th
                    class="c-table__header"
                    v-for="column in columns">

                    {{ column }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr
                class="c-table__row"
                v-for="row in rows">

                <td
                    class="c-table__data"
                    v-for="column in formattedColumns">

                    <img
                        :src="row[column]"
                        :alt="rules[column].attributes?.alt"
                        class="c-table__image"
                        v-if="rules && column in rules"
                    >

                    <template v-else>{{ row[column] }}</template>

                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>

const props = defineProps({
    columns: Array,
    rows: Array,
    rules: Object
});

function getAllFormattedColumns() {

    const formattedColumns = props.columns.map(column => {
        return column.toLowerCase().replace(/\([^)]*\)/, '');
    });

    return formattedColumns;
}

const formattedColumns = getAllFormattedColumns();

</script>

<style lang="css" scoped>
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
                border-radius: .6rem;
            }
        }
    }
}
</style>