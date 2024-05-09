<script setup>
const props = defineProps({
	links: {
		type: Array,
		required: true
	}
})
</script>

<template>
    <div>
        <template v-for="link in $props.links">
            <Link v-if="link.url" :href="link.url" class="px-3 py-2 mx-1 text-neutral-950 font-bold rounded-lg" :class="link.active ? 'bg-neutral-200': ''">{{ link.label }}</Link>
            <span v-else class="px-3 py-2 mx-1 text-neutral-500 font-bold rounded-lg">{{ link.label }}</span>
        </template>
    </div>
</template>
