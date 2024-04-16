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
	software_resources:	{
		type: Object,
		required: true
	}
})


const softwareForm = useForm({
	id: null
})
const softwareCreateForm = useForm({
	name: '',
	description: '',
})

const showDeleteModal = ref(false)
const showCreateModal = ref(false)

const handleCloseCreateModal = () => {
	showCreateModal.value = false
}
const handleCreateSoftware = () => {
	softwareCreateForm.post(route('admin.software.store'), {
		onSuccess: () => showCreateModal.value = false,
		onFinish: () => softwareCreateForm.reset('name', 'description')
	})
}

const handleOpenDeleteModal = (id) => {
	softwareForm.id = id
	showDeleteModal.value = true
}
const handleCloseModal = () => {
	showDeleteModal.value = false
}
const handleDeleteSoftware = () => {
	softwareForm.delete(route('admin.software.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => softwareForm.reset('id')
	})
}
</script>
<template>

	<Head title="Software Educativo" />
	<div class="flex justify-between items-center px-8">
		<h1 class="text-3xl font-bold">Software Educativo</h1>
		<button @click="showCreateModal = true"
			class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200">Nuevo
			software</button>
	</div>

	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-5 gap-4">
			<ResourceCard v-for=" software_resource in software_resources " :key=" software_resource.index " @open-delete-modal="handleOpenDeleteModal( software_resource.id )" 
				:edit-route=" route( 'admin.software.edit', software_resource.id ) "
				:image-path=" ( software_resource.image !== null ? software_resource.image.path : null ) ">
				<template v-slot:title class="truncate">{{ software_resource.name }}</template>
				<template v-slot:subtitle></template>
				<template v-slot:content>{{ software_resource.description }}</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseCreateModal " :show=" showCreateModal " :max-width=" 'lg' ">
		<div class="p-4">
			<form @submit.prevent=" handleCreateSoftware()">
				<div class="mt-4">
					<InputLabel for="name" value="Nombre del software" />
					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" softwareCreateForm.name " required
						autocomplete="name" />
					<InputError class="mt-2" :message=" softwareCreateForm.errors.name " />
				</div>
				<div class="mt-4">
					<InputLabel for="description" value="Descripción" />
					<TextInput id="description" type="text" class="mt-1 block w-full" v-model=" softwareCreateForm.description " required
						autocomplete="description" />
					<InputError class="mt-2" :message=" softwareCreateForm.errors.description " />
				</div>
				<div class="w-full flex justify-end mt-8 gap-4">
					<PrimaryButton :class=" { 'opacity-25': softwareCreateForm.processing } " :disabled=" softwareCreateForm.processing ">
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
				<h2 class="text-xl">¿Deseas eliminar el software?</h2>
				<div class="w-full flex justify-end mt-4 gap-4">
					<DangerButton @click="handleDeleteSoftware()">
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