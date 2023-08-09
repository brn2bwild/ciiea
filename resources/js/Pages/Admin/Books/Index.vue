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
	uuid: '',
});

const showModal = ref(false);

const openModalFn = (uuid) => {
	bookForm.uuid = uuid;
	showModal.value = true;
};

const closeModalFn = () => {
	showModal.value = false;
};

const deleteBookFn = () => {
	bookForm.delete(route('admin.books.destroy'), {
		onSuccess: () => closeModalFn(),
		onFinish: () => bookForm.reset('uuid')
	})
};

</script>

<template>
	<Head title="Libros" />
	<h1 class="text-3xl font-bold pl-8">Libros</h1>
	<div class="w-full p-8">
		<section class="w-full bg-white rounded p-8">
			<table class="w-full">
				<thead class="flex justify-between">
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
					<tr v-for=" book  in  books  " :key=" book.index " class="flex justify-between">
						<td>
							{{ book.title.substr( 1, 30 ) }}...
						</td>
						<td>
							{{ book.authors }}
						</td>
						<td>
							{{ book.publication_date }}
						</td>
						<td class="flex justify-between gap-4">
							<Link :href=" route( 'admin.books.edit', book.uuid ) ">Editar</Link>
							<!-- <Link @click="openModalFn" method="post" as="button" :href=" route( 'admin.books.destroy', book.uuid ) ">Eliminar</Link> -->
							<button @click="openModalFn(book.uuid)">Eliminar</button>
						</td>
					</tr>
				</tbody>
			</table>
		</section>
	</div>
	<Modal @close=" closeModalFn " :show=" showModal " :max-width=" 'lg' ">
		<div class="p-8">
			<div class="w-full flex flex-col justify-center items-center">
				<h2 class="text-xl">¿Deseas eliminar el libro?</h2>
				<div class="w-full flex justify-end mt-8 gap-4">
					<DangerButton @click="deleteBookFn()">Eliminar</DangerButton>
					<SecondaryButton @click="closeModalFn()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>