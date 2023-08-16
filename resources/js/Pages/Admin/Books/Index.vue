<script setup>
import { Link, Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

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

const handleOpenModal = (id) => {
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
		<section class="w-full bg-white rounded p-8">
			<table class="w-full table-auto">
				<thead>
					<th>
						Título
					</th>
					<th>
						Autores
					</th>
					<th>
						Fecha de publicación
					</th>
					<th>
						Acciones
					</th>
				</thead>
				<tbody>
					<tr v-for="    book     in     books     " :key=" book.index ">
						<td>
							{{ book.title.substr( 1, 30 ) }}...
						</td>
						<td>
							{{ book.authors }}
						</td>
						<td>
							{{ book.publicated_at }}
						</td>
						<td class="flex justify-between gap-4">
							<Link :href=" route( 'admin.books.edit', book.id ) ">Editar</Link>
							<!-- <Link @click="handleOpenModal" method="post" as="button" :href=" route( 'admin.books.destroy', book.id ) ">Eliminar</Link> -->
							<button @click="handleOpenModal( book.id )">Eliminar</button>
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
					<DangerButton @click="handleDeleteBook()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>