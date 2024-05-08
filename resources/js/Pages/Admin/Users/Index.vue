<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue"
import { Head, useForm } from "@inertiajs/vue3"
import ResourceCard from "@/Components/ResourceCard.vue"

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	users: {
		type: Object,
		required: true,
	}
})
</script>
<template>

	<Head title="Usuarios" />
	<div class="flex justify-between px-8">
		<h1 class="text-3xl font-bold">
			Usuarios
		</h1>
	</div>
	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-5 gap-4">
			<ResourceCard v-for="       user in users       " :key=" user.index "
				@open-delete-modal="handleOpenDeleteModal( user.id )" :edit-route=" '' ">
				<template #title>{{ user.name }}</template>
				<template #subtitle>

				</template>
				<template #content>
					lkjhljk
				</template>
			</ResourceCard>
		</section>
	</div>
</template>
