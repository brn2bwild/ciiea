<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, useForm, usePage } from "@inertiajs/vue3";
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineOptions({
	layout: AdminLayout
});

const props = defineProps({
	book: {
		type: Object,
		required: true
	}
});

const bookForm = useForm({
	uuid: props.book.uuid,
	title: props.book.title,
	authors: props.book.authors,
	isbn: props.book.isbn,
	publication_date: props.book.publication_date,
});

</script>

<template>
	<Head title="Libros" />
	<h1 class="text-3xl font-bold pl-8">Editar libro</h1>
	<div class="w-full p-8">
		<section class="w-full bg-white rounded p-8">
			<form @submit.prevent="bookForm.patch( route( 'admin.books.update' ) )">
				<div>
					<InputLabel for="title" value="Título del libro" />
					<TextInput id="title" type="text" class="mt-1 block w-full" v-model=" bookForm.title " required autofocus
						autocomplete="title" />
					<InputError class="mt-2" :message=" bookForm.errors.title " />
				</div>
				<div class="mt-4">
					<InputLabel for="authors" value="Autor(es)" />
					<TextInput id="authors" type="text" class="mt-1 block w-full" v-model=" bookForm.authors " required autofocus
						autocomplete="title" />
					<InputError class="mt-2" :message=" bookForm.errors.authors " />
				</div>
				<div class="flex justify-between mt-4 gap-x-4">
					<div class="w-1/2">
						<InputLabel for="isbn" value="ISBN" />
						<TextInput id="isbn" type="text" class="mt-1 block w-full" v-model=" bookForm.isbn " required autofocus
							autocomplete="title" />
						<InputError class="mt-2" :message=" bookForm.errors.isbn " />
					</div>
					<div class="w-1/2">
						<InputLabel for="publication_date" value="Fecha de publicación" />
						<TextInput id="publication_date" type="date" class="mt-1 block w-full" v-model=" bookForm.publication_date "
							required autofocus autocomplete="title" />
						<InputError class="mt-2" :message=" bookForm.errors.publication_date " />
					</div>
				</div>
				<div class="flex items-center gap-4 mt-4">
					<PrimaryButton :disabled=" bookForm.processing ">Guardar</PrimaryButton>
					<Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
						<p v-if=" bookForm.recentlySuccessful " class="text-sm text-gray-600">Guardado.</p>
					</Transition>
				</div>
			</form>
		</section>
	</div>
</template>

