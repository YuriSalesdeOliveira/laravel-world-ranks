<template>
    <BaseLayout>

        <TopBar>

            <h1 class="c-top-bar__title">Found 234 countries</h1>

            <form v-on:submit.prevent="form.get(route('home.index'), { preserveScroll: true, preserveState: true })">
                <Search v-model="form.search" />
            </form>

        </TopBar>

        <div class="u-wrapper">

            <aside class="c-aside">

                <h3 class="c-aside__title">Sort by</h3>
                
                <select
                        class="c-aside__select"
                        v-model="form.column"
                        v-on:change="form.get(route('home.index'), { preserveScroll: true, preserveState: true })"
                    >

                    <option value="name" class="c-aside__option">
                        Name
                    </option>

                    <option value="population" class="c-aside__option">
                        Population
                    </option>

                    <option value="area" class="c-aside__option">
                        Area(km²)
                    </option>

                    <option value="continent" class="c-aside__option">
                        Continent
                    </option>

                </select>

                <h3 class="c-aside__title">Continents</h3>

                <div class="c-aside__continents">

                    <label :for="continent.toLowerCase().replace(' ', '_')" class="c-aside__continent"
                        v-for="continent in continents">

                        <input
                            type="checkbox"
                            :value="continent"
                            :id="continent.toLowerCase().replace(' ', '_')" class="c-aside__checkbox"
                            v-model="form.continents"
                            v-on:change="form.get(route('home.index'), { preserveScroll: true, preserveState: true })"
                        >

                        {{ continent }}

                    </label>

                </div>

                <h3 class="c-aside__title">Status</h3>

                <div class="c-aside__country-status">

                    <label :for="status.toLowerCase().replace(' ', '_')" class="c-aside__status"
                        v-for="status in countryStatus">

                        <input
                            type="checkbox"
                            :value="status"
                            :id="status.toLowerCase().replace(' ', '_')"
                            class="c-aside__checkbox"
                        >

                        {{ status }}

                    </label>

                </div>

            </aside>

            <div>

                <Table>
                    <thead>
                        <tr class="c-table__row">

                            <th class="c-table__header">
                                Flag
                            </th>

                            <th class="c-table__header">
                                Name
                            </th>

                            <th class="c-table__header">
                                Population
                            </th>

                            <th class="c-table__header">
                                Area(km²)
                            </th>

                            <th class="c-table__header">
                                Continent
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="c-table__row" v-for="country in countries.data">

                            <td class="c-table__data">
                                <img :src="country.flag" :alt="country.name" class="c-table__image">
                            </td>

                            <td>
                                {{ country.name }}
                            </td>


                            <td>
                                {{ country.population }}
                            </td>


                            <td>
                                {{ country.area }}
                            </td>


                            <td>
                                {{ country.continent }}
                            </td>

                        </tr>
                    </tbody>
                </Table>

                <Pagination :pagination="countries" />

            </div>

        </div>

    </BaseLayout>
</template>

<script setup>

import BaseLayout from '../Layouts/BaseLayout.vue';
import Pagination from '../Components/Pagination.vue';
import Search from '../Components/Search.vue'
import Table from '../Components/Table.vue';
import TopBar from '../Components/TopBar.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    countries: Object,
    continents: Array,
    countryStatus: Array
});

const form = useForm({
    column: null,
    continents: [],
    status: null,
    search: null
});

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