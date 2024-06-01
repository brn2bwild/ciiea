<script setup>
import Modal from "@/Components/Modal.vue";
import PdfThumbnail from "@/Components/PdfThumbnail.vue";
import PdfViewer from "@/Components/PdfViewer.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

defineOptions({
    layout: HomeLayout,
});

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
});

const showPdfModal = ref(false);
const urlToShow = ref("");

const handleOpenPdfModal = (url) => {
    urlToShow.value = url;
    showPdfModal.value = true;
};

const handleClosePdfModal = () => {
    showPdfModal.value = false;
};
</script>

<template>
    <Head title="Publicaciones" />
    <div
        class="flex w-full flex-col items-center justify-center sm:px-60 sm:py-10"
    >
        <section class="w-full py-10 pb-28">
            <div
                class="flex h-full w-full items-center justify-between overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-100"
            >
                <div class="w-1/2 p-4">
                    <h5 class="font-sans text-neutral-500">
                        {{ props.publications[0].publicated_at }}
                    </h5>
                    <h1
                        class="mt-2 font-sans text-4xl font-extrabold text-neutral-700"
                    >
                        {{ props.publications[0].title }}
                    </h1>
                    <button
                        v-if="props.publications[0].file"
                        @click="
                            handleOpenPdfModal(props.publications[0].file.path)
                        "
                        class="mt-4 rounded-xl bg-sky-500 px-4 py-2 font-bold text-neutral-50"
                    >
                        Leer más
                    </button>
                </div>
                <div
                    class="flex h-80 w-1/2 justify-center overflow-hidden object-contain"
                >
                    <div
                        v-if="props.publications[0].file !== null"
                        class="-m-[20px] scale-90"
                    >
                        <PdfThumbnail :url="props.publications[0].file.path" />
                    </div>
                    <img
                        v-else
                        src="/storage/images/bookshelve-optimized.jpg"
                        alt="book-cover"
                    />
                </div>
            </div>
        </section>
        <section class="w-full pb-6">
            <h1 class="text-xl font-bold text-neutral-600">
                Publicaciones recientes
            </h1>
        </section>
        <section class="grid w-full grid-cols-1 gap-10 md:grid-cols-3">
            <div
                v-for="publication in publications"
                :key="publication.index"
                class="flex w-full flex-col items-start justify-center overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-100"
            >
                <div
                    class="mb-2 flex h-60 w-full items-start justify-center overflow-hidden object-contain"
                >
                    <div
                        v-if="publication.file !== null"
                        class="-m-[160px] scale-[60%]"
                    >
                        <PdfThumbnail :url="publication.file.path" />
                    </div>
                    <img
                        v-else
                        src="/storage/images/bookshelve-optimized.jpg"
                        alt="book-cover"
                        class="w-full"
                    />
                </div>
                <div
                    class="flex h-44 w-full flex-col items-start justify-between gap-0 p-4"
                >
                    <h5 class="font-sans text-sm text-neutral-500">
                        {{ publication.publicated_at }}
                    </h5>
                    <h1 class="font-sans text-xl font-extrabold">
                        {{ publication.title }}
                    </h1>
                    <button
                        v-if="publication.file"
                        @click="handleOpenPdfModal(publication.file.path)"
                        class="rounded-xl bg-sky-500 px-4 py-2 text-sm font-bold text-neutral-50"
                    >
                        Leer más
                    </button>
                </div>
            </div>
        </section>
    </div>
    <Modal
        @close="handleClosePdfModal"
        :show="showPdfModal"
        :max-width="'3xl'"
        class="h-[860px] overflow-hidden"
    >
        <PdfViewer :url="urlToShow" class="object-fill" />
    </Modal>
</template>
