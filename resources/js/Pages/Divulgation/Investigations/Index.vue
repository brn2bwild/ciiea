<script setup>
import Card from "@/Components/Card.vue";
import Modal from "@/Components/Modal.vue";
import Pagination from "@/Components/Pagination.vue";
import PdfThumbnail from "@/Components/PdfThumbnail.vue";
import PdfViewer from "@/Components/PdfViewer.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { ref } from "vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    investigations: {
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
    <Head title="Investigaciones" />
    <div
        class="flex w-full flex-col items-center justify-center px-14 sm:py-10 lg:px-60"
    >
    <section class="w-full py-10">
    <div
        class="mt-10 flex h-full w-full items-center justify-between overflow-hidden rounded-2xl bg-white shadow-lg shadow-slate-100 flex-col md:flex-row"
    >
     
        <div
            class="flex h-80 w-full md:w-1/2 justify-center overflow-hidden object-contain order-1 md:order-1"
        >
            <div
                v-if="props.investigations.data[0].file !== null"
                class="-m-[20px] scale-90"
            >
                <PdfThumbnail :url="props.investigations.data[0].file.path" />
            </div>
            <img
                v-else
                src="/storage/images/bookshelve-optimized.jpg"
                alt="alt-investigation-cover"
                class="w-full object-cover"
            />
        </div>

        <div class="w-full md:w-1/2 p-4 order-2 md:order-2">
            <h3 class="font-sans text-neutral-500">
                {{ props.investigations.data[0].publicated_at }}
            </h3>
            <h1 class="mt-2 font-sans text-4xl font-extrabold text-neutral-700">
                {{ props.investigations.data[0].title }}
            </h1>
            <h2 class="mt-2 text-lg font-medium text-neutral-600">
                {{ props.investigations.data[0].short_description }}
            </h2>
            <button
                v-if="props.investigations.data[0].file"
                @click="handleOpenPdfModal(props.investigations.data[0].file.path)"
                class="mt-4 rounded-lg bg-sky-900  px-4 py-2 font-bold text-neutral-50"
            >
                Leer más
            </button>
        </div>
    </div>
</section>


        <section class="w-full pb-6">
            <h1 class="text-xl font-bold text-neutral-600">
                Investigaciones recientes
            </h1>
        </section>

        <section class="grid w-full grid-cols-1 gap-8 md:grid-cols-3">
            <Card
                v-for="investigation in props.investigations.data"
                :key="investigation.index"
            >
                <template #thumbnail>
                    <div
                        v-if="investigation.file !== null"
                        class="-m-[160px] scale-[60%]"
                    >
                        <PdfThumbnail :url="investigation.file.path" />
                    </div>
                    <img
                        v-else
                        src="/storage/images/bookshelve-optimized.jpg"
                        alt="investigations-cover"
                        class="w-full"
                    />
                </template>
                <template #title>
                    <h1
                        class="line-clamp-1 font-sans text-xl font-extrabold text-neutral-50"
                    >
                        {{ investigation.title }}
                    </h1>
                </template>
                <template #content>
                    <h2
                        class="text-md line-clamp-2 font-medium text-neutral-100"
                    >
                        {{ investigation.short_description.substr(0, 50) }}
                    </h2>
                    <h3 class="font-sans text-sm text-neutral-100">
                        Fecha de publicación: {{ investigation.publicated_at }}
                    </h3>
                    <div class="mt-2 flex items-center justify-center">
                        <button
                            v-if="investigation.file"
                            @click="handleOpenPdfModal(investigation.file.path)"
                            class="rounded-lg bg-sky-900 px-4 py-2 text-sm font-bold text-neutral-50"
                        >
                            Leer más
                        </button>
                    </div>
                </template>
            </Card>
        </section>
        <Pagination
            :links="props.investigations.meta.links"
            class="mt-8 flex justify-center mb-8"
        />
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
