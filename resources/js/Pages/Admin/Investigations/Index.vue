<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ResourceCard from "@/Components/ResourceCard.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import PdfThumbnail from "@/Components/PdfThumbnail.vue";

defineOptions({
	layout: AdminLayout
})

defineProps({
	investigations: {
		type: Object,
		required: true
	}
})

const investigationDeleteForm = useForm({
	id: null
})
const investigationCreateForm = useForm({
	title: '',
	authors: '',
	short_description: '',
	publicated_at: '',
})

const showDeleteModal = ref(false)
const showCreateModal = ref(false)

const handleCloseCreateModal = () => {
	showCreateModal.value = false
}

const handleCreateInvestigation = () => {
	investigationCreateForm.post(route('admin.investigations.store'), {
		onSuccess: () => showCreateModal.value = false,
		onFinish: () => investigationCreateForm.reset('title', 'authors', 'short_description', 'publicated_at')
	})
}

const handleOpenDeleteModal = (id) => {
	investigationDeleteForm.id = id
	showDeleteModal.value = true
}

const handleCloseModal = () => {
	showDeleteModal.value = false
}

const handleDeleteInvestigation = () => {
	investigationDeleteForm.delete(route('admin.investigations.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => investigationDeleteForm.reset('id')
	})
}

</script>
<template>

	<Head title="Investigaciones" />
	<div class="flex justify-between px-8">
		<h1 class="text-3xl font-bold">
			Investigaciones
		</h1>
		<button @click="showCreateModal = true"
			class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200">
			Nueva investigación
		</button>
	</div>
	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-5 gap-4">
			<ResourceCard v-for="      investigation in investigations      " :key=" investigation.index "
				@open-delete-modal="handleOpenDeleteModal( investigation.id )"
				:edit-route=" route( 'admin.investigations.edit', investigation.id ) ">
				<template v-slot:image class="overflow-hidden">
					<PdfThumbnail v-if=" investigation.file " :url=" investigation.file.path " :scale=" 0.5 " />
					<img v-else src="/storage/images/bookshelve-optimized.jpg" alt="default-image" />
				</template>
				<template v-slot:title>{{ investigation.title }}...</template>
				<template v-slot:subtitle>{{ investigation.publicated_at }}</template>
				<template v-slot:content>{{ investigation.authors }}
				</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseCreateModal " :show=" showCreateModal " :max-width=" 'lg' ">
		<div class="p-4">
			<form @submit.prevent=" handleCreateInvestigation()">
				<div class="mt-4">
					<InputLabel for="title" value="Título de la investigación" />
					<TextInput id="title" type="text" class="mt-1 block w-full"
						v-model=" investigationCreateForm.title " required autocomplete="title" />
					<InputError class="mt-2" :message=" investigationCreateForm.errors.title " />
				</div>
				<div class="mt-4">
					<InputLabel for="authors" value="Autor(es) de la investigación" />
					<TextInput id="authors" type="text" class="mt-1 block w-full"
						v-model=" investigationCreateForm.authors " required autocomplete="authors" />
					<InputError class="mt-2" :message=" investigationCreateForm.errors.authors " />
				</div>
				<div class="mt-4">
					<InputLabel for="publicated_at" value="Fecha de publicación" />
					<TextInput id="publicated_at" type="date" class="mt-1 block w-full"
						v-model=" investigationCreateForm.publicated_at " required autocomplete="publicated_at" />
					<InputError class="mt-2" :message=" investigationCreateForm.errors.publicated_at " />
				</div>
				<div class="mt-4">
					<InputLabel for="short_description" value="Descripción breve" />
					<TextInput id="short_description" type="text" class="mt-1 block w-full"
						v-model=" investigationCreateForm.short_description " required
						autocomplete="short_description" />
					<InputError class="mt-2" :message=" investigationCreateForm.errors.short_description " />
				</div>
				<div class="w-full flex justify-end mt-8 gap-4">
					<PrimaryButton :class=" { 'opacity-25': investigationCreateForm.processing } "
						:disabled=" investigationCreateForm.processing ">
						Guardar
					</PrimaryButton>
					<SecondaryButton @click="handleCloseCreateModal()">
						Cancelar
					</SecondaryButton>
				</div>
			</form>
		</div>
	</Modal>

	<Modal @close=" handleCloseModal " :show=" showDeleteModal " :max-width=" 'lg' ">
		<div class="p-4">
			<div class="w-full flex flex-col justify-center items-center">
				<font-awesome-icon :icon=" [ 'fa', 'triangle-exclamation' ] " class="text-neutral-900 text-8xl mb-4" />
				<h2 class="text-xl">¿Deseas eliminar la investigación?</h2>
				<div class="w-full flex justify-end mt-4 gap-4">
					<DangerButton @click=" handleDeleteInvestigation ">Eliminar</DangerButton>
					<SecondaryButton @click=" handleCloseModal ">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>
