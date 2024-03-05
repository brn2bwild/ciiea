<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
	layout: HomeLayout
})

defineProps({
	images: {
		type: Object,
		required: true,
	}
})
</script>

<template>

	<Head title="Galería" />

	<section class="w-full grid grid-cols-1 md:grid-cols-3 gap-10 p-8">
		<div
			class="w-full rounded-xl flex flex-col justify-start items-start bg-white shadow-lg shadow-slate-100 overflow-hidden"
			v-for="  image  in  images  " :key=" image.index ">
			<img class="object-cover" :src=" '/storage/' + image.path " alt="image">
		</div>
	</section>
</template>
