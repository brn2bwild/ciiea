<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import ResourceCard from '@/Components/ResourceCard.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AdminCard from '@/Components/AdminCard.vue';

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	administrators: {
		type: Object,
		required: true
	}
})

const administratorCreateForm = useForm({
	name: '',
	email: '',
	password: '',
	password_confirmation: '',
})

const administratorDeleteForm = useForm({
	id: null
})

const showCreateModal = ref(false)
const showDeleteModal = ref(false)

const handleOpenDeleteModal = (id) => {
	administratorDeleteForm.id = id
	showDeleteModal.value = true
}

const handleDeleteAdministrator = () => {
	administratorDeleteForm.delete(route('admin.administrators.destroy'), {
		onSuccess: () => handleCloseDeleteModal(),
		onFinish: () => administratorDeleteForm.reset('id')
	})
}

const handleCreateAdministrator = () => {
	administratorCreateForm.post(route('admin.administrators.store'), {
		onSuccess: () => {
			showCreateModal.value = false
			administratorCreateForm.reset('name', 'email', 'password', 'password_confirmation')
		}
	})
}

const handleCloseCreateModal = () => {
	showCreateModal.value = false
}
const handleCloseDeleteModal = () => {
	showDeleteModal.value = false
}
</script>

<template>

	<Head title="Administradores" />
	<div class="flex justify-between items-center px-8">
		<h1 class="text-3xl font-bold">Administradores</h1>
		<button @click="showCreateModal = true"
			class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200">Nuevo
			administrador</button>
	</div>

	<div class="w-full p-8">
		<section class="w-full flex flex-col gap-4">
			<AdminCard v-for=" administrator in administrators " :key=" administrator.index "
				@open-delete-modal="handleOpenDeleteModal( administrator.id )"
				:edit-route=" route( 'admin.administrators.edit', administrator.id ) ">
				<template #title>{{ administrator.name }}</template>
				<template #subtitle>{{ administrator.email }}</template>
				<template #content>{{ administrator.mobile }}</template>
			</AdminCard>
		</section>
	</div>

	<Modal @close=" handleCloseCreateModal " :show=" showCreateModal " :max-width=" 'lg' ">
		<div class="p-4">
			<form @submit.prevent=" handleCreateAdministrator()">
				<div class="mt-4">
					<InputLabel for="name" value="Nombre del administrador" />
					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" administratorCreateForm.name "
						required autocomplete="name" />
					<InputError class="mt-2" :message=" administratorCreateForm.errors.name " />
				</div>
				<div class="mt-4">
					<InputLabel for="email" value="Correo electrónico" />
					<TextInput id="email" type="email" class="mt-1 block w-full"
						v-model=" administratorCreateForm.email " required autocomplete="email" />
					<InputError class="mt-2" :message=" administratorCreateForm.errors.email " />
				</div>
				<div class="mt-4">
					<InputLabel for="password" value="Contraseña" />
					<TextInput id="password" type="password" class="mt-1 block w-full"
						v-model=" administratorCreateForm.password " required autocomplete="password" />
					<InputError class="mt-2" :message=" administratorCreateForm.errors.password " />
				</div>
				<div class="mt-4">
					<InputLabel for="password_confirmation" value="Confirmar contraseña" />
					<TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
						v-model=" administratorCreateForm.password_confirmation " required
						autocomplete="password_confirmation" />
					<InputError class="mt-2" :message=" administratorCreateForm.errors.password_confirmation " />
				</div>
				<div class="w-full flex justify-end mt-8 gap-4">
					<PrimaryButton :class=" { 'opacity-25': administratorCreateForm.processing } "
						:disabled=" administratorCreateForm.processing ">
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
				<h2 class="text-xl">¿Deseas eliminar el usuario?</h2>
				<div class="w-full flex justify-end mt-4 gap-4">
					<DangerButton @click="handleDeleteAdministrator()">
						Eliminar
					</DangerButton>
					<SecondaryButton @click="handleCloseDeleteModal()">
						Cancelar
					</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>
