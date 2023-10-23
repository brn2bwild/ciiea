<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm  } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';

defineOptions({
	layout: AdminLayout
})

const props = defineProps({
	administrator: {
		type: Object,
		required: true
	}
})

const administratorForm = useForm({
	id: props.administrator.id,
	name: props.administrator.name,
	email: props.administrator.email,
})

const handleUpdateAdministrator = () => {
	administratorForm.patch(route('admin.administrators.update'))
}
</script>
<template>
	<Head title="Administrador" />
	<h1 class="text-3xl font-bold pl-8">Editar administrador</h1>
	<div class="w-full p-8">
		<section class="w-full bg-white rounded p-8 flex justify-between">
			<form @submit.prevent=" handleUpdateAdministrator " class="w-full">
				<div>
					<InputLabel for="name" value="Nombre del administrador" />
					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" administratorForm.name " required
						autocomplete="name" />
					<InputError class="mt-2" :message=" administratorForm.errors.name " />
				</div>
				<div class="mt-4">
					<InputLabel for="email" value="Correo electrónico" />
					<TextInput id="book_email" type="email" class="mt-1 block w-full" v-model=" administratorForm.email " required
						autocomplete="email" />
					<InputError class="mt-2" :message=" administratorForm.errors.email " />
				</div>
				<div class="flex items-center gap-4 mt-4">
					<PrimaryButton :disabled=" administratorForm.processing ">Guardar</PrimaryButton>
					<Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
						<p v-if=" administratorForm.recentlySuccessful " class="text-sm text-gray-600">Guardado.</p>
					</Transition>
				</div>
			</form>
		</section>
	</div>
</template>
