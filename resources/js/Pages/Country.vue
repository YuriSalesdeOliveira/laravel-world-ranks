<template>
    <BaseLayout>

        <div class="c-country">

            <div class="u-wrapper">
                <img :src="country.flag" :alt="country.name" class="c-country__image">

                <h1 class="c-country__title">
                    {{ country.name }}
                </h1>

                <p class="c-country__subtitle">
                    {{ country.continent }}
                </p>

                <div class="c-country__data">
                    <div class="c-country__population">
                        <span class="c-country__highlight">Population</span>
                        {{ country.population }}
                    </div>

                    <div class="c-country__area">
                        <span class="c-country__highlight">Area(km²)</span>
                        {{ country.area }}
                    </div>
                </div>

                <div class="c-country__same-continent">
                    <h2 class="c-country__subsection-title">
                        Same Continent
                    </h2>

                    <ul class="c-country__list">
                        <li v-for="country in sameContinentCountries">
                            <Link :href="'/countries/' + country.id">
                                <figure class="c-country__figure">
                                    <img :src="country.flag" :alt="country.name" class="c-country__list-image">
                                    <figcaption class="c-country__caption">
                                        {{ country.name }}
                                    </figcaption>
                                </figure>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </BaseLayout>
</template>

<script setup>

import BaseLayout from "../Layouts/BaseLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    country: Object,
    sameContinentCountries: Array,
});

</script>

<style scoped>
.c-country {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;

    .u-wrapper {
        max-width: 58rem;
        display: flex;
        flex-direction: column;
        align-items: center;

        transform: translateY(-100px);

        .c-country__image {
            margin-bottom: 2rem;
        }

        .c-country__title {
            margin-bottom: 1rem;
            font-size: 1.8rem;
            color: white;
        }

        .c-country__subtitle {
            margin-bottom: 4rem;
            font-size: 1.4rem;
            color: white;
        }

        .c-country__data {
            display: flex;
            gap: 8rem;
            margin-bottom: 4rem;

            .c-country__population,
            .c-country__area {
                --gap: 2.8rem;

                display: flex;
                gap: var(--gap);
                padding: 2rem;
                font-size: 1.4rem;
                color: white;
                border-radius: 0.6rem;
                background-color: var(--color-primary-dark);

                .c-country__highlight {
                    position: relative;

                    &:after {
                        content: "";
                        position: absolute;
                        top: 50%;
                        left: 100%;
                        transform: translate(calc(var(--gap) / 2), -50%);
                        width: 0.1rem;
                        height: 150%;
                        background-color: var(--color-background);
                    }
                }
            }
        }

        .c-country__same-continent {
            .c-country__subsection-title {
                margin-bottom: 2rem;
                font-size: 1.6rem;
                color: var(--color-primary);
            }

            .c-country__list {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                gap: 0.8rem;

                .c-country__figure {
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    gap: 1.8rem;

                    .c-country__list-image {
                        width: 100%;
                        aspect-ratio: 3/3;
                    }

                    .c-country__caption {
                        font-size: 1.2rem;
                        color: white;
                    }
                }
            }
        }
    }
}
</style>
