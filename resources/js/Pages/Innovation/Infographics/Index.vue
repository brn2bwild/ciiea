<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
	layout: HomeLayout
})

defineProps({
	infographics: {
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

	<Head title="Infografías" />
	<div class="w-full flex flex-col items-center justify-center sm:px-60 sm:py-10">
		<section class="w-full pb-6">
			<h1 class="text-xl text-neutral-600 font-bold">Infografías</h1>
		</section>
		<section class="w-full grid grid-cols-1 md:grid-cols-3 gap-10">
			<div v-for=" infographic in infographics " :key=" infographic.index "
				class="w-full rounded-xl flex flex-col justify-start items-start bg-white shadow-lg shadow-slate-100 overflow-hidden">
				<div class="w-full h-60 mb-2 overflow-hidden">
					<img class="object-center object-cover"
						:src=" '/storage/' + ( infographic.image !== null ? infographic.image.path : 'images/bookshelve-optimized.jpg' ) "
						alt="book-cover">
				</div>
				<div class="w-full h-36 flex flex-col items-start justify-between p-4 gap-0">
					<!-- <h5 class="text-neutral-500 font-sans text-sm">{{ software.publicated_at }}</h5> -->
					<h1 class="text-lg font-extrabold font-sans text-neutral-700">
						{{ infographic.title }}
					</h1>
					<!-- <h2 class="text-md font-medium text-neutral-600">{{ infographic.authors }}</h2> -->
					<Link :href="route('infographics.show', infographic.slug)" class="bg-sky-500 px-4 py-2 rounded-xl text-neutral-50 font-bold text-sm">Leer más</Link>
				</div>
			</div>
		</section>
	</div>
</template>
