<script setup>
import Modal from '@/Components/Modal.vue';
import PdfThumbnail from '@/Components/PdfThumbnail.vue';
import PdfViewer from '@/Components/PdfViewer.vue';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

defineOptions({
	layout: HomeLayout
})

const props = defineProps({
	publications: {
		type: Object,
	},
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
})

const showPdfModal = ref(false)
const urlToShow = ref("")

const handleOpenPdfModal = (url) => {
	urlToShow.value = url
	showPdfModal.value = true
}

const handleClosePdfModal = () => {
	showPdfModal.value = false
}
</script>

<template>

	<Head title="Publicaciones" />
	<div class="w-full flex flex-col items-center justify-center sm:px-60 sm:py-10">
		<section class="w-full py-10 pb-28">
			<div
				class="w-full h-full rounded-xl overflow-hidden flex justify-between items-center bg-white shadow-lg shadow-slate-100">
				<div class="w-1/2 p-4">
					<h5 class="text-neutral-500 font-sans">
						{{ props.publications[ 0 ].publicated_at }}
					</h5>
					<h1 class="text-4xl font-extrabold font-sans mt-2 text-neutral-700">
						{{ props.publications[ 0 ].title }}
					</h1>
					<button v-if=" props.publications[ 0 ].file "
						@click="handleOpenPdfModal( props.publications[ 0 ].file.path )"
						class="bg-sky-500 px-4 py-2 rounded-xl text-neutral-50 font-bold mt-4">Leer más</button>
				</div>
				<div class="w-1/2 h-80 overflow-hidden object-contain flex justify-center">
					<div v-if=" props.publications[ 0 ].file !== null " class=" scale-90 -m-[20px]">
						<PdfThumbnail :url=" props.publications[ 0 ].file.path " />
					</div>
					<img v-else src="/storage/images/bookshelve-optimized.jpg" alt="book-cover">
				</div>
			</div>
		</section>
		<section class="w-full pb-6">
			<h1 class="text-xl text-neutral-600 font-bold">Publicaciones recientes</h1>
		</section>
		<section class="w-full grid grid-cols-1 md:grid-cols-3 gap-10">
			<div v-for="          publication in publications          " :key=" publication.index "
				class="w-full rounded-xl flex flex-col justify-center items-start bg-white shadow-lg shadow-slate-100 overflow-hidden">
				<div class="w-full h-60 mb-2 overflow-hidden object-contain flex justify-center items-start">
					<div v-if=" publication.file !== null " class="scale-[60%] -m-[160px]">
						<PdfThumbnail :url=" publication.file.path " />
					</div>
					<img v-else src="/storage/images/bookshelve-optimized.jpg" alt="book-cover" class="w-full">
				</div>
				<div class="w-full h-44 flex flex-col items-start justify-between p-4 gap-0">
					<h5 class="text-neutral-500 font-sans text-sm">{{ publication.publicated_at }}</h5>
					<h1 class="text-xl font-extrabold font-sans">
						{{ publication.title }}
					</h1>
					<button v-if=" publication.file " @click="handleOpenPdfModal( publication.file.path )"
						class="bg-sky-500 px-4 py-2 rounded-xl text-neutral-50 font-bold text-sm">Leer
						más</button>
				</div>
			</div>
		</section>
	</div>
	<Modal @close=" handleClosePdfModal " :show=" showPdfModal " :max-width=" '3xl' "
		class=" overflow-hidden h-[860px]">
		<PdfViewer :url=" urlToShow " class=" object-fill" />
	</Modal>
</template>