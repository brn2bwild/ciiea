<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);

defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
})
</script>

<template>
	<nav class="bg-white border-b border-gray-100 fixed w-full">
		<!-- Primary Navigation Menu -->
		<div class="max-w-full mx-auto px-4">
			<div class="flex justify-between h-14">
				<!-- Logo -->
				<div class="shrink-0 flex items-center">
					<Link :href=" route( 'home' ) ">
					<ApplicationLogo class="block h-8 w-auto fill-current text-gray-800" />
					</Link>
				</div>

				<!-- Navigation Links -->
				<!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
					<NavLink :href=" route( 'home' ) " :active=" route().current( 'home' ) ">
						Inicio
					</NavLink>
					<NavLink :href=" route( 'divulgation' ) " :active=" route().current( 'divulgation' ) ">
						Divulgación
					</NavLink>
					<NavLink :href=" route( 'convocations' ) " :active=" route().current( 'convocations' ) ">
						Convocatorias
					</NavLink>
					<NavLink :href=" route( 'gallery' ) " :active=" route().current( 'gallery' ) ">
						Galería
					</NavLink>
					<NavLink :href=" route( 'reime' ) " :active=" route().current( 'reime' ) ">
						REIME
					</NavLink>
					<NavLink :href=" route( 'contact' ) " :active=" route().current( 'contact' ) ">
						Contacto
					</NavLink>
				</div> -->

				<!-- <div v-if=" canLogin " class="sm:absolute sm:top-0 sm:right-0 p-6 text-right">
					<div v-if=" $page.props.auth.user.name ">
						<Link v-if=" $page.props.auth.user.role == 'admin' " :href=" route( 'admin.dashboard' ) "
							class=" text-gray-950 hover:text-gray-800 focus:no-underline">
						Dashboard</Link>
						<Link v-else=" $page.props.auth.user.role == 'editor' " :href=" route( 'dashboard' ) "
							class=" text-gray-950 hover:text-gray-800 focus:no-underline">
						Dashboard</Link>
					</div>

					<template v-else>
						<Link :href=" route( 'login' ) " class=" text-gray-950 hover:text-gray-800 focus:no-underline">
						Acceder</Link>

						<Link v-if=" canRegister " :href=" route( 'register' ) "
							class="ml-4 text-gray-950 hover:text-gray-800 focus:no-underline">
						Registrarse</Link>
					</template>
				</div> -->

				<!-- Hamburger -->
				<div class="-mr-2 flex items-center sm:hidden">
					<button @click="showingNavigationDropdown = !showingNavigationDropdown"
						class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
			</div>
		</div>

		<!-- Responsive Navigation Menu -->
		<div :class=" { block: showingNavigationDropdown, hidden: !showingNavigationDropdown } " class="sm:hidden">
			<div class="pt-2 pb-3 space-y-1">
				<ResponsiveNavLink v-if=" $page.props.auth.user " :href=" route( 'dashboard' ) "
					:active=" route().current( 'admin.dashboard' ) ">
					Dashboard
				</ResponsiveNavLink>
			</div>
			<div class="pt-2 pb-3 space-y-1">
				<ResponsiveNavLink :href=" route( 'home' ) " :active=" route().current( 'home' ) ">
					Inicio
				</ResponsiveNavLink>
				<ResponsiveNavLink :href=" route( 'divulgation' ) " :active=" route().current( 'divulgation' ) ">
					Divulgación
				</ResponsiveNavLink>
				<ResponsiveNavLink :href=" route( 'convocations' ) " :active=" route().current( 'convocations' ) ">
					Convocatorias
				</ResponsiveNavLink>
				<ResponsiveNavLink :href=" route( 'gallery' ) " :active=" route().current( 'gallery' ) ">
					Galería
				</ResponsiveNavLink>
				<ResponsiveNavLink :href=" route( 'reime' ) " :active=" route().current( 'reime' ) ">
					REIME
				</ResponsiveNavLink>
				<ResponsiveNavLink :href=" route( 'contact' ) " :active=" route().current( 'contact' ) ">
					Contacto
				</ResponsiveNavLink>
			</div>
		</div>
	</nav>
</template>