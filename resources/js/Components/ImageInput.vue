<script setup>
import { ref, onMounted, onUpdated } from 'vue';
import DangerButton from './DangerButton.vue';
import InputError from './InputError.vue';
import { useForm } from '@inertiajs/vue3';
import Modal from './Modal.vue';
import SecondaryButton from './SecondaryButton.vue';

const props = defineProps({
	uploadImageRoute: {
		type: String,
		required: true,
	},
	deleteImageRoute: {
		type: String,
		required: true,
	},
	resourceId: {
		type: Number,
		required: true,
	},
	image: {
		type: Object
	}
})

const resourceImageForm = useForm({
	'id': props.resourceId,
	'image': null
})

const imageName = ref(null)
const imageSize = ref(null)
const showModal = ref(false)

onMounted(() => {
	if (props.image) {
		imageName.value = props.image.name
		imageSize.value = (props.image.size_bytes / 1048576).toFixed(2) + " MB"

		resourceImageForm.image = props.image
	}
});

onUpdated(() => {
	if (props.image) {
		imageName.value = props.image.name;
		imageSize.value = (props.image.size_bytes / 1048576).toFixed(2) + " MB"

		resourceImageForm.image = props.image
	}
});

const handleImageChange = (event) => {
	console.log(event.target.files[0])
	const image = event.target.files[0]

	handleSubmitImage(image)
};

const handleSubmitImage = (image) => {
	if (image) {
		resourceImageForm.image = image
		resourceImageForm.post(props.uploadImageRoute, {
			onSuccess: () => {
				imageName.value = image.name
				imageSize.value = (image.size / 1048576).toFixed(2) + " MB"
			}
		});
	}
};

const handleDeleteimage = () => {
	resourceImageForm.delete(props.deleteImageRoute, {
		onSuccess: () => handleCloseModal(),
		onFinish: () => {
			resourceImageForm.reset('image');
			imageName.value = null
			imageSize.value = null
		}
	});
	handleCloseModal();
};

const handleCloseModal = () => {
	showModal.value = false
}

const handleOpenModal = () => {
	showModal.value = true
}

</script>

<template>
	<div class="flex justify-center items-center p-4">
		<div class="flex flex-col items-center justify-center w-full gap-y-2">
			<label for="upload-image-input"
				class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
				<div v-if=" imageName || image " class="flex flex-col items-center justify-center pt-5 pb-6 px-2">
					<font-awesome-icon class="mb-2" :icon=" { prefix: 'fa', iconName: 'image' } " size="3x"
						style="color: white;" />
					<p class="mb-2 text-sm text-gray-500 dark:text-gray-400 text-center">
						<span class="font-semibold">{{ imageName }}</span>
					</p>
					<p class="text-xs text-gray-500 dark:text-gray-400">({{ imageSize }})</p>
					<DangerButton @click=" handleOpenModal " class="mt-4">Eliminar archivo</DangerButton>

				</div>
				<div v-else class="flex flex-col items-center justify-center pt-5 pb-6 px-2">
					<font-awesome-icon class="mb-2" :icon=" { prefix: 'fa', iconName: 'image' } " size="3x"
						style="color: white;" />
					<p class="mb-2 text-sm text-gray-500 dark:text-gray-400 text-center">
						<span class="font-semibold">Click para buscar</span> el archivo a subir
					</p>
					<p class="text-xs text-gray-500 dark:text-gray-400">Imágen (MAX. 2MB)</p>
				</div>
				<form @submit.prevent=" handleSubmitImage ">
					<input @change=" handleImageChange " id="upload-image-input" type="file" class="hidden"
						ref="resourceImageForm.image" accept="image/*" />
				</form>
			</label>
			<Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
				<InputError class="mt-2" :message=" resourceImageForm.errors.image " />
			</Transition>
		</div>
		<Modal @close=" handleCloseModal " :show=" showModal " :max-width=" 'lg' ">
			<div class="p-8">
				<div class="w-full flex flex-col justify-center items-center">
					<h2 class="text-xl">¿Deseas eliminar el archivo?</h2>
					<div class="w-full flex justify-end mt-8 gap-4">
						<DangerButton @click=" handleDeleteimage ">Eliminar</DangerButton>
						<SecondaryButton @click=" handleCloseModal ">Cancelar</SecondaryButton>
					</div>
				</div>
			</div>
		</Modal>
	</div>
</template>
