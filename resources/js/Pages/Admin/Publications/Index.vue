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
			<table class="w-full text-sm text-left text-gray-500">
				<thead class="text-xs text-gray-700 uppercase bg-gray-200">
					<th class="px-4 py-2 text-center">
						Nombre
					</th>
					<th class="px-4 py-2 text-center">
						Fecha de publicación
					</th>
					<th class="px-4 py-2 text-center">
						Etiquetas
					</th>
					<th class="px-4 py-2 text-center">
						Acciones
					</th>
				</thead>
				<tbody>
					<tr v-for=" publication in publications " :key=" publication.index " class="bg-white border-b hover:bg-gray-200">
						<th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap text-center">
							{{ publication.title.substr( 1, 30 ) }}...
						</th>
						<td class="px-6 py-4 text-center">
							{{ publication.publicated_at }}
						</td>
						<td>
							<div class="flex justify-center gap-2">
								<span class="px-1 bg-sky-200 rounded-full">Ciencia</span>
								<span class="px-1 bg-sky-200 rounded-full">Educación</span>

							</div>
						</td>
						<!-- <td>
							<span v-for=" tag in publication.tags " :key=" tag.index ">
								{{ tag }}
							</span>
						</td> -->
						<td class="flex justify-around gap-4 px-6 py-4">
							<Link :href=" route( 'admin.historical-publications.edit', publication.id ) " class="font-semibold text-sky-800">Editar</Link>
							<button @click="handleOpenModal( publication.id )" class="font-semibold text-red-800">Eliminar</button>
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
