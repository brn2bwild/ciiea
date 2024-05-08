<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
	route: {
		type: String,
		required: true,
	},
	count: {
		type: Number,
		required: true,
		default: 0,
	},
	text: {
		type: String,
		required: true,
		default: 'Card'
	},
	icon: {
		type: String,
		default: 'user'
	}
})
</script>
<template>
	<Link :href=" route "
		class="flex flex-col justify-between rounded-lg bg-white hover:bg-neutral-200 transition duration-200 px-8 py-6 h-40">
	<div class="text-xl font-medium leading-tight text-neutral-700">
		{{ text }}
	</div>
	<div class="text-neutral-700 flex justify-between items-end">
		<span class="text-3xl">{{ count }}</span>
		<font-awesome-icon :icon=" { prefix: 'fa', iconName: icon } " class="pr-4 text-neutral-700 text-6xl" />
	</div>
	</Link>
</template>