<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import SidebarLink from '@/Components/SidebarLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
	<div class="min-h-screen bg-gray-100">
		<!-- Navbar -->
		<nav class="bg-white border-b-2 fixed w-full border-neutral-300 z-50">
			<!-- Primary Navigation Menu -->
			<div class="w-full mx-auto px-4">
				<div class="flex justify-between h-14">
					<div class="flex">
						<!-- Logo -->
						<div class="shrink-0 flex items-center">
							<Link :href=" route( 'admin.dashboard' ) ">
							<ApplicationLogo />
							</Link>
						</div>

						<!-- Navigation Links -->
						<!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
								<NavLink :href=" route( 'home' ) " :active=" route().current( 'home' ) ">
									Inicio
								</NavLink>
								<NavLink :href=" route( 'admin.dashboard' ) " :active=" route().current( 'admin.dashboard' ) ">
									Dashboard
								</NavLink>
								<NavLink :href=" route( 'admin.divulgation' ) " :active=" route().current( 'admin.divulgation' ) ">
									Divulgación
								</NavLink>
								<NavLink :href=" route( 'admin.gallery' ) " :active=" route().current( 'admin.gallery' ) ">
									Galería
								</NavLink>
								<NavLink :href=" route( 'admin.contact' ) " :active=" route().current( 'admin.contact' ) ">
									Contacto
								</NavLink>
							</div> -->
					</div>

					<div class="hidden sm:flex sm:items-center sm:ml-6">
						<!-- Settings Dropdown -->
						<div class="ml-3 relative">
							<Dropdown align="right" width="48">
								<template #trigger>
									<span class="inline-flex rounded-md">
										<button type="button"
											class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
											{{ $page.props.auth.user.name }}

											<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
												fill="currentColor">
												<path fill-rule="evenodd"
													d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
													clip-rule="evenodd" />
											</svg>
										</button>
									</span>
								</template>

								<template #content>
									<DropdownLink :href=" route( 'profile.edit' ) "> Perfil </DropdownLink>
									<DropdownLink :href=" route( 'logout' ) " method="post" as="button">
										Cerrar sesión
									</DropdownLink>
								</template>
							</Dropdown>
						</div>
					</div>

					<!-- Hamburger -->
					<div class="-mr-2 flex items-center sm:hidden">
						<button @click="showingNavigationDropdown = !showingNavigationDropdown"
							class="inline-flex items-center justify-center px-2 py-0 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
					<ResponsiveNavLink :href=" route( 'admin.dashboard' ) " :active=" route().current( 'admin.dashboard' ) ">
						Dashboard
					</ResponsiveNavLink>
				</div>

				<!-- Responsive Settings Options -->
				<div class="pt-4 pb-1 border-t border-gray-200">
					<div class="px-4">
						<div class="font-medium text-base text-gray-800">
							{{ $page.props.auth.user.name }}
						</div>
						<div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
					</div>

					<div class="mt-3 space-y-1">
						<ResponsiveNavLink :href=" route( 'profile.edit' ) "> Perfil </ResponsiveNavLink>
						<ResponsiveNavLink :href=" route( 'logout' ) " method="post" as="button">
							Cerrar sesión
						</ResponsiveNavLink>
					</div>
				</div>
			</div>
		</nav>

		<!-- Sidebar -->
		<aside
			class="fixed top-0 left-0 z-30 w-64 h-screen hidden sm:flex sm:flex-col bg-white border-0 pt-20 min-h-screen px-2">
			<SidebarLink :href=" route( 'home' ) " :active=" $page.url === '/' ">
				Inicio
			</SidebarLink>
			<SidebarLink :href=" route( 'admin.dashboard' ) " :active=" $page.url.includes( '/admin/dashboard' ) ">
				Dashboard
			</SidebarLink>
			<h2 class="px-4 font-semibold mt-4 mb-1 text-sky-950">Divulgación</h2>
			<div class="">
				<SidebarLink :href=" route( 'admin.books.index' ) " :active=" $page.url.includes( '/admin/books' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Libros</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.books }}
						</span>
					</div>
				</SidebarLink>
				<SidebarLink :href=" route( 'admin.magazines.index' ) " :active=" $page.url.includes( '/admin/magazines' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Revistas</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.magazines }}
						</span>
					</div>
				</SidebarLink>
				<SidebarLink :href=" route( 'admin.historical-publications.index' ) "
					:active=" $page.url.includes( '/admin/historical-publications' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Publicaciones</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.publications }}
						</span>
					</div>
				</SidebarLink>
				<SidebarLink :href=" route( 'admin.investigations.index' ) "
					:active=" $page.url.includes( '/admin/investigations' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Investigaciones</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.investigations }}
						</span>
					</div>
				</SidebarLink>
			</div>
			<h2 class="px-4 font-semibold mt-4 mb-1 text-sky-950">Recursos</h2>
			<div class="">
				<SidebarLink :href=" route( 'admin.convocations.index' ) "
					:active=" $page.url.includes( '/admin/convocations' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Convocatorias</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.convocations }}
						</span>
					</div>
				</SidebarLink>
				<SidebarLink :href=" route( 'admin.gallery.index' ) " :active=" $page.url.includes( '/admin/gallery' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Galería</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.galleries }}
						</span>
					</div>
				</SidebarLink>
				
				<SidebarLink :href=" route( 'admin.software.index' ) " :active=" $page.url.includes( '/admin/software' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Software Educativo</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.software_resources }}
						</span>
					</div>
				</SidebarLink>
				<SidebarLink :href=" route( 'admin.infographics.index' ) " :active=" $page.url.includes( '/admin/infographics' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Infografías</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.infographics }}
						</span>
					</div>
				</SidebarLink>
				<SidebarLink :href=" route( 'admin.resources.index' ) " :active=" $page.url.includes( '/admin/resources' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Vinculación</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.resources }}
						</span>
					</div>
				</SidebarLink>
			</div>
			<h2 class="px-4 font-semibold mt-4 mb-1 text-sky-950">Administración</h2>
			<div class="">
				<SidebarLink :href=" route( 'admin.users.index' ) " :active=" $page.url.includes( '/admin/users' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Usuarios</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.users }}
						</span>
					</div>
				</SidebarLink>
				<SidebarLink :href=" route( 'admin.administrators.index' ) "
					:active=" $page.url.includes( '/admin/administrators' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Administradores</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.admin_users }}
						</span>
					</div>
				</SidebarLink>
				<SidebarLink :href=" route( 'admin.roles.index' ) " :active=" $page.url.includes( '/admin/roles' ) ">
					<div class="flex justify-between items-center w-full">
						<span>Roles</span>
						<span class="bg-sky-200 px-2 py-0 text-neutral-900 rounded-sm text-sm">
							{{ $page.props.data.roles }}
						</span>
					</div>
				</SidebarLink>
			</div>
		</aside>

		<!-- Page Content -->
		<main class="pt-20 sm:pl-64">
			<slot />
		</main>
	</div>
</template>
