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
	},
});

const classes = computed(() =>
	props.active
		? 'flex items-left px-8 py-2 text-md border-0 font-medium leading-5 text-neutral-50 bg-rose-900 transition duration-150 ease-in-out focus:bg-rose-900 focus:text-neutral-50'
		: 'flex items-left px-8 py-2 text-md border-0 font-medium leading-5 text-neutral-900 hover:text-neutral-50 hover:bg-rose-900 transition-all duration-200 ease-in-out'
);
</script>

<template>
	<Link :href=" href " :class=" classes ">
	<slot />
	</Link>
</template>