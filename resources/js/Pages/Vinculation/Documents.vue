<script setup>
import Modal from "@/Components/Modal.vue";
import Pagination from "@/Components/Pagination.vue";
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
        class="flex w-full flex-col items-center justify-center sm:px-60 sm:py-10"
    >
        <section class="w-full pb-6">
            <h1 class="text-xl font-bold text-neutral-600">
                Documentos de vinculación
            </h1>
        </section>
        <section class="grid w-full grid-cols-1 gap-10 sm:grid-cols-3">
            <div
                v-for="resource in resources.data"
                :key="resource.index"
                class="flex w-full flex-col items-start justify-center rounded-xl bg-white shadow-lg shadow-slate-100"
            >
                <div
                    class="flex h-full w-full flex-col items-start justify-between gap-2 p-4"
                >
                    <h1 class="mr-4 w-full text-xl font-bold text-neutral-900">
                        {{ resource.name }}
                    </h1>
                    <p>{{ resource.description.substr(0, 100) }}...</p>
                    <h3 class="text-sm text-neutral-600">
                        Compartido el {{ resource.created_at }}
                    </h3>
                    <button
                        v-if="resource.file"
                        @click="handleShowPdfModal(resource.file.path)"
                        class="rounded-lg bg-sky-500 px-4 py-2 text-sm font-bold text-neutral-50"
                    >
                        Ver
                    </button>
                </div>
            </div>
        </section>
        <Pagination
            :links="props.resources.meta.links"
            class="mt-8 flex justify-center"
        />
    </div>
    <Modal @close="handleClosePdfModal" :show="showModal" max>
        <PdfViewer :url="urlToShow" />
    </Modal>
</template>
