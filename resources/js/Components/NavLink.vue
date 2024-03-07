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
		? 'inline-flex items-center px-4 py-2 rounded-xl text-md font-bold text-sky-500 transition duration-150 ease-in-out'
		: 'inline-flex items-center px-4 py-2 rounded-xl text-md font-bold text-neutral-500 hover:text-sky-500 transition duration-150 ease-in-out'
);

</script>

<template>
	<Link :href=" href " :class=" classes ">
	<slot />
	</Link>
</template>
