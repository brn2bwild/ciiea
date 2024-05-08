<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import FileInput from "@/Components/FileInput.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	investigation: {
		type: Object,
		required: true
	}
})

const investigationForm = useForm({
	id: props.investigation.id,
	title: props.investigation.title,
	authors: props.investigation.authors,
	short_description: props.investigation.short_description,
	publicated_at: props.investigation.publicated_at
})

const handleUpdateInvestigation = () => {
	investigationForm.patch(route('admin.investigations.update'))
}
</script>
<template>

	<Head title="Investigación" />
	<h1 class="text-3xl font-bold pl-8">Editar Investigación</h1>
	<div class="w-full p-8">
		<section class="w-full bg-white rounded p-8 flex justify-between">
			<form @submit.prevent=" handleUpdateInvestigation " class="w-3/4">
				<div>
					<InputLabel for="name" value="Título de la investigación" />
					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" investigationForm.title "
						required autofocus autocomplete="investigation_title" />
					<InputError class="mt-2" :message=" investigationForm.errors.title " />
				</div>
				<div class="mt-4">
					<InputLabel for="authors" value="Autores" />
					<TextInput id="authors" type="text" class="mt-1 block w-full" v-model=" investigationForm.authors "
						required autofocus autocomplete="investigation_authors" />
					<InputError class="mt-2" :message=" investigationForm.errors.authors " />
				</div>
				<div class="mt-4">
					<InputLabel for="short_description" value="Descripción corta" />
					<TextInput id="short_description" type="text" class="mt-1 block w-full"
						v-model=" investigationForm.short_description " required autofocus
						autocomplete="investigation_short_description" />
					<InputError class="mt-2" :message=" investigationForm.errors.short_description " />
				</div>
				<div class="mt-4">
					<InputLabel for="publicated_at" value="Fecha de publicación" />
					<TextInput id="publicated_at" type="date" class="mt-1 block w-full"
						v-model=" investigationForm.publicated_at " required />
					<InputError class="mt-2" :message=" investigationForm.errors.publicated_at " />
				</div>
				<div class="flex items-center gap-4 mt-4">
					<PrimaryButton :disabled=" investigationForm.processing ">Guardar</PrimaryButton>
					<Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
						<p v-if=" investigationForm.recentlySuccessful " class="text-sm text-gray-600">Guardado.</p>
					</Transition>
				</div>
			</form>
			<FileInput :file=" investigation.file " :resource-id=" investigation.id "
				:upload-file-route=" route( 'admin.investigations.upload-file' ) "
				:delete-file-route=" route( 'admin.investigations.delete-file' ) " class="w-1/4" />
		</section>
	</div>
</template>
