<script setup>
defineProps({
	editRoute: {
		type: String,
		required: true,
	}
})

const emit = defineEmits(['openDeleteModal'])

const openModal = () => {
	emit('openDeleteModal')
}
</script>

<template>
	<div class="bg-white p-4 rounded-lg">
		<slot name="name"/>
	</div>
</template>
