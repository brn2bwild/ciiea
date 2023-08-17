<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import FileInput from '@/Components/FileInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	publication: {
		type: Object,
		required: true,
	}
})

const publicationForm = useForm({
	id: props.publication.id,
	title: props.publication.title,
	publicated_at: props.publication.publicated_at,
})

const handleUpdatePublication = () => {
	publicationForm.patch(route('admin.historical-publications.update'))
}
</script>
<template>
	<Head title="Publicación" />
	<h1 class="text-3xl font-bold pl-8">Editar publicación</h1>
	<div class="w-full p-8">
		<section class="w-full bg-white rounded p-8 flex justify-between">
			<form @submit.prevent=" handleUpdatePublication " class="w-3/4">
				<div>
					<InputLabel for="title" value="Título de la publicación" />
					<TextInput id="title" type="text" class="mt-1 block w-full" v-model=" publicationForm.title " required autofocus
						autocomplete="publication_title" />
					<InputError class="mt-2" :message=" publicationForm.errors.title " />
				</div>
				<div class="mt-4">
					<InputLabel for="publicated_at" value="Fecha de publicación" />
					<TextInput id="publicated_at" type="date" class="mt-1 block w-full" v-model=" publicationForm.publicated_at "
						required/>
					<InputError class="mt-2" :message=" publicationForm.errors.publicated_at " />
				</div>
				<div class="flex items-center gap-4 mt-4">
					<PrimaryButton :disabled=" publicationForm.processing ">Guardar</PrimaryButton>
					<Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
						<p v-if=" publicationForm.recentlySuccessful " class="text-sm text-gray-600">Guardado.</p>
					</Transition>
				</div>
			</form>
			<FileInput :file=" publication.file " :resource-id=" publication.id "
				:upload-file-route=" route( 'admin.historical-publications.upload-file' ) "
				:delete-file-route=" route( 'admin.historical-publications.delete-file' ) " class="w-1/4" />
		</section>
	</div>
</template>