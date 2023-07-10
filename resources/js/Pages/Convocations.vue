<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout
});

defineProps({
	canLogin: {
		type: Boolean
	},
	canRegister: {
		type: Boolean,
	}
})
</script>
<template>
	<Head title="Convocatorias" />
	<!-- <div class="w-full p-8 flex justify-end items-center">
		<input class="text-neutral-900 rounded-full bg-neutral-200 focus:ring-neutral-400 focus:ring-2 ring-0 border-0 w-1/2" type="text"
			placeholder="Buscar convocatoria por nombre">
	</div> -->
	<div class="w-full px-12 py-16 grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-12">
		<div class="block rounded-lg bg-white dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="/storage/convocations/conv1.jpg" alt="conv1" />
			</a>
			<div class="px-6 py-4 text-white">
				<h1 class="font-medium text-xl mb-4">Cine debate</h1>
				<p>Esta es una pequeña descripción de lo que es el cine debate</p>
			</div>
			<div class="w-full px-6 pb-4 flex justify-end items-center text-white">
				<Link :href=" route( 'home' ) " class="text-lg">Ver más</Link>
			</div>
		</div>
		<div class="block rounded-lg bg-white dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="/storage/convocations/conv3.jpg" alt="conv3" />
			</a>
			<div class="px-6 py-4 text-white">
				<h1 class="font-medium text-xl mb-4">Verano científico 2022</h1>
				<p>Esta es una pequeña descripción de lo que es el verano científico 2022</p>
			</div>
			<div class="w-full px-6 pb-4 flex justify-end items-center text-white">
				<Link :href=" route( 'home' ) " class="text-lg">Ver más</Link>
			</div>
		</div>
		<div class="block rounded-lg bg-white dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="/storage/convocations/conv4.jpg" alt="conv4" />
			</a>
			<div class="px-6 py-4 text-white">
				<h1 class="font-medium text-xl mb-4">Nuevos miembros de la red</h1>
				<p>Esta es una pequeña descripción de lo que es la parte de nuevos miembros de la red</p>
			</div>
			<div class="w-full px-6 pb-4 flex justify-end items-center text-white">
				<Link :href=" route( 'home' ) " class="text-lg">Ver más</Link>
			</div>
		</div>
		<div class="block rounded-lg bg-white dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="/storage/convocations/conv2.jpg" alt="conv2" />
			</a>
			<div class="px-6 py-4 text-white">
				<h1 class="font-medium text-xl mb-4">7° Foro Estatal de Investigación e Innovación Educativa</h1>
				<p>Esta es una pequeña descripción de lo que es foro de investigación e innovación</p>
			</div>
			<div class="w-full px-6 pb-4 flex justify-end items-center text-white">
				<Link :href=" route( 'home' ) " class="text-lg">Ver más</Link>
			</div>
		</div>
	</div>
</template>