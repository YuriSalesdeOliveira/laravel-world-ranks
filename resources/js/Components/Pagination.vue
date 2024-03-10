<template>
    <div class="c-pagination">

        <div class="c-pagination__wrapper">

            <Link :href="linkInCurrentPage(prevPageURL)" preserve-scroll preserve-state
                :class="['c-pagination__control', prevPageURL ? '' : 'is-inactive']">

                <PrevIcon width="6" class="c-pagination__icon" />

            </Link>

            <ul class="c-pagination_links">

                <li v-for="link in clearLinks" :class="['c-pagination__link', link.active ? 'is-active' : '']">
                    <Link :href="linkInCurrentPage(link.url)" preserve-scroll preserve-state>
                        {{ link.label }}
                    </Link>
                </li>

            </ul>

            <Link :href="linkInCurrentPage(nextPageURL)" preserve-scroll preserve-state
                :class="['c-pagination__control', nextPageURL ? '' : 'is-inactive']">

                <NextIcon width="6" class="c-pagination__icon" />

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

const prevPageURL = computed(() => {
    return props.pagination.prev_page_url ?? '';
});

const nextPageURL = computed(() => {
    return props.pagination.next_page_url ?? '';
});

const linkInCurrentPage = (link) => {

    if (!link) {
        return link;
    }

    link = new URL(link);
    let currentURL = new URL(window.location.href);

    if (link === currentURL) {

        return link.toString();
    }

    currentURL.searchParams.forEach((value, key) => {
        if (!link.searchParams.has(key)) {
            link.searchParams.set(key, value);
        }
    })

    return link.toString();
};
</script>

<style scoped>
.c-pagination {
    user-select: none;
    width: 100%;
    display: flex;
    justify-content: flex-end;
    padding: 1rem 0;
    font-size: 1.4rem;
    color: white;

    .c-pagination__wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1.5rem;

        .c-pagination__control {
            padding: .8rem;

            .c-pagination__icon {
                fill: var(--color-primary);
            }

            &:hover {
                .c-pagination__icon {
                    fill: var(--color-primary);
                }
            }

            &.is-inactive {
                pointer-events: none;
                opacity: .5;
            }
        }

        .c-pagination_links {
            display: flex;
            gap: 1.5rem;

            .c-pagination__link {
                position: relative;
                transition: all linear .2s;
                color: var(--color-primary);

                &:hover {
                    color: white;
                }

                &.is-active {
                    &::after {
                        content: '';
                        position: absolute;
                        left: 50%;
                        bottom: -.8rem;
                        transform: translateX(-50%);
                        width: .5rem;
                        height: .1rem;
                        background-color: var(--color-primary);
                    }
                }
            }
        }
    }
}
</style>
