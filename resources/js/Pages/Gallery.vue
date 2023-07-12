<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout
})

defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean
	}
})
</script>
<template>
	<Head title="Galería" />

	<!-- <div class="pt-20 px-4 sm:px-16 sm:py-16 grid grid-cols-2 md:grid-cols-3 gap-4">
		<div class="grid gap-4">
			<div
				class="rounded-lg bg-neutral-50 group group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative cursor-pointer">
				<img class="h-auto max-w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg"
					alt="">
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
			<div>
				<img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg"
					alt="">
			</div>
			<div>
				<img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg"
					alt="">
			</div>
		</div>
		<div class="grid gap-4">
			<div>
				<img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg"
					alt="">
			</div>
			<div>
				<img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg"
					alt="">
			</div>
			<div>
				<img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg"
					alt="">
			</div>
		</div>
		<div class="grid gap-4">
			<div>
				<img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg"
					alt="">
			</div>
			<div>
				<img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg"
					alt="">
			</div>
			<div>
				<img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg"
					alt="">
			</div>
		</div>
		<div class="grid gap-4">
			<div>
				<img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg"
					alt="">
			</div>
			<div>
				<img class="h-auto max-w-full rounded-lg"
					src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg" alt="">
			</div>
			<div>
				<img class="h-auto max-w-full rounded-lg"
					src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg" alt="">
			</div>
		</div>
	</div> -->

	<div class="w-full pt-20 px-4 sm:px-24 sm:py-16 grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
		<a href="#" class="group">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img class="h-80 z-0 object-cover" src="/storage/gallery/foro-1.jpg" alt="foro-1" />
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center text-neutral-800 bg-neutral-900 opacity-0 group-hover:opacity-80 transition-all duration-150">
				</div>
				<div @click="console.log('hola')"
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center opacity-0 group-hover:opacity-90 transition-all duration-150 z-10 text-neutral-50">
					<Link :href=" route( 'home' ) " class="hover:text-rose-500 text-6xl">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
					</Link>
				</div>
			</div>
		</a>
		<a href="#" class="group">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img class="h-80 z-0 object-cover" src="/storage/gallery/foro-1.jpg" alt="foro-1" />
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
		</a>
		<a href="#" class="group">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img class="h-80 z-0 object-cover" src="/storage/gallery/foro-1.jpg" alt="foro-1" />
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
		</a>
		<a href="#" class="group">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img class="h-80 z-0 object-cover" src="/storage/gallery/foro-1.jpg" alt="foro-1" />
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
		</a>

		<!-- <div class="w-1/3">
			<div class="h-96 w-full bg-white rounded-lg overflow-hidden">
				<img src="/storage/images/default-contact.png" alt="user" class="p-8">
			</div>
		</div> -->
	</div>
</template>
