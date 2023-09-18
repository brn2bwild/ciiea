<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Modal from "@/Components/Modal.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

defineOptions({
	layout: HomeLayout
})

defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean
	},
	showModal: {
		type: Boolean,
		default: false,
	},
});

const modalImageUrl = ref('');

</script>
<template>
	<Head title="Galería" />
	<div class="w-full pt-20 px-4 sm:p-12 grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
		<div @click="showModal = true; modalImageUrl = '/storage/gallery/foro-1.jpg'" class="group cursor-pointer">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img loading="lazy" class="h-80 z-0 object-cover" src="/storage/gallery/foro-1.jpg" alt="foro-1" />
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center text-neutral-800 bg-neutral-900 opacity-0 group-hover:opacity-80 transition-all duration-150">
				</div>
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center opacity-0 group-hover:opacity-90 transition-all duration-150 z-10 text-neutral-50">
					<Link :href=" route( 'home' ) " class="hover:text-rose-500 text-6xl">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
					</Link>
				</div>
			</div>
		</div>
		<div @click="showModal = true; modalImageUrl = '/storage/gallery/foro-2.jpg'" class="group cursor-pointer">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img loading="lazy" class="h-80 z-0 object-cover" src="/storage/gallery/foro-2.jpg" alt="foro-2" />
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center text-neutral-800 bg-neutral-900 opacity-0 group-hover:opacity-80 transition-all duration-150">
				</div>
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center opacity-0 group-hover:opacity-90 transition-all duration-150 z-10 text-neutral-50">
					<Link :href=" route( 'home' ) " class="hover:text-rose-500 text-6xl">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
					</Link>
				</div>
			</div>
		</div>
		<div @click="showModal = true; modalImageUrl = '/storage/gallery/foro-3.jpg'" class="group cursor-pointer">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img loading="lazy" class="h-80 z-0 object-cover" src="/storage/gallery/foro-3.jpg" alt="foro-3" />
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center text-neutral-800 bg-neutral-900 opacity-0 group-hover:opacity-80 transition-all duration-150">
				</div>
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center opacity-0 group-hover:opacity-90 transition-all duration-150 z-10 text-neutral-50">
					<Link :href=" route( 'home' ) " class="hover:text-rose-500 text-6xl">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
					</Link>
				</div>
			</div>
		</div>
		<div @click="showModal = true; modalImageUrl = '/storage/gallery/foro-4.jpg'" class="group cursor-pointer">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img loading="lazy" class="h-80 z-0 object-cover" src="/storage/gallery/foro-4.jpg" alt="foro-4" />
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center text-neutral-800 bg-neutral-900 opacity-0 group-hover:opacity-80 transition-all duration-150">
				</div>
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center opacity-0 group-hover:opacity-90 transition-all duration-150 z-10 text-neutral-50">
					<Link :href=" route( 'home' ) " class="hover:text-rose-500 text-6xl">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
					</Link>
				</div>
			</div>
		</div>


		<!-- <div class="w-1/3">
			<div class="h-96 w-full bg-white rounded-lg overflow-hidden">
				<img loading="lazy" src="/storage/images/default-contact.png" alt="user" class="p-8">
			</div>
		</div> -->
	</div>

	<Modal @close="showModal = false" :show=" showModal " :maxWidth=" '7xl' ">
		<img class="object-cover" loading="lazy" :src=" modalImageUrl " alt="image">
	</Modal>
</template>
