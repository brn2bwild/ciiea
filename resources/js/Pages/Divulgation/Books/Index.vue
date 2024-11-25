<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import PdfThumbnail from "@/Components/PdfThumbnail.vue";
import PdfViewer from "@/Components/PdfViewer.vue";
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import Pagination from "@/Components/Pagination.vue";
import Card from "@/Components/Card.vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    books: {
        type: Object,
        required: true,
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
    <Head title="Libros" />
    <div
        class="mb-8 flex w-full flex-col items-center justify-center px-14 sm:py-10 lg:px-60"
    >
    <section class="w-full py-10">
    <div
        class="mt-10 flex h-full w-full items-center justify-between overflow-hidden rounded-2xl bg-white shadow-lg shadow-slate-100 md:flex-row flex-col"
    >
        <div class="flex h-80 w-full md:w-1/2 justify-center overflow-hidden object-contain order-1 md:order-1">
            <div
                v-if="props.books.data[0].file !== null"
                class="-m-[20px] scale-90"
            >
                <PdfThumbnail :url="props.books.data[0].file.path" />
            </div>
            <img
                v-else
                src="/storage/images/bookshelve-optimized.jpg"
                alt="book-cover"
                class="w-full object-cover"
            />
        </div>

        <div class="w-full md:w-1/2 p-4 order-2 md:order-2">
            <h3 class="font-sans text-neutral-500">
                Fecha de publicación:
                {{ props.books.data[0].publicated_at }}
            </h3>
            <h1
                class="mt-2 font-sans text-3xl font-extrabold text-neutral-700"
            >
                {{ props.books.data[0].title }}
            </h1>
            <h2 class="mt-2 text-lg font-medium text-neutral-600">
                {{ props.books.data[0].authors }}
            </h2>
            <button
                v-if="props.books.data[0].file"
                @click="handleOpenPdfModal(props.books.data[0].file.path)"
                class="mt-4 rounded-lg bg-sky-900 px-4 py-2 font-bold text-neutral-50"
            >
                Leer más
            </button>
        </div>
    </div>
</section>



        <section class="w-full py-6">
            <h1 class="text-xl font-bold text-neutral-600">Libros recientes</h1>
        </section>

        <section class="grid w-full grid-cols-1 gap-8 md:grid-cols-3">
            <Card v-for="book in props.books.data" :key="book.index">
                <template #thumbnail>
                    <div
                        v-if="book.file !== null"
                        class="-m-[160px] scale-[60%]"
                    >
                        <PdfThumbnail :url="book.file.path" />
                    </div>
                    <img
                        v-else
                        src="/storage/images/bookshelve-optimized.jpg"
                        alt="book-cover"
                        class="w-full"
                    />
                </template>

                <template #title>
                    <h1
                        class="line-clamp-2 font-sans text-xl font-bold text-neutral-50"
                    >
                        {{ book.title }}
                    </h1>
                </template>
                <template #content>
                    <h2 class="text-md font-medium text-neutral-100">
                        {{ book.authors }}
                    </h2>
                    <h3 class="text-sm text-neutral-100">
                        Fecha de publicación: {{ book.publicated_at }}
                    </h3>
                    <div class="mt-2 flex items-center justify-center">
                        <button
                            v-if="book.file"
                            @click="handleOpenPdfModal(book.file.path)"
                            class="rounded-lg bg-sky-900 px-4 py-1 text-lg font-bold text-neutral-50"
                        >
                            Leer más
                        </button>
                    </div>
                </template>
            </Card>
        </section>

        <Pagination
            :links="props.books.meta.links"
            class="mt-8 mb-8 flex justify-center"
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
