<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { ref } from "vue";

defineOptions({
	layout: AdminLayout,
})

defineProps({
	publications: {
		type: Object,
		required: true,
	}
})

const showModal = ref(false)

const publicationForm = useForm({
	id: null,
})

const handleOpenModal = (id) => {
	publicationForm.id = id
	showModal.value = true
}

const handleCloseModal = () => {
	showModal.value = false
}

const handleDeletePublication = () => {
	publicationForm.delete( route('admin.historical-publications.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => publicationForm.reset('id')
	})
}
</script>
<template>
	<Head title="Publicaciones históricas" />
	<h1 class="text-3xl font-bold pl-8">Publicaciones Históricas</h1>
	<div class="w-full p-8">
		<section class="w-full bg-white rounded p-8">
			<table class="w-full table-auto">
				<thead>
					<th>
						Nombre
					</th>
					<th>
						Fecha de publicación
					</th>
					<th>
						Etiquetas
					</th>
					<th>
						Acciones
					</th>
				</thead>
				<tbody>
					<tr v-for="  publication  in  publications  " :key=" publication.index ">
						<td>
							{{ publication.title.substr( 1, 30 ) }}...
						</td>
						<td>
							{{ publication.publicated_at }}
						</td>
						<!-- <td>
							<span v-for=" tag in publication.tags " :key=" tag.index ">
								{{ tag }}
							</span>
						</td> -->
						<td class="flex justify-between gap-4">
							<Link :href=" route( 'admin.historical-publications.edit', publication.id ) ">Editar</Link>
							<button @click="handleOpenModal( publication.id )">Eliminar</button>
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
					<DangerButton @click="handleDeletePublication()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>
