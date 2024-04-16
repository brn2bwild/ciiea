<script setup>
import ImageInput from "@/Components/ImageInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	software: {
		type: Object,
		required: true,
	}
})

const softwareForm = useForm({
	id: props.software.id,
	name: props.software.name,
	description: props.software.description,
})

const handleUpdateSoftware = () => {
	softwareForm.patch(route('admin.software.update'))
}

</script>
<template>

	<Head title="Software Educativo" />
	<h1 class="text-3xl font-bold pl-8">Editar software</h1>
	<div class="w-full p-8">
		<section class="w-full bg-white rounded p-8 flex justify-between">
			<form @submit.prevent=" handleUpdateSoftware " class="w-3/4">
				<div>
					<InputLabel for="name" value="Nombre del software" />
					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" softwareForm.name " required autofocus
						autocomplete="software_name" />
					<InputError class="mt-2" :message=" softwareForm.errors.name " />
				</div>
				<div class="mt-4">
					<InputLabel for="description" value="Descripción" />
					<TextInput id="description" type="text" class="mt-1 block w-full" v-model=" softwareForm.description "
						required autofocus autocomplete="software_description" />
					<InputError class="mt-2" :message=" softwareForm.errors.description " />
				</div>
				<div class="flex items-center gap-4 mt-4">
					<PrimaryButton :disabled=" softwareForm.processing ">Guardar</PrimaryButton>
					<Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
						<p v-if=" softwareForm.recentlySuccessful " class="text-sm text-gray-600">Guardado.</p>
					</Transition>
				</div>
			</form>
			<ImageInput :image=" software.image " :resource-id=" software.id "
				:upload-image-route=" route( 'admin.software.upload-image' ) "
				:delete-image-route=" route( 'admin.software.delete-image' ) " class="w-1/4" />
		</section>
	</div>
</template>
