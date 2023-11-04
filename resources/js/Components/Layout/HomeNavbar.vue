<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import NavLink from '@/Components/NavLink.vue'

const showingNavigationDropdown = ref(false);

defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
});

const emit = defineEmits(['openModal', 'closeModal']);
</script>

<template>
	<nav class="w-full bg-neutral-50 z-50 p-4 fixed">
		<!-- Primary Navigation Menu -->
		<div class="flex justify-between">
			<div class="flex justify-between">
				<!-- Logo -->
				<Link :href=" route( 'home' ) ">
				<ApplicationLogo />
				</Link>

				<!-- Search input-->
				<!-- <div class="relative shrink-0 hidden sm:flex items-center w-1/2">
						<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
							<font-awesome-icon :icon=" [ 'fas', 'magnifying-glass' ] " class="w-4 h-4 text-neutral-500" />
						</div>
						<input type="search" id="default-search" class="block w-full p-2 pl-10 text-sm text-neutral-900 rounded-full bg-neutral-200 border-0 focus:ring-2 focus:ring-neutral-400" placeholder="Buscar información" required />
						<button type="submit"
							class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
					</div> -->
			</div>

			<!-- 	Main dropdown menu-->
			<div class="-mr-2 flex items-center sm:hidden">
				<button @click="showingNavigationDropdown = !showingNavigationDropdown"
					class="inline-flex items-center justify-center p-2 rounded-md text-neutral-400 hover:text-neutral-500 hover:bg-neutral-100 focus:outline-none focus:bg-neutral-100 focus:text-neutral-500 transition duration-150 ease-in-out">
					<svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
						<path :class=" {
							hidden: showingNavigationDropdown,
							'inline-flex': !showingNavigationDropdown,
						} " stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
						<path :class=" {
							hidden: !showingNavigationDropdown,
							'inline-flex': showingNavigationDropdown,
						} " stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>
			</div>

			<!--Login, Register and more options dropdown menu-->
			<div class="hidden sm:flex items-center justify-between gap-6">
				<NavLink :href=" route( 'home' ) " :active=" $page.url === '/' ">
					Inicio
				</NavLink>
				<div class="relative">
					<Dropdown align="right" width="56">
						<template #trigger>
							<span
								class="inline-flex items-center px-4 py-2 font-bold text-gray-500 hover:text-neutral-50 hover:bg-sky-400 rounded-xl transition duration-150 ease-in-out"
								:class=" { 'text-neutral-50 bg-sky-400': route().current( 'books' ) || route().current( 'magazines' ) || route().current( 'hist-publications' ) || route().current( 'investigations' ) } ">
								Divulgación
							</span>
						</template>
						<template #content>
							<div class="flex flex-col">
								<NavLink :href=" route( 'books' ) " :active=" route().current( 'books' ) ">
									Libros
								</NavLink>
								<NavLink :href=" route( 'magazines' ) " :active=" route().current( 'magazines' ) ">
									Revistas
								</NavLink>
								<NavLink :href=" route( 'hist-publications' ) " :active=" route().current( 'hist-publications' ) ">
									Publicaciones
								</NavLink>
								<NavLink :href=" route( 'investigations' ) " :active=" route().current( 'investigations' ) ">
									Investigaciones
								</NavLink>
							</div>
						</template>
					</Dropdown>
				</div>
				<NavLink :href=" route( 'convocations' ) " :active=" route().current( 'convocations' ) ">
					Convocatorias
				</NavLink>
				<NavLink :href=" route( 'reime' ) " :active=" route().current( 'reime' ) ">
					REIME
				</NavLink>
				<NavLink :href=" route( 'contact' ) " :active=" route().current( 'contact' ) ">
					Contacto
				</NavLink>

				<div v-if=" canLogin " class="hidden sm:flex sm:items-center">
					<Link v-if=" $page.props.auth.user.name && $page.props.auth.user.role == 'admin' "
						:href=" route( 'admin.dashboard' ) " class=" text-neutral-950 hover:text-neutral-600 focus:no-underline">
					Dashboard
					</Link>
					<Link
						v-else="$page.props.auth.user.name &&  $page.props.auth.user.role == 'editor' || $page.props.auth.user.role == 'user' "
						:href=" route( 'profile.edit' ) " class=" text-neutral-950 hover:text-neutral-600 focus:no-underline">
					{{ $page.props.auth.user.name }}
					</Link>

					<template v-if=" !$page.props.auth.user.name ">
						<!-- <Link :href=" route( 'login' ) "
								class="font-bold text-neutral-50 bg-neutral-900 px-5 py-2 rounded-full hover:bg-neutral-700 focus:no-underline transition-all duration-200">
							Iniciar sesión</Link> -->
						<button @click="emit( 'openModal', 'login' )"
							class="font-bold text-neutral-50 bg-sky-400 px-4 py-2 rounded-xl hover:bg-sky-600 hover:text-neutral-50 focus:no-underline transition-all duration-200">
							Iniciar sesión
						</button>
						<!-- <Link v-if=" canRegister " :href=" route( 'register' ) "
								class="ml-6 font-medium text-neutral-50 bg-neutral-900 px-4 py-2 rounded-full hover:bg-neutral-700 focus:no-underline">
							Registrarse</Link> -->
					</template>
				</div>


				<!-- Settings Dropdown -->
				<!-- <div class="hidden sm:flex sm:items-center sm:justify-center">
						<div class="relative">
							<Dropdown align="right" width="56">
								<template #trigger>
									<div class="flex items-center p-1">
										<img class="h-8 w-8 cursor-pointer" v-if=" $page.props.auth.user.name "
											src="/storage/images/default-contact.png" alt="perfil">
										<font-awesome-icon v-else :icon=" { prefix: 'fa', iconName: 'bars' } "
											class=" h-7 w-7 text-neutral-900 cursor-pointer hover:ring-1 hover:ring-neutral-300 focus:ring-1 focus:ring-neutral-300 p-1 rounded-lg" />
									</div>
								</template>

								<template #content>
									<div v-if=" $page.props.auth.user.name ">
										<DropdownLink :href=" route( 'profile.edit' ) ">
											Editar perfil
										</DropdownLink>
										<DropdownLink :href=" route( 'logout' ) " method="post" as="button">
											Cerrar sesión
										</DropdownLink>
									</div>
									<div v-else>
										<span
											class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out cursor-pointer"
											@click="emit( 'openModal', 'login' )">
											Iniciar sesión
										</span>
										<span
											class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out cursor-pointer"
											@click="emit( 'openModal', 'register' )">
											Registrarse
										</span>
									</div>
								</template>
							</Dropdown>
						</div>
					</div> -->
			</div>
		</div>

		<!-- Responsive Navigation Menu -->
		<div :class=" { block: showingNavigationDropdown, hidden: !showingNavigationDropdown } "
			class="sm:hidden transition duration-300">
			<!-- <div class="pt-2 pb-3 space-y-1">
				<ResponsiveNavLink v-if=" $page.props.auth.user.name " :href=" route( 'dashboard' ) "
					:active=" route().current( 'admin.dashboard' ) ">
					Dashboard
				</ResponsiveNavLink>
			</div> -->
			<div class="pt-2 pb-3">
				<div class="w-full relative shrink-0 flex items-center p-2">
					<div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
						<font-awesome-icon :icon=" { prefix: 'fas', iconName: 'magnifying-glass' } "
							class="w-4 h-4 text-neutral-500" />
					</div>
					<input type="search" id="default-search"
						class="block w-full p-2 pl-10 text-sm text-neutral-900 rounded-full bg-neutral-200 border-0 focus:ring-2 focus:ring-neutral-400"
						placeholder="Buscar información" required>
					<!-- <button type="submit"
						class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button> -->
				</div>
				<ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'home' ) "
					:active=" route().current( 'home' ) ">
					Inicio
				</ResponsiveNavLink>
				<ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'divulgation' ) "
					:active=" route().current( 'divulgation' ) ">
					Divulgación
				</ResponsiveNavLink>
				<ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'convocations' ) "
					:active=" route().current( 'convocations' ) ">
					Convocatorias
				</ResponsiveNavLink>
				<ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'gallery' ) "
					:active=" route().current( 'gallery' ) ">
					Galería
				</ResponsiveNavLink>
				<ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'reime' ) "
					:active=" route().current( 'reime' ) ">
					REIME
				</ResponsiveNavLink>
				<ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'contact' ) "
					:active=" route().current( 'contact' ) ">
					Contacto
				</ResponsiveNavLink>
			</div>
		</div>
	</nav>
</template>