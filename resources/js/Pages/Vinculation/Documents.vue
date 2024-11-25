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
        class="flex w-full flex-col items-center justify-center px-14 lg:px-60 sm:py-10"
    >
        <section class="mb-10 w-full pb-6">
            <h1 class="text-xl font-bold text-neutral-600">
                Documentos de vinculación
            </h1>
        </section>
        <section class="grid w-full grid-cols-1 gap-8 sm:grid-cols-3">
            <Card v-for="resource in resources.data" :key="resource.index">
                <template #thumbnail>
                    <img
                        class="h-full w-full object-cover"
                        src="/storage/images/gallery-index.jpeg"
                        alt="documents-cover"
                    />
                </template>
                <template #title>
                    <h1
                        class="mr-4 line-clamp-1 w-full text-xl font-bold text-neutral-50"
                    >
                        {{ resource.name }}
                    </h1>
                </template>
                <template #content>
                    <p class="line-clamp-2 text-neutral-100">
                        {{ resource.description }}
                    </p>
                    <h3 class="text-sm text-neutral-100">
                        Compartido {{ resource.created_at }}
                    </h3>
                    <div class="mt-2 flex items-center justify-center">
                        <button
                            v-if="resource.file"
                            @click="handleShowPdfModal(resource.file.path)"
                            class="text-md rounded-lg bg-sky-900  px-4 py-2 font-medium text-neutral-50"
                        >
                            Ver más
                        </button>
                    </div>
                </template>
            </Card>
        </section>
        <Pagination
            :links="props.resources.meta.links"
            class="mt-8 flex justify-center mb-8"
        />
    </div>
    <Modal @close="handleClosePdfModal" :show="showModal" max>
        <PdfViewer :url="urlToShow" />
    </Modal>
</template>
