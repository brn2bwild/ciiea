<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { ref } from "vue";
import { Head, useForm } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ResourceCard from "@/Components/ResourceCard.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	convocations: {
		type: Object,
		required: true,
	}
})

const convocationForm = useForm({
	id: null
})
const convocationCreateForm = useForm({
	name: '',
	date: '',
	time: '',
	location: '',
	description: '',
})

const showDeleteModal = ref(false)
const showCreateModal = ref(false)

const handleCloseCreateModal = () => {
	showCreateModal.value = false
}

const handleCreateConvocation = () => {
	convocationCreateForm.post(route('admin.convocations.store'), {
		onSuccess: () => showCreateModal.value = false,
		onFinish: () => convocationCreateForm.reset('name', 'location', 'date', 'time', 'description')
	})
}

const handleOpenDeleteModal = (id) => {
	convocationForm.id = id
	showDeleteModal.value = true
}

const handleCloseModal = () => {
	showDeleteModal.value = false
}

const handleDeleteConvocation = () => {
	convocationForm.delete(route('admin.convocations.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => convocationForm.reset('id')
	})
}
</script>
<template>

	<Head title="Convocatorias" />
	<div class="flex justify-between px-8">
		<h1 class="text-3xl font-bold">
			Convocatorias
		</h1>
		<button @click="showCreateModal = true"
			class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200">
			Nueva convocatoria
		</button>
	</div>

	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-5 gap-4">
			<ResourceCard v-for="         convocation in convocations         " :key=" convocation.index "
				@open-delete-modal="handleOpenDeleteModal( convocation.id )"
				:edit-route=" route( 'admin.convocations.edit', convocation.id ) "
				:image-path=" ( convocation.image !== null ? convocation.image.path : null ) ">
				<template #image>
					<img v-if=" convocation.image " :src=" convocation.image.path " alt="convocation-image" />
					<img v-else src="/storage/images/bookshelve-optimized.jpg" alt="default-image" />
				</template>
				<template #title>{{ convocation.name }}...</template>
				<template #subtitle>{{ convocation.date }}</template>
				<template #content>{{ convocation.location.substr( 1, 20 ) }}...
				</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseCreateModal " :show=" showCreateModal " :max-width=" 'lg' ">
		<div class="p-4">
			<form @submit.prevent=" handleCreateConvocation()">
				<div class="mt-4">
					<InputLabel for="name" value="Nombre de la convocatoria" />
					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" convocationCreateForm.name "
						required autocomplete="name" />
					<InputError class="mt-2" :message=" convocationCreateForm.errors.name " />
				</div>
				<div class="mt-4">
					<InputLabel for="location" value="Ubicación" />
					<TextInput id="location" type="text" class="mt-1 block w-full"
						v-model=" convocationCreateForm.location " required autocomplete="location" />
					<InputError class="mt-2" :message=" convocationCreateForm.errors.location " />
				</div>
				<div class="mt-4">
					<InputLabel for="date" value="Fecha de la convocatoria" />
					<TextInput id="date" type="date" class="mt-1 block w-full" v-model=" convocationCreateForm.date "
						required autocomplete="date" />
					<InputError class="mt-2" :message=" convocationCreateForm.errors.date " />
				</div>
				<div class="mt-4">
					<InputLabel for="time" value="Hora de la convocatoria" />
					<TextInput id="time" type="time" class="mt-1 block w-full" v-model=" convocationCreateForm.time "
						required autocomplete="time" />
					<InputError class="mt-2" :message=" convocationCreateForm.errors.time " />
				</div>
				<div class="mt-4">
					<InputLabel for="description" value="Descripción breve" />
					<TextInput id="description" type="text" class="mt-1 block w-full"
						v-model=" convocationCreateForm.description " required autocomplete="description" />
					<InputError class="mt-2" :message=" convocationCreateForm.errors.description " />
				</div>
				<div class="w-full flex justify-end mt-8 gap-4">
					<PrimaryButton :class=" { 'opacity-25': convocationCreateForm.processing } "
						:disabled=" convocationCreateForm.processing ">
						Guardar
					</PrimaryButton>
					<SecondaryButton @click="handleCloseCreateModal()">
						Cancelar
					</SecondaryButton>
				</div>
			</form>
		</div>
	</Modal>

	<Modal @close=" handleCloseModal " :show=" showDeleteModal " :max-width=" 'lg' ">
		<div class="p-4">
			<div class="w-full flex flex-col justify-center items-center">
				<font-awesome-icon :icon=" [ 'fa', 'triangle-exclamation' ] " class="text-neutral-900 text-8xl mb-4" />
				<h2 class="text-xl">¿Deseas eliminar la convocatoria?</h2>
				<div class="w-full flex justify-end mt-4 gap-4">
					<DangerButton @click="handleDeleteConvocation()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>
