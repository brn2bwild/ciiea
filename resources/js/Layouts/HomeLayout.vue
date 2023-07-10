<script setup>
import HomeNavbar from "@/Partials/HomeNavbar.vue";
import HomeFooter from "@/Partials/HomeFooter.vue";

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
	<div class="min-h-screen bg-gray-100">
		<!-- Navbar -->
		<HomeNavbar :canLogin="canLogin" :canRegister="canRegister" />

		<!-- Page Content -->
		<main class="min-h-screen">
			<slot />
		</main>

		<!-- Footer-->
		<HomeFooter />
	</div>
</template>