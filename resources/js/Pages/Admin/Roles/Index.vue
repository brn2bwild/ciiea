<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import RoleCard from '@/Components/RoleCard.vue';

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	roles: {
		type: Object,
		required: true,
	}
})
</script>

<template>
	<div>

		<Head title="Roles" />
		<div class="flex justify-between items-center px-8">
			<h1 class="text-3xl font-bold">Roles</h1>
			<button @click="showCreateModal = true"
				class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200">
				Nuevo rol
			</button>
		</div>

		<div class="w-full p-8">
			<section class="grid grid-cols-1 md:grid-cols-3 gap-4">
				<RoleCard v-for="              role in roles              " :key=" role.index "
					@open-delete-modal="handleOpenDeleteModal( role.id )"
					:edit-route=" route( 'admin.roles.edit', role.id ) ">
					<template #name>{{ role.name }}</template>
				</RoleCard>
			</section>
		</div>
	</div>
</template>
