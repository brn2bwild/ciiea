<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
	layout: HomeLayout
})

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
	<Head title="Libros" />
	<section class="w-full p-8">
		<div class="w-full h-full rounded-lg flex justify-between items-center">
			<div class="w-1/2 py-2">
				<h5 class="text-neutral-500 font-sans">10 de mayo de 2023</h5>
				<h1 class="text-4xl font-extrabold font-sans mt-2">Titulo del libro chingón y necesito hacer el texto más largo</h1>
				<h2 class="text-lg font-medium text-neutral-600 mt-2">Una breve descripción de que trata</h2>
				<button class="bg-indigo-600 px-4 py-2 rounded-lg text-neutral-50 font-bold mt-4">Leer más</button>
			</div>
			<div class="w-1/2 rounded-lg overflow-hidden">
				<img src="/storage/gallery/foro-1.jpg" alt="imagen1">
			</div>
		</div>
	</section>
	<section class="w-full pt-20 px-4 sm:p-12 grid grid-cols-1 md:grid-cols-3 gap-4">
		<div class="bg-transparent w-full rounded-sm flex relative group mb-32">
			<img class="h-64 w-64" src="/storage/images/default-contact.png" alt="default-contact">
			<div
				class="bg-rose-900 w-3/4 p-4 rounded-md absolute top-48 left-20 z-10 group-hover:ring-1 group-hover:ring-neutral-50 transition-all ease-in-out duration-150">
				<h1 class="text-white text-lg font-bold">
					Miguel Ordoñez Ordoñez
				</h1>
				<h2 class="text-white mb-4">
					Director general
				</h2>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'phone' } " size="lg" style="color: white;" />
					<a href="https://whatsapp.com" class="ml-2">9234164</a>
				</p>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'envelope' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">admin@example.com</a>
				</p>
				<p class="flex justify-start text-white">
					<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">@ciiea</a>
				</p>
			</div>
		</div>
		<div class="bg-transparent w-full rounded-sm flex relative group mb-32">
			<img class="h-64 w-64" src="/storage/images/default-contact.png" alt="default-contact">
			<div
				class="bg-rose-900 w-3/4 p-4 rounded-md absolute top-48 left-20 z-10 group-hover:ring-1 group-hover:ring-neutral-50 transition-all ease-in-out duration-150">
				<h1 class="text-white text-lg font-bold">
					Ing. Selene
				</h1>
				<h2 class="text-white mb-4">
					Encargada de sistemas
				</h2>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'phone' } " size="lg" style="color: white;" />
					<a href="https://whatsapp.com" class="ml-2">9321234352</a>
				</p>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'envelope' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">sistemas@example.com</a>
				</p>
				<p class="flex justify-start text-white">
					<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">@sistemas_ciiea</a>
				</p>
			</div>
		</div>
		<div class="bg-transparent w-full rounded-sm flex relative group mb-32">
			<img class="h-64 w-64" src="/storage/images/default-contact.png" alt="default-contact">
			<div
				class="bg-rose-900 w-3/4 p-4 rounded-md absolute top-48 left-20 z-10 group-hover:ring-1 group-hover:ring-neutral-50 transition-all ease-in-out duration-150">
				<h1 class="text-white text-lg font-bold">
					Juan Carlos Rodríguez Méndez
				</h1>
				<h2 class="text-white mb-4">
					Planeación
				</h2>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'phone' } " size="lg" style="color: white;" />
					<a href="https://whatsapp.com" class="ml-2">932122164</a>
				</p>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'envelope' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">planeacion@example.com</a>
				</p>
				<p class="flex justify-start text-white">
					<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">@planeacion_ciiea</a>
				</p>
			</div>
		</div>
	</section>
</template>