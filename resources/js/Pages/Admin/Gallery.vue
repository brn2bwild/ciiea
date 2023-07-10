<script setup>
import { Head } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineOptions({
	layout: AdminLayout,
});

</script>
<template>
	<Head title="Gallery" />
	<div class="w-full p-8 flex justify-end items-center gap-4">
		<input class="focus:border-rose-900 focus:ring-rose-900 rounded-sm border-gray-300 shadow-sm w-1/2" type="text"
			placeholder="Buscar imágen por nombre">
		<button class="bg-rose-900 py-2 px-6 text-white rounded-sm ">Agregar</button>
	</div>
	<div class="w-full p-8 grid grid-cols-1 md:grid-cols-4 gap-4">
		<div class="block rounded-lg bg-white dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="/storage/gallery/foro-1.jpg" alt="foro-1" />
			</a>
		</div>
		<div class="block rounded-lg bg-white dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="/storage/gallery/foro-2.jpg" alt="foro-2" />
			</a>
		</div>
		<div class="block rounded-lg bg-white dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="/storage/gallery/foro-3.jpg" alt="foro-3" />
			</a>
		</div>
		<div class="block rounded-lg bg-white dark:bg-rose-900">
			<a href="#!">
				<img class="rounded-t-lg" src="/storage/gallery/foro-4.jpg" alt="foro-4" />
			</a>
		</div>

	</div>
</template>
