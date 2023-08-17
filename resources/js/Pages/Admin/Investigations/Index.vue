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
			<table class="w-full table-auto">
				<thead>
					<th>
						Título
					</th>
					<th>
						Autores
					</th>
					<th>
						Fecha de publicación
					</th>
					<th>
						Acciones
					</th>
				</thead>
				<tbody>
					<tr v-for="    investigation    in    investigations    " :key=" investigation.index ">
						<td>
							{{ investigation.title.substr( 1, 30 ) }}...
						</td>
						<td>
							{{ investigation.authors }}
						</td>
						<td>
							{{ investigation.publicated_at }}
						</td>
						<td class="flex justify-between gap-4">
							<Link :href=" route( 'admin.investigations.edit', investigation.id ) ">Editar</Link>
							<button @click="handleOpenModal( investigation.id )">Eliminar</button>
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
