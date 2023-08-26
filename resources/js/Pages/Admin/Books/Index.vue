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
		<section class="grid grid-cols-1 md:grid-cols-4 gap-4">
			<div v-for=" book in books " :key=" book.index " class="relative group">
				<Link :href=" route( 'admin.books.edit', book.id ) ">
				<div class="h-40 bg-neutral-50 group-hover:bg-neutral-400 transition-all duration-200 rounded-xl p-6">
					<h1 class="text-xl">{{ book.title.substring(1, 20) }}...</h1>
					<h2 class="text-neutral-600 mt-4">{{ book.authors }}</h2>
					<h2 class="text-neutral-900 mt-4">{{ book.publicated_at }}</h2>
				</div>
				</Link>
				<button @click="handleOpenModal( book.id )"
					class="block sm:hidden group-hover:block transition-all duration-200 text-5xl text-red-300 sm:text-neutral-50 hover:text-red-300 rounded-full absolute bottom-4 right-4">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'circle-xmark' } " />
				</button>
			</div>
		</section>
		<!-- <section class="w-full bg-white rounded p-8">
			<table class="w-full text-sm text-left text-gray-500">
				<thead class="text-xs text-gray-700 uppercase bg-gray-200">
					<th class="px-4 py-2 text-center">
						Título
					</th>
					<th class="px-4 py-2 text-center">
						Autores
					</th>
					<th class="px-4 py-2 text-center">
						Fecha de publicación
					</th>
					<th class="px-4 py-2 text-center">
						Acciones
					</th>
				</thead>
				<tbody>
					<tr class="bg-white border-b hover:bg-gray-200" v-for=" book in books " :key=" book.index ">
						<th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap text-center">
							{{ book.title.substr( 1, 20 ) }}...
						</th>
						<td class="px-6 py-4 text-center">
							{{ book.authors }}
						</td>
						<td class="px-6 py-4 text-center">
							{{ book.publicated_at }}
						</td>
						<td class="flex justify-around px-6 py-4">
							<Link :href=" route( 'admin.books.edit', book.id ) " class="font-semibold cursor-pointer text-sky-800">
							Editar</Link>
							<button @click="handleOpenModal( book.id )"
								class="font-semibold cursor-pointer text-red-800">Eliminar</button>
						</td>
					</tr>
				</tbody>
			</table>
		</section> -->
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