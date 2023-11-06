<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout
});

defineProps({
	convocations: {
		type: Object,
	},
	canLogin: {
		type: Boolean
	},
	canRegister: {
		type: Boolean,
	}
});

</script>
<template>
	<Head title="Convocatorias" />
	<!-- <div class="w-full p-8 flex justify-end items-center">
		<input class="text-neutral-900 rounded-full bg-neutral-200 focus:ring-neutral-400 focus:ring-2 ring-0 border-0 w-1/2" type="text"
			placeholder="Buscar convocatoria por nombre">
	</div> -->
	<div class="w-full flex flex-col items-center justify-center sm:px-60 sm:py-10">
		<section class="w-full pt-10 pb-20">
			<div class="w-full h-full rounded-xl flex justify-between items-center bg-white p-4 shadow-lg shadow-slate-100">
				<div class="w-1/2 py-2">
					<h5 class="text-neutral-500 font-sans">
						{{ convocations[0].date }} - {{ convocations[0].time }}
					</h5>
					<h1 class="text-3xl font-extrabold font-sans mt-2 text-neutral-700">
						{{ convocations[0].name }}
					</h1>
					<h2 class="text-lg font-medium text-neutral-600 mt-2">
						{{ convocations[0].description.substr(0, 100) }}
					</h2>
					<button class="bg-indigo-600 px-4 py-2 rounded-xl text-neutral-50 font-bold mt-4">Leer más</button>
				</div>
				<div class="w-1/2 rounded-xl overflow-hidden">
					<img src="/storage/gallery/foro-1.jpg" alt="imagen1">
				</div>
			</div>
		</section>
		<section class="w-full pb-6">
			<h1 class="text-xl text-neutral-600 font-bold">Últimas Convocatorias</h1>
		</section>
		<section class="w-full grid grid-cols-1 sm:grid-cols-2 gap-10">
			<div v-for="  convocation   in   convocations  " :key=" convocation.index "
				class="w-full rounded-xl flex flex-col justify-center items-start bg-white p-4 shadow-lg shadow-slate-100">
				<img class="rounded-xl" src="/storage/convocations/conv1.jpg" :alt=" 'convocation' + convocation.index " />
				<div class="flex flex-col justify-between items-start">
					<h3 class="text-neutral-600 text-sm">
						{{ convocation.date }} - {{ convocation.time }}
					</h3>
					<h1 class="w-full font-bold text-xl mr-4 text-neutral-900">{{ convocation.name }}</h1>
					<p>
						{{ convocation.description.substr( 0, 100 ) }}...
					</p>
					<h3 class="text-neutral-600 text-sm">
						Publicado hace 3 horas
					</h3>
				</div>
			</div>
		</section>
	</div>
</template>