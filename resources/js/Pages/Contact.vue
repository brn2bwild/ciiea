<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout,
});

defineProps({
	canLogin: {
		type: Boolean
	},
	canRegister: {
		type: Boolean
	}
});

</script>
<template>
	<Head title="Contacto" />
	<div class="w-full p-10 grid grid-cols-1 md:grid-cols-3 gap-4">
		<div class="bg-transparent w-full rounded-sm flex gap-4 relative group">
			<img class="h-64 w-64" src="/storage/images/default-contact.png" alt="default-contact">
			<div
				class="bg-rose-900 w-3/4 p-4 rounded-md absolute top-52 left-14 z-10 group-hover:ring-1 group-hover:ring-neutral-50 transition-all ease-in-out duration-150">
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
		<div class="bg-transparent w-full rounded-sm flex gap-4 relative group">
			<img class="h-64 w-64" src="/storage/images/default-contact.png" alt="default-contact">
			<div class="bg-rose-900 w-3/4 p-4 rounded-md absolute top-52 left-14 z-10">
				<h1 class="text-white text-lg font-bold">
					Selene CIIEA
				</h1>
				<h2 class="text-white mb-4">
					Director de sistemas
				</h2>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'phone' } " size="lg" style="color: white;" />
					<a href="https://whatsapp.com" class="ml-2">9223164</a>
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
	</div>
	<div class="w-full h-96 px-10 mt-44 pb-10 flex justify-between">
		<div class="w-full h-full sm:w-1/2 bg-rose-900 text-neutral-50 p-8 rounded-l-md">
			<h1 class="text-2xl font-medium mb-4">
				Centro de Investigación e Innovación para la Enseñanza y el Aprendizaje
			</h1>
			<p class="text-lg mb-2">
				Carretera a Las Grutas S/N, Urequa y Belem, 86800 Teapa, Tab.
			</p>
			<p class="text-lg mb-2">
				Horarios de atencion: 8:00 a.m. - 3:00 p.m. lunes a viernes.
			</p>
			<p class="text-lg">
				Número telefónico: 932 322 3381
			</p>
			<div class="w-full flex justify-center items-center gap-8 mt-10">
				<a href="https://facebook.com" target="_blank">
					<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'facebook' } " size="3x" style="color: white;" />
				</a>
				<a href="https://facebook.com" target="_blank">
					<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="3x" style="color: white;" />
				</a>
			</div>
		</div>
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2328.054491828354!2d-92.93779457026712!3d17.562612384054674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85edb757e68858c3%3A0x9e0871be66d0e66c!2sCentro%20de%20Investigaci%C3%B3n%20E%20Innovaci%C3%B3n%20Para%20la%20Ense%C3%B1anza%20y%20El%20Aprendizaje%20Ciiea!5e0!3m2!1ses-419!2smx!4v1689117052692!5m2!1ses-419!2smx"
			width="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
			class="rounded-r-md"></iframe>
	</div>
</template>
