<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout
})

defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean
	}
})
</script>
<template>
	<Head title="Galería" />
	<!-- <HomeLayout :canLogin=" canLogin "> -->
		<div class="w-full py-16 px-8 grid grid-cols-1 md:grid-cols-3 gap-4">
			<div
				class="hover:scale-110 hover:shadow-none transition-all delay-150 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900">
				<a href="#!">
					<img class="rounded-t-lg" src="/storage/gallery/foro-1.jpg" alt="foro-1" />
				</a>
			</div>
			<div
				class="hover:scale-110 hover:shadow-none transition-all delay-150 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900">
				<a href="#!">
					<img class="rounded-t-lg" src="/storage/gallery/foro-2.jpg" alt="foro-2" />
				</a>
			</div>
			<div
				class="hover:scale-110 hover:shadow-none transition-all delay-150 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900">
				<a href="#!">
					<img class="rounded-t-lg" src="/storage/gallery/foro-3.jpg" alt="foro-3" />
				</a>
			</div>
			<div
				class="hover:scale-110 hover:shadow-none transition-all delay-150 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900">
				<a href="#!">
					<img class="rounded-t-lg" src="/storage/gallery/foro-4.jpg" alt="foro-4" />
				</a>
			</div>

		</div>
	<!-- </HomeLayout> -->
</template>
