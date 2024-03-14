<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";
import { computed, toRef } from "vue";

defineOptions({
	layout: HomeLayout,
});

defineProps({
	canLogin: {
		type: Boolean
	},
	canRegister: {
		type: Boolean
	},
	administrators: {
		type: Object,
		required: true,
	}
});

// const socialMedia = toRef(() => {
// 	return JSON.parse(administrators)
// })

</script>

<template>

	<Head title="Contacto" />
	<section class="w-full pt-20 px-4 sm:p-12 grid grid-cols-1 md:grid-cols-3 gap-4">
		<div
			v-for="                             administrator                              in                              administrators                             "
			:key=" administrator.index " class="bg-transparent w-full rounded-sm flex relative group mb-32">
			<img class="h-32 w-32 z-20" src="/storage/images/default-contact.png" alt="default-contact">
			<div
				class="bg-blue-950 w-3/4 p-4 rounded-xl absolute top-10 left-5 z-10 h-52 flex flex-col justify-between items-center">
				<div class="flex flex-col items-end pl-24">
					<h1 class="text-white text-lg font-bold">
						{{ administrator.name }}
					</h1>
					<h2 class="text-neutral-200">
						{{ administrator.short_description }}
					</h2>
				</div>
				<div>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'phone' ] " class="text-neutral-50 text-xl" />
						<a href="https://whatsapp.com" class="ml-2">
							{{ administrator.mobile }}
						</a>
					</p>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'envelope' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">
							{{ administrator.email }}
						</a>
					</p>
					<p class="flex justify-start text-white">
						<font-awesome-icon :icon=" [ 'fab', 'twitter' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">
							{{ administrator.social_media.twitter }}
						</a>
					</p>
				</div>
			</div>
		</div>
		<!-- <div class="bg-transparent w-full rounded-sm flex relative group mb-32">
			<img class="h-32 w-32 z-20" src="/storage/images/default-contact.png" alt="default-contact">
			<div
				class="bg-blue-950 w-3/4 p-4 rounded-xl absolute top-10 left-5 z-10 h-52 flex flex-col justify-between items-center">
				<div class="flex flex-col items-end pl-24">
					<h1 class="text-white text-lg font-bold">
						Ing. Selene
					</h1>
					<h2 class="text-neutral-200">
						Encargada de sistemas
					</h2>
				</div>
				<div>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'phone' ] " class="text-neutral-50 text-xl" />
						<a href="https://whatsapp.com" class="ml-2">9321234352</a>
					</p>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'envelope' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">sistemas@example.com</a>
					</p>
					<p class="flex justify-start text-white">
						<font-awesome-icon :icon=" [ 'fab', 'twitter' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">@sistemas_ciiea</a>
					</p>
				</div>
			</div>
		</div>
		<div class="bg-transparent w-full rounded-sm flex relative group mb-32">
			<img class="h-32 w-32 z-20" src="/storage/images/default-contact.png" alt="default-contact">
			<div
				class="bg-blue-950 w-3/4 p-4 rounded-xl absolute top-10 left-5 z-10 h-52 flex flex-col justify-between items-center">
				<div class="flex flex-col items-end pl-24">
					<h1 class="text-white text-lg font-bold">
						Juan Carlos Rodríguez Méndez
					</h1>
					<h2 class="text-neutral-200">
						Planeación
					</h2>
				</div>
				<div>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'phone' ] " class="text-neutral-50 text-xl" />
						<a href="https://whatsapp.com" class="ml-2">932122164</a>
					</p>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'envelope' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">planeacion@example.com</a>
					</p>
					<p class="flex justify-start text-white">
						<font-awesome-icon :icon=" [ 'fab', 'twitter' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">@planeacion_ciiea</a>
					</p>
				</div>
			</div>
		</div> -->
	</section>
	<section class="px-4 sm:px-0 pb-16 mb-10 relative">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2328.054491828354!2d-92.93779457026712!3d17.562612384054674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85edb757e68858c3%3A0x9e0871be66d0e66c!2sCentro%20de%20Investigaci%C3%B3n%20E%20Innovaci%C3%B3n%20Para%20la%20Ense%C3%B1anza%20y%20El%20Aprendizaje%20Ciiea!5e0!3m2!1ses-419!2smx!4v1689117052692!5m2!1ses-419!2smx"
			style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
			class="w-full h-96 sm:h-[480px]">
		</iframe>
		<div class="w-full bg-transparent absolute bottom-10 flex justify-center gap-8">
			<div
				class="w-full sm:w-1/5 rounded-xl overflow-hidden bg-neutral-50 p-4 text-center shadow-lg flex flex-col items-center justify-start">
				<span class="font-bold text-lg text-neutral-600 mb-4">
					Dirección
				</span>
				<p class="text-neutral-600">
					Carretera a Las Grutas S/N, Eureka y Belem, 86800 Teapa, Tab.
				</p>
			</div>
			<div
				class="w-full sm:w-1/5 rounded-xl overflow-hidden bg-neutral-50 p-4 text-center shadow-lg flex flex-col items-center justify-start">
				<span class="font-bold text-lg text-neutral-600 mb-4">
					Horario de atención
				</span>
				<p class="text-neutral-600">
					Lunes a Viernes <br>
					8:00 a.m. - 3:00 p.m.
				</p>
			</div>
			<div
				class="w-full sm:w-1/5 rounded-xl overflow-hidden bg-neutral-50 p-4 text-center shadow-lg flex flex-col items-center justify-start">
				<span class="font-bold text-lg text-neutral-600 mb-4">
					Número telefónico
				</span>
				<p class="text-neutral-600">
					932 322 3381
				</p>
			</div>
		</div>
	</section>
	<!-- <h1 class="text-xl sm:text-2xl font-bold mb-4">
		Centro de Investigación e Innovación para la Enseñanza y el Aprendizaje
	</h1> -->
	<div class="w-full flex flex-col justify-center items-center gap-4 bg-blue-950 p-8">
		<h1 class="text-xl text-neutral-100">Centro de Investigación e Innovación para la Enseñanza y el Aprendizaje</h1>
		<div class="flex justify-center gap-10">
			<a href="https://facebook.com" target="_blank">
				<font-awesome-icon :icon=" [ 'fab', 'facebook' ] " class="text-neutral-50 text-5xl" />
			</a>
			<a href="https://facebook.com" target="_blank">
				<font-awesome-icon :icon=" [ 'fab', 'twitter' ] " class="text-neutral-50 text-5xl" />
			</a>
		</div>
	</div>
</template>
