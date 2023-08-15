<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Modal from "@/Components/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineOptions({
	layout: AdminLayout,
});

defineProps({
	users: {
		type: Object,
	}
})

const showModal = ref(false);
const modalTitle = ref('Crear contacto');

const form = useForm({
	name: '',
	position: '',
	email: '',
	celular_number: '',
	twitter: '',
});

const editContactUser = (user) => {
	form.name = user.name
	form.position = user.position
	form.celular_number = user.celular_number
	form.email = user.email
	form.twitter = user.twitter

	modalTitle.value = 'Editar contacto';
	showModal.value = true;
}

const submit = () => {
	form.post(route('admin.contact.update', {
		onFinish: () => form.reset(),
	}))
}
</script>

<template>
	<Head title="Contacto" />
	<div class="w-full py-8 px-10 grid grid-cols-1 md:grid-cols-3 gap-4">
		<div @click="editContactUser( user )" v-for="(  user, index  ) in   users  " :key=" index "
			class="bg-rose-900 w-full rounded-lg flex items-center p-2 gap-4 overflow-hidden cursor-pointer">
			<img class="h-32 w-32" src="/storage/images/default-contact.png" alt="default-contact">
			<div class="bg-transparent w-3/4">
				<h1 class="text-white text-lg">
					{{ user.name }}
				</h1>
				<span class="text-white">
					{{ user.position }}
				</span>
				<p class="flex justify-start text-white my-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'phone' } " size="lg" style="color: white;" />
					<a href="https://whatsapp.com" class="ml-2">{{ user.celular_number }}</a>
				</p>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'envelope' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">{{ user.email }}</a>
				</p>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">{{ user.twitter }}</a>
				</p>
			</div>
		</div>
		<!-- <div class="bg-rose-900 w-full rounded-lg flex items-center p-2 gap-4 overflow-hidden">
			<img class="h-32 w-32" src="/storage/images/default-contact.png" alt="default-contact">
			<div class="bg-transparent w-3/4">
				<h1 class="text-white text-lg">
					Selene CIIEA
				</h1>
				<span class="text-white">
					Departamento de sistemas
				</span>
				<p class="flex justify-start text-white my-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'phone' } " size="lg" style="color: white;" />
					<a href="https://whatsapp.com" class="ml-2">9234132</a>
				</p>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'envelope' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">sistemas@example.com</a>
				</p>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">@sistemas_ciiea</a>
				</p>
			</div>
		</div> -->
	</div>

	<Modal @close="showModal = false" :show=" showModal " :max-width=" 'xl' ">
		<div class="bg-white w-full p-4">
			<div class="flex justify-between items-center mb-4">
				<h1>{{ modalTitle }}</h1>
				<font-awesome-icon @click="showModal = false" :icon=" { prefix: 'fa', iconName: 'xmark' } " class="cursor-pointer"/>
			</div>
			<form @submit.prevent=" submit ">
				<div>
					<InputLabel for="name" value="Nombre" />

					<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" form.name " required autofocus
						autocomplete="username" />

					<InputError class="mt-2" :message=" form.errors.name " />
				</div>

				<div class="mt-4">
					<InputLabel for="position" value="Posición" />

					<TextInput id="position" type="text" class="mt-1 block w-full" v-model=" form.position " required autofocus
						autocomplete="position" />

					<InputError class="mt-2" :message=" form.errors.position " />
				</div>

				<div class="mt-4">
					<InputLabel for="celular_number" value="Número celular" />

					<TextInput id="celular_number" type="number" class="mt-1 block w-full" v-model=" form.celular_number " required
						autofocus autocomplete="celular_number" />

					<InputError class="mt-2" :message=" form.errors.celular_number " />
				</div>

				<div class="mt-4">
					<InputLabel for="email" value="Correo electrónico" />

					<TextInput id="email" type="email" class="mt-1 block w-full" v-model=" form.email " required autofocus
						autocomplete="email" />

					<InputError class="mt-2" :message=" form.errors.email " />
				</div>

				<div class="mt-4">
					<InputLabel for="twitter" value="Twitter" />

					<TextInput id="twitter" type="text" class="mt-1 block w-full" v-model=" form.twitter " required autofocus
						autocomplete="twitter" />

					<InputError class="mt-2" :message=" form.errors.twitter " />
				</div>

				<div class="flex items-center justify-end mt-4">
					<PrimaryButton class="ml-4" :class=" { 'opacity-25': form.processing } " :disabled=" form.processing ">
						Guardar
					</PrimaryButton>
				</div>
			</form>
		</div>
	</Modal>
</template>
