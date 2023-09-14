<script setup>
import { Link, Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import ResourceCard from '@/Components/ResourceCard.vue';

defineOptions({
	layout: AdminLayout
})

defineProps({
	books: {
		type: Object,
		required: true,
	}
})

const bookForm = useForm({
	id: null
})

const showModal = ref(false)

const handleOpenDeleteModal = (id) => {
	bookForm.id = id
	showModal.value = true
}

const handleCloseModal = () => {
	showModal.value = false
}

const handleDeleteBook = () => {
	bookForm.delete(route('admin.books.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => bookForm.reset('id')
	})
}

</script>

<template>
	<Head title="Libros" />
	<h1 class="text-3xl font-bold pl-8">Libros</h1>

	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-4 gap-4">
			<!-- <div v-for=" book in books " :key=" book.index " class="relative group">
				<Link :href=" route( 'admin.books.edit', book.id ) ">
				<div class="h-40 bg-white group-hover:bg-neutral-200 transition-all duration-200 rounded-xl p-6">
					<h1 class="text-xl">{{ book.title.substring(1, 20) }}...</h1>
					<h2 class="text-neutral-600 mt-4">{{ book.authors }}</h2>
					<h2 class="text-neutral-900 mt-4">{{ book.publicated_at }}</h2>
				</div>
				</Link>
				<button @click="handleOpenDeleteModal( book.id )"
					class="block sm:hidden group-hover:block transition-all duration-200 text-5xl text-red-300 sm:text-white hover:text-red-300 rounded-full absolute top-4 right-4">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'circle-xmark' } " />
				</button>
			</div> -->
			<ResourceCard v-for=" book in books " :key=" book.index " @open-delete-modal="handleOpenDeleteModal( book.id )"
				:edit-route=" route( 'admin.books.edit', book.id ) ">
				<template v-slot:title>{{ book.title.substr( 0, 20 ) }}...</template>
				<template v-slot:subtitle>{{ book.authors }}</template>
				<template v-slot:content>{{ book.publicated_at }}</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseModal " :show=" showModal " :max-width=" 'lg' ">
		<div class="p-8">
			<div class="w-full flex flex-col justify-center items-center">
				<h2 class="text-xl">¿Deseas eliminar el libro?</h2>
				<div class="w-full flex justify-end mt-8 gap-4">
					<DangerButton @click="handleDeleteBook()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>