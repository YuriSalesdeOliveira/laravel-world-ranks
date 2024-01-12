<template>
    <BaseLayout>

        <TopBar title="Found 234 countries" />

        <div class="u-wrapper">

            <aside>
                <h3>Sort by</h3>
            </aside>
            
            <Table
                :columns="columns"
                :rows="rows"
                :rules="rules"
            />

        </div>
    </BaseLayout>
</template>

<script setup>

import Table from '../Components/Table.vue';
import TopBar from '../Components/TopBar.vue';
import BaseLayout from '../Layouts/BaseLayout.vue';

const columns = ['Flag', 'Name', 'Population', 'Area(km²)', 'Continent'];
const rows = [
    { flag: 'https://flagicons.lipis.dev/flags/4x3/br.svg', name: 'Brazil', population: '213000000', area: '8515767', continent: 'South America' },
    { flag: 'https://flagicons.lipis.dev/flags/4x3/br.svg', name: 'Brazil', population: '213000000', area: '8515767', continent: 'South America' },
    { flag: 'https://flagicons.lipis.dev/flags/4x3/br.svg', name: 'Brazil', population: '213000000', area: '8515767', continent: 'South America' },
    { flag: 'https://flagicons.lipis.dev/flags/4x3/br.svg', name: 'Brazil', population: '213000000', area: '8515767', continent: 'South America' },
    { flag: 'https://flagicons.lipis.dev/flags/4x3/br.svg', name: 'Brazil', population: '213000000', area: '8515767', continent: 'South America' },
    { flag: 'https://flagicons.lipis.dev/flags/4x3/br.svg', name: 'Brazil', population: '213000000', area: '8515767', continent: 'South America' },
    { flag: 'https://flagicons.lipis.dev/flags/4x3/br.svg', name: 'Brazil', population: '213000000', area: '8515767', continent: 'South America' },
];
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
}
</style>