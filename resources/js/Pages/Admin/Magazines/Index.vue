<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import ResourceCard from '@/Components/ResourceCard.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineOptions({
	layout: AdminLayout
})

defineProps({
	magazines: {
		type: Array,
		required: true,
	}
})

const magazineDeleteForm = useForm({
	id: null
})

const magazineCreateForm = useForm({
	name: '',
	publicated_at: '',
})

const showDeleteModal = ref(false)
const showCreateModal = ref(false)

const handleCloseCreateModal = () => {
	showCreateModal.value = false
}

const handleCreateMagazine = () => {
	magazineCreateForm.post(route('admin.magazines.store'), {
		onSuccess: () => showCreateModal.value = false,
		onFinish: () => magazineCreateForm.reset('name', 'publicated_at')
	})
}

const handleOpenDeleteModal = (id) => {
	magazineDeleteForm.id = id
	showDeleteModal.value = true
}

const handleCloseDeleteModal = () => {
	showDeleteModal.value = false;
}

const handleDeleteMagazine = () => {
	magazineDeleteForm.delete(route('admin.magazines.destroy'), {
		onSuccess: () => handleCloseDeleteModal(),
		onFinish: () => magazineDeleteForm.reset('id')
	})
}

</script>

<template>
	<Head title="Revistas" />
	<div class="flex justify-between px-8">
		<h1 class="text-3xl font-bold">
			Revistas
		</h1>
		<button @click="showCreateModal = true"
			class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200">
			Nueva revista
		</button>
	</div>

	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-4 gap-4">
			<ResourceCard v-for="  magazine   in   magazines  " :key=" magazine.index "
				@open-delete-modal="handleOpenDeleteModal( magazine.id )"
				:edit-route=" route( 'admin.magazines.edit', magazine.id ) ">
				<template v-slot:title>{{ magazine.name.substr( 0, 20 ) }}...</template>
				<template v-slot:subtitle>{{ magazine.publicated_at }}</template>
				<template v-slot:content>
					<div class="flex justify-center gap-2">
						<span class="px-1 bg-sky-200 rounded-full">Ciencia</span>
						<span class="px-1 bg-sky-200 rounded-full">Educación</span>
					</div>
				</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseCreateModal " :show=" showCreateModal " :max-width=" 'lg' ">
		<div class="p-4">
			<form @submit.prevent=" handleCreateMagazine()">
				<div class="mt-4">
					<InputLabel for="name" value="Nombre de la revista" />
					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" magazineCreateForm.name " required
						autocomplete="name" />
					<InputError class="mt-2" :message=" magazineCreateForm.errors.name " />
				</div>
				<div class="mt-4">
					<InputLabel for="publicated_at" value="Fecha de publicación" />
					<TextInput id="publicated_at" type="date" class="mt-1 block w-full" v-model=" magazineCreateForm.publicated_at "
						required autocomplete="publicated_at" />
					<InputError class="mt-2" :message=" magazineCreateForm.errors.publicated_at " />
				</div>
				<div class="w-full flex justify-end mt-8 gap-4">
					<PrimaryButton :class=" { 'opacity-25': magazineCreateForm.processing } " :disabled=" magazineCreateForm.processing ">
						Guardar
					</PrimaryButton>
					<SecondaryButton @click="handleCloseCreateModal()">
						Cancelar
					</SecondaryButton>
				</div>
			</form>
		</div>
	</Modal>

	<Modal @close=" handleCloseDeleteModal " :show=" showDeleteModal " :max-width=" 'lg' ">
		<div class="p-4">
			<div class="w-full flex flex-col justify-center items-center">
				<font-awesome-icon :icon=" [ 'fa', 'triangle-exclamation' ] " class="text-neutral-900 text-8xl mb-4" />
				<h2 class="text-xl">¿Deseas eliminar la revista?</h2>
				<div class="w-full flex justify-end mt-4 gap-4">
					<DangerButton @click="handleDeleteMagazine()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseDeleteModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>
