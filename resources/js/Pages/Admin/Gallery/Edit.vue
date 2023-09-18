<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { handleError } from 'vue';
import { ref } from 'vue';

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	event: {
		type: Object,
		required: true,
	}
})

const modalImageUrl = ref('')
const modalImageAlt = ref('')
const showImageModal = ref(false)
const showDeleteModal = ref(false)

const imagesForm = useForm({
	'id': props.event.id,
	'images': null
})

const imageForm = useForm({
	'id': null
})

const handleShowImageModal = (url, name) => {
	modalImageUrl.value = url
	modalImageAlt.value = name
	showImageModal.value = true
}

const handleImagesChange = (event) => {
	const images = event.target.files

	handleSubmitImages(images)
}

const handleShowDeleteModal = (id) => {
	imageForm.id = id
	showDeleteModal.value = true
}

const handleDeleteImage = () => {
	imageForm.delete(route('admin.gallery.delete-images'), {
		onSuccess: () => handleCloseDeleteModal(),
		onFinish: () => imageForm.reset('id')
	})
}

const handleCloseDeleteModal = () => {
	showDeleteModal.value = false
}

const handleSubmitImages = (images) => {
	if (images) {
		imagesForm.images = images

		imagesForm.post(route('admin.gallery.upload-images'), {
			// onSuccess: () => {
			// 	console.log('subidas')
			// }
		})
	}
}
</script>
<template>
	<Head title="Galería" />
	<h1 class="text-3xl font-bold pl-8">Galería evento {{ event.name }}</h1>
	<h2 class="text-xl font-semibold pl-8">Fecha: {{ event.date }}</h2>
	<section class="w-full p-8">
		<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
			<label for="upload-images-input"
				class="flex flex-col items-center justify-center cursor-pointer p-6 bg-white rounded-xl group h-40">
				<form @submit.prevent=" handleSubmitImages ">
					<input @change=" handleImagesChange " type="file" class="hidden" id="upload-images-input"
						accept="image/png, image/jpg, image/jpeg" multiple>
				</form>
				<font-awesome-icon class="mb-2 text-4xl text-neutral-300 group-hover:text-neutral-400 transition duration-200"
					:icon=" { prefix: 'fa', iconName: 'plus-circle' } " />
				<h1 class="font-bold">Agregar imágenes</h1>
			</label>
			<div v-for=" image in event.images " :key=" image.index "
				class="bg-white h-40 rounded-xl overflow-hidden cursor-pointer group relative">
				<!-- {{ image.path }} -->
				<img @click="handleShowImageModal( route( 'home' ) + '/storage/' + image.path, image.title )"
					class="w-full h-full object-cover group-hover:opacity-40 transition-all duration-200"
					:src=" route( 'home' ) + '/storage/' + image.path ">
				<button @click=" handleShowDeleteModal(image.id) "
					class="block sm:hidden group-hover:block transition-all duration-200 text-5xl text-red-400 sm:text-red-300 hover:text-red-400 rounded-full absolute top-4 right-4">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'circle-xmark' } " />
				</button>
			</div>
		</div>
	</section>
	<Modal @close="showImageModal = false" :show=" showImageModal " :maxWidth=" '5xl' ">
		<div class="flex justify-center items-center">
			<img loading="lazy" :src=" modalImageUrl " :alt=" modalImageAlt ">
		</div>
	</Modal>

	<Modal @close="showDeleteModal = false" :show=" showDeleteModal " :maxWidth=" 'xl' ">
		<div class="p-8">
			<div class="w-full flex flex-col justify-center items-center">
				<h2 class="text-xl">¿Deseas eliminar la imágen?</h2>
				<div class="w-full flex justify-end mt-8 gap-4">
					<DangerButton @click="handleDeleteImage()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseDeleteModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>

