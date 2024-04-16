<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import ResourceCard from '@/Components/ResourceCard.vue';
import { ref } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';

defineOptions({
	layout: AdminLayout
})

defineProps({
	resources:	{
		type: Object,
		required: true
	}
})


const resourceForm = useForm({
	id: null
})
const resourceCreateForm = useForm({
	name: '',
	description: '',
})

const showDeleteModal = ref(false)
const showCreateModal = ref(false)

const handleCloseCreateModal = () => {
	showCreateModal.value = false
}
const handleCreateSoftware = () => {
	resourceCreateForm.post(route('admin.resources.store'), {
		onSuccess: () => showCreateModal.value = false,
		onFinish: () => resourceCreateForm.reset('name', 'description')
	})
}

const handleOpenDeleteModal = (id) => {
	resourceForm.id = id
	showDeleteModal.value = true
}
const handleCloseModal = () => {
	showDeleteModal.value = false
}
const handleDeleteresource = () => {
	resourceForm.delete(route('admin.resources.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => resourceForm.reset('id')
	})
}
</script>
<template>

	<Head title="Infografías" />
	<div class="flex justify-between items-center px-8">
		<h1 class="text-3xl font-bold">Infografías</h1>
		<button @click="showCreateModal = true"
			class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200">Nueva infografía</button>
	</div>

	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-5 gap-4">
			<ResourceCard v-for=" resource in resources " :key=" resource.index " @open-delete-modal="handleOpenDeleteModal( resource.id )" 
				:edit-route=" route( 'admin.resources.edit', resource.id ) ">
				<template v-slot:title class="truncate">{{ resource.name }}</template>
				<template v-slot:subtitle></template>
				<template v-slot:content>{{ resource.description }}</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseCreateModal " :show=" showCreateModal " :max-width=" 'lg' ">
		<div class="p-4">
			<form @submit.prevent=" handleCreateSoftware()">
				<div class="mt-4">
					<InputLabel for="title" value="Título de la infografía" />
					<TextInput id="title" type="text" class="mt-1 block w-full" v-model=" resourceCreateForm.title " required
						autocomplete="title" />
					<InputError class="mt-2" :message=" resourceCreateForm.errors.title " />
				</div>
				<div class="w-full flex justify-end mt-8 gap-4">
					<PrimaryButton :class=" { 'opacity-25': resourceCreateForm.processing } " :disabled=" resourceCreateForm.processing ">
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
				<h2 class="text-xl">¿Deseas eliminar la infografía?</h2>
				<div class="w-full flex justify-end mt-4 gap-4">
					<DangerButton @click="handleDeleteresource()">
						Eliminar
					</DangerButton>
					<SecondaryButton @click="handleCloseModal()">
						Cancelar
					</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>
