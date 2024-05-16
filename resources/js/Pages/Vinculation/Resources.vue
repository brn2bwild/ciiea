<script setup>
import Modal from "@/Components/Modal.vue";
import PdfViewer from "@/Components/PdfViewer.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    resources: {
        type: Object,
        required: true,
    },
});

const showModal = ref(false);
const urlToShow = ref("");

const handleShowPdfModal = (url) => {
    urlToShow.value = url;
    showModal.value = true;
};

const handleClosePdfModal = () => {
    showModal.value = false;
};
</script>
<template>
    <Head title="Recursos" />
    <div
        class="w-full flex flex-col items-center justify-center sm:px-60 sm:py-10"
    >
        <section class="w-full pb-6">
            <h1 class="text-xl text-neutral-600 font-bold">
                Recursos de vinculación
            </h1>
        </section>
        <section class="w-full grid grid-cols-1 sm:grid-cols-3 gap-10">
            <div
                v-for="resource in resources.data"
                :key="resource.index"
                class="w-full rounded-xl flex flex-col justify-center items-start bg-white shadow-lg shadow-slate-100"
            >
                <!-- <div class="w-full mb-2">
					<img src="/storage/resources/conv1.jpg" :alt=" 'resource' + resource.index " />
				</div> -->
                <div
                    class="w-full h-full flex flex-col items-start justify-between p-4 gap-2"
                >
                    <h1 class="w-full font-bold text-xl mr-4 text-neutral-900">
                        {{ resource.name }}
                    </h1>
                    <p>{{ resource.description.substr(0, 100) }}...</p>
                    <h3 class="text-neutral-600 text-sm">
                        Compartido {{ resource.created_at }}
                    </h3>
                    <button
                        v-if="resource.file"
                        @click="handleShowPdfModal(resource.file.path)"
                        class="bg-sky-500 px-4 py-2 rounded-lg text-neutral-50 font-bold text-sm"
                    >
                        Ver
                    </button>
                </div>
            </div>
        </section>
    </div>
    <Modal @close="handleClosePdfModal" :show="showModal" max>
        <PdfViewer :url="urlToShow" />
    </Modal>
</template>
