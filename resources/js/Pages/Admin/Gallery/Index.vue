<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import ResourceCard from '@/Components/ResourceCard.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	events: {
		type: Object,
		required: true,
	}
})

const eventForm = useForm({
	id: null
})

const showModal = ref(false)

const handleOpenDeleteModal = (id) => {
	eventForm.id = id
	showModal.value = true
}

const handleCloseModal = () => {
	showModal.value = false
}

const handleDeleteEvent = () => {
	eventForm.delete(route('admin.gallery.destroy'), {
		onSuccess: () => handleCloseModal(),
		onFinish: () => eventForm.reset('id')
	})
}
</script>

<template>
	<Head title="Galería" />
	<h1 class="text-3xl font-bold pl-8">Galería</h1>
	<div class="w-full p-8">
		<section class="grid grid-cols-1 md:grid-cols-4 gap-4">
			<ResourceCard v-for=" event in events " :key=" event.index " :edit-route="route('admin.gallery.edit', event.id)" @open-delete-modal="handleOpenDeleteModal( event.id )">
				<template #title>{{ event.name }}</template>
				<template #subtitle>{{ event.date }}</template>
			</ResourceCard>
		</section>
	</div>

	<Modal @close=" handleCloseModal " :show=" showModal " :max-width=" 'lg' ">
		<div class="p-8">
			<div class="w-full flex flex-col justify-center items-center">
				<h2 class="text-xl">¿Deseas eliminar el evento?</h2>
				<span>Se borrarán las imágenes relacionadas</span>
				<div class="w-full flex justify-end mt-8 gap-4">
					<DangerButton @click="handleDeleteEvent()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal>
</template>
