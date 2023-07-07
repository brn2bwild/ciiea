<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
	password: '',
});

const confirmUserDeletion = () => {
	confirmingUserDeletion.value = true;

	nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
	form.delete(route('profile.destroy'), {
		preserveScroll: true,
		onSuccess: () => closeModal(),
		onError: () => passwordInput.value.focus(),
		onFinish: () => form.reset(),
	});
};

const closeModal = () => {
	confirmingUserDeletion.value = false;

	form.reset();
};
</script>

<template>
	<section class="space-y-6">
		<header>
			<h2 class="text-lg font-medium text-gray-900">Eliminar cuenta</h2>

			<p class="mt-1 text-sm text-gray-600">
				Una vez eliminada la cuenta, toda la información de la misma será permanente borrada. Antes de eliminar tu cuenta asegúrate de respaldar toda la información que desees conservar.
			</p>
		</header>

		<DangerButton @click=" confirmUserDeletion ">Eliminar cuenta</DangerButton>

		<Modal :show=" confirmingUserDeletion " @close=" closeModal ">
			<div class="p-6">
				<h2 class="text-lg font-medium text-gray-900">
					Are you sure you want to delete your account?
				</h2>

				<p class="mt-1 text-sm text-gray-600">
					Una vez que tu cuenta haya sido eliminada, todos la información será eliminada completamente. Por favor introduce tu contraseña para eliminar tu cuenta permanentemente.
				</p>

				<div class="mt-6">
					<InputLabel for="password" value="Contraseña" class="sr-only" />

					<TextInput id="password" ref="passwordInput" v-model=" form.password " type="password" class="mt-1 block w-3/4"
						placeholder="Password" @keyup.enter=" deleteUser " />

					<InputError :message=" form.errors.password " class="mt-2" />
				</div>

				<div class="mt-6 flex justify-end">
					<SecondaryButton @click=" closeModal "> Cancel </SecondaryButton>

					<DangerButton class="ml-3" :class=" { 'opacity-25': form.processing } " :disabled=" form.processing "
						@click=" deleteUser ">
						Eliminar cuenta
					</DangerButton>
				</div>
			</div>
		</Modal>
	</section>
</template>
