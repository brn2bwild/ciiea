<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineOptions({
	layout: AdminLayout
})

defineProps({
	investigations: {
		type: Object,
		required: true
	}
})

const investigationForm = useForm({
	id: null
})

const showModal = ref(false)

const handleOpenModal = (id) => {
	investigationForm.id = id
	showModal.value = true
}

const handleCloseModal = () => {
	showModal.value = false
}

const handleDeleteInvestigation = () => {
	investigationForm.delete(route('admin.investigations.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => investigationForm.reset('id')
	})
}

</script>	
<template>
	<Head title="Investigaciones" />
	<h1 class="text-3xl font-bold pl-8">Investigaciones</h1>
	<div class="w-full p-8">
		<section class="w-full bg-white rounded p-8">
			<table class="w-full text-sm text-left text-gray-500">
				<thead class="text-xs text-gray-700 uppercase bg-gray-200">
					<th class="px-4 py-2 text-center">
						Título
					</th>
					<th class="px-4 py-2 text-center">
						Autores
					</th>
					<th class="px-4 py-2 text-center">
						Fecha de publicación
					</th>
					<th class="px-4 py-2 text-center">
						Acciones
					</th>
				</thead>
				<tbody>
					<tr v-for=" investigation in investigations " :key=" investigation.index " class="bg-white border-b hover:bg-gray-200">
						<th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap text-center">
							{{ investigation.title.substr( 1, 30 ) }}...
						</th>
						<td class="px-6 py-4 text-center">
							{{ investigation.authors }}
						</td>
						<td class="px-6 py-4 text-center">
							{{ investigation.publicated_at }}
						</td>
						<td class="flex justify-around gap-4 px-6 py-4">
							<Link :href=" route( 'admin.investigations.edit', investigation.id ) " class="font-semibold text-sky-800">Editar</Link>
							<button @click="handleOpenModal( investigation.id )" class="font-semibold text-red-800">Eliminar</button>
						</td>
					</tr>
				</tbody>
			</table>
		</section>
	</div>

	<Modal @close=" handleCloseModal " :show=" showModal " :max-width=" 'lg' ">
		<div class="p-8">
			<div class="w-full flex flex-col justify-center items-center">
				<h2 class="text-xl">¿Deseas eliminar el libro?</h2>
				<div class="w-full flex justify-end mt-8 gap-4">
					<DangerButton @click=" handleDeleteInvestigation ">Eliminar</DangerButton>
					<SecondaryButton @click=" handleCloseModal ">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>
