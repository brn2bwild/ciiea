<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import SidebarLink from "@/Components/SidebarLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="flex min-h-screen bg-neutral-200">
        <!-- Navbar -->
        <nav class="fixed z-50 w-full shadow-md border-neutral-300 bg-white">
            <!-- Primary Navigation Menu -->
            <div class="mx-auto w-full px-4">
                <div class="flex h-16 justify-between">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex shrink-0 items-center">
                            <Link :href="route('admin.dashboard')">
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

                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <!-- Settings Dropdown -->
                        <div class="relative ml-3">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                        >
                                            {{ $page.props.auth.user.name }}

                                            <svg
                                                class="-mr-0.5 ml-2 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')">
                                        Perfil
                                    </DropdownLink>
                                    <DropdownLink
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                    >
                                        Cerrar sesión
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button
                            @click="
                                showingNavigationDropdown =
                                    !showingNavigationDropdown
                            "
                            class="inline-flex items-center justify-center rounded-md px-2 py-0 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                        >
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex':
                                            !showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex':
                                            showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div
                :class="{
                    block: showingNavigationDropdown,
                    hidden: !showingNavigationDropdown,
                }"
                class="sm:hidden"
            >
                <div class="space-y-1 pb-3 pt-2">
                    <ResponsiveNavLink
                        :href="route('admin.dashboard')"
                        :active="route().current('admin.dashboard')"
                    >
                        Dashboard
                    </ResponsiveNavLink>
                </div>

                <!-- Responsive Settings Options -->
                <div class="border-t border-gray-200 pb-1 pt-4">
                    <div class="px-4">
                        <div class="text-base font-medium text-gray-800">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="text-sm font-medium text-gray-500">
                            {{ $page.props.auth.user.email }}
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')">
                            Perfil
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            :href="route('logout')"
                            method="post"
                            as="button"
                        >
                            Cerrar sesión
                        </ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <aside
        class="fixed left-0 top-0 z-30 hidden h-screen w-64 border-0 bg-white px-2 pt-20 sm:flex sm:flex-col overflow-y-auto"
        >
            <SidebarLink :href="route('home')" :active="$page.url === '/'">
                Inicio
            </SidebarLink>
            <SidebarLink
                :href="route('admin.dashboard')"
                :active="$page.url.includes('/admin/dashboard')"
            >
                Dashboard
            </SidebarLink>
            <h2 class="mb-1 mt-4 px-4 font-semibold text-sky-950">
                Divulgación
            </h2>
            <div class="">
                <SidebarLink
                    :href="route('admin.books.index')"
                    :active="$page.url.includes('/admin/books')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Libros</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.books }}
                        </span>
                    </div>
                </SidebarLink>
                <SidebarLink
                    :href="route('admin.magazines.index')"
                    :active="$page.url.includes('/admin/magazines')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Revistas</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.magazines }}
                        </span>
                    </div>
                </SidebarLink>
                <SidebarLink
                    :href="route('admin.historical-publications.index')"
                    :active="
                        $page.url.includes('/admin/historical-publications')
                    "
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Publicaciones</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.publications }}
                        </span>
                    </div>
                </SidebarLink>
                <SidebarLink
                    :href="route('admin.investigations.index')"
                    :active="$page.url.includes('/admin/investigations')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Investigaciones</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.investigations }}
                        </span>
                    </div>
                </SidebarLink>
            </div>
            <h2 class="mb-1 mt-4 px-4 font-semibold text-sky-950">Recursos</h2>
            <div class="">
                <SidebarLink
                    :href="route('admin.convocations.index')"
                    :active="$page.url.includes('/admin/convocations')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Convocatorias</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.convocations }}
                        </span>
                    </div>
                </SidebarLink>
                <SidebarLink
                    :href="route('admin.gallery.index')"
                    :active="$page.url.includes('/admin/gallery')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Galería</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.galleries }}
                        </span>
                    </div>
                </SidebarLink>
                <SidebarLink
                    :href="route('admin.software.index')"
                    :active="$page.url.includes('/admin/software')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Software Educativo</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.software_resources }}
                        </span>
                    </div>
                </SidebarLink>
                <SidebarLink
                    :href="route('admin.infographics.index')"
                    :active="$page.url.includes('/admin/infographics')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Infografías</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.infographics }}
                        </span>
                    </div>
                </SidebarLink>
                <SidebarLink
                    :href="route('admin.vinculation-documents.index')"
                    :active="$page.url.includes('/admin/vinculation-documents')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Vinculación</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.vinculation_documents }}
                        </span>
                    </div>
                </SidebarLink>
            </div>
            <h2 class="mb-1 mt-4 px-4 font-semibold text-sky-950">
                Administración
            </h2>
            <div class="">
                <SidebarLink
                    :href="route('admin.users.index')"
                    :active="$page.url.includes('/admin/users')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Usuarios</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.users }}
                        </span>
                    </div>
                </SidebarLink>
                <SidebarLink
                    :href="route('admin.administrators.index')"
                    :active="$page.url.includes('/admin/administrators')"
                >
                    <div class="flex w-full items-center justify-between">
                        <span>Administradores</span>
                        <span
                            class="rounded-sm bg-sky-200 px-2 py-0 text-sm text-neutral-900"
                        >
                            {{ $page.props.data.admin_users }}
                        </span>
                    </div>
                </SidebarLink>
            </div>
        </aside>

        <!-- Page Content -->
        <main class="pt-20 sm:pl-64 w-full">
            <slot />
        </main>
    </div>
</template>
