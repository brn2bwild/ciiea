<script setup>
const props = defineProps({
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
			class="flex h-40 bg-white group-hover:bg-neutral-200 group-hover:ring-1 transition-all duration-200 rounded-xl p-4">
			<img src="/storage/images/default-contact.png" alt="avatar-img" class="h-20 mr-4">
			<div>
				<div class="text-lg font-bold truncate">
					<slot name="title" />
				</div>
				<div class="text-neutral-600 mt-1 truncate">
					<slot name="subtitle" />
				</div>
				<div class="text-neutral-900 mt-1 truncate">
					<slot name="content" />
				</div>
			</div>
		</div>
		</Link>
		<button @click=" openModal "
			class="block sm:hidden group-hover:block transition-all duration-200 text-5xl text-red-400 sm:text-red-300 hover:text-red-400 rounded-full absolute top-4 right-4">
			<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'circle-xmark' } " />
		</button>
	</div>
</template>
