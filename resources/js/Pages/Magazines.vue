<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
	layout: HomeLayout
})

defineProps({
	magazines: {
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
	<div class="w-full flex flex-col items-center justify-center sm:px-60 sm:py-10">
		<section class="w-full py-10 pb-28">
			<div class="w-full h-full rounded-xl overflow-hidden flex justify-between items-center bg-white shadow-lg shadow-slate-100">
				<div class="w-1/2 p-4">
					<h5 class="text-neutral-500 font-sans">
						{{ magazines[0].publicated_at }}
					</h5>
					<h1 class="text-4xl font-extrabold font-sans mt-2 text-neutral-700">
						{{ magazines[0].name }}
					</h1>
					<!-- <h2 class="text-lg font-medium text-neutral-600 mt-2">Una breve descripción de que trata</h2> -->
					<button class="bg-indigo-600 px-4 py-2 rounded-lg text-neutral-50 font-bold mt-4">Leer más</button>
				</div>
				<div class="w-1/2">
					<img src="/storage/gallery/foro-1.jpg" alt="imagen1">
				</div>
			</div>
		</section>
		<section class="w-full pb-6">
			<h1 class="text-xl text-neutral-600 font-bold">Revistas recientes</h1>
		</section>
		<section class="w-full grid grid-cols-1 md:grid-cols-3 gap-10">
			<div v-for="  magazine   in   magazines  " :key=" magazine.index " class="w-full rounded-xl flex flex-col justify-start items-start bg-white shadow-lg shadow-slate-100 overflow-hidden">
				<div class="w-full mb-2">
					<img class="object-center object-cover" src="/storage/gallery/foro-1.jpg" alt="imagen1">
				</div>
				<div class="w-full h-full flex flex-col items-start justify-between p-4 gap-0">
					<h5 class="text-neutral-500 font-sans text-sm">{{ magazine.publicated_at }}</h5>
					<h1 class="text-xl font-extrabold font-sans">
						{{ magazine.name }}
					</h1>
					<!-- <h2 class="text-md font-medium text-neutral-600">{{  }}</h2> -->
					<button class="bg-indigo-600 px-4 py-2 rounded-lg text-neutral-50 font-bold text-sm">Leer más</button>
				</div>
			</div>
		</section>
	</div>
</template>