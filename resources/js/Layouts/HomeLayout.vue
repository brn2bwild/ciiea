<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import HomeNavbar from "@/Partials/HomeNavbar.vue";
import HomeSidebar from "@/Partials/HomeSidebar.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Checkbox from "@/Components/Checkbox.vue";
import { defineAsyncComponent } from "vue";

const props = defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
});

const loginForm = useForm({
	email: '',
	password: '',
	remember: false,
});

const registerForm = useForm({
	name: '',
	email: '',
	password: '',
	password_confirmation: '',
});

const showModal = ref(false);
const userIsLogin = ref(true);
const modalTitle = ref('Iniciar sesión');

function closeModalFn() {
	modalTitle.value = 'Iniciar sesión';
	userIsLogin.value = true;
	showModal.value = false;
	registerForm.reset('email', 'name', 'password', 'password_confirmation');
	loginForm.reset('email', 'password', 'remember');
};

function openModalFn(modalType) {
	if (modalType == 'login') {
		modalTitle.value = 'Iniciar sesión';
		userIsLogin.value = true;
	} else if (modalType == 'register') {
		modalTitle.value = 'Registrarse';
		userIsLogin.value = false;
	}
	showModal.value = true;
}

const submitLogin = () => {
	loginForm.post(route('login'), {
		preserveScroll: true,
		onSuccess: () => loginForm.reset('email', 'password', 'remember'),
	});
};

const submitRegister = () => {
	registerForm.post(route('register'), {
		preserveScroll: true,
		onSuccess: () => registerForm.reset('email', 'name', 'password', 'password_confirmation'),
	});
};

const Modal = defineAsyncComponent(() =>
	import('@/Components/Modal.vue')
);

</script>

<template>
	<div class="min-h-screen bg-gray-200">
		<!-- Navbar -->
		<HomeNavbar @open-modal=" openModalFn " :canLogin=" canLogin " :canRegister=" canRegister " />

		<!-- Sidebar -->
		<HomeSidebar @open-modal=" openModalFn " :canRegister=" canRegister " />

		<!-- Page Content -->
		<main class="min-h-screen sm:ml-64 sm:pt-14">
			<slot />
		</main>

		<Modal @close=" closeModalFn()" :show=" showModal " :max-width=" 'xl' ">
			<div class="bg-white w-full p-8">
				<div class="flex justify-between items-center mb-4">
					<h1>{{ modalTitle }}</h1>
					<font-awesome-icon @click="closeModalFn()" :icon=" { prefix: 'fa', iconName: 'xmark' } "
						class=" cursor-pointer" />
				</div>
				<div v-if=" $page.props.auth.user.name == null ">
					<Transition v-if=" userIsLogin == true " enter-active-class="ease-out duration-300"
						enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
						enter-to-class="opacity-100 translate-y-0 sm:scale-100" leave-active-class="ease-in duration-200"
						leave-from-class="opacity-100 translate-y-0 sm:scale-100"
						leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
						<form @submit.prevent=" submitLogin(); closeModalFn()">
							<div>
								<InputLabel for="email" value="Correo electrónico" />

								<TextInput id="email" type="email" class="mt-1 block w-full" v-model=" loginForm.email " required
									autofocus autocomplete="username" />

								<InputError class="mt-2" :message=" loginForm.errors.email " />
							</div>

							<div class="mt-4">
								<InputLabel for="password" value="Contraseña" />

								<TextInput id="password" type="password" class="mt-1 block w-full" v-model=" loginForm.password " required
									autocomplete="current-password" />

								<InputError class="mt-2" :message=" loginForm.errors.password " />
							</div>

							<div class="flex justify-between items-center">
								<div class="block mt-4">
									<label class="flex items-center">
										<Checkbox name="remember" v-model:checked=" loginForm.remember " />
										<span class="ml-2 text-sm text-gray-600">Mantener sesión iniciada</span>
									</label>
								</div>
								<Link :href=" route( 'password.request' ) "
									class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-900 mt-4">
								¿Olvidaste tu contraseña?
								</Link>
							</div>

							<div class="flex items-center justify-end mt-4">
								<span @click="userIsLogin = false; modalTitle = 'Registrarse'"
									class="cursor-pointer text-sm hover:underline text-neutral-600">¿No tienes cuenta?</span>
								<PrimaryButton class="ml-4" :class=" { 'opacity-25': loginForm.processing } "
									:disabled=" loginForm.processing ">
									Iniciar sesión
								</PrimaryButton>
							</div>
						</form>
					</Transition>
					<Transition v-else enter-active-class="ease-out duration-300"
						enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
						enter-to-class="opacity-100 translate-y-0 sm:scale-100" leave-active-class="ease-in duration-200"
						leave-from-class="opacity-100 translate-y-0 sm:scale-100"
						leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
						<form @submit.prevent=" submitRegister(); closeModalFn()">
							<div>
								<InputLabel for="name" value="Nombre" />

								<TextInput id="name" type="text" class="mt-1 block w-full" v-model=" registerForm.name " required
									autofocus autocomplete="name" />

								<InputError class="mt-2" :message=" registerForm.errors.name " />
							</div>

							<div class="mt-4">
								<InputLabel for="email" value="Correo electrónico" />

								<TextInput id="email" type="email" class="mt-1 block w-full" v-model=" registerForm.email " required
									autocomplete="username" />

								<InputError class="mt-2" :message=" registerForm.errors.email " />
							</div>

							<div class="mt-4">
								<InputLabel for="password" value="Contraseña" />

								<TextInput id="password" type="password" class="mt-1 block w-full" v-model=" registerForm.password "
									required autocomplete="new-password" />

								<InputError class="mt-2" :message=" registerForm.errors.password " />
							</div>

							<div class="mt-4">
								<InputLabel for="password_confirmation" value="Confirmar contraseña" />

								<TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
									v-model=" registerForm.password_confirmation " required autocomplete="new-password" />

								<InputError class="mt-2" :message=" registerForm.errors.password_confirmation " />
							</div>

							<div class="flex items-center justify-end mt-4">
								<!-- <Link
											:href="route('login')"
											class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-900"
									>
											¿Ya tienes una cuenta?
									</Link> -->
								<span @click="userIsLogin = true; modalTitle = 'Iniciar sesión'"
									class="cursor-pointer text-sm hover:underline text-neutral-600">¿Ya tienes una cuenta?</span>
								<PrimaryButton class="ml-4" :class=" { 'opacity-25': registerForm.processing } "
									:disabled=" registerForm.processing ">
									Registrarse
								</PrimaryButton>
							</div>
						</form>
					</Transition>
				</div>
			</div>
		</Modal>
	</div>
</template>