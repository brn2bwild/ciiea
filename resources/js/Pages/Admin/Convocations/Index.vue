<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { ref } from "vue";
import { Head, useForm } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ResourceCard from "@/Components/ResourceCard.vue";

defineOptions({
	layout: AdminLayout
})

defineProps({
	convocations: {
		type: Object,
		required: true,
	}
})

const convocationForm = useForm({
	id: null
})

const showModal = ref(false)

const handleOpenDeleteModal = (id) => {
	convocationForm.id = id
	showModal.value = true
}
const handleCloseModal = () => {
	showModal.value = false
}

const handleDeleteConvocation = () => {
	convocationForm.delete(route('admin.convocations.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => convocationForm.reset('id')
	})
}
</script>
<template>
	<Head title="Convocatorias" />
	<h1 class="text-3xl font-bold pl-8">Convocatorias</h1>

	<div class="w-full p-8">
		<!-- <section class="w-full bg-white rounded p-8">
			<table class="w-full text-sm text-left text-gray-500">
				<thead class="text-xs text-gray-700 uppercase bg-gray-200">
					<th class="px-4 py-2 text-center">
						Nombre
					</th>
					<th class="px-4 py-2 text-center">
						Fecha
					</th>
					<th class="px-4 py-2 text-center">
						Locación
					</th>
					<th class="px-4 py-2 text-center">
						Acciones
					</th>
				</thead>
				<tbody>
					<tr v-for="   convocation   in   convocations   " :key=" convocation.index "
						class="bg-white border-b hover:bg-gray-200">
						<th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap text-center">
							{{ convocation.name.substr( 1, 30 ) }}
						</th>
						<td class="px-6 py-4 text-center">
							{{ convocation.date }}
						</td>
						<td class="px-6 py-4 text-center">
							{{ convocation.location.substr( 1, 30 ) }}
						</td>
						<td class="flex justify-around gap-4 px-6 py-4">
							<Link :href=" route( 'admin.convocations.edit', convocation.id ) " class="font-semibold text-sky-800">Editar
							</Link>
							<button @click="handleOpenDeleteModal( convocation.id )" class="font-semibold text-red-800">Eliminar</button>
						</td>
					</tr>
				</tbody>
			</table>
		</section> -->

		<section class="grid grid-cols-1 md:grid-cols-4 gap-4">
			<ResourceCard v-for=" convocation in convocations " :key=" convocation.index "
				@open-delete-modal="handleOpenDeleteModal( convocation.id )"
				:edit-route=" route( 'admin.convocations.edit', convocation.id ) ">
				<template v-slot:title>{{ convocation.name.substr( 0, 20 ) }}...</template>
				<template v-slot:subtitle>{{ convocation.date }}</template>
				<template v-slot:content>{{ convocation.location.substr( 1, 20 ) }}...
				</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseModal " :show=" showModal " :max-width=" 'lg' ">
		<div class="p-8">
			<div class="w-full flex flex-col justify-center items-center">
				<h2 class="text-xl">¿Deseas eliminar el libro?</h2>
				<div class="w-full flex justify-end mt-8 gap-4">
					<DangerButton @click="handleDeleteConvocation()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>

