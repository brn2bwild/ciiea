<script setup>
import { computed } from 'vue';
// import { Link } from '@inertiajs/vue3';

const props = defineProps({
	href: {
		type: String,
		required: true,
	},
	active: {
		type: Boolean,
		required: true,
	},
});

const classes = computed(() =>
	props.active
		? 'flex items-left px-4 py-2 border-0 font-bold leading-5 text-neutral-50 bg-sky-500 transition duration-200 ease-in-out focus:bg-neutral-200 focus:text-sky-500 rounded-full'
		: 'flex items-left px-4 py-2 border-0 font-bold leading-5 text-neutral-500 hover:text-sky-500 hover:bg-neutral-200 transition duration-200 ease-in-out rounded-full'
);
</script>

<template>
	<Link :href=" href " :class=" classes ">
	<slot />
	</Link>
</template>