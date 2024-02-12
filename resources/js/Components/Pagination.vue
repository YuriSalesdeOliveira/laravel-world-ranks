<template>
    <div class="c-pagination">

        <div class="c-pagination__wrapper">

            <Link v-if="pagination.prev_page_url" :href="pagination.prev_page_url" preserve-scroll
                class="c-pagination__control c-pagination__prev">

                <PrevIcon class="c-pagination__icon" />

            </Link>

            <ul class="c-pagination_links">

                <li v-for="link in clearLinks" :class="['c-pagination__link', link.active ? 'is-active' : '']">
                    <Link :href="link.url" preserve-scroll>
                        {{ link.label }}
                    </Link>
                </li>

            </ul>

            <Link v-if="pagination.next_page_url" :href="pagination.next_page_url" preserve-scroll
                class="c-pagination__control c-pagination__next">

                <NextIcon class="c-pagination__icon" />

            </Link>

        </div>

    </div>
</template>

<script setup>

import { computed } from 'vue';
import { Link } from '@inertiajs/vue3'

import PrevIcon from './Icons/Prev.vue';
import NextIcon from './Icons/Next.vue';

const props = defineProps({
    pagination: Object
});

const clearLinks = computed(() => {

    const clearLinks = props.pagination.links;
    clearLinks.shift();
    clearLinks.pop();

    return clearLinks;
});

</script>

<style scoped>
.c-pagination {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 1rem 0;
    font-size: 1.4rem;
    color: white;

    .c-pagination__wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        gap: 2rem;

        .c-pagination__control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);

            .c-pagination__icon {
                fill: white;
            }

            &:hover {
                .c-pagination__icon {
                    fill: var(--color-primary);
                }
            }
        }

        .c-pagination__prev {
            left: -4rem;
        }

        .c-pagination__next {
            right: -4rem;
        }

        .c-pagination_links {
            display: flex;
            gap: 1.5rem;

            .c-pagination__link {
                position: relative;
                transition: all linear .2s;

                &:hover {
                    color: var(--color-primary);
                }

                &.is-active {
                    &::after {
                        content: '';
                        width: .8rem;
                        height: 2px;
                        display: block;
                        position: absolute;
                        left: 50%;
                        bottom: -.8rem;
                        transform: translateX(-50%);
                        background-color: var(--color-primary);
                    }
                }
            }
        }
    }
}
</style>