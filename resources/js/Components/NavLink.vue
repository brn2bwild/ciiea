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
        ? "inline-flex items-center p-5 text-md font-bold text-neutral-50 bg-sky-900 transition duration-150 ease-in-out"
        : "inline-flex items-center p-5 text-md font-bold text-neutral-500 hover:bg-sky-900 hover:text-neutral-50 transition duration-150 ease-in-out",
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
