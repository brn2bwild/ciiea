<script setup>
import Card from "@/Components/Card.vue";
import Modal from "@/Components/Modal.vue";
import Pagination from "@/Components/Pagination.vue";
import PdfViewer from "@/Components/PdfViewer.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
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
            <Card v-for="resource in resources.data" :key="resource.index">
                <template #thumbnail>
                    <img
                        class="h-full w-full object-cover"
                        src="/storage/images/gallery-index.jpeg"
                        alt="documents-cover"
                    />
                </template>
                <template #content>
                    <h1
                        class="mr-4 line-clamp-1 w-full text-xl font-bold text-neutral-50"
                    >
                        {{ resource.name }}
                    </h1>
                    <p class="line-clamp-2 text-neutral-100">
                        {{ resource.description }}
                    </p>
                    <h3 class="text-sm text-neutral-100">
                        Compartido {{ resource.created_at }}
                    </h3>
                    <button
                        v-if="resource.file"
                        @click="handleShowPdfModal(resource.file.path)"
                        class="rounded-lg bg-sky-500 px-4 py-2 text-md font-medium text-neutral-50"
                    >
                        Ver
                    </button>
                </template>
            </Card>
            <!-- <div
                v-for="resource in resources.data"
                :key="resource.index"
                class="flex w-full flex-col items-start justify-center rounded-2xl bg-white shadow-lg shadow-slate-100"
            >
                <div
                    class="flex h-full w-full flex-col items-start justify-between gap-2 p-4"
                >
                    <h1 class="mr-4 w-full text-xl font-bold text-neutral-900">
                        {{ resource.name }}
                    </h1>
                    <p>{{ resource.description.substr(0, 100) }}...</p>
                    <h3 class="text-sm text-neutral-600">
                        Compartido {{ resource.created_at }}
                    </h3>
                    <button
                        v-if="resource.file"
                        @click="handleShowPdfModal(resource.file.path)"
                        class="rounded-lg bg-sky-500 px-4 py-2 text-sm font-bold text-neutral-50"
                    >
                        Ver
                    </button>
                </div>
            </div> -->
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
