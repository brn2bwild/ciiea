<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineOptions({
	layout: AdminLayout
});

</script>
<template>
	<Head title="Divulgation" />
	<!-- <AdminLayout> -->
	<div class="w-full p-8 grid grid-cols-1 md:grid-cols-4 gap-4">
		<div
			class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" alt="" />
			</a>
			<div class="p-6">
				<h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-white">
					Publicaciones históricas
				</h5>
				<p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
					Descripción de las publicaciones históricas.
				</p>
				<Link :href=" route( 'home' ) "
					class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-md font-medium uppercase leading-normal text-white">
				Ver más</Link>
			</div>
		</div>
		<div
			class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" alt="" />
			</a>
			<div class="p-6">
				<h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-white">
					Investigaciones
				</h5>
				<p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
					Descripción de las investigaciones realizadas.
				</p>
				<Link :href=" route( 'home' ) "
					class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-md font-medium uppercase leading-normal text-white">
				Ver más</Link>
			</div>
		</div>
		<div
			class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" alt="" />
			</a>
			<div class="p-6">
				<h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-white">
					Libros
				</h5>
				<p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
					Descripción de los libros publicados.
				</p>
				<Link :href=" route( 'home' ) "
					class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-md font-medium uppercase leading-normal text-white">
				Ver más</Link>
			</div>
		</div>
		<div
			class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" alt="" />
			</a>
			<div class="p-6">
				<h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-white">
					Revistas
				</h5>
				<p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
					Descripción de las revistas.
				</p>
				<Link :href=" route( 'home' ) "
					class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-md font-medium uppercase leading-normal text-white">
				Ver más</Link>
			</div>
		</div>
	</div>
	<!-- </AdminLayout> -->
</template>
