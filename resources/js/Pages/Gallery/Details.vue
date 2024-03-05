<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import Modal from "@/Components/Modal.vue";
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

defineOptions({
	layout: HomeLayout
})

defineProps({
	images: {
		type: Object,
		required: true,
	}
})

const modalImageUrl = ref('')
const showModal = ref(false)
</script>

<template>

	<Head title="Galería" />

	<section class="w-full grid grid-cols-1 md:grid-cols-5 gap-10 p-8">
		<div
			class="w-full rounded-xl flex flex-col justify-start items-start bg-white shadow-lg shadow-slate-100 overflow-hidden cursor-pointer"
			v-for="              image              in              images              " :key=" image.index ">
			<div @click="showModal = true; modalImageUrl = '/storage/' + image.path">
				<img class="object-cover" :src=" '/storage/' + image.path " alt="image">
			</div>
		</div>
	</section>

	<Modal @close="showModal = false" :show=" showModal " :maxWidth=" '3xl' ">
		<img class="object-cover" loading="lazy" :src=" modalImageUrl " alt="image">
	</Modal>
</template>
