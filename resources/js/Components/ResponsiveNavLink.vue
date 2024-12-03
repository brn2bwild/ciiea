<script setup>
import { computed } from "vue";
// import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? "block w-full pl-3 pr-4 py-3 border-0 text-left text-base font-medium text-neutral-50 bg-sky-900 focus:outline-none focus:text-neutral-50 focus:bg-sky-900 transition duration-150 ease-in-out"
        : "block w-full pl-3 pr-4 py-3 border-0 border-transparent text-left text-base font-medium text-neutral-600 hover:text-neutral-50 hover:bg-sky-900 focus:outline-none focus:text-neutral-50 focus:bg-neutral-50 transition duration-150 ease-in-out",
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
