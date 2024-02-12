<template>
    <BaseLayout>

        <TopBar title="Found 234 countries" />

        <div class="u-wrapper">

            <aside>
                <h3>Sort by</h3>
            </aside>
            
            <div>

                <Table
                    :columns="columns"
                    :rows="countries.data"
                    :rules="rules"
                />

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
    countries: Object
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
}
</style>