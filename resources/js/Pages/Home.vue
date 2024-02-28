<template>
    <BaseLayout>

        <TopBar title="Found 234 countries" />

        <div class="u-wrapper">

            <aside class="c-aside">

                <h3 class="c-aside__title">Sort by</h3>

                <select name="sort_by" class="c-aside__select">
                    <option
                        value="option"
                        class="c-aside__option"
                        v-for="option in columns"
                    >

                        {{ option }}

                    </option>
                </select>

                <h3 class="c-aside__title">Continents</h3>

                <div class="c-aside__continents">

                    <label
                        :for="continent.toLowerCase().replace(' ', '_')"
                        class="c-aside__continent"
                        v-for="continent in continents"
                    >

                        <input
                            type="checkbox"
                            name="continent"
                            :value="continent"
                            :id="continent.toLowerCase().replace(' ', '_')"
                            class="c-aside__checkbox"
                        >

                        {{ continent }}

                    </label>

                </div>

                <h3 class="c-aside__title">Status</h3>

                <div class="c-aside__country-status">

                    <label
                        :for="status.toLowerCase().replace(' ', '_')"
                        class="c-aside__status"
                        v-for="status in countryStatus"
                    >

                        <input
                            type="checkbox"
                            name="status"
                            :value="status"
                            :id="status.toLowerCase().replace(' ', '_')"
                            class="c-aside__checkbox"
                        >

                        {{ status }}

                    </label>

                </div>

            </aside>

            <div>

                <Table :columns="columns" :rows="countries.data" :rules="rules" />

                <Pagination :pagination="countries" />

            </div>

        </div>

    </BaseLayout>
</template>

<script setup>

import BaseLayout from '../Layouts/BaseLayout.vue';
import Pagination from '../Components/Pagination.vue';
import Table from '../Components/Table.vue';
import TopBar from '../Components/TopBar.vue';

const props = defineProps({
    countries: Object,
    continents: Array,
    countryStatus: Array
});

const columns = ['Flag', 'Name', 'Population', 'Area(km²)', 'Continent'];

const rules = {
    flag: {
        type: 'image',
        attributes: {
            alt: 'country flag'
        }
    }
}

</script>

<style lang="css" scoped>
.u-wrapper {
    width: 100%;
    display: grid;
    grid-template-columns: 35rem 1fr;
    gap: .5rem;

    .c-aside {

        .c-aside__title {
            margin-bottom: 2rem;
            font-size: 1.2rem;
            color: var(--color-primary);
        }

        .c-aside__select {
            cursor: pointer;
            width: 100%;
            max-width: 25rem;
            margin-bottom: 4rem;
            padding: 1rem;
            font-size: 1.4rem;
            color: white;
            box-shadow: 0 0 .2rem .2rem var(--color-primary-dark);
            border-radius: .6rem;
            background-color: transparent;

            .c-aside__option {
                font-size: 1.4rem;
                color: black;
            }
        }

        .c-aside__continents {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            margin-bottom: 4rem;

            .c-aside__continent {
                cursor: pointer;
                display: inline-block;
                padding: 1rem;
                font-size: 1.4rem;
                color: var(--color-primary);
                border-radius: .6rem;

                &:has(.c-aside__checkbox:checked) {
                    color: white;
                    background-color: var(--color-primary-dark);
                }

                .c-aside__checkbox {
                    display: none;
                }
            }
        }

        .c-aside__country-status {
            display: flex;
            flex-direction: column;
            gap: .8rem;

            .c-aside__status {
                cursor: pointer;
                display: flex;
                align-items: center;
                gap: .8rem;
                font-size: 1.4rem;
                color: white;

                .c-aside__checkbox {
                    --size: 1.8rem;

                    position: relative;
                    width: var(--size);
                    height: var(--size);

                    &::after {
                        content: '';
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        translate: -50% -50%;
                        width: var(--size);
                        height: var(--size);
                        display: block;
                        border: .2rem solid var(--color-primary);
                        border-radius: .4rem;
                        background-color: var(--color-background);
                    }

                    &:checked::after {
                        border-color: var(--color-highlight);
                        background-color: var(--color-highlight);
                    }
                }
            }
        }
    }
}
</style>