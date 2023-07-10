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
	<section class="w-full h-[560px] pt-12 mb-32">
		<div class="w-full flex justify-between relative">
			<img class="object-cover w-2/3 h-[560px]" src="/storage/images/bookshelve.jpg" alt="books">
			<div
				class="absolute top-2/3 left-2/4 w-[480px] flex items-center justify-between bg-rose-900 h-32 rounded-sm text-white px-8">
				<h1 class="text-2xl font-medium">Publicaciones históricas</h1>
				<div class="w-1/4 h-full flex items-end justify-end pb-4">
					<Link :href=" route( 'divulgation' ) "
						class="px-4 py-2 bg-white text-rose-900 rounded-md font-semibold hover:bg-neutral-200">Ver más</Link>
				</div>
			</div>
		</div>
	</section>
	<section class="w-full h-[380px] bg-rose-900 flex items-center">
		<h1 class="w-1/3 text-white text-right text-4xl font-medium">
			Investigaciones
		</h1>
		<div class="flex-col text-center w-2/3 px-32">
			<p class="text-white text-lg text-center mb-8 leading-9">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem mollitia odio soluta non ab eius,
				repudiandae corporis. Fuga, nulla perferendis architecto facere dignissimos nostrum mollitia ipsa ipsum corrupti
				cupiditate magni.
			</p>
			<Link :href=" route( 'divulgation' ) "
				class="px-4 py-2 bg-white text-rose-900 rounded-md font-semibold hover:bg-neutral-200">Ver todas</Link>
		</div>
	</section>
	<section class="w-full h-[560px] flex justify-between items-center my-16">
		<div class="w-1/2 flex-col justify-center text-right px-24">
			<h1 class="text-4xl font-medium mb-8">Libros</h1>
			<p class="text-lg leading-9 mb-8">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum sit, molestiae
				animi
				itaque quia aliquam. Repellat perspiciatis velit eveniet veritatis quaerat quo natus, nam dolores totam commodi,
				laudantium ipsam impedit!</p>
			<Link :href=" route( 'divulgation' ) " class="px-4 py-2 bg-rose-900 rounded-md text-white hover:bg-rose-950">
			Ver todos
			</Link>
		</div>
		<img class="w-1/2 h-full object-cover" src="/storage/images/books.jpg" alt="books">
	</section>
	<section class="w-full h-[440px] relative">
		<div class="absolute bg-black h-full w-full"></div>
		<img class="object-cover h-full w-full opacity-30 z-10" src="/storage/images/magazines.jpg" alt="magazines">
		<div class="absolute right-0 bottom-0 text-white w-1/2 pb-16">
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