<script setup>
import SidebarLink from '@/Components/SidebarLink.vue';

defineProps({
	canRegister: {
		type: Boolean,
	},
})
</script>

<template>
	<div class="fixed top-0 left-0 z-40 w-64 h-screen hidden sm:block bg-white border-0 pt-20 min-h-screen">
		<!-- Primary Sidebar Menu -->
		<div class="w-full mx-auto">

			<!-- Navigation Links -->
			<div class="sm:flex sm:flex-col">
				<SidebarLink :href=" route( 'home' ) " :active=" $page.url=== '/' ">
					Inicio
				</SidebarLink>
				<SidebarLink :href=" route( 'divulgation' ) " :active=" route().current( 'divulgation' ) ">
					Divulgación
				</SidebarLink>
				<SidebarLink :href=" route( 'convocations.index' ) " :active=" route().current( 'convocations.index' ) ">
					Convocatorias
				</SidebarLink>
				<SidebarLink :href=" route( 'gallery' ) " :active=" route().current( 'gallery' ) ">
					Galería
				</SidebarLink>
				<SidebarLink :href=" route( 'reime' ) " :active=" route().current( 'reime' ) ">
					REIME
				</SidebarLink>
				<SidebarLink :href=" route( 'contact' ) " :active=" route().current( 'contact' ) ">
					Contacto
				</SidebarLink>
			</div>

		</div>
	</div>
</template>