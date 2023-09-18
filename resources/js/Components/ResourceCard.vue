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
	<div class="relative group">
		<Link :href=" editRoute ">
		<div
			class="h-40 bg-white group-hover:bg-neutral-200 group-hover:ring-1 transition-all duration-200 rounded-xl p-6">
			<h1 class="text-xl">
				<slot name="title" />
			</h1>
			<h2 class="text-neutral-600 mt-4">
				<slot name="subtitle" />
			</h2>
			<h2 class="text-neutral-900 mt-4">
				<slot name="content" />
			</h2>
		</div>
		</Link>
		<button @click=" openModal "
			class="block sm:hidden group-hover:block transition-all duration-200 text-5xl text-red-400 sm:text-red-300 hover:text-red-400 rounded-full absolute top-4 right-4">
			<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'circle-xmark' } " />
		</button>
	</div>
</template>
