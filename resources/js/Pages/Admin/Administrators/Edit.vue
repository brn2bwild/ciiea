<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import AvatarInput from '@/Components/AvatarInput.vue';

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
	mobile: props.administrator.mobile,
	short_description: props.administrator.short_description,
	long_description: props.administrator.long_description
})

const handleUpdateAdministrator = () => {
	administratorForm.patch(route('admin.administrators.update'))
}
</script>
<template>
	<Head title="Administrador" />
	<h1 class="text-3xl font-bold pl-8">Editar administrador</h1>
	<div class="w-full p-8 flex">
		<section class="w-full bg-white rounded p-8">
			<form @submit.prevent=" handleUpdateAdministrator " class="w-full">
				<div>
					<InputLabel for="name" value="Nombre del administrador" />
					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" administratorForm.name " required
						autocomplete="name" />
					<InputError class="mt-2" :message=" administratorForm.errors.name " />
				</div>
				<div class="mt-4">
					<InputLabel for="email" value="Correo electrónico" />
					<TextInput id="email" type="email" class="mt-1 block w-full" v-model=" administratorForm.email " required
						autocomplete="email" />
					<InputError class="mt-2" :message=" administratorForm.errors.email " />
				</div>
				<div class="mt-4">
					<InputLabel for="mobile" value="Número telefónico" />
					<TextInput id="mobile" type="text" class="mt-1 block w-full" v-model=" administratorForm.mobile " required
						autocomplete="mobile" />
					<InputError class="mt-2" :message=" administratorForm.errors.mobile " />
				</div>
				<div class="mt-4">
					<InputLabel for="short" value="Cargo" />
					<TextInput id="short_description" type="text" class="mt-1 block w-full"
						v-model=" administratorForm.short_description " required autocomplete="short_description" />
					<InputError class="mt-2" :message=" administratorForm.errors.short_description " />
				</div>
				<div class="mt-4">
					<InputLabel for="short" value="Actividades" />
					<TextInput id="long_description" type="text" class="mt-1 block w-full"
						v-model=" administratorForm.long_description " required autocomplete="long_description" />
					<InputError class="mt-2" :message=" administratorForm.errors.long_description " />
				</div>
				<div class="flex items-center gap-4 mt-4">
					<PrimaryButton :disabled=" administratorForm.processing ">Guardar</PrimaryButton>
					<Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
						<p v-if=" administratorForm.recentlySuccessful " class="text-sm text-gray-600">Guardado.</p>
					</Transition>
				</div>
			</form>
			<div class="w-full md:w-1/2">
				<AvatarInput :avatar-url="'/storage/images/default-contact.png'"></AvatarInput>
			</div>
		</section>
	</div>
</template>
