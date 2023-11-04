<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
	layout: HomeLayout
})

defineProps({
	publications: {
		type: Object,
	},
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
})
</script>
<template>
	<Head title="Libros" />
	<section class="w-full p-8">
		<div class="w-full h-full rounded-lg flex justify-between items-center">
			<div class="w-1/2 py-2">
				<h5 class="text-neutral-500 font-sans">10 de mayo de 2023</h5>
				<h1 class="text-4xl font-extrabold font-sans mt-2">Titulo del libro chingón y necesito hacer el texto más largo
				</h1>
				<h2 class="text-lg font-medium text-neutral-600 mt-2">Una breve descripción de que trata</h2>
				<button class="bg-indigo-600 px-4 py-2 rounded-lg text-neutral-50 font-bold mt-4">Leer más</button>
			</div>
			<div class="w-1/2 rounded-lg overflow-hidden">
				<img src="/storage/gallery/foro-1.jpg" alt="imagen1">
			</div>
		</div>
	</section>
	<section>
		<div class="w-full flex justify-between px-8 py-4">
			<h1 class="text-xl text-neutral-700 font-bold">Libros recientes</h1>
		</div>
	</section>
	<section class="w-full pt-20 px-4 sm:p-8 grid grid-cols-1 md:grid-cols-3 gap-8">
		<div v-for="publication in publications" :key="publication.index" class="w-full h-80 rounded-lg flex flex-col justify-center items-start">
			<div class="w-full h-1/2 rounded-lg overflow-hidden mb-2">
				<img class="object-center object-cover" src="/storage/gallery/foro-1.jpg" alt="imagen1">
			</div>
			<div class="w-full h-1/2 flex flex-col items-start justify-between py-2 gap-0">
				<h5 class="text-neutral-500 font-sans text-sm">{{ publication.publicated_at }}</h5>
				<h1 class="text-xl font-extrabold font-sans">
					{{ publication.title }}
				</h1>
				<h2 class="text-md font-medium text-neutral-600">Una breve descripción de que trata</h2>
				<button class="bg-indigo-600 px-4 py-2 rounded-lg text-neutral-50 font-bold text-sm">Leer más</button>
			</div>
		</div>
	</section>
</template>