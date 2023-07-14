<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout
})

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
	<Head title="Divulgación" />
	<section class="w-full h-[560px] mb-8 sm:mb-32">
		<div class="w-full flex justify-between relative">
			<img class="object-cover w-2/3 h-[560px]" src="/storage/images/bookshelve-optimized.jpg" alt="historical"
				loading="lazy">
			<div
				class="absolute top-2/3 sm:left-2/4 sm:w-[480px] flex items-center justify-between bg-rose-900 h-32 rounded-sm text-white px-5 sm:px-8">
				<h1 class="text-2xl font-medium">Publicaciones históricas</h1>
				<div class="sm:w-1/4 h-full flex items-end justify-end pb-2">
					<Link :href=" route( 'divulgation' ) "
						class="px-4 py-2 bg-white text-rose-900 rounded-md font-semibold hover:bg-neutral-200">Ver más</Link>
				</div>
			</div>
		</div>
	</section>
	<section class="w-full sm:h-[380px] bg-rose-900 flex flex-wrap justify-between items-center py-4 sm:py-0">
		<h1 class="w-full sm:w-1/3 text-white text-center sm:text-right text-4xl font-medium p-4 sm:p-0">
			Investigaciones
		</h1>
		<div class="flex-col text-center w-full sm:w-2/3 sm:px-32 p-4">
			<p class="text-white text-lg text-center mb-4 sm:mb-8 leading-9">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem mollitia odio soluta non ab eius,
				repudiandae corporis. Fuga, nulla perferendis architecto facere dignissimos nostrum mollitia ipsa ipsum corrupti
				cupiditate magni.
			</p>
			<Link :href=" route( 'divulgation' ) "
				class="px-4 py-2 bg-white text-rose-900 rounded-md font-semibold hover:bg-neutral-200">Ver todas</Link>
		</div>
	</section>
	<section class="w-full h-[560px] flex flex-wrap justify-between items-center sm:my-16">
		<div class="w-full sm:w-1/2 flex-col justify-center text-right p-4 sm:px-24">
			<h1 class="text-4xl font-medium mb-8">Libros</h1>
			<p class="text-lg leading-9 mb-8">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum sit, molestiae
				animi
				itaque quia aliquam. Repellat perspiciatis velit eveniet veritatis quaerat quo natus, nam dolores totam commodi,
				laudantium ipsam impedit!</p>
			<Link :href=" route( 'divulgation' ) " class="px-4 py-2 bg-rose-900 rounded-md text-white hover:bg-rose-950">
			Ver todos
			</Link>
		</div>
		<img class="w-1/2 h-full object-cover hidden sm:block" src="/storage/images/books-optimized.jpg" alt="books" loading="lazy">
	</section>
	<section class="w-full h-[440px] relative">
		<div class="absolute bg-black h-full w-full opacity-50"></div>
		<img class="object-cover h-full w-full bg-opacity-30 z-10 bg-black" src="/storage/images/magazines-optimized.jpg" alt="magazines"
			loading="lazy">
		<div class="absolute right-0 bottom-0 text-white sm:w-1/2 px-4 pb-16 flex flex-wrap">
			<h1 class="text-4xl mb-8">Revistas</h1>
			<p class="leading-9 mb-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione dolor maxime perferendis
				ab libero perspiciatis rem rerum vero voluptatem, culpa doloribus, hic, repellendus iste alias aliquam ipsum earum
				architecto nesciunt.</p>
			<Link :href=" route( 'divulgation' ) "
				class="px-4 py-2 bg-white rounded-md text-rose-950 font-semibold hover:bg-neutral-200">
			Ver todas
			</Link>
		</div>
	</section>
</template>