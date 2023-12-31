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
import Checkbox from '@/Components/Checkbox.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineOptions({
	layout: AdminLayout
})

defineProps({
	books: {
		type: Object,
		required: true,
	}
})

const bookDeleteForm = useForm({
	id: null
})

const bookCreateForm = useForm({
	title: '',
	authors: '',
	isbn: '',
	publicated_at: '',
})

const showDeleteModal = ref(false)
const showCreateModal = ref(false)

const handleCloseCreateModal = () => {
	showCreateModal.value = false
}

const handleCreateBook = () => {
	bookCreateForm.post(route('admin.books.store'), {
		onSuccess: () => showCreateModal.value = false,
		onFinish: () => bookCreateForm.reset('name', 'authors', 'isbn', 'publicated_at')
	})
}

const handleOpenDeleteModal = (id) => {
	bookDeleteForm.id = id
	showDeleteModal.value = true
}

const handleCloseDeleteModal = () => {
	showDeleteModal.value = false
}

const handleDeleteBook = () => {
	bookDeleteForm.delete(route('admin.books.destroy'), {
		onSuccess: () => handleCloseDeleteModal(),
		onFinish: () => bookDeleteForm.reset('id')
	})
}

</script>

<template>
	<Head title="Libros" />
	<div class="flex justify-between items-center px-8">
		<h1 class="text-3xl font-bold">Libros</h1>
		<button @click="showCreateModal = true" class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200">Nuevo libro</button>
	</div>

	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-4 gap-4">
			<ResourceCard v-for="      book      in      books      " :key=" book.index "
				@open-delete-modal="handleOpenDeleteModal( book.id )" :edit-route=" route( 'admin.books.edit', book.id ) ">
				<template v-slot:title>{{ book.title.substr( 0, 20 ) }}...</template>
				<template v-slot:subtitle>{{ book.authors }}</template>
				<template v-slot:content>{{ book.publicated_at }}</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseCreateModal " :show=" showCreateModal " :max-width=" 'lg' ">
		<div class="p-4">
			<form @submit.prevent=" handleCreateBook()">
				<div class="mt-4">
					<InputLabel for="title" value="Nombre del libro" />
					<TextInput id="title" type="text" class="mt-1 block w-full" v-model=" bookCreateForm.title " required autocomplete="title" />
					<InputError class="mt-2" :message=" bookCreateForm.errors.title " />
				</div>
				<div class="mt-4">
					<InputLabel for="authors" value="Autor(es) del libro" />
					<TextInput id="authors" type="text" class="mt-1 block w-full" v-model=" bookCreateForm.authors " required autocomplete="authors" />
					<InputError class="mt-2" :message=" bookCreateForm.errors.authors " />
				</div>
				<div class="mt-4">
					<InputLabel for="isbn" value="ISBN" />
					<TextInput id="isbn" type="text" class="mt-1 block w-full" v-model=" bookCreateForm.isbn " required autocomplete="isbn" />
					<InputError class="mt-2" :message=" bookCreateForm.errors.isbn " />
				</div>
				<div class="mt-4">
					<InputLabel for="publicated_at" value="Fecha de publicación" />
					<TextInput id="publicated_at" type="date" class="mt-1 block w-full" v-model=" bookCreateForm.publicated_at " required autocomplete="publicated_at" />
					<InputError class="mt-2" :message=" bookCreateForm.errors.publicated_at " />
				</div>
				<div class="w-full flex justify-end mt-8 gap-4">
					<PrimaryButton :class=" { 'opacity-25': bookCreateForm.processing } " :disabled=" bookCreateForm.processing ">
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
				<h2 class="text-xl">¿Deseas eliminar el libro?</h2>
				<div class="w-full flex justify-end mt-4 gap-4">
					<DangerButton @click="handleDeleteBook()">
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