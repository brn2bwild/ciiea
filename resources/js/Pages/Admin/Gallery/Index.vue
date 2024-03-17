<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ResourceCard from '@/Components/ResourceCard.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	events: {
		type: Object,
		required: true,
	}
})

const eventDeleteForm = useForm({
	id: null
})
const eventCreateForm = useForm({
	name: '',
	date: '',
})

const showDeleteModal = ref(false)
const showCreateModal = ref(false)

const handleCloseCreateModal = () => {
	showCreateModal.value = false
}
const handleCreateEvent = () => {
	eventCreateForm.post(route('admin.gallery.store'), {
		onSuccess: () => showCreateModal.value = false,
		onFinish: () => eventCreateForm.reset('name', 'date')
	})
}

const handleOpenDeleteModal = (id) => {
	eventDeleteForm.id = id
	showDeleteModal.value = true
}
const handleCloseModal = () => {
	showDeleteModal.value = false
}
const handleDeleteEvent = () => {
	eventDeleteForm.delete(route('admin.gallery.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => eventDeleteForm.reset('id')
	})
}
</script>

<template>

	<Head title="Galería" />
	<div class="flex justify-between px-8">
		<h1 class="text-3xl font-bold">Galería</h1>
		<button @click="showCreateModal = true"
			class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200">Nuevo
			evento</button>
	</div>
	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-5 gap-4">
			<ResourceCard v-for="    event    in    events    " :key=" event.index "
				:edit-route=" route( 'admin.gallery.edit', event.id ) " @open-delete-modal="handleOpenDeleteModal( event.id )">
				<template #title>{{ event.name }}</template>
				<template #subtitle>{{ event.date }}</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseCreateModal " :show=" showCreateModal " :max-width=" 'lg' ">
		<div class="p-4">
			<form @submit.prevent=" handleCreateEvent()">
				<div class="mt-4">
					<InputLabel for="name" value="Nombre del evento" />
					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" eventCreateForm.name " required
						autocomplete="name" />
					<InputError class="mt-2" :message=" eventCreateForm.errors.name " />
				</div>
				<div class="mt-4">
					<InputLabel for="date" value="Fecha del evento" />
					<TextInput id="date" type="date" class="mt-1 block w-full" v-model=" eventCreateForm.date " required
						autocomplete="date" />
					<InputError class="mt-2" :message=" eventCreateForm.errors.date " />
				</div>
				<div class="w-full flex justify-end mt-8 gap-4">
					<PrimaryButton :class=" { 'opacity-25': eventCreateForm.processing } "
						:disabled=" eventCreateForm.processing ">
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
				<h2 class="text-xl">¿Deseas eliminar el evento?</h2>
				<span>Se borrarán las imágenes relacionadas</span>
				<div class="w-full flex justify-end mt-4 gap-4">
					<DangerButton @click="handleDeleteEvent()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>
