<script setup>
import HomeNavbar from "@/Partials/HomeNavbar.vue";
import HomeSidebar from "@/Partials/HomeSidebar.vue";

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
	<div class="min-h-screen bg-gray-200">
		<!-- Navbar -->
		<HomeNavbar :canLogin=" canLogin " :canRegister=" canRegister " />

		<!-- Sidebar -->
		<HomeSidebar :canRegister=" canRegister " />

		<!-- Page Content -->
		<main class="min-h-screen sm:ml-64 sm:pt-14">
			<slot />
		</main>
	</div>
</template>